<?php
namespace app\controllers;

class VerificationCtrl{
	public function validate(){
		$token = getFromGet('token',true,'Błędne wywołanie aplikacji1');
		if (getMessages()->isError()) return false;
		
		return ! getMessages()->isError();
	}
	
	public function action_verification(){
		if ($this->validate()){
			$token = getFromGet('token');
			try {
				$this->records = getDB()->select("weryfikacje", [
					"IDweryfikacja",
					"IDuzytkownik",
					"kod",
					"rodzaj",
					"zweryfikowano",
					"odrzucono",
					"data_wygenerowania",
					],
					[
						"kod" => $token,
						"zweryfikowano" => 0,
						"odrzucono" => 0,
					]);

					$this->count = getDB()->count("weryfikacje", [
						"kod" => $token,
						"zweryfikowano" => 0,
						"odrzucono" => 0,
					]);

					if($this->count>0){
						$rodzaj = $this->records[0]["rodzaj"];
						$IDuzytkownik = $this->records[0]["IDuzytkownik"];
						$IDweryfikacja = $this->records[0]["IDweryfikacja"];

						getDB()->update("weryfikacje", [
							"zweryfikowano" => 1,
						],
						[	
							"IDweryfikacja" => $IDweryfikacja,
						]);
					

						switch ($rodzaj){
							case '1':
								getDB()->update("uzytkownicy", [
									"aktywacja" => 1,
								],
								[	
									"IDuzytkownik" => $IDuzytkownik,
								]);
								getMessages()->addInfo('Weryfikacja konta przebiegła pomyślnie.');
								forwardTo('loginShow');
								break;

							case '2':
								$haslo = bin2hex(random_bytes(4));
								$this->zaszyfrowane = password_hash($haslo, PASSWORD_DEFAULT);
								getDB()->update("uzytkownicy", [
									"haslo" => $this->zaszyfrowane,
									"reset_hasla[+]" => 1,
								],
								[	
									"IDuzytkownik" => $IDuzytkownik,
								]);
								getMessages()->addInfo('Twoje nowe hasło to "' . $haslo . '". Proszę ustawić nowe hasło w profilu użytkownika.');
								forwardTo('loginShow');
								break;

							default:
								getMessages()->addError('Ten kod weryfikacyjny jest niepoprawny lub został już użyty/anulowany.');
								forwardTo('loginShow');
								break;
						}
					}else{
						getMessages()->addError('Ten kod weryfikacyjny jest niepoprawny lub został już użyty/anulowany.');
						forwardTo('loginShow');
					}
			} 
			catch (PDOException $e){
				getMessages()->addError('Wystąpił nieoczekiwany błąd podczas weryfikacji konta użytkownika.');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}				
		}else{
			getMessages()->addError('Błąd weryfikacji!');
			forwardTo('loginShow');
		}	
	}
}