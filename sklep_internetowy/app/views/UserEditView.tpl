{extends file="main.tpl"}
{block name=top}
<div class="container">
	<form action="{$conf->action_root}userProfileSave" method="post"  class="pure-form pure-form-aligned bottom-margin">
    	<fieldset>
		  	<div class="row g-1">
        		<div class="col-lg-4 offset-lg-4 rounded-top text-center pt-3 pr-3 pl-3 bg-light-50">
			    	<h2>Edycja profilu użytkownika</h2><br>
		    	</div>

        		<div class="col-lg-3 offset-lg-3 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
						<label for="imie">Imię: </label>
					  	<input id="imie" type="text" class="form-control" name="imie" placeholder="Podaj imię" value="{$form->imie}" />
				  	</div>
			  	</div>

			  	<div class="col-lg-3 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
					  	<label for="nazwisko">Nazwisko: </label>
					  	<input id="nazwisko" type="text" class="form-control" name="nazwisko" placeholder="Podaj nazwisko" value="{$form->nazwisko}" />
				  	</div>
			  	</div>

			  	<div class="col-lg-4 offset-lg-3 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
					  	<label for="miejscowosc">Miejscowość: </label>
					  	<input id="miejscowosc" type="text" class="form-control" name="miejscowosc" placeholder="Podaj miejscowosc" value="{$form->miejscowosc}" />
				  	</div>
			  	</div>

			  	<div class="col-lg-2 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
					  	<label for="kod_pocztowy">Kod pocztowy: </label>
					  	<input id="kod_pocztowy" type="text" class="form-control" name="kod_pocztowy" placeholder="Podaj kod pocztowy" value="{$form->kod_pocztowy}" />
				  	</div>
			  	</div>

			  	<div class="col-lg-4 offset-lg-3 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
					  	<label for="ulica">Ulica: </label>
					  	<input id="ulica" type="text" class="form-control" name="ulica" placeholder="Podaj ulicę" value="{$form->ulica}" />
				  	</div>
			  	</div>

			  	<div class="col-lg-1 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
					  	<label for="nr_posesji">Nr posesji: </label>
					  	<input id="nr_posesji" type="text" class="form-control" name="nr_posesji" placeholder="Nr domu" value="{$form->nr_posesji}" />
				  	</div>
			  	</div>

			  	<div class="col-lg-1 pr-3 pl-3 bg-light-50">
    		  		<div class="form-group">
					  	<label for="nr_lokalu">Nr lokalu: </label>
					  	<input id="nr_lokalu" type="text" class="form-control" name="nr_lokalu" placeholder="Nr lokalu" value="{$form->nr_lokalu}" />
				  	</div>
			  	</div>

			  	<div class="col-lg-3 offset-lg-3 pr-3 pl-3 bg-light-50">
    		  		<div class="form-group">
					  	<label for="numer_tel">Numer telefonu: </label>
					  	<input id="numer_tel" type="number" class="form-control" name="numer_tel" placeholder="Podaj numer telefonu" value="{$form->numer_tel}" />
				  	</div>
			  	</div>

			  	<div class="col-lg-3 pr-3 pl-3 bg-light-50">
    		  		<div class="form-group">
					  	<label for="email">E-mail: </label>
					  	<input id="email" type="text" class="form-control" name="email" placeholder="Podaj email" value="{$form->email}" />
				  	</div>
			  	</div>

        		<div class="col-lg-6 offset-lg-3 pr-3 pl-3 bg-light-50">
        			<div class="form-group">
					  	<label for="aktualne_haslo">Aktualne hasło: </label>
					  	<input id="aktualne_haslo" type="password" class="form-control" name="aktualne_haslo" placeholder="Podaj aktualne hasło"/>
				  	</div>
			  	</div>

    			<div class="col-lg-3 offset-lg-3 pr-3 pl-3 bg-light-50">
        			<div class="form-group">
					  	<label for="haslo">Nowe hasło: </label>
					  	<input id="haslo" type="password" class="form-control" name="haslo" placeholder="Podaj nowe hasło"/>
				  	</div>
			  	</div>

			  	<div class="col-lg-3 pr-3 pl-3 bg-light-50">
        			<div class="form-group">
					  	<label for="haslo2">Powtórz nowe hasło: </label>
					  	<input id="haslo2" type="password" class="form-control" name="haslo2" placeholder="Powtórz nowe hasło"/>
				  	</div>	
			  	</div>

        		<div class="col-lg-6 offset-lg-3 rounded-bottom pb-3 pr-3 pl-3 bg-light-50">
					<div class="d-grid gap-1"><br>
            			<input type="submit" class="btn btn-primary btn-block mb-2" value="Edytuj profil">
            			<a class="btn btn-secondary btn-block mb-2" href="{$conf->action_root}productsList" role="button">Powrót</a>
          			</div>
        		</div>
		    	<input type="hidden" name="IDuzytkownik" value="{$form->IDuzytkownik}">
      		</div>
    	</fieldset>
	</form>		
</div>
{/block}