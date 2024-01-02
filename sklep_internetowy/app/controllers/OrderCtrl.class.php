<?php
namespace app\controllers;

use app\forms\OrderForm;
use PDOException;

class OrderCtrl {

	private $form;
	private $records;
	private $records2;

	public function __construct(){
		$this->form = new OrderForm();
	}
		
	public function validate() {
		$this->form->adres = getFromRequest('adres',true,'Wybierz lub dodaj adres dostawy');
		$this->form->sposob_dostawy = getFromRequest('sposob_dostawy',true,'Wybierz sposób dostawy');
		$this->form->sposob_platnosci = getFromRequest('sposob_platnosci',true,'Wybierz sposób płatności');
		$this->form->suma = getFromRequest('suma',true,'Błędne wywołanie aplikacji4');
		$this->form->stan_portfela = getFromSession('stan_portfela',true,'Błędne wywołanie aplikacji5');
		$this->form->IDuzytkownik = getFromSession('IDuzytkownik',true,'Błędne wywołanie aplikacji6');
		$this->form->email = getFromSession('email',true,'Błędne wywołanie aplikacji7');
		
		if (getMessages()->isError()) return false;

		if (empty($this->form->adres)) {
			getMessages()->addError('Wybierz lub dodaj adres dostawy');
		}

		if (empty($this->form->sposob_dostawy)) {
			getMessages()->addError('Wybierz sposób dostawy');
		}

		if (empty($this->form->sposob_platnosci)) {
			getMessages()->addError('Wybierz sposób płatności');
		}

		if ($this->form->stan_portfela < $this->form->suma) {
			getMessages()->addError('Niewystarczająca ilość pieniędzy. Doładuj portfel.');
		}
		if (getMessages()->isError()) return false;
		
		return ! getMessages()->isError();
	}

