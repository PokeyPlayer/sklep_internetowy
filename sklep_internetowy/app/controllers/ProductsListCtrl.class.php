<?php

namespace app\controllers;

use app\forms\ProductsSearchForm;
use PDOException;

class ProductsListCtrl {

	private $form;
	private $records;
	private $records2;

	public function __construct(){
		$this->form = new ProductsSearchForm();
	}
		
	public function validate() {
		$this->form->nazwa = getFromRequest('sf_nazwa');
		$this->form->sortowanie = getFromRequest('sortowanie');
		$this->form->kategoria = getFromGet('kategoria');
		$this->form->aktualna_strona = getFromGet('page');
		if ( getMessages()->isError() ) return false;
	
		return ! getMessages()->isError();
	}
	
	public function load_data(){
		$this->validate();
		if ( isset($this->form->nazwa)) {
			$_SESSION["wyszukiwanie"] = '%'.$this->form->nazwa.'%';
			$_SESSION["wyszukiwanie2"] = $this->form->nazwa;
		}else{
			if(!isset($_SESSION["wyszukiwanie"])){
				$_SESSION["wyszukiwanie"] = "";
				$_SESSION["wyszukiwanie2"] = "";
			}
		}
		$this->form->nazwa = $_SESSION["wyszukiwanie2"];


		if ($this->form->sortowanie != NULL){
			unset($_SESSION['aktualna_strona']);
			if ($this->form->sortowanie == 0){
				$_SESSION["sortowanie1"] = "IDprodukt";
				$_SESSION["sortowanie2"] = "ASC";
				$_SESSION["sortowanie3"] = 0;
			}
			elseif ($this->form->sortowanie == 1){
				$_SESSION["sortowanie1"] = "cena";
				$_SESSION["sortowanie2"] = "ASC";
				$_SESSION["sortowanie3"] = 1;
			}
			else if ($this->form->sortowanie == 2){
				$_SESSION["sortowanie1"] = "cena";
				$_SESSION["sortowanie2"] = "DESC";
				$_SESSION["sortowanie3"] = 2;
			}
			else if ($this->form->sortowanie == 3){
				$_SESSION["sortowanie1"] = "nazwa";
				$_SESSION["sortowanie2"] = "ASC";
				$_SESSION["sortowanie3"] = 3;
			}
			else if ($this->form->sortowanie == 4){
				$_SESSION["sortowanie1"] = "nazwa";
				$_SESSION["sortowanie2"] = "DESC";
				$_SESSION["sortowanie3"] = 4;
			}
			else if ($this->form->sortowanie == 5){
				$_SESSION["sortowanie1"] = "srednia_ocen";
				$_SESSION["sortowanie2"] = "DESC";
				$_SESSION["sortowanie3"] = 5;
			}
			else if ($this->form->sortowanie == 6){
				$_SESSION["sortowanie1"] = "srednia_ocen";
				$_SESSION["sortowanie2"] = "ASC";
				$_SESSION["sortowanie3"] = 6;
			}
		}else{
			if(!isset($_SESSION["sortowanie1"])){
			$_SESSION["sortowanie1"] = "IDprodukt";
			$_SESSION["sortowanie2"] = "ASC";
			$_SESSION["sortowanie3"] = 0;
			}
		}


		if(!isset($_SESSION["kategoria1"])){
			$_SESSION["kategoria1"] = "produkty.IDkategoria[<>]";
			$_SESSION["kategoria2"] = "";
			$_SESSION["kategoria3"] = "24";
		}

		if (isset($this->form->kategoria)){
			unset($_SESSION['aktualna_strona']);
			if ($this->form->kategoria){
			  switch ($this->form->kategoria){
				case 'p':
				  	$_SESSION["kategoria1"] = "produkty.IDkategoria[<>]";
				  	$_SESSION["kategoria2"] = [1,8];
				  	$_SESSION["kategoria3"] = "0";
				  	break;
		  
				case 'u':
				 	$_SESSION["kategoria1"] = "produkty.IDkategoria[<>]";
				  	$_SESSION["kategoria2"] = [9,13];
				  	$_SESSION["kategoria3"] = "22";
				  	break;

				case 'up':
					$_SESSION["kategoria1"] = "produkty.IDkategoria[<>]";
					$_SESSION["kategoria2"] = [14,21];
					$_SESSION["kategoria3"] = "23";
					break;

				case 'all':
					$_SESSION["kategoria1"] = "produkty.IDkategoria[<>]";
					$_SESSION["kategoria2"] = "";
					$_SESSION["kategoria3"] = "24";
					break;
		  
				default:
					$_SESSION["kategoria1"] = "produkty.IDkategoria";
					$_SESSION["kategoria2"] = $this->form->kategoria;
					$_SESSION["kategoria3"] = $this->form->kategoria;
				  	break;
			  }
			}
		}

		if ($this->form->aktualna_strona != NULL){
			$_SESSION["aktualna_strona"] = $this->form->aktualna_strona;
		}else{
			if(!isset($_SESSION["aktualna_strona"])){
				$_SESSION["aktualna_strona"] = 1;
			}
		}
		$this->aktualna_strona = $_SESSION["aktualna_strona"];
		$this->wyniki_na_strone = 8;
		$this->wynik = (($this->aktualna_strona - 1) * $this->wyniki_na_strone);
		

		try{
			$this->records = getDB()->select("produkty", [
				"[>]kat_produktu" => ["IDkategoria" => "IDkategoria"],
				],[
				"produkty.IDprodukt",
				"produkty.IDkategoria",
				"produkty.nazwa",
				"produkty.cena",
				"produkty.opis",
				"produkty.czy_dostepny",
				"produkty.dostepna_ilosc",
				"produkty.srednia_ocen",
				"kat_produktu.kategoria",
				],
				[
					"ORDER" => [
						$_SESSION["sortowanie1"] => $_SESSION["sortowanie2"],
					],
					"nazwa[~]" => $_SESSION["wyszukiwanie"],
					"LIMIT" => [$this->wynik, $this->wyniki_na_strone],
					"produkty.czy_dostepny" => 1,
					$_SESSION["kategoria1"] => $_SESSION["kategoria2"],
				]);

			$this->count = getDB()->count("produkty", [
				"nazwa[~]" => $this->form->nazwa,
				"produkty.czy_dostepny" => 1,
				$_SESSION["kategoria1"] => $_SESSION["kategoria2"],
			]);
	
			$this->liczba_stron = ceil($this->count / $this->wyniki_na_strone);

			$record = getDB()->get("kat_produktu", [
				"kategoria",
			],
			[
				"IDkategoria" => $this->form->kategoria
			]);

			if($_SESSION["kategoria3"] == 0){
				$_SESSION["aktualna_kategoria"] = 'Wszystkie podzespoły';
			}else if($_SESSION["kategoria3"] == 22){
				$_SESSION["aktualna_kategoria"] = 'Wszystkie urządzenia przenośne';
			}else if($_SESSION["kategoria3"] == 23){
				$_SESSION["aktualna_kategoria"] = 'Wszystkie urządzenia peryferyjne';
			}else if($_SESSION["kategoria3"] == 24 || $_SESSION["kategoria3"] == NULL){
				$_SESSION["aktualna_kategoria"] = NULL;
			}else if($_SESSION["kategoria3"] == $this->form->kategoria){
				$_SESSION["aktualna_kategoria"] = $record['kategoria'];
			}
			$this->aktualna_kategoria = $_SESSION["aktualna_kategoria"];

				
			$this->ilosc_opinii = [];
			foreach($this->records as $a){
				$IDprodukt2 = $a["IDprodukt"];
				$this->count2 = getDB()->count("komentarze", [
					"IDprodukt" => $IDprodukt2,
				]);
				array_push($this->ilosc_opinii, $this->count2);
			}

			function sortAktywna($select) {
				return (isset($_SESSION["sortowanie3"]) && $_SESSION["sortowanie3"] == $select) ? "selected" : "";
			}

			$this->sortowanie=[];
			for($i=0; $i<7; $i++){
				array_push($this->sortowanie, sortAktywna($i));
			}

			function katAktywna($category) {
				return (isset($_SESSION["kategoria3"]) && $_SESSION["kategoria3"] == $category) ? "mouseon-active" : "mouseon";
			}

			$this->kategorie=[];
			for($i=0; $i<24; $i++){
				array_push($this->kategorie, katAktywna($i));
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
			getMessages()->addError('Wystąpił błąd podczas pobierania rekordów');
			if (getConf()->debug) getMessages()->addError($e->getMessage());			
		}
	
		
		function generowanie_linkow($aktualna_strona, $liczba_stron){
			$link = '';
			
			if ($aktualna_strona > 1) {
				 $link .= '<a class="btn btn-primary" href="' . $_SERVER['PHP_SELF'] . '?page=1"> << </a> ';
				 $link .= '<a class="btn btn-primary" href="' . $_SERVER['PHP_SELF'] . '?page=' . ($aktualna_strona - 1) . '"> < </a> ';
			}
			$i = $aktualna_strona;
			for ($i=1; $i <= $liczba_stron; $i++) {
				 if ($i > 0 && $i <= $liczba_stron) {  
					  if ($aktualna_strona == $i  && $i != 0) {
						   $link .= '<a class="btn btn-primary">' . $i. '</a>';			  
					  }
					  else{
						   if($i>=($aktualna_strona-1) && $i<=($aktualna_strona+1)){
						   $link .= ' <a class="btn btn-primary" href="' . $_SERVER['PHP_SELF'] . '?page=' . $i . '"> ' . $i . '</a> ';
						   }
					  }
				 }
			}
			if ($aktualna_strona < $liczba_stron) {
				 $link .= '<a class="btn btn-primary" href="' . $_SERVER['PHP_SELF'] . '?page=' . ($aktualna_strona + 1) . '"> > </a>';
				 $link .= '<a class="btn btn-primary" href="' . $_SERVER['PHP_SELF'] . '?page=' . ($liczba_stron) . '"> >> </a>';
			}
			return $link;
	    }
	}

	public function action_productsList() {
		$this->load_data();
		getSmarty()->assign('searchForm',$this->form);
		getSmarty()->assign('sortForm',$this->form);
		getSmarty()->assign('wyniki',$this->records);
		getSmarty()->assign('zdjecia',$this->zdjecia);
		getSmarty()->assign('select', $this->sortowanie);
		getSmarty()->assign('category', $this->kategorie);
		getSmarty()->assign('strony',$this->liczba_stron);
		getSmarty()->assign('ilosc', $this->count);
		getSmarty()->assign('ilosc_opinii', $this->ilosc_opinii);
		getSmarty()->assign('aktualna_kategoria', $this->aktualna_kategoria);
		getSmarty()->assign('s', generowanie_linkow($this->aktualna_strona, $this->liczba_stron));
		getSmarty()->display('ProductsList.tpl');
	}

	public function action_productsListPart() {
		$this->load_data();
		getSmarty()->assign('searchForm',$this->form);
		getSmarty()->assign('sortForm',$this->form);
		getSmarty()->assign('wyniki',$this->records);
		getSmarty()->assign('zdjecia',$this->zdjecia);
		getSmarty()->assign('select', $this->sortowanie);
		getSmarty()->assign('category', $this->kategorie);
		getSmarty()->assign('strony',$this->liczba_stron);
		getSmarty()->assign('ilosc', $this->count);
		getSmarty()->assign('ilosc_opinii', $this->ilosc_opinii);
		getSmarty()->assign('aktualna_kategoria', $this->aktualna_kategoria);
		getSmarty()->assign('s', generowanie_linkow($this->aktualna_strona, $this->liczba_stron));
		getSmarty()->display('ProductsListTable.tpl');
    }
}