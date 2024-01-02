<?php
namespace app\controllers;

use app\forms\AddAddressForm;

class AddAddressCtrl{
	private $form;
	
	public function __construct(){
		$this->form = new AddAddressForm();
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
	
	public function action_addAddressShow(){
		$this->generateView(); 
	}

	public function action_addAddress(){
		if ($this->validate()){
			$IDuzytkownik=$_SESSION['IDuzytkownik'];
			try {
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
				getMessages()->addInfo('Pomyślnie dodano adres dostawy.');
				forwardTo('cartProducts');
			} 
			catch (PDOException $e){
				getMessages()->addError('Wystąpił nieoczekiwany błąd podczas dodawania adresu dostawy.');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}				
		}else{
		   $this->generateView();
		}
	}
	
	public function generateView(){		
		getSmarty()->assign('form',$this->form);
		getSmarty()->display('AddAddressView.tpl');		
	}
}