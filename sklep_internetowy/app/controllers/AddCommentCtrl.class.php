<?php
namespace app\controllers;

use app\forms\AddCommentForm;
use DateTime;
use PDOException;

class AddCommentCtrl {

	private $form;
	private $records;
	private $records2;

	public function __construct(){
		$this->form = new AddCommentForm();
	}

	public function validateSave() {
		$this->form->id = getFromRequest('id',true,'Błędne wywołanie aplikacji1');
		$this->form->id_uzyt = getFromSession('IDuzytkownik',true,'Błędne wywołanie aplikacji2');
		$this->form->ocena = getFromRequest('ocena',true,'Błędne wywołanie aplikacji3');
		$this->form->komentarz = getFromRequest('komentarz',true,'Błędne wywołanie aplikacji4');

		if ( getMessages()->isError() ) return false;

		if ($this->form->ocena == 0){
			getMessages()->addError('Nie wybrano oceny');
		}
		if ( getMessages()->isError() ) return false;

		return ! getMessages()->isError();
	}

	public function validateEdit() {
		$this->form->id = getFromRequest('id',true,'Błędne wywołanie aplikacji1');
		$this->form->id_uzyt = getFromSession('IDuzytkownik',true,'Błędne wywołanie aplikacji2');

		if ( getMessages()->isError() ) return false;

		return ! getMessages()->isError();
	}

	public function action_addComment(){
		if ($this->validateEdit()){	
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
				"produkty.IDprodukt" => $this->form->id
				]);

			$this->records2 = getDB()->select("zdjecia", [
				"IDzdjecie",
				"IDprodukt",
				"zdjecie",
				],
				[
				"IDprodukt" => $this->form->id,
				]);

			$this->zdjecia = [];
			array_push($this->zdjecia, $this->records2[0]["zdjecie"]);
			array_push($this->zdjecia, $this->records2[1]["zdjecie"]);
			array_push($this->zdjecia, $this->records2[2]["zdjecie"]);

		}catch (PDOException $e){
			getMessages()->addError('Wystąpił błąd podczas pobierania rekordów');
			if (getConf()->debug) getMessages()->addError($e->getMessage());			
		}
		}
		$this->generateView();
	}

	public function action_saveComment(){
		if ($this->validateSave()){
			$this->form->id_uzyt=$_SESSION['IDuzytkownik'];
			$suma=0;
			try {
				$count = getDB()->count("komentarze", [
					"IDkomentarz",
				],
				[
					"IDuzytkownik" => $this->form->id_uzyt,
					"IDprodukt" => $this->form->id,
				]);

				if($count == 0){
					getDB()->insert("komentarze", [
						"IDuzytkownik" => $this->form->id_uzyt,
						"IDprodukt" => $this->form->id,
						"ocena" => $this->form->ocena,
						"komentarz" => $this->form->komentarz,
					]);

					$suma = getDB()->sum("komentarze", [
						"ocena",
					],
					[
						"IDprodukt" => $this->form->id, 
					]);

					$count2 = getDB()->count("komentarze", [
						"ocena",
					],
					[
						"IDprodukt" => $this->form->id,
					]);
					$srednia = round($suma/$count2, 1);

					getDB()->update("produkty", [
						"srednia_ocen" => $srednia,
					],
					[
						"IDprodukt" => $this->form->id,
					]);
					getMessages()->addInfo('Pomyślnie zapisano ocenę/opinię');
					forwardTo('productView');
				}else{
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
		
					$this->records2 = getDB()->select("zdjecia", [
						"IDzdjecie",
						"IDprodukt",
						"zdjecie",
						],
						[
						"IDprodukt" => $this->form->id,
						]);
		
					$this->zdjecia = [];
					array_push($this->zdjecia, $this->records2[0]["zdjecie"]);
					array_push($this->zdjecia, $this->records2[1]["zdjecie"]);
					array_push($this->zdjecia, $this->records2[2]["zdjecie"]);

					getMessages()->addError('Dla produktu możesz wystawić tylko 1 ocenę/opinię');
					$this->generateView();
				}
			} catch (PDOException $e){
				getMessages()->addError('Wystąpił nieoczekiwany błąd podczas zapisu oceny/opinii');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}
		}else{
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

			$this->records2 = getDB()->select("zdjecia", [
				"IDzdjecie",
				"IDprodukt",
				"zdjecie",
				],
				[
				"IDprodukt" => $this->form->id,
				]);

			$this->zdjecia = [];
			array_push($this->zdjecia, $this->records2[0]["zdjecie"]);
			array_push($this->zdjecia, $this->records2[1]["zdjecie"]);
			array_push($this->zdjecia, $this->records2[2]["zdjecie"]);

			$this->generateView();
		}	
	}
	
	public function generateView(){
		getSmarty()->assign('form',$this->form);
		getSmarty()->assign('wyniki',$this->records);
		getSmarty()->assign('zdjecia',$this->zdjecia);
		getSmarty()->display('AddComment.tpl');
	}
}