<?php
namespace app\controllers;

use app\forms\RegistrationForm;

class RegistrationCtrl{
	private $form;
	
	public function __construct(){
		$this->form = new RegistrationForm();
	}
	
	public function validate(){
		$this->form->imie = getFromRequest('imie',true,'Błędne wywołanie aplikacji1');
		$this->form->nazwisko = getFromRequest('nazwisko',true,'Błędne wywołanie aplikacji2');
		$this->form->miejscowosc = getFromRequest('miejscowosc',true,'Błędne wywołanie aplikacji3');
		$this->form->kod_pocztowy = getFromRequest('kod_pocztowy',true,'Błędne wywołanie aplikacji4');
		$this->form->ulica = getFromRequest('ulica',true,'Błędne wywołanie aplikacji5');
		$this->form->nr_posesji = getFromRequest('nr_posesji',true,'Błędne wywołanie aplikacji6');
		$this->form->nr_lokalu = getFromRequest('nr_lokalu',true,'Błędne wywołanie aplikacji7');
		$this->form->numer_tel = getFromRequest('numer_tel',true,'Błędne wywołanie aplikacji8');
		$this->form->email = getFromRequest('email',true,'Błędne wywołanie aplikacji9');
		$this->form->haslo = getFromRequest('haslo',true,'Błędne wywołanie aplikacji10');
		$this->form->haslo2 = getFromRequest('haslo2',true,'Błędne wywołanie aplikacji11');
		$email = getFromRequest('email',true,'Błędne wywołanie aplikacji12');
			
		if (empty($this->form->imie)) {
			getMessages()->addError('Podaj imię');
		}
		if (empty($this->form->nazwisko)) {
			getMessages()->addError('Podaj nazwisko');
		}
		if (empty($this->form->miejscowosc)) {
			getMessages()->addError('Podaj miejscowość');
		}
		if (empty($this->form->kod_pocztowy)) {
			getMessages()->addError('Podaj kod pocztowy');
		}
		if (empty($this->form->ulica)) {
			getMessages()->addError('Podaj ulicę');
		}
		if (empty($this->form->nr_posesji)) {
			getMessages()->addError('Podaj nr posesji');
		}
		if (empty($this->form->numer_tel)) {
			getMessages()->addError('Podaj numer telefonu');
		}
		if (empty($this->form->email)) {
			getMessages()->addError('Podaj adres email');
		}
		if (empty($this->form->haslo)) {
			getMessages()->addError('Podaj hasło');
		}
		if (empty($this->form->haslo2)) {
			getMessages()->addError('Powtórz hasło');
		}
		if (getMessages()->isError()) return false;

		
		if(strlen($this->form->numer_tel)!=9){
			getMessages()->addError('Podano błędny numer telefonu');
		}

		if(strlen($this->form->haslo)<8){
			getMessages()->addError('Hasło musi sie składać przynajmniej z 8 znaków');
		}
		else if(strlen($this->form->haslo)>17){
			getMessages()->addError('Hasło może sie składac maksymalnie z 16 znakow');
		}
		if (getMessages()->isError()) return false;

		if($this->form->haslo != $this->form->haslo2){
			getMessages()->addError('Podane hasła różnią się');
		}
		if (getMessages()->isError()) return false;
		
		return ! getMessages()->isError();
	}


	public function action_registrationShow(){
		$this->generateView(); 
	}

