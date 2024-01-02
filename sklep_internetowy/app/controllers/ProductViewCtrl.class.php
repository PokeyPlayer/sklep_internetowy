<?php
namespace app\controllers;

use app\forms\ProductViewForm;
use DateTime;
use PDOException;

class ProductViewCtrl {

	private $form;
	private $records;
	private $records2;
	private $records3;

	public function __construct(){
		$this->form = new ProductViewForm();
	}

	public function validate() {
		$this->form->id = getFromRequest('id',true,'Błędne wywołanie aplikacji1');
		if (getMessages()->isError()) return false;
	
		return ! getMessages()->isError();
	}

	public function validate2() {
		$this->form->IDkomentarz = getFromRequest('idk',true,'Błędne wywołanie aplikacji2');
		if (getMessages()->isError()) return false;
	
		return ! getMessages()->isError();
	}

	
	public function action_productView(){
		if ($this->validate()){		
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
					"produkty.IDprodukt" => $this->form->id,
					]);

				$this->records2 = getDB()->select("komentarze", [
					"[>]uzytkownicy" => ["IDuzytkownik" => "IDuzytkownik"],
					],[
						"komentarze.IDkomentarz",
						"komentarze.IDuzytkownik",
						"komentarze.IDprodukt",
						"komentarze.komentarz",
						"komentarze.ocena",
						"uzytkownicy.IDuzytkownik",
						"uzytkownicy.imie",
					],
					[
						"komentarze.IDprodukt" => $this->form->id,
					]);

				$this->count = getDB()->count("komentarze", [
					"IDprodukt" => $this->form->id,
				]);

				$this->records3 = getDB()->select("zdjecia", [
						"IDzdjecie",
						"IDprodukt",
						"zdjecie",
					],
					[
						"IDprodukt" => $this->form->id,
					]);

				$this->zdjecia = [];
				array_push($this->zdjecia, $this->records3[0]["zdjecie"]);
				array_push($this->zdjecia, $this->records3[1]["zdjecie"]);
				array_push($this->zdjecia, $this->records3[2]["zdjecie"]);
			} catch (PDOException $e){
				getMessages()->addError('Wystąpił błąd podczas pobierania rekordów');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}
		}
		$this->generateView();
	}

	public function action_commentDelete(){	
		if($this->validate2()){		
			$suma=0;
			try{
				$record = getDB()->get("komentarze", "*",[
					"IDkomentarz" => $this->form->IDkomentarz
				]);
				$this->form->IDprodukt = $record['IDprodukt'];

				getDB()->delete("komentarze",[
					"IDkomentarz" => $this->form->IDkomentarz
				]);

				$suma = getDB()->sum("komentarze", [
					"ocena",
				],
				[
					"IDprodukt" => $this->form->IDprodukt, 
				]);

				$count = getDB()->count("komentarze", [
					"ocena",
				],
				[
					"IDprodukt" => $this->form->IDprodukt,
				]);

				if ($count>0){
					$srednia = round($suma/$count, 1);
				}else{
					$srednia = 0;
				}
				
				getDB()->update("produkty", [
					"srednia_ocen" => $srednia,
				],
				[
					"IDprodukt" => $this->form->IDprodukt,
				]);
				getMessages()->addInfo('Pomyślnie usunięto komentarz');
			} catch (PDOException $e){
				getMessages()->addError('Wystąpił błąd podczas usuwania użytkownika');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}	
		}
		forwardTo('productList');
	}
	
	public function generateView(){
		getSmarty()->assign('form',$this->form);
		getSmarty()->assign('wyniki',$this->records);
		getSmarty()->assign('wyniki2',$this->records2);
		getSmarty()->assign('ilosc_opinii',$this->count);
		getSmarty()->assign('zdjecia',$this->zdjecia);
		getSmarty()->display('ProductView.tpl');
	}
}