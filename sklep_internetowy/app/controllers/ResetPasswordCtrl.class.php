<?php
namespace app\controllers;

use app\forms\ResetPasswordForm;

class ResetPasswordCtrl{
	private $form;
	
	public function __construct(){
		$this->form = new ResetPasswordForm();
	}
	
	public function validate(){
		$this->form->email = getFromRequest('email');
	
		if (!(isset($this->form->email))){
			return false;
		}
			
		if (empty($this->form->email)){
			getMessages()->addError('Nie podano e-maila');
		}
		if (getMessages()->isError()) return false;
		
		return ! getMessages()->isError();
	}
	
	public function action_resetPasswordShow(){
		$this->generateView(); 
	}

	public function action_resetPassword(){
		if($this->validate()){
			try{
				$this->records = getDB()->select("uzytkownicy", [
					"IDuzytkownik",
					"email",
				],
				[
					"email" => $this->form->email,
				]);

				function format_mail($token) {
					return "
					<!DOCTYPE html>
					<html>
						<body>
							<h1>Resetowanie hasła:</h1>
							<p>Otrzymujesz ten email, ponieważ poproszono o zresetowanie hasła do Twojego konta użytkownika.</p>
							<p>Twój link do zresetowania hasła: <a href=\"http://localhost/sklep_internetowy/ctrl.php?action=verification&token=$token\" data-saferedirecturl=\"http://localhost/sklep_internetowy/ctrl.php?action=verification&token=$token\" nh-safe-redirect rel=\"\">Link</a></p>
						</body>
					</html>";
				}
				
				function verification_email($email, $IDuzytkownik, $rodzaj){
					$error = false;
					$records = getDB()->select("weryfikacje", [
						"IDweryfikacja",
						"IDuzytkownik",
						"kod",
						"rodzaj",
						"zweryfikowano",
						"odrzucono",
						"data_wygenerowania",
					],
					[
						"IDuzytkownik" => $IDuzytkownik,
						"rodzaj" => $rodzaj,
						"zweryfikowano" => 0,
						"odrzucono" => 0,
					]);
		
					$count = getDB()->count("weryfikacje", [
						"IDuzytkownik" => $IDuzytkownik,
						"rodzaj" => $rodzaj,
						"zweryfikowano" => 0,
						"odrzucono" => 0,
					]);
		
					if($count>0){
						$data = $records[0]["data_wygenerowania"];
						getDB()->update("weryfikacje", [
							"odrzucono" => 1,
						],
						[	
							"IDuzytkownik" => $IDuzytkownik,
							"rodzaj" => $rodzaj,
							"zweryfikowano" => 0,
							"odrzucono" => 0,
						]);
						getMessages()->addError('Wygląda na to, że dnia ' . $data . ' wysyłałeś już prośbę o zresetowanie hasła. Poprzedni link resetujący hasło został anulowany. Proszę użyć aktualnego linku.');
					}
					
					if(!$error){
					  	do{
							$token = bin2hex(random_bytes(8));
							$count = getDB()->count("weryfikacje", [
								"kod" => $token,
							]);
					  	}while ($count>0);

					 	getDB()->insert("weryfikacje", [
							"IDuzytkownik" => $IDuzytkownik,
							"kod" => $token,
							"rodzaj" => $rodzaj,
							"zweryfikowano" => 0,
							"odrzucono" => 0,
					  	]);

						$headers = "MIME-Version: 1.0\r\n";
						$headers .= "Content-type: text/html; charset=UTF-8\r\n";
						$headers .= "From: MGM sklep internetowy\r\n";
						$headers .= "Reply-To: {$email}>\r\n";
						$headers .= "X-Mailer: PHP/".phpversion();

						mail($email, "Resetowanie hasła", format_mail($token), $headers);
						return true;
					}else{
						return false;
					} 	
				}
	
				if(count($this->records)>0){
					$IDuzytkownik = $this->records[0]["IDuzytkownik"];
					verification_email($this->form->email, $IDuzytkownik, 2);
					getMessages()->addInfo('Na podanego e-maila został wysłany link do resetowania hasła.');
					forwardTo("resetPasswordShow");
				}else{
					getMessages()->addError('Konto o podanym e-mailu nie istnieje.');
					forwardTo("resetPasswordShow");
				}			
			}catch (PDOException $e){
				getMessages()->addError('Wystąpił błąd podczas pobierania rekordów');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}		
		}else{			
			$this->generateView(); 
		}	
	}
	
	public function generateView(){		
		getSmarty()->assign('form',$this->form);
		getSmarty()->display('ResetPasswordView.tpl');		
	}
}