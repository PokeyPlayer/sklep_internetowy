<?php

namespace app\controllers;

use app\forms\ProductsSearchForm;
use app\forms\AdminForm;
use PDOException;

class AdminCtrl {
	private $form;
	private $records;
	private $records2;
	private $records3;
	private $records4;

	public function __construct(){
		$this->form = new ProductsSearchForm();
		$this->form = new AdminForm();
	}
		
	public function validate() {
		$this->form->uzytkownik = getFromRequest('sf_uzytkownik');
		$this->form->produkt = getFromRequest('sf_produkt');
		if (getMessages()->isError()) return false;

		return ! getMessages()->isError();
	}

	public function validateEdit() {
		$this->form->IDuzytkownik = getFromRequest('id',true,'Błędne wywołanie aplikacji1');
		$this->form->IDprodukt = getFromRequest('id',true,'Błędne wywołanie aplikacji2');
		return ! getMessages()->isError();
	}

	public function validate2() {
		$this->form->nazwa = getFromRequest('nazwa',true,'Błędne wywołanie aplikacji1');
		$this->form->kategoria = getFromRequest('kategoria',true,'Błędne wywołanie aplikacji2');
		$this->form->opis = getFromRequest('opis',true,'Błędne wywołanie aplikacji3');
		$this->form->ilosc = getFromRequest('ilosc',true,'Błędne wywołanie aplikacji4');
		$this->form->cena = getFromRequest('cena',true,'Błędne wywołanie aplikacji5');
		$this->form->czy_dostepny = getFromRequest('czy_dostepny');

		if(isset($this->form->czy_dostepny)){
			$this->form->czy_dostepny = 1;
		} else {
			$this->form->czy_dostepny = 0;
		}
		if (getMessages()->isError()) return false;

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
		if ($_FILES["zdjecie1"]["size"] == 0) {
			getMessages()->addError('Wgraj zdjęcie produktu nr 1');
		}
		if ($_FILES["zdjecie2"]["size"] == 0) {
			getMessages()->addError('Wgraj zdjęcie produktu nr 2');
		}
		if ($_FILES["zdjecie3"]["size"] == 0) {
			getMessages()->addError('Wgraj zdjęcie produktu nr 3');
		}
		if (getMessages()->isError()) return false;


		if ($this->form->ilosc <= 0) {
			getMessages()->addError('Podaj dodatnią ilość sztuk');
		}
		if ($this->form->cena <= 0) {
			getMessages()->addError('Podaj dodatnią cenę');
		}
		if (getMessages()->isError()) return false;


		if (file_exists("img/" . basename($_FILES["zdjecie1"]["name"]))) {
			getMessages()->addError('Zdjęcie o takiej nazwie już istnieje. Wgraj inne zdjęcie nr 1');
		}
		if ($_FILES["zdjecie1"]["size"] > 5000000) {
			getMessages()->addError('Zdjęcie nr 1 jest zbyt duże');
		}
		if($_FILES["zdjecie1"]["type"] != "image/jpg" && $_FILES["zdjecie1"]["type"] != "image/png" && $_FILES["zdjecie1"]["type"] != "image/jpeg") {
			getMessages()->addError('Dozwolone są tylko pliki JPG, JPEG i PNG (zdjęcie nr 1)');
		}

		if (file_exists("img/" . basename($_FILES["zdjecie2"]["name"]))) {
			getMessages()->addError('Zdjęcie o takiej nazwie już istnieje. Wgraj inne zdjęcie nr 2');
		}
		if ($_FILES["zdjecie2"]["size"] > 5000000) {
			getMessages()->addError('Zdjęcie nr 2 jest zbyt duże');
		}
		if($_FILES["zdjecie2"]["type"] != "image/jpg" && $_FILES["zdjecie2"]["type"] != "image/png" && $_FILES["zdjecie2"]["type"] != "image/jpeg") {
			getMessages()->addError('Dozwolone są tylko pliki JPG, JPEG i PNG (zdjęcie nr 2)');
		}

		if (file_exists("img/" . basename($_FILES["zdjecie3"]["name"]))) {
			getMessages()->addError('Zdjęcie o takiej nazwie już istnieje. Wgraj inne zdjęcie nr 3');
		}
		if ($_FILES["zdjecie3"]["size"] > 5000000) {
			getMessages()->addError('Zdjęcie nr 3 jest zbyt duże');
		}
		if($_FILES["zdjecie3"]["type"] != "image/jpg" && $_FILES["zdjecie3"]["type"] != "image/png" && $_FILES["zdjecie3"]["type"] != "image/jpeg") {
			getMessages()->addError('Dozwolone są tylko pliki JPG, JPEG i PNG (zdjęcie nr 3)');
		}
		if (getMessages()->isError()) return false;

		return ! getMessages()->isError();
	}
	