	public function action_registration(){
		if ($this->validate()){
			$this->zaszyfrowane = password_hash($this->form->haslo, PASSWORD_DEFAULT);
			try {
				$this->odczyt = getDB()->count("uzytkownicy", "*",
				[
					"email" => $this->form->email,
				]);

				if($this->odczyt==0){
				getDB()->insert("uzytkownicy", [
					"imie" => $this->form->imie,
					"nazwisko" => $this->form->nazwisko,
					"numer_tel" => $this->form->numer_tel,
					"miejscowosc" => $this->form->miejscowosc,
					"kod_pocztowy" => $this->form->kod_pocztowy,
					"ulica" => $this->form->ulica,
					"nr_posesji" => $this->form->nr_posesji,
					"nr_lokalu" => $this->form->nr_lokalu,
					"email" => $this->form->email,
					"haslo" => $this->zaszyfrowane,
					"stan_portfela" => 0,
					"aktywacja" => 0,
					"blokada" => 0,
					"proba" => 0,
					"reset_hasla" => 0,
					"IDkto_utworzyl" => 1,
					"IDkto_zmodyfikowal" =>	1,
					]);	
					$IDuzytkownik = getDB()->id();

					getDB()->update("uzytkownicy", [
						"IDkto_utworzyl" => $IDuzytkownik,
						"IDkto_zmodyfikowal" =>	$IDuzytkownik
					],
					[	
						"IDuzytkownik" => $IDuzytkownik,
					]);
					
					getDB()->insert("uzytkownik_rola", [
						"IDuzytkownik" => $IDuzytkownik,
						"IDrola" => 2,
					]);

					getDB()->insert("adresy_dostaw", [
						"IDuzytkownik" => $IDuzytkownik,
						"imie" => $this->form->imie,
						"nazwisko" => $this->form->nazwisko,
						"miejscowosc" => $this->form->miejscowosc,
						"ulica" => $this->form->ulica,
						"nr_posesji" => $this->form->nr_posesji,
						"nr_lokalu" => $this->form->nr_lokalu,
						"kod_pocztowy" => $this->form->kod_pocztowy,
						"numer_tel" => $this->form->numer_tel,
					]);


					function format_mail($token) {
						return "
						<!DOCTYPE html>
						<html>
							<body>
								<h1>Weryfikacja konta:</h1>
								<p>Otrzymujesz ten email, ponieważ potrzebujesz zweryfikować konto użytkownika w sklepie internetowym MGM.</p>
								<p>Twój link weryfikacyjny: <a href=\"http://localhost/sklep_internetowy/ctrl.php?action=verification&token=$token\" data-saferedirecturl=\"http://localhost/sklep_internetowy/ctrl.php?action=verification&token=$token\" nh-safe-redirect rel=\"\">Link weryfikacyjny</a></p>
							</body>
						</html>";
					}
					
					function verification_email($email, $IDuzytkownik, $rodzaj) {
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
							getMessages()->addError('Wygląda na to, że dnia ' . $data . ' wysyłałeś już prośbę o aktywację konta użytkownika. Poprzedni link aktywacyjny został anulowany. Proszę użyć aktualnego linku.');
						}
						
						if(!$error){
						  	do{
								$token = bin2hex(random_bytes(8));
								$count = getDB()->count("weryfikacje", [
									"kod" => $token,
								]);
						  	}while ($count>0);
					  
							$headers = "MIME-Version: 1.0\r\n";
							$headers .= "Content-type: text/html; charset=UTF-8\r\n";
							$headers .= "From: MGM sklep internetowy\r\n";
							$headers .= "Reply-To: {$email}>\r\n";
							$headers .= "X-Mailer: PHP/".phpversion();
					  
							mail($email, "Weryfikacja konta", format_mail($token), $headers);
					
						  	getDB()->insert("weryfikacje", [
								"IDuzytkownik" => $IDuzytkownik,
								"kod" => $token,
								"rodzaj" => $rodzaj,
								"zweryfikowano" => 0,
								"odrzucono" => 0,
							]);
						  	return true;
						}else{
						  	return false;
						} 
					}

					verification_email($this->form->email, $IDuzytkownik, 1);
					getMessages()->addInfo('Pomyślnie utworzono konto użytkownika! Na twój e-mail został wysłany link aktywacyjny.');
					forwardTo('adList');
				}else{
					getMessages()->addError('Użytkownik o takim emailu juz istnieje. Podaj inny email.');
					$this->generateView();
				}
			}
			catch (PDOException $e){
				getMessages()->addError('Wystąpił nieoczekiwany błąd podczas tworzenia konta użytkownika.');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}				
		}else{
		   $this->generateView();
		}	
	}

	public function generateView(){		
		getSmarty()->assign('form',$this->form);
		getSmarty()->display('RegistrationView.tpl');		
	}
}