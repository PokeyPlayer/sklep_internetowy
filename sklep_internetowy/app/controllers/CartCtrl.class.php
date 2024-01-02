<?php
namespace app\controllers;

use app\forms\CartForm;
use PDOException;

class CartCtrl {
	private $form;
	private $records;
	private $records2;
	private $records3;

	public function __construct(){
		$this->form = new CartForm();
	}
		
	public function validate() {
		if (getMessages()->isError()) return false;

		return ! getMessages()->isError();
	}

	public function validateEdit() {
		$this->form->IDprodukt = getFromRequest('id',true,'Błędne wywołanie aplikacji0');
		if (getMessages()->isError()) return false;

		return ! getMessages()->isError();
	}

	public function validateEditQuantity() {
		$this->form->IDprodukt = getFromRequest('id',true,'Błędne wywołanie aplikacji1');
		$this->form->ilosc = getFromRequest('ilosc',true,'Błędne wywołanie aplikacji2');
		if (getMessages()->isError()) return false;

		if ($this->form->ilosc <= 0) {
			getMessages()->addError('Podaj dodatnią ilość sztuk');
		}

		return ! getMessages()->isError();
	}
	
	public function action_cartProducts(){
		if ($this->validate()){
			$IDuzytkownik=$_SESSION['IDuzytkownik'];
			try{
				$this->records = getDB()->select("koszyk", [
					"[>]produkty" => ["IDprodukt" => "IDprodukt"],
					"[>]kat_produktu" => ["produkty.IDkategoria" => "IDkategoria"],
					],[
					"koszyk.IDkoszyk",
					"koszyk.IDuzytkownik",
					"koszyk.IDprodukt",
					"koszyk.ilosc",
					"koszyk.czy_zakupione",
					"kat_produktu.kategoria",
					"produkty.nazwa",
					"produkty.cena",
					],
					[
					"koszyk.IDuzytkownik" => $IDuzytkownik,
					"koszyk.czy_zakupione" => 0,
					]);

				$this->count = getDB()->count("koszyk", [
					"IDuzytkownik" => $IDuzytkownik,
					"czy_zakupione" => 0,
				]);
				
				$this->wartosc_koszyka = 0;

				for ($i=0; $i<$this->count; $i++){
					$this->wartosc_koszyka += $this->records[$i]["cena"]*$this->records[$i]["ilosc"];
				}

				$this->records2 = getDB()->select("adresy_dostaw", [
					"IDadres",
					"IDuzytkownik",
					"imie",
					"nazwisko",
					"miejscowosc",
					"ulica",
					"nr_posesji",
					"nr_lokalu",
					"kod_pocztowy",
					"numer_tel",
				],
				[
					"IDuzytkownik" => $IDuzytkownik,
				]);

				$this->zdjecia = [];
				foreach($this->records as $a){
				$IDprodukt = $a["IDprodukt"];
				$this->records3 = getDB()->select("zdjecia", [
					"IDzdjecie",
					"IDprodukt",
					"zdjecie",
				],
				[
					"IDprodukt" => $IDprodukt,
				]);
				array_push($this->zdjecia, $this->records3[0]["zdjecie"]);
				}
			}catch (PDOException $e){
			getMessages()->addError('Wystąpił błąd podczas pobierania listy produktów');
			if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}
		}
		$this->generateView();
	}

	public function action_addToCart(){
		if ($this->validateEdit()){
			$IDuzytkownik=$_SESSION['IDuzytkownik'];
			try{
				$this->records = getDB()->select("koszyk", [
					"IDkoszyk",
					"IDuzytkownik",
					"IDprodukt",
					"ilosc",
					"czy_zakupione",
				],
				[
					"IDuzytkownik" => $IDuzytkownik,
					"IDprodukt" =>  $this->form->IDprodukt,
					"czy_zakupione" => 0,
				]);

				if(count($this->records)>0){
					getDB()->update("koszyk", [
						"ilosc" => $this->records[0]["ilosc"] + 1,
					], 
					[ 
						"IDuzytkownik" => $IDuzytkownik,
						"IDprodukt" =>  $this->form->IDprodukt,
						"czy_zakupione" => 0,
					]);
				}else{
					getDB()->insert("koszyk", [
						"IDuzytkownik" => $IDuzytkownik,
						"IDprodukt" => $this->form->IDprodukt,
						"ilosc" => 1,
						"czy_zakupione" => 0,
					]);
				}
				getMessages()->addInfo('Pomyślnie dodano wybrany produkt do koszyka');
			}catch (PDOException $e){
			getMessages()->addError('Wystąpił błąd podczas pobierania listy produktów');
			if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}
		}
		forwardTo('productsList');
	}

