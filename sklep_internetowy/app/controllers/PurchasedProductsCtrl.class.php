<?php

namespace app\controllers;

use app\forms\ProductsSearchForm;

use PDOException;

class PurchasedProductsCtrl {

	private $form;
	private $records;
	private $records2;

	public function __construct(){
		$this->form = new ProductsSearchForm();
	}

	public function validate() {
		$this->form->zakupiony_produkt = getFromRequest('sf_zakupiony');
		if (getMessages()->isError()) return false;

		return ! getMessages()->isError();
	}

	public function purchasedProducts(){
		$this->validate();
		if (isset($this->form->zakupiony_produkt)){
			$_SESSION["zakupione_wyszukiwanie"] = '%'.$this->form->zakupiony_produkt.'%';
			$_SESSION["zakupione_wyszukiwanie2"] = $this->form->zakupiony_produkt;
		}else{
			if(!isset($_SESSION["zakupione_wyszukiwanie"])){
				$_SESSION["zakupione_wyszukiwanie"] = "";
				$_SESSION["zakupione_wyszukiwanie2"] = "";
			}
		}
		$this->form->zakupiony_produkt = $_SESSION["zakupione_wyszukiwanie2"];


		$IDuzytkownik=$_SESSION['IDuzytkownik'];
		try{
			$this->records = getDB()->select("zamowienia", [ 
				"[>]koszyk_zamowienia" => ["zamowienia.IDzamowienie" => "IDzamowienie"],
				"[>]koszyk" => ["koszyk_zamowienia.IDkoszyk" => "IDkoszyk"],
				"[>]produkty" => ["koszyk.IDprodukt" => "IDprodukt"],
				"[>]kat_produktu" => ["produkty.IDkategoria" => "IDkategoria"],
				],[
				"produkty.IDprodukt",
				"produkty.IDkategoria",
				"produkty.nazwa",
				"produkty.srednia_ocen",
				"kat_produktu.kategoria",
				"koszyk.ilosc",
				"zamowienia.data_zlozenia",
				"zamowienia.nr_zamowienia",
				],
				[
				"nazwa[~]" => $_SESSION["zakupione_wyszukiwanie"],
				"koszyk.IDuzytkownik" => $IDuzytkownik,
				"koszyk.czy_zakupione" => 1,
				]);


			$this->ilosc = count($this->records);
			if($this->ilosc == 0 && strlen($this->form->zakupiony_produkt) == 0){
				$this->ilosc = -1;
			}else if(isset($this->form->zakupiony_produkt) && strlen($this->form->zakupiony_produkt) > 0){
				$this->ilosc = count($this->records);
			}else{
				$this->ilosc = 1;
			}

			$this->ilosc_opinii = [];
			foreach($this->records as $a){
				$IDprodukt2 = $a["IDprodukt"];
				$this->count2 = getDB()->count("komentarze", [
					"IDprodukt" => $IDprodukt2,
				]);
				array_push($this->ilosc_opinii, $this->count2);
			}

			$this->zdjecia = [];
			foreach($this->records as $a){
			$IDprodukt = $a["IDprodukt"];
			$this->records2 = getDB()->select("zdjecia", [
				"IDzdjecie",
				"IDprodukt",
				"zdjecie",
			],
			[
				"IDprodukt" => $IDprodukt,
			]);
			array_push($this->zdjecia, $this->records2[0]["zdjecie"]);
			}
		} catch (PDOException $e){
			getMessages()->addError('Wystąpił błąd podczas pobierania zakupionych produktów');
			if (getConf()->debug) getMessages()->addError($e->getMessage());			
		}
	}	

	public function action_purchasedProductsView() {
		$this->purchasedProducts();
		getSmarty()->assign('searchForm',$this->form);
		getSmarty()->assign('wyniki',$this->records);
		getSmarty()->assign('ilosc_wynikow',$this->ilosc);
		getSmarty()->assign('zdjecia',$this->zdjecia);
		getSmarty()->assign('ilosc_opinii', $this->ilosc_opinii);
		getSmarty()->display('PurchasedProductsView.tpl');
	}

	public function action_purchasedProductsViewPart() {
		$this->purchasedProducts();
		getSmarty()->assign('searchForm',$this->form);
		getSmarty()->assign('wyniki',$this->records);
		getSmarty()->assign('ilosc_wynikow',$this->ilosc);
		getSmarty()->assign('zdjecia',$this->zdjecia);
		getSmarty()->assign('ilosc_opinii', $this->ilosc_opinii);
		getSmarty()->display('PurchasedProductsViewTable.tpl');
	}
}