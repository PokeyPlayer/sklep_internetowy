{extends file="main.tpl"}
{block name=top}
<div class="container">
	<form action="{$conf->action_root}productEditSave" method="post"  class="pure-form pure-form-aligned bottom-margin">
    	<fieldset>
			<div class="row g-1">
        		<div class="col-lg-4 offset-lg-4 rounded-top text-center pt-3 pr-3 pl-3 bg-light-50">
			   		<h2>Edycja produktu</h2><br>
		    	</div>

        		<div class="col-lg-4 offset-lg-2 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
						<label for="nazwa">Nazwa produktu: </label>
						<input id="nazwa" type="text" class="form-control" style="height:40px" name="nazwa" placeholder="Podaj nazwę produktu" value="{$form->nazwa}" />
					</div>
				</div>

				<div class="col-lg-4 pr-3 pl-3 bg-light-50">
					<div class="form-group">
            			<label for="kategoria">Kategoria produktu:</label>
            			<select class="form-control" style="height:40px" id="kategoria" name="kategoria" value="{$form->kategoria}">
							<option value="{$form->kategoria}">{$form->kategoria_nazwa}</option>
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

				<div class="col-lg-8 offset-lg-2 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
						<label for="opis">Opis produktu: </label>
						<textarea id="opis" type="text" class="form-control" name="opis" placeholder="Podaj opis produktu"  rows="10">{$form->opis}</textarea>
					</div>
				</div>

				<div class="col-lg-4 offset-lg-2 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
						<label for="ilosc">Dostęna ilość produktu: </label>
						<input id="ilosc" type="number" class="form-control" style="height:40px" name="ilosc" placeholder="Podaj ilość produktu" value="{$form->ilosc}"/>
					</div>
				</div>

				<div class="col-lg-4 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
						<label for="cena">Cena produktu: </label>
						<input id="cena" type="number" class="form-control" style="height:40px" name="cena" placeholder="Podaj cenę produktu" value="{$form->cena}" />
					</div>
				</div>

				<div class="col-lg-4 offset-lg-2 pr-3 pl-3 bg-light-50">
					<div class="form-group form-check">
						<label class="form-check-label" for="czy_dostepny">Czy udostępnić produkt w sklepie?</label>
        				<input type="checkbox" name="czy_dostepny" class="form-check-input" id="czy_dostepny" {($form->czy_dostepny) ? "checked": ""} >
      				</div>
				</div>

        		<div class="col-lg-8 offset-lg-2 rounded-bottom pb-3 pr-3 pl-3 bg-light-50">
					<div class="d-grid gap-1"><br>
            			<input type="submit" class="btn btn-primary btn-block mb-2" value="Edytuj produkt">
            			<a class="btn btn-secondary btn-block mb-2" href="{$conf->action_root}adminView" role="button">Powrót</a>
          			</div>
        		</div>
		    	<input type="hidden" name="IDprodukt" value="{$form->IDprodukt}">
      		</div>
    	</fieldset>
	</form>		
</div>
{/block}