	public function load_data(){
		$this->validate();
		
		$search_params = [];
		if ( isset($this->form->uzytkownik) && strlen($this->form->uzytkownik) > 0){
			$search_params['imie[~]'] = '%'.$this->form->uzytkownik.'%';
			$search_params['nazwisko[~]'] = '%'.$this->form->uzytkownik.'%';
			$search_params['email[~]'] = '%'.$this->form->uzytkownik.'%';
		}
		
		$num_params = sizeof($search_params);
		if ($num_params > 1) {
			$where = [ "OR" => &$search_params ];
		} else {
			$where = &$search_params;
		}

		$search_params2 = [];
		if ( isset($this->form->produkt) && strlen($this->form->produkt) > 0) {
			$search_params2['nazwa[~]'] = '%'.$this->form->produkt.'%';
			$search_params2['kategoria[~]'] = '%'.$this->form->produkt.'%';
		}
		
		$num_params2 = sizeof($search_params2);
		if ($num_params2 > 1) {
			$where2 = [ "OR" => &$search_params2 ];
		} else {
			$where2 = &$search_params2;
		}
		
		try{
			$this->records = getDB()->select("uzytkownicy", [
				"IDuzytkownik",
				"imie",
				"nazwisko",
				"email",
				"blokada",
				], $where );

			$this->records2 = getDB()->select("produkty", [
				"[>]kat_produktu" => ["IDkategoria" => "IDkategoria"],
				],[
				"produkty.IDprodukt",
				"produkty.IDkategoria",
				"produkty.nazwa",
				"produkty.cena",
				"produkty.czy_dostepny",
				"produkty.dostepna_ilosc",
				"produkty.poprzednia_cena",
				"produkty.data_obow_poprz_ceny",
				"kat_produktu.kategoria",
				], $where2 );

			$this->count = getDB()->count("produkty",[
				"nazwa[~]" => $this->form->produkt,
			]);

			$this->count2 = getDB()->count("kat_produktu",[
				"kategoria[~]" => $this->form->produkt,
			]);

			if (isset($this->form->produkt) && strlen($this->form->produkt) > 0 && $this->count2 > 0){
				$this->records3 = getDB()->get("kat_produktu", "*",[
					"kategoria[~]" => $this->form->produkt
				]);
				$this->form->kategoria_id = $this->records3['IDkategoria'];
			}else{
				$this->form->kategoria_id = 0;
			}
		
			$this->count3 = getDB()->count("produkty",[
				"IDkategoria" => $this->form->kategoria_id,
			]);

			if (($this->count && $this->count3) > 0){
				$this->count = 0;
			}
				
			for ($i=0; $i<$this->count; $i++){
				if($this->records2[$i]["czy_dostepny"] == 1){
					$this->records2[$i]["czy_dostepny"] = "TAK";
				}else{
					$this->records2[$i]["czy_dostepny"] = "NIE";
				}

				if($this->records2[$i]["poprzednia_cena"] == NULL){
					$this->records2[$i]["poprzednia_cena"] = "BRAK";
				}

				if($this->records2[$i]["data_obow_poprz_ceny"] == NULL){
					$this->records2[$i]["data_obow_poprz_ceny"] = "BRAK";
				}
			}
				
			for ($i=0; $i<$this->count3; $i++){
				if($this->records2[$i]["czy_dostepny"] == 1){
					$this->records2[$i]["czy_dostepny"] = "TAK";
				}else{
					$this->records2[$i]["czy_dostepny"] = "NIE";
				}

				if($this->records2[$i]["poprzednia_cena"] == NULL){
					$this->records2[$i]["poprzednia_cena"] = "BRAK";
				}

				if($this->records2[$i]["data_obow_poprz_ceny"] == NULL){
					$this->records2[$i]["data_obow_poprz_ceny"] = "BRAK";
				}
			}

			$this->zdjecia = [];
			foreach($this->records2 as $a){
			$IDprodukt = $a["IDprodukt"];
			$this->records4 = getDB()->select("zdjecia", [
				"IDzdjecie",
				"IDprodukt",
				"zdjecie",
			],
			[
				"IDprodukt" => $IDprodukt,
			]);
			array_push($this->zdjecia, $this->records4[0]["zdjecie"]);
			}
		} catch (PDOException $e){
			getMessages()->addError('Wystąpił błąd podczas pobierania danych');
			if (getConf()->debug) getMessages()->addError($e->getMessage());			
		}
	}