	public function action_order(){
		if ($this->validate()){
			$IDuzytkownik=$_SESSION['IDuzytkownik'];
			try{
				$this->records = getDB()->select("produkty", [
					"[>]kat_produktu" => ["IDkategoria" => "IDkategoria"],
					"[>]koszyk" => ["IDprodukt" => "IDprodukt"],
					],[
					"produkty.IDprodukt",
					"produkty.nazwa",
					"produkty.dostepna_ilosc",
					"kat_produktu.IDkategoria",
					"koszyk.IDkoszyk",
					"koszyk.ilosc",
					],
					[
					"koszyk.IDuzytkownik" => $IDuzytkownik,
					"koszyk.czy_zakupione" => 0,
					]);

				$this->count = getDB()->count("koszyk", [
					"IDuzytkownik" => $IDuzytkownik,
					"czy_zakupione" => 0,
				]);

				do{
					$nr_zamowienia = rand(100000000000, 999999999999);
					$this->count3 = getDB()->count("zamowienia", [
						"nr_zamowienia" => $nr_zamowienia,
					]);
				}while ($this->count3>0);


				function czyUjemnaWartosc($tablica) {
					foreach ($tablica as $wartosc) {
						if ($wartosc < 0) {
							return 1;
						}
					}
					return 0;
				}

				$this->ilosc = [];
				for ($i=0; $i<$this->count; $i++){
					array_push($this->ilosc, ($this->records[$i]["dostepna_ilosc"]-$this->records[$i]["ilosc"]));
				}

				if($this->count > 0){
					if(czyUjemnaWartosc($this->ilosc)==0){
						for ($i=0; $i<$this->count; $i++){
							$this->IDkoszyk = $this->records[$i]["IDkoszyk"];
							$this->koszyk_ilosc = $this->records[$i]["ilosc"];
							$this->IDprodukt = $this->records[$i]["IDprodukt"];
							$this->ilosc2 = $this->records[$i]["dostepna_ilosc"]-$this->records[$i]["ilosc"];
						
							getDB()->insert("zamowienia", [
								"IDuzytkownik" => $IDuzytkownik,
								"IDadres" => $this->form->adres,
								"nr_zamowienia" => $nr_zamowienia,
								"sposob_dostawy" => $this->form->sposob_dostawy,
								"sposob_platnosci" => $this->form->sposob_platnosci,
							]);
	
							$this->records2 = getDB()->select("zamowienia", [
								"IDzamowienie",
								"IDuzytkownik",
								"IDadres",
								"sposob_dostawy",
								"sposob_platnosci",
							],
							[
								"IDuzytkownik" => $IDuzytkownik,
							]);
	
							$this->count2 = getDB()->count("zamowienia", [
								"IDuzytkownik" => $IDuzytkownik,
							]);
	
							for ($j=0; $j<$this->count2; $j++){
								$this->IDzamowienie = $this->records2[$j]["IDzamowienie"];
							}

							getDB()->insert("koszyk_zamowienia", [
								"IDkoszyk" => $this->IDkoszyk,
								"IDzamowienie" => $this->IDzamowienie,
							]);

							getDB()->update("koszyk", [
								"czy_zakupione" => 1,
							],
							[ 
								"IDkoszyk" => $this->IDkoszyk,
							]);

							getDB()->update("produkty", [
								"dostepna_ilosc" => $this->ilosc2,
							],
							[ 
								"IDprodukt" => $this->IDprodukt,
							]);
						}
					}else{
						for ($i=0; $i<$this->count; $i++){
							if($this->ilosc[$i] < 0){
								$this->nazwa = $this->records[$i]["nazwa"];
							}
						}
						getMessages()->addError('Zakup zakończony niepowodzeniem. Brak wystarczającej ilości ' . $this->nazwa);
						forwardTo('productsList');
					}
					
					$_SESSION['stan_portfela'] -= $this->form->suma;
					$this->stan_portfela=$_SESSION['stan_portfela'];

					getDB()->update("uzytkownicy", [
						"stan_portfela" => $this->stan_portfela,
					],
					[ 
						"IDuzytkownik" => $IDuzytkownik,
					]);

				}else{
					getMessages()->addError('Zakup zakończony niepowodzeniem. Brak produktów w koszyku.');
					forwardTo('productsList');	
				}

				function format_mail($nr_zamowienia){
					return "
					<!DOCTYPE html>
					<html>
						<body>
							<h1>Potwierdzenie zakupu:</h1>
							<p>Wiadomość ta jest potwierdzeniem dokonanego przez Ciebie zakupu w sklepie internetowym MGM. Prosimy nie odpowiadać na tą wiadomość. Pozdrawiają administratorzy sklepu :)</p>
							<p>Numer Twojego zamówienia: {$nr_zamowienia}</p>
						</body>
					</html>";
				}

				$headers = "MIME-Version: 1.0\r\n";
				$headers .= "Content-type: text/html; charset=UTF-8\r\n";
				$headers .= "From: MGM sklep internetowy\r\n";
				$headers .= "Reply-To: {$this->form->email}>\r\n";
				$headers .= "X-Mailer: PHP/".phpversion();

				mail($this->form->email, "Potwierdzenie zamówienia nr {$nr_zamowienia}", format_mail($nr_zamowienia), $headers);
				getMessages()->addInfo('Pomyślnie dokonano zakupu. Na twojego maila zostało wysłane potwierdzenie zakupu.');
			}catch (PDOException $e){
			getMessages()->addError('Zakup zakończony niepowodzeniem');
			if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}
			forwardTo('productsList');
		}else{
			$IDuzytkownik=$_SESSION['IDuzytkownik'];
			$this->records = getDB()->select("koszyk", [
				"[>]kat_produktu" => ["IDprodukt" => "IDkategoria"],
				"[>]produkty" => ["IDprodukt" => "IDprodukt"],
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
	}

	public function generateView() {
		getSmarty()->assign('form',$this->form);
		getSmarty()->assign('wyniki',$this->records);
		getSmarty()->assign('ilosc_produktow',$this->count);
		getSmarty()->assign('adresy',$this->records2);
		getSmarty()->assign('zdjecia',$this->zdjecia);
		getSmarty()->assign('wartosc_koszyka',$this->wartosc_koszyka);
		getSmarty()->display('CartView.tpl');
	}
}