<?php
namespace app\controllers;

use app\forms\WalletForm;
use DateTime;
use PDOException;

class WalletCtrl{
	private $form;
	
	public function __construct(){
		$this->form = new WalletForm();
	}
	
	public function validateSave(){
		$this->form->rodzaj_karty = getFromRequest('rodzaj_karty',true,'Błędne wywołanie aplikacji1');
		$this->form->dzien_wygasniecia = getFromRequest('dzien_wygasniecia',true,'Błędne wywołanie aplikacji2');
		$this->form->miesiac_wygasniecia = getFromRequest('miesiac_wygasniecia',true,'Błędne wywołanie aplikacji3');
		$this->form->rok_wygasniecia = getFromRequest('rok_wygasniecia',true,'Błędne wywołanie aplikacji4');
		$this->form->nr_karty = getFromRequest('nr_karty',true,'Błędne wywołanie aplikacji5');
		$this->form->nr_cvv = getFromRequest('nr_cvv',true,'Błędne wywołanie aplikacji6');
		$this->form->imie = getFromRequest('imie',true,'Błędne wywołanie aplikacji7');
		$this->form->nazwisko = getFromRequest('nazwisko',true,'Błędne wywołanie aplikacji8');
		$this->form->nr_telefonu = getFromRequest('nr_telefonu',true,'Błędne wywołanie aplikacji9');
		$this->form->miejscowosc = getFromRequest('miejscowosc',true,'Błędne wywołanie aplikacji10');
		$this->form->kod_pocztowy = getFromRequest('kod_pocztowy',true,'Błędne wywołanie aplikacji11');
		$this->form->email = getFromRequest('email',true,'Błędne wywołanie aplikacji12');
		$this->form->kwota_doladowania = getFromRequest('kwota_doladowania',true,'Błędne wywołanie aplikacji13');
		
		if ( getMessages()->isError() ) return false;

		if ($this->form->rodzaj_karty == 0){
			getMessages()->addError('Wybierz rodzaj karty');
		}
		if (empty($this->form->nr_karty)) {
			getMessages()->addError('Podaj numer karty');
		}
		if (empty($this->form->nr_cvv)) {
			getMessages()->addError('Podaj numer CVV karty');
		}
		if ($this->form->dzien_wygasniecia == 0){
			getMessages()->addError('Wybierz dzień wygaśnięcia karty');
		}
		if ($this->form->miesiac_wygasniecia == 0){
			getMessages()->addError('Wybierz miesiąc wygaśnięcia karty');
		}
		if ($this->form->rok_wygasniecia == 0){
			getMessages()->addError('Wybierz rok wygaśnięcia karty');
		}
		if (empty($this->form->imie)) {
			getMessages()->addError('Podaj imie');
		}
		if (empty($this->form->nazwisko)) {
			getMessages()->addError('Podaj nazwisko');
		}
		if (empty($this->form->nr_telefonu)) {
			getMessages()->addError('Podaj numer telefonu');
		}
		if (empty($this->form->miejscowosc)) {
			getMessages()->addError('Podaj miejscowość');
		}
		if (empty($this->form->kod_pocztowy)) {
			getMessages()->addError('Podaj kod pocztowy');
		}
		if (empty($this->form->email)) {
			getMessages()->addError('Podaj adres email');
		}
		if (empty($this->form->kwota_doladowania) && $this->form->kwota_doladowania != 0) {
			getMessages()->addError('Podaj kwotę doładownia');
		}
		if (getMessages()->isError()) return false;


		if(strlen($this->form->nr_telefonu)!=9){
			getMessages()->addError('Podano błędny numer telefonu');
		}
		if(strlen($this->form->nr_karty)!=16 && (!empty($this->form->nr_karty))){
			getMessages()->addError('Numer karty musi posiadać 16 cyfr');
		}
		if(strlen($this->form->nr_cvv)!=3 && (!empty($this->form->nr_cvv))){
			getMessages()->addError('Numer CCV musi posiadać 3 cyfry');
		}
		if (getMessages()->isError()) return false;

		if ($this->form->kwota_doladowania <= 0) {
			getMessages()->addError('Podaj dodatnią kwotę doładowania');
		}
		if (getMessages()->isError()) return false;

		return ! getMessages()->isError();
	}

	public function validateEdit() {
		$this->form->IDuzytkownik = getFromSession('IDuzytkownik',true,'Błędne wywołanie aplikacji1');
		return ! getMessages()->isError();
	}

	public function action_walletView(){
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
				$this->form->nr_telefonu = $record['numer_tel'];
				$this->form->email = $record['email'];
			} catch (PDOException $e){
				getMessages()->addError('Wystąpił błąd podczas odczytu danych użytkownika');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}	
		} 
		$this->generateView();	
	}

	public function action_topUpWallet(){
		if ($this->validateSave()){
			$IDuzytkownik=$_SESSION['IDuzytkownik'];
			$this->form->kwota_doladowania += $_SESSION['stan_portfela'];
			$_SESSION["stan_portfela"] = $this->form->kwota_doladowania;
			try { 
				getDB()->update("uzytkownicy", [
					"stan_portfela" => $this->form->kwota_doladowania,
					], 
					[ 
					"IDuzytkownik" => $IDuzytkownik
					]);
				getMessages()->addInfo('Pomyślnie doładowano konto!');
			}catch (PDOException $e){
				getMessages()->addError('Wystąpił nieoczekiwany błąd podczas doładowywania konta');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}
			forwardTo('productsList');
		}else{
			$this->generateView();
		}	
	}
	
	public function generateView(){		
		getSmarty()->assign('form',$this->form);
		getSmarty()->display('WalletView.tpl');		
	}
}