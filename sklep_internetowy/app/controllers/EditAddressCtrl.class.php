<?php
namespace app\controllers;

use app\forms\EditAddressForm;
use DateTime;
use PDOException;

class EditAddressCtrl{
	private $form;
	
	public function __construct(){
		$this->form = new EditAddressForm();
	}
	
	public function validateSave(){
		$this->form->IDadres = getFromRequest('IDadres',true,'Błędne wywołanie aplikacji1');
		$this->form->imie = getFromRequest('imie',true,'Błędne wywołanie aplikacji2');
		$this->form->nazwisko = getFromRequest('nazwisko',true,'Błędne wywołanie aplikacji3');
		$this->form->miejscowosc = getFromRequest('miejscowosc',true,'Błędne wywołanie aplikacji4');
		$this->form->kod_pocztowy = getFromRequest('kod_pocztowy',true,'Błędne wywołanie aplikacji5');
		$this->form->ulica = getFromRequest('ulica',true,'Błędne wywołanie aplikacji6');
		$this->form->nr_posesji = getFromRequest('nr_posesji',true,'Błędne wywołanie aplikacji7');
		$this->form->nr_lokalu = getFromRequest('nr_lokalu',true,'Błędne wywołanie aplikacji8');
		$this->form->numer_tel = getFromRequest('numer_tel',true,'Błędne wywołanie aplikacji9');

		if (getMessages()->isError()) return false;
			
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
		if (getMessages()->isError()) return false;

		
		if(strlen($this->form->numer_tel)!=9){
			getMessages()->addError('Podano błędny numer telefonu');
		}
		if (getMessages()->isError()) return false;
		
		return ! getMessages()->isError();
	}

	public function validateEdit() {
		$this->form->IDadres = getFromRequest('IDadres',true,'Błędne wywołanie aplikacji11');
		return ! getMessages()->isError();
	}


	public function action_editAddress(){
		if ($this->validateEdit()){
			$IDuzytkownik=$_SESSION['IDuzytkownik'];
			try {
				$record = getDB()->get("adresy_dostaw", "*",[
					"IDadres" => $this->form->IDadres
				]);
				$this->form->IDadres = $record['IDadres'];
				$IDuzytkownik = $record['IDuzytkownik'];
				$this->form->imie = $record['imie'];
				$this->form->nazwisko = $record['nazwisko'];
				$this->form->miejscowosc = $record['miejscowosc'];
				$this->form->ulica = $record['ulica'];
				$this->form->nr_posesji = $record['nr_posesji'];
				$this->form->nr_lokalu = $record['nr_lokalu'];
				$this->form->kod_pocztowy = $record['kod_pocztowy'];
				$this->form->numer_tel = $record['numer_tel'];
			} catch (PDOException $e){
				getMessages()->addError('Wystąpił błąd podczas odczytu adresu dostawy');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}	
		} 
		$this->generateView();
	}

	public function action_editAddressSave(){
		if ($this->validateSave()){
			try { 
				getDB()->update("adresy_dostaw", [
					"imie" => $this->form->imie,
					"nazwisko" => $this->form->nazwisko,
					"miejscowosc" => $this->form->miejscowosc,
					"ulica" => $this->form->ulica,
					"nr_posesji" => $this->form->nr_posesji,
					"nr_lokalu" => $this->form->nr_lokalu,
					"kod_pocztowy" => $this->form->kod_pocztowy,
					"numer_tel" => $this->form->numer_tel,
					], 
					[ 
					"IDadres" => $this->form->IDadres
					]);
				getMessages()->addInfo('Pomyślnie edytowano adres dostawy');
			}catch (PDOException $e){
				getMessages()->addError('Wystąpił nieoczekiwany błąd podczas edycji adresu dostawy');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}
			forwardTo('cartProducts');
		}else{
			$this->generateView();
		}		
	}

	public function action_deleteAddress(){		
		if ($this->validateEdit()){
			$IDuzytkownik=$_SESSION['IDuzytkownik'];		
			try{
				getDB()->delete("adresy_dostaw",[
					"IDadres" => $this->form->IDadres
				]);
				getMessages()->addInfo('Pomyślnie usunięto wybrany adres dostawy');
			}catch (PDOException $e){
				getMessages()->addError('Wystąpił błąd podczas usuwania adresu dostawy');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}	
		}
		forwardTo('cartProducts');	
	}
	
	public function generateView(){		
		getSmarty()->assign('form',$this->form);
		getSmarty()->display('EditAddressView.tpl');		
	}
}