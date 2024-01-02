{extends file="main.tpl"}
{block name=top}
<div class="container">
	<form action="{$conf->action_root}topUpWallet" method="post"  class="pure-form pure-form-aligned bottom-margin">
    	<fieldset>
			<div class="row g-2">
       			<div class="col-lg-4 offset-lg-4 rounded-top text-center pt-3 pr-3 pl-3 bg-light-50">
			   		<h2>Portfel elektroniczny</h2><br>
		    	</div>

        		<div class="col-lg-2 offset-lg-3 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
						<label for="rodzaj_karty">Rodzaj karty: </label>
						<select class="form-control" style="height:40px" name="rodzaj_karty" id="rodzaj_karty">
             				<option value="0">--wybierz--</option>
             				<option value="1">Visa</option>
             				<option value="2">MasterCard</option>
             				<option value="3">AmericanExpress</option>
           				</select>
				  	</div>
			 	</div>

			 	<div class="col-lg-3 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
					  	<label for="nr_karty">Numer karty: </label>
					  	<input type="number" class="form-control" style="height:40px" name="nr_karty" id="nr_karty" placeholder="Wpisz numer swojej karty" value="{$form->nr_karty}" minlength="16" maxlength="16">
				  	</div>
			  	</div>

			  	<div class="col-lg-1 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
					  	<label for="nr_cvv">Numer CVV: </label>
					 	<input type="number" class="form-control" style="height:40px" name="nr_cvv" id="nr_cvv" placeholder="Wpisz numer CVV swojej karty" value="{$form->nr_cvv}" minlength="3" maxlength="3">
				  	</div>
			  	</div>

			  	<div class="col-lg-2 offset-lg-3 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
						<label for="dzien_wygasniecia">Dzień wygaśniecia karty: </label>
						<select class="form-control" style="height:40px" name="dzien_wygasniecia" id="dzien_wygasniecia">
             				<option value="0">--wybierz--</option>
             				{for $i=1 to 31}
						 		<option value="{$i}">{$i}</option>
							{/for}
           				</select>
					</div>
			  	</div>

			  	<div class="col-lg-2 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
						<label for="miesiac_wygasniecia">Miesiąc wygaśniecia karty: </label>
						<select class="form-control" style="height:40px" name="miesiac_wygasniecia" id="miesiac_wygasniecia">
              				<option value="0">--wybierz--</option>
              				{for $i=1 to 12}
						 		<option value="{$i}">{$i}</option>
							{/for}
            			</select>
					</div>
			  	</div>

			  	<div class="col-lg-2 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
						<label for="rok_wygasniecia">Rok wygaśniecia karty: </label>
						<select class="form-control" style="height:40px" name="rok_wygasniecia" id="rok_wygasniecia">
              				<option value="0">--wybierz--</option>
              				{for $i=2023 to 2100}
						 		<option value="{$i}">{$i}</option>
							{/for}
            			</select>
				  	</div>
			  	</div>

			  	<div class="col-lg-2 offset-lg-3 pr-3 pl-3 bg-light-50">
    		  		<div class="form-group">
					  	<label for="imie">Imię: </label>
					  	<input  type="text" class="form-control" style="height:40px" id="imie" name="imie" value="{$form->imie}" readonly/>
				  	</div>
			  	</div>

			  	<div class="col-lg-2 pr-3 pl-3 bg-light-50">
    		  		<div class="form-group">
					  	<label for="nazwisko">Nazwisko: </label>
					  	<input  type="text" class="form-control" style="height:40px" id="nazwisko" name="nazwisko" value="{$form->nazwisko}" readonly/>
				  	</div>
			  	</div>

			  	<div class="col-lg-2 pr-3 pl-3 bg-light-50">
    		  		<div class="form-group">
					  	<label for="nr_telefonu">Numer telefonu: </label>
					  	<input  type="text" class="form-control" style="height:40px" id="nr_telefonu" name="nr_telefonu" value="{$form->nr_telefonu}" readonly/>
				  	</div>
			  	</div>

			  	<div class="col-lg-2 offset-lg-3 pr-3 pl-3 bg-light-50">
    		  		<div class="form-group">
					  	<label for="miejscowosc">Miejscowość: </label>
					  	<input  type="text" class="form-control" style="height:40px" id="miejscowosc" name="miejscowosc" value="{$form->miejscowosc}" readonly/>
				  	</div>
			  	</div>

			  	<div class="col-lg-2 pr-3 pl-3 bg-light-50">
    		  		<div class="form-group">
					  	<label for="kod_pocztowy">Kod pocztowy: </label>
					  	<input  type="text" class="form-control" style="height:40px" id="kod_pocztowy" name="kod_pocztowy" value="{$form->kod_pocztowy}" readonly/>
				  	</div>
			  	</div>

			  	<div class="col-lg-2 pr-3 pl-3 bg-light-50">
    		  		<div class="form-group">
					 	<label for="email">Email: </label>
					 	<input  type="text" class="form-control" style="height:40px" id="email" name="email" value="{$form->email}" readonly/>
				  	</div>
			  	</div>

			  	<div class="col-lg-2 offset-lg-3 pr-3 pl-3 bg-light-50">
    		  		<div class="form-group">
					  	<label for="kwota_doladowania">Kwota doładowania (zł): </label>
					  	<input type="number" class="form-control" style="height:40px" name="kwota_doladowania" id="kwota_doladowania" value="{$form->kwota_doladowania}" placeholder="Wpisz kwotę np. 25">
				  	</div>
			  	</div>
			
        		<div class="col-lg-6 offset-lg-3 rounded-bottom pb-3 pr-3 pl-3 bg-light-50">
					<div class="d-grid gap-1">
            			<input type="submit" class="btn btn-primary btn-block mb-2" value="Doładuj portfel">
            			<a class="btn btn-secondary btn-block mb-2" href="{$conf->action_root}productsList" role="button">Powrót</a>
          			</div>
        			<br>
					<h5>Swoje dane możesz zmienić w profilu użytkownika.</h5>
        		</div>
      		</div>
    	</fieldset>
	</form>		
</div>
{/block}