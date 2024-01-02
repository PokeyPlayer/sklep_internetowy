<?php
namespace app\controllers;

use app\forms\AdminUserEditForm;
use DateTime;
use PDOException;

class AdminUserEditCtrl{
	private $form;
	
	public function __construct(){
		$this->form = new AdminUserEditForm();
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
		if (getMessages()->isError()) return false;

		return ! getMessages()->isError();
	}

	public function validateEdit() {
		$this->form->IDuzytkownik = getFromRequest('id',true,'Błędne wywołanie aplikacji1');
		return ! getMessages()->isError();
	}

	public function action_userEditAdmin(){
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

	public function action_userSaveAdmin(){
		if ($this->validateSave()){
			$IDuzytkownik=$_SESSION['IDuzytkownik'];
			try {
				$this->odczyt = getDB()->count("uzytkownicy", "*",
				[
					"email" => $this->form->email,
				]);

				$this->records=getDB()->get("uzytkownicy", [
					"uzytkownicy.IDuzytkownik",
					"uzytkownicy.email",
				],
				[
					"uzytkownicy.IDuzytkownik" => $this->form->IDuzytkownik,
				]);

				if($this->odczyt==0 || ($this->form->email==$this->records["email"])){
				getDB()->update("uzytkownicy", [
					"IDkto_zmodyfikowal" => $IDuzytkownik,
					"imie" => $this->form->imie,
					"nazwisko" => $this->form->nazwisko,
					"miejscowosc" => $this->form->miejscowosc,
					"kod_pocztowy" => $this->form->kod_pocztowy,
					"ulica" => $this->form->ulica,
					"nr_posesji" => $this->form->nr_posesji,
					"nr_lokalu" => $this->form->nr_lokalu,
					"numer_tel" => $this->form->numer_tel,
					"email" => $this->form->email,
					], 
					[ 
					"IDuzytkownik" => $this->form->IDuzytkownik
					]);
					getMessages()->addInfo('Pomyślnie edytowano profil użytkownika');
					forwardTo('adminView');
				}else{
					getMessages()->addError('Użytkownik o takim emailu juz istnieje. Podaj inny email.');
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
		getSmarty()->display('AdminUserEditView.tpl');		
	}
}