{extends file="main.tpl"}
{block name=top}
<div class="d-flex flex-column align-items-center bg-white-80 p-2">
	<form id="search-form" class="pure-form pure-form-aligned" onsubmit="ajaxPostForm('search-form','{$conf->action_root}adminViewPart','table'); return false;">
		<div class="form-group mb-2">
			<h3>Zarządzanie użytkownikami</h3>
			<fieldset>
				<input type="text" placeholder="Wyszukaj użytkownika" name="sf_uzytkownik" value="{$searchForm2->uzytkownik}" />
			</fieldset>
			<button type="submit" class="btn btn-primary mb-2">Wyszukaj</button>
		</div>
	</form>
</div>	
{/block}

{block name=bottom}
<div class="container">
  <section class="row">
      <div id="table" class="table-responsive">
	  	{include file="AdminViewTable.tpl"}
      </div>
  </section>
  <br>
  <hr>
  <br>

  <form action="{$conf->action_root}addProduct" method="post" enctype="multipart/form-data" class="pure-form pure-form-aligned bottom-margin">
    <fieldset>
		<div class="row g-3">
    		<div class="col-lg-4 offset-lg-4 rounded-top text-center pt-3 pr-3 pl-3 bg-light-50">
				<h3>Dodawanie produktów</h3>
			</div>
			<div class="col-lg-8 pr-3 pl-3 bg-light-50">
    			<div class="form-group">
					<label for="nazwa">Nazwa produktu: </label>
					<input id="nazwa" type="text" class="form-control" style="height:40px" name="nazwa" placeholder="Podaj nazwę produktu" value="{$form->nazwa}" />
				</div>
			</div>

			<div class="col-lg-4 pr-3 pl-3 bg-light-50">
				<div class="form-group">
            		<label for="kategoria">Kategoria produktu:</label>
            		<select class="form-control" style="height:40px" id="kategoria" name="kategoria" value="{$form->kategoria}">
						<option value="0">--wybierz--</option>
            			<optgroup label="Podzespoły komputerowe">
            				<option value="1">Karty graficzne</option>
            				<option value="2">Procesory</option>
           					<option value="3">Pamięć RAM</option>
           					<option value="4">Płyty główne</option>
            				<option value="5">Obudowy</option>
            				<option value="6">Zasilacze</option>
            				<option value="7">Dyski SSD</option>
            				<option value="8">Dyski HDD</option>
            			</optgroup>
						<optgroup label="Smartfony i smartwatche">
            				<option value="9">Smartfony</option>
            				<option value="10">Smartwatche</option>
           					<option value="11">Smartbandy</option>
           					<option value="12">Tablety</option>
            				<option value="13">Czytniki ebook</option>
            			</optgroup>
						<optgroup label="Urządzenia peryferyjne">
            				<option value="14">Monitory</option>
            				<option value="15">Drukarki</option>
           				 	<option value="16">Myszki</option>
           				 	<option value="17">Klawiatury</option>
            			 	<option value="18">Słuchawki</option>
            			 	<option value="19">Głośniki</option>
            			 	<option value="20">Mikrofony</option>
            			 	<option value="21">Kamerki internetowe</option>
            			</optgroup>
            		</select>
          		</div>
			</div>

			<div class="col-lg-12 pr-3 pl-3 bg-light-50">
    			<div class="form-group">
					<label for="opis">Opis produktu: </label>
					<textarea id="opis" type="text" class="form-control" name="opis" placeholder="Podaj opis produktu"  rows="10" value="{$form->opis}"></textarea>
				</div>
			</div>

			<div class="col-lg-6 pr-3 pl-3 bg-light-50">
    			<div class="form-group">
					<label for="ilosc">Dostęna ilość produktu: </label>
					<input id="ilosc" type="number" class="form-control" style="height:40px" name="ilosc" placeholder="Podaj ilość produktu" value="{$form->ilosc}"/>
				</div>
			</div>

			<div class="col-lg-6 pr-3 pl-3 bg-light-50">
    			<div class="form-group">
					<label for="cena">Cena produktu: </label>
					<input id="cena" type="number" class="form-control" style="height:40px" name="cena" placeholder="Podaj cenę produktu" value="{$form->cena}" />
				</div>
			</div>

			<div class="form-group">
      			<label for="zdjecie1">Prześlij zdjęcie 1</label>
      			<input type="file" name="zdjecie1" class="form-control-file" id="zdjecie1" />
    		</div>
			<div class="form-group">
      			<label for="zdjecie2">Prześlij zdjęcie 2</label>
      			<input type="file" name="zdjecie2" class="form-control-file" id="zdjecie2" />
    		</div>
			<div class="form-group">
      			<label for="zdjecie3">Prześlij zdjęcie 3</label>
      			<input type="file" name="zdjecie3" class="form-control-file" id="zdjecie3" />
    		</div>

			<div class="form-group form-check">
				<label class="form-check-label" for="czy_dostepny">Czy udostępnić produkt w sklepie?</label>
        		<input type="checkbox" name="czy_dostepny" class="form-check-input" id="czy_dostepny" value="{$form->czy_dostepny}">
      		</div>
			
			<div class="col-lg-12 rounded-bottom pb-3 pr-3 pl-3 bg-light-50">
				<div class="d-grid gap-2">
					<input class="btn btn-primary btn-block mb-2" type="submit" name="submit" value="Dodaj produkt" />
				</div>
			</div>		
		</div>	
	</fieldset>
  </form>
  <hr>
  <br>

  <div class="d-flex flex-column align-items-center bg-white-80 p-2">
	<form id="search-form3" class="pure-form pure-form-aligned" onsubmit="ajaxPostForm('search-form3','{$conf->action_root}adminViewPart2','table2'); return false;">
		<div class="form-group mb-2">
			<h3>Zarządzanie produktami</h3>
			<fieldset>
				<input type="text" placeholder="Wyszukaj produkt" name="sf_produkt" value="{$searchForm3->produkt}" />
			</fieldset>
			<button type="submit" class="btn btn-primary mb-2">Wyszukaj</button>
		</div>
	</form>
  </div>	
  <section class="row">
    <div id="table2" class="table-responsive">
	  	{include file="AdminViewTable2.tpl"}
    </div>
  </section>
</div>
{/block}