	public function action_userDelete(){	
		if($this->validateEdit()){	
			$suma=0;	
			try{
				$IDuzytkownik = getDB()->id();
				getDB()->delete("uzytkownicy",[
					"IDuzytkownik" => $this->form->IDuzytkownik
				]);

				getDB()->delete("adresy_dostaw",[
					"IDuzytkownik" => $this->form->IDuzytkownik
				]);

				getDB()->delete("uzytkownik_rola",[
					"IDuzytkownik" => $this->form->IDuzytkownik
				]);
				getMessages()->addInfo('Pomyślnie usunięto użytkownika');
			} catch (PDOException $e){
				getMessages()->addError('Wystąpił błąd podczas usuwania użytkownika');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}	
		}
		forwardTo('adminView');		
	}

	public function action_userBlock(){		
		if ($this->validateEdit()){		
			try{
				$IDuzytkownik = getDB()->id();
				getDB()->update("uzytkownicy", [
					"blokada" => 1,
					], 
					[ 
					"IDuzytkownik" => $this->form->IDuzytkownik
					]);
				getMessages()->addInfo('Pomyślnie zablokowano użytkownika');
			} catch (PDOException $e){
				getMessages()->addError('Wystąpił błąd podczas blokowania użytkownika');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}	
		}
		forwardTo('adminView');		
	}

	public function action_userUnlock(){		
		if ($this->validateEdit()){		
			try{
				$IDuzytkownik = getDB()->id();
				getDB()->update("uzytkownicy", [
					"blokada" => 0,
					"proba" => 0,
					], 
					[ 
					"IDuzytkownik" => $this->form->IDuzytkownik
					]);
				getMessages()->addInfo('Pomyślnie odblokowano użytkownika');
			} catch (PDOException $e){
				getMessages()->addError('Wystąpił błąd podczas odblokowywania użytkownika');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}	
		}
		forwardTo('adminView');		
	}

