<?php
namespace app\controllers;

use app\forms\LoginForm;

class LoginCtrl{
	private $form;
	private $records;
	private $records2;
	private $records3;
	
	public function __construct(){
		$this->form = new LoginForm();
	}
	
	public function validate(){
		$this->form->email = getFromRequest('email');
		$this->form->haslo = getFromRequest('haslo');
	
		if (!(isset($this->form->email) && isset($this->form->haslo))){
			return false;
		}
			
		if (empty($this->form->email)) {
			getMessages()->addError('Nie podano e-maila');
		}
		if (empty($this->form->haslo)) {
			getMessages()->addError('Nie podano hasła');
		}
		if (getMessages()->isError()) return false;
		
		return ! getMessages()->isError();
	}
	
	public function action_loginShow(){
		$this->generateView(); 
	}

	public function action_login(){
		if ($this->validate()){
			try {
				$this->records = getDB()->select("uzytkownicy", [
					"[>]uzytkownik_rola" => ["IDuzytkownik" => "IDuzytkownik"],
				],
				[
					"uzytkownicy.IDuzytkownik",
					"uzytkownicy.email",
					"uzytkownicy.haslo",
					"uzytkownicy.proba",
					"uzytkownicy.aktywacja",
					"uzytkownik_rola.IDrola",
				],
				[
					"uzytkownicy.email" => $this->form->email,
				]);

				$this->records2 = getDB()->get("uzytkownicy", [
					"uzytkownicy.IDuzytkownik",
					"uzytkownicy.haslo",
					"uzytkownicy.stan_portfela",
					"uzytkownicy.email",
				],
				[
					"uzytkownicy.email" => $this->form->email,
				]);

				$this->records3 = getDB()->select("uzytkownicy", [
					"IDuzytkownik",
					"blokada",
				],
				[
					"email" => $this->form->email,
					"blokada" => 1,
				]);
	
				if(count($this->records)>0){
					if(count($this->records3)>0){
						getMessages()->addError('Twoje konto jest zablokowane. Skontaktuj się z administratorem');
						$this->generateView();
					}else{
						if(password_verify($this->form->haslo, $this->records2["haslo"])){
							if($this->records[0]["aktywacja"] == 1){
								getDB()->update("uzytkownicy", [
									"proba" => 0,
								], 
								[ 
									"email" => $this->form->email,
								]);
								if($this->records[0]["IDrola"] == 2){
									addRole('user');
									$_SESSION['IDuzytkownik']=$this->records2["IDuzytkownik"];
									$_SESSION['stan_portfela']=$this->records2["stan_portfela"];
									$_SESSION['email']=$this->records2["email"];
									getMessages()->addInfo('Poprawnie zalogowano do systemu.');
									forwardTo("adList");	
								}elseif($this->records[0]["IDrola"] == 1){
									addRole('admin');
									$_SESSION['IDuzytkownik']=$this->records2["IDuzytkownik"];
									$_SESSION['stan_portfela']=$this->records2["stan_portfela"];
									$_SESSION['email']=$this->records2["email"];
									getMessages()->addInfo('Poprawnie zalogowano do panelu administracyjnego.');
									forwardTo("adminView");
								}
							}else{
								getMessages()->addError('Konto nie zostało zweryfikowane. Sprawdź swój email.');
								$this->generateView();
							}
						}else{
							$this->proba = $this->records[0]["proba"];
							$this->proba++;
							getDB()->update("uzytkownicy", [
								"proba" => $this->proba,
							], 
							[ 
								"email" => $this->form->email,
							]);

							if($this->proba >= 3){
								getDB()->update("uzytkownicy", [
									"blokada" => 1,
								], 
								[ 
									"email" => $this->form->email,
								]);
								getMessages()->addError('Twoje konto zostało zablokowane. Skontaktuj się z administratorem');
							}
							getMessages()->addError('Podane haslo jest nieprawidlowe');
							$this->generateView();
						}
					}
				}else{
					getMessages()->addError('Uzytkownik o podanym emailu nie istnieje. Zarejestruj się.');
					$this->generateView();
				}				
			}catch (PDOException $e){
				getMessages()->addError('Wystąpił błąd podczas pobierania rekordów');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}		
		}else{			
			$this->generateView(); 
		}	
	}
	
	public function action_logout(){
		session_destroy();
		redirectTo('productsList');
	}
	
	public function generateView(){		
		getSmarty()->assign('form',$this->form);
		getSmarty()->display('LoginView.tpl');		
	}
}