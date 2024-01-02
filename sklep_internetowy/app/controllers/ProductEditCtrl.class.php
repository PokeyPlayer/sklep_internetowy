<?php
namespace app\controllers;

use app\forms\ProductEditForm;
use DateTime;
use PDOException;

class ProductEditCtrl{
	private $form;
	private $record;
	private $record2;
	
	public function __construct(){
		$this->form = new ProductEditForm();
	}
	
	public function validateSave(){
		$this->form->IDprodukt = getFromRequest('IDprodukt',true,'Błędne wywołanie aplikacji1');
		$this->form->nazwa = getFromRequest('nazwa',true,'Błędne wywołanie aplikacji2');
		$this->form->kategoria = getFromRequest('kategoria',true,'Błędne wywołanie aplikacji3');
		$this->form->opis = getFromRequest('opis',true,'Błędne wywołanie aplikacji4');
		$this->form->ilosc = getFromRequest('ilosc',true,'Błędne wywołanie aplikacji5');
		$this->form->cena = getFromRequest('cena',true,'Błędne wywołanie aplikacji6');
		$this->form->czy_dostepny = getFromRequest('czy_dostepny');

		if(isset($this->form->czy_dostepny)){
			$this->form->czy_dostepny = 1;
		} else {
			$this->form->czy_dostepny = 0;
		}
		if ( getMessages()->isError() ) return false;
	
		if (empty($this->form->nazwa)) {
			getMessages()->addError('Podaj nazwę produktu');
		}
		if (empty($this->form->kategoria)) {
			getMessages()->addError('Wybierz kategorię produktu');
		}
		if (empty($this->form->opis)) {
			getMessages()->addError('Podaj opis produktu');
		}
		if (empty($this->form->ilosc)) {
			getMessages()->addError('Podaj ilość');
		}
		if (empty($this->form->cena)) {
			getMessages()->addError('Podaj cenę produktu');
		}
		if (getMessages()->isError()) return false;


		if ($this->form->ilosc <= 0) {
			getMessages()->addError('Podaj dodatnią ilość sztuk');
		}
		if ($this->form->cena <= 0) {
			getMessages()->addError('Podaj dodatnią cenę');
		}
		if (getMessages()->isError()) return false;

		return ! getMessages()->isError();
	}

	public function validateEdit() {
		$this->form->IDprodukt = getFromRequest('id',true,'Błędne wywołanie aplikacji1');
		return ! getMessages()->isError();
	}

	public function action_productEdit(){
		if ($this->validateEdit()){
			try{
				$record = getDB()->get("produkty", "*",[
					"IDprodukt" => $this->form->IDprodukt
				]);
				$this->form->IDprodukt = $record['IDprodukt'];
				$this->form->nazwa = $record['nazwa'];
				$this->form->kategoria = $record['IDkategoria'];
				$this->form->opis = $record['opis'];
				$this->form->ilosc = $record['dostepna_ilosc'];
				$this->form->cena = $record['cena'];
				$this->form->czy_dostepny = $record['czy_dostepny'];

				$record2 = getDB()->get("kat_produktu", "*",[
					"IDkategoria" => $this->form->kategoria
				]);
				$this->form->kategoria_nazwa = $record2['kategoria'];
			}catch (PDOException $e){
				getMessages()->addError('Wystąpił błąd podczas odczytu danych produktu');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}	
		} 
		$this->generateView();
	}

	public function action_productEditSave(){
		if ($this->validateSave()){
			try{
				$record3 = getDB()->get("produkty", [
					"cena",
				],
				[
					"IDprodukt" => $this->form->IDprodukt
				]);
				$this->poprzednia_cena = $record3['cena'];
	
				if($this->poprzednia_cena != $this->form->cena){
					getDB()->update("produkty", [
						"nazwa" => $this->form->nazwa,
						"IDkategoria" => $this->form->kategoria,
						"opis" => $this->form->opis,
						"cena" => $this->form->cena,
						"dostepna_ilosc" => $this->form->ilosc,
						"czy_dostepny" => $this->form->czy_dostepny,
						"poprzednia_cena" => $this->poprzednia_cena,
						"data_obow_poprz_ceny" => date('Y-m-d H:i:s', time()),
						],
						[ 
						"IDprodukt" => $this->form->IDprodukt
						]);
				}else{
					getDB()->update("produkty", [
						"nazwa" => $this->form->nazwa,
						"IDkategoria" => $this->form->kategoria,
						"opis" => $this->form->opis,
						"cena" => $this->form->cena,
						"dostepna_ilosc" => $this->form->ilosc,
						"czy_dostepny" => $this->form->czy_dostepny,
						], 
						[ 
						"IDprodukt" => $this->form->IDprodukt
						]);
				}
				getMessages()->addInfo('Pomyślnie edytowano produkt');
			}catch (PDOException $e){
				getMessages()->addError('Wystąpił nieoczekiwany błąd podczas edycji produktu');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}
			forwardTo('adminView');
		}else{
			$this->generateView();
		}		
	}
	
	public function generateView(){		
		getSmarty()->assign('form',$this->form);
		getSmarty()->display('ProductEditView.tpl');		
	}
}