	public function action_deleteFromCart(){		
		if ($this->validateEdit()){
			$IDuzytkownik=$_SESSION['IDuzytkownik'];		
			try{
				getDB()->delete("koszyk",[
					"IDprodukt" => $this->form->IDprodukt,
					"IDuzytkownik" => $IDuzytkownik,
					"czy_zakupione" => 0,
				]);
				getMessages()->addInfo('Pomyślnie usunięto wybrany produkt z koszyka');
			}catch (PDOException $e){
				getMessages()->addError('Wystąpił błąd podczas produktu z koszyka');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}
		}
		forwardTo('cartProducts');	
	}

	public function action_quantityChange(){		
		if ($this->validateEditQuantity()){
			$IDuzytkownik=$_SESSION['IDuzytkownik'];		
			try{
				getDB()->update("koszyk",[
					"ilosc" => $this->form->ilosc,
				],
				[
					"IDuzytkownik" => $IDuzytkownik,
					"IDprodukt" => $this->form->IDprodukt,
					"czy_zakupione" => 0,
				]);
				getMessages()->addInfo('Pomyślnie zmieniono ilość produktu');
			}catch (PDOException $e){
				getMessages()->addError('Wystąpił błąd podczas zmiany ilości produktu');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}
		}else{
			$IDuzytkownik=$_SESSION['IDuzytkownik'];
			$this->records = getDB()->select("koszyk", [
				"[>]produkty" => ["IDprodukt" => "IDprodukt"],
				"[>]kat_produktu" => ["produkty.IDkategoria" => "IDkategoria"],
				],[
				"koszyk.IDkoszyk",
				"koszyk.IDuzytkownik",
				"koszyk.IDprodukt",
				"koszyk.ilosc",
				"koszyk.czy_zakupione",
				"kat_produktu.kategoria",
				"produkty.nazwa",
				"produkty.cena",
				],
				[
				"koszyk.IDuzytkownik" => $IDuzytkownik,
				"koszyk.czy_zakupione" => 0,
				]);

			$this->count = getDB()->count("koszyk", [
				"IDuzytkownik" => $IDuzytkownik,
				"czy_zakupione" => 0,
			]);
				
			$this->wartosc_koszyka = 0;

			for ($i=0; $i<$this->count; $i++){
				$this->wartosc_koszyka += $this->records[$i]["cena"]*$this->records[$i]["ilosc"];
			}

			$this->records2 = getDB()->select("adresy_dostaw", [
				"IDadres",
				"IDuzytkownik",
				"imie",
				"nazwisko",
				"miejscowosc",
				"ulica",
				"nr_posesji",
				"nr_lokalu",
				"kod_pocztowy",
				"numer_tel",
			],
			[
				"IDuzytkownik" => $IDuzytkownik,
			]);

			$this->zdjecia = [];
			foreach($this->records as $a){
			$IDprodukt = $a["IDprodukt"];
			$this->records3 = getDB()->select("zdjecia", [
				"IDzdjecie",
				"IDprodukt",
				"zdjecie",
			],
			[
				"IDprodukt" => $IDprodukt,
			]);
			array_push($this->zdjecia, $this->records3[0]["zdjecie"]);
			}
			$this->generateView();
		}		
		forwardTo('cartProducts');
	}

	public function generateView() {
		getSmarty()->assign('form',$this->form);
		getSmarty()->assign('wyniki',$this->records);
		getSmarty()->assign('ilosc_produktow',$this->count);
		getSmarty()->assign('zdjecia',$this->zdjecia);
		getSmarty()->assign('adresy',$this->records2);
		getSmarty()->assign('wartosc_koszyka',$this->wartosc_koszyka);
		getSmarty()->display('CartView.tpl');
	}
}