	public function action_addProduct(){
		if ($this->validate2()) {
			$nazwa_pliku1 = $_FILES["zdjecie1"]["name"];
			$nazwa_pliku2 = $_FILES["zdjecie2"]["name"];
			$nazwa_pliku3 = $_FILES["zdjecie3"]["name"];
   			$nazwa_tymczasowa1 = $_FILES["zdjecie1"]["tmp_name"];
			$nazwa_tymczasowa2 = $_FILES["zdjecie2"]["tmp_name"];
			$nazwa_tymczasowa3 = $_FILES["zdjecie3"]["tmp_name"];
			$folder = "img/";
			$plik1 = $folder . basename($_FILES["zdjecie1"]["name"]);
			$plik2 = $folder . basename($_FILES["zdjecie2"]["name"]);
			$plik3 = $folder . basename($_FILES["zdjecie3"]["name"]);

			try {
				getDB()->insert("produkty", [
					"IDkategoria" => $this->form->kategoria,
					"nazwa" => $this->form->nazwa,
					"cena" => $this->form->cena,
					"opis" => $this->form->opis,
					"czy_dostepny" => $this->form->czy_dostepny,
					"dostepna_ilosc" => $this->form->ilosc,
					"srednia_ocen" => 0,
					"poprzednia_cena" => NULL,
					"data_obow_poprz_ceny" => NULL,
					]);
					$IDprodukt = getDB()->id();
					
					getDB()->insert("zdjecia", [
						"IDprodukt" => $IDprodukt,
						"zdjecie" => $nazwa_pliku1,
						]);

					getDB()->insert("zdjecia", [
						"IDprodukt" => $IDprodukt,
						"zdjecie" => $nazwa_pliku2,
						]);

					getDB()->insert("zdjecia", [
						"IDprodukt" => $IDprodukt,
						"zdjecie" => $nazwa_pliku3,
						]);

					if(move_uploaded_file($nazwa_tymczasowa1, $plik1) && move_uploaded_file($nazwa_tymczasowa2, $plik2) && move_uploaded_file($nazwa_tymczasowa3, $plik3)) {
						getMessages()->addInfo ('Pomyślnie dodano zdjęcia produktu');
					}else{
						getMessages()->addError ('Nie dodano zdjęć produktu');
					}
				getMessages()->addInfo('Pomyślnie dodano produkt');
			} catch (PDOException $e){
				getMessages()->addError('Wystąpił nieoczekiwany błąd podczas dodawania produktu');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}
			forwardTo('adminView');
		}else{
			forwardTo('adminView');
		}	
	}

	public function action_productDelete(){
		if ($this->validateEdit()){		
			try{
				getDB()->delete("produkty",[
					"IDprodukt" => $this->form->IDprodukt
				]);
				getMessages()->addInfo('Pomyślnie usunięto wybrany produkt');
			} catch (PDOException $e){
				getMessages()->addError('Wystąpił błąd podczas usuwania produktu');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}	
		}
		forwardTo('adminView');		
	}

	public function action_adminView() {
		$this->load_data();
		getSmarty()->assign('searchForm2',$this->form);
		getSmarty()->assign('searchForm3',$this->form);
		getSmarty()->assign('form',$this->form);
		getSmarty()->assign('uzytkownicy',$this->records);
		getSmarty()->assign('produkty',$this->records2);
		getSmarty()->assign('zdjecia',$this->zdjecia);
		getSmarty()->display('AdminView.tpl');
	}

	public function action_adminViewPart() {
		$this->load_data();
		getSmarty()->assign('searchForm2',$this->form);
		getSmarty()->assign('searchForm3',$this->form);
		getSmarty()->assign('form',$this->form);
		getSmarty()->assign('uzytkownicy',$this->records);
		getSmarty()->assign('produkty',$this->records2);
		getSmarty()->assign('zdjecia',$this->zdjecia);
		getSmarty()->display('AdminViewTable.tpl');
	}

	public function action_adminViewPart2() {
		$this->load_data();
		getSmarty()->assign('searchForm2',$this->form);
		getSmarty()->assign('searchForm3',$this->form);
		getSmarty()->assign('form',$this->form);
		getSmarty()->assign('uzytkownicy',$this->records);
		getSmarty()->assign('produkty',$this->records2);
		getSmarty()->assign('zdjecia',$this->zdjecia);
		getSmarty()->display('AdminViewTable2.tpl');
	}
}