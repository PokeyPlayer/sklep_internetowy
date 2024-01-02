<?php
namespace app\controllers;

use app\forms\UserEditForm;
use DateTime;
use PDOException;

class UserEditCtrl{
	private $form;
	
	public function __construct(){
		$this->form = new UserEditForm();
	}
	
	public function validateSave(){
		$this->form->IDuzytkownik = getFromRequest('IDuzytkownik',true,'Błędne wywołanie aplikacji1');
		$this->form->imie = getFromRequest('imie',true,'Błędne wywołanie aplikacji2');
		$this->form->nazwisko = getFromRequest('nazwisko',true,'Błędne wywołanie aplikacji3');
		$this->form->miejscowosc = getFromRequest('miejscowosc',true,'Błędne wywołanie aplikacji4');
		$this->form->kod_pocztowy = getFromRequest('kod_pocztowy',true,'Błędne wywołanie aplikacji5');
		$this->form->ulica = getFromRequest('ulica',true,'Błędne wywołanie aplikacji6');
		$this->form->nr_posesji = getFromRequest('nr_posesji',true,'Błędne wywołanie aplikacji7');
		$this->form->nr_lokalu = getFromRequest('nr_lokalu',true,'Błędne wywołanie aplikacji8');
		$this->form->numer_tel = getFromRequest('numer_tel',true,'Błędne wywołanie aplikacji9');
		$this->form->email = getFromRequest('email',true,'Błędne wywołanie aplikacji10');
		$this->form->haslo = getFromRequest('haslo',true,'Błędne wywołanie aplikacji11');
		$this->form->haslo2 = getFromRequest('haslo2',true,'Błędne wywołanie aplikacji12');
		$this->form->aktualne_haslo = getFromRequest('aktualne_haslo',true,'Błędne wywołanie aplikacji13');
		
		if ( getMessages()->isError() ) return false;
	
		if (empty($this->form->imie)) {
			getMessages()->addError('Podaj imie');
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
		if (getMessages()->isError()) return false;


		if(strlen($this->form->numer_tel)!=9){
			getMessages()->addError('Podano błędny numer telefonu');
		}

		if(strlen($this->form->haslo)<8 && (!empty($this->form->haslo))){
			getMessages()->addError('Hasło musi sie składać przynajmniej z 8 znaków');
		}
		else if(strlen($this->form->haslo)>17 && (!empty($this->form->haslo))){
			getMessages()->addError('Hasło może sie składac maksymalnie z 16 znakow');
		}
		if (getMessages()->isError()) return false;

		if($this->form->haslo != $this->form->haslo2){
			getMessages()->addError('Podane nowe hasła różnią się');
		}
		if (getMessages()->isError()) return false;

		return ! getMessages()->isError();
	}

	public function validateEdit() {
		$this->form->IDuzytkownik = getFromSession('IDuzytkownik',true,'Błędne wywołanie aplikacji1');
		return ! getMessages()->isError();
	}

	public function action_userProfileEdit(){
		if ($this->validateEdit()){
			try {
				$record = getDB()->get("uzytkownicy", "*",[
					"IDuzytkownik" => $this->form->IDuzytkownik
				]);
				$this->form->IDuzytkownik = $record['IDuzytkownik'];
				$this->form->imie = $record['imie'];
				$this->form->nazwisko = $record['nazwisko'];
				$this->form->miejscowosc = $record['miejscowosc'];
				$this->form->kod_pocztowy = $record['kod_pocztowy'];
				$this->form->ulica = $record['ulica'];
				$this->form->nr_posesji = $record['nr_posesji'];
				$this->form->nr_lokalu = $record['nr_lokalu'];
				$this->form->numer_tel = $record['numer_tel'];
				$this->form->email = $record['email'];
			} catch (PDOException $e){
				getMessages()->addError('Wystąpił błąd podczas odczytu danych użytkownika');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}	
		} 
		$this->generateView();
	}

	public function action_userProfileSave(){
		if ($this->validateSave()) {
			$IDuzyt=$_SESSION['IDuzytkownik'];
			$this->zaszyfrowane = password_hash($this->form->haslo, PASSWORD_DEFAULT);
			try {
				$this->odczyt = getDB()->count("uzytkownicy", "*",
				[
					"email" => $this->form->email,
				]);

				$this->records=getDB()->get("uzytkownicy", [
					"uzytkownicy.IDuzytkownik",
					"uzytkownicy.email",
					"uzytkownicy.haslo"
				],
				[
					"uzytkownicy.IDuzytkownik" => $this->form->IDuzytkownik,
				]);

				if (empty($this->form->haslo)){
					$this->zaszyfrowane = $this->form->aktualne_haslo;
					$this->zaszyfrowane = password_hash($this->form->aktualne_haslo, PASSWORD_DEFAULT);
				}

				if($this->odczyt==0 || ($this->form->email==$this->records["email"])){
					if(password_verify($this->form->aktualne_haslo, $this->records["haslo"])){
						getDB()->update("uzytkownicy", [
							"IDkto_zmodyfikowal" => $IDuzyt,
							"imie" => $this->form->imie,
							"nazwisko" => $this->form->nazwisko,
							"miejscowosc" => $this->form->miejscowosc,
							"kod_pocztowy" => $this->form->kod_pocztowy,
							"ulica" => $this->form->ulica,
							"nr_posesji" => $this->form->nr_posesji,
							"nr_lokalu" => $this->form->nr_lokalu,
							"numer_tel" => $this->form->numer_tel,
							"email" => $this->form->email,
							"haslo" => $this->zaszyfrowane,
						], 
						[ 
							"IDuzytkownik" => $this->form->IDuzytkownik
						]);
						getMessages()->addInfo('Pomyślnie edytowano profil użytkownika');
						forwardTo('productsList');
					}else{
						getMessages()->addError('Podane aktualne hasło jest nieprawidlowe');
						$this->generateView();
					}
				}else{
					getMessages()->addError('Użytkownik o takim emailu już istnieje. Podaj inny email.');
					$this->generateView();
				}
			}catch (PDOException $e){
				getMessages()->addError('Wystąpił nieoczekiwany błąd podczas zapisu danych uzytkownika');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}			
		}else{
			$this->generateView();
		}		
	}
	
	public function generateView(){		
		getSmarty()->assign('form',$this->form);
		getSmarty()->display('UserEditView.tpl');		
	}
}