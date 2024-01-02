{extends file="main.tpl"}
{block name=top}
<div class="container">
	<form action="{$conf->action_root}addAddress" method="post"  class="pure-form pure-form-aligned bottom-margin">
		<fieldset>
			<div class="row g-3">
    			<div class="col-lg-4 offset-lg-4 rounded-top text-center pt-3 pr-3 pl-3 bg-light-50">
					<h3>Dodawanie adresu dostawy</h3><br>
				</div>

				<div class="col-lg-3 offset-lg-3 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
						<label class="d-none" for="imie">Imię: </label>
						<input id="imie" type="text" class="form-control" name="imie" placeholder="Podaj imię" value="{$form->imie}" />
					</div>
				</div>

				<div class="col-lg-3 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
						<label class="d-none" for="nazwisko">Nazwisko: </label>
						<input id="nazwisko" type="text" class="form-control" name="nazwisko" placeholder="Podaj nazwisko" value="{$form->nazwisko}" />
					</div>
				</div>

				<div class="col-lg-4 offset-lg-3 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
						<label class="d-none" for="miejscowosc">Miejscowość: </label>
						<input id="miejscowosc" type="text" class="form-control" name="miejscowosc" placeholder="Podaj miejscowosc" value="{$form->miejscowosc}" />
					</div>
				</div>

				<div class="col-lg-2 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
						<label class="d-none" for="kod_pocztowy">Kod pocztowy: </label>
						<input id="kod_pocztowy" type="text" class="form-control" name="kod_pocztowy" placeholder="Podaj kod pocztowy" value="{$form->kod_pocztowy}" />
					</div>
				</div>

				<div class="col-lg-4 offset-lg-3 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
						<label class="d-none" for="ulica">Ulica: </label>
						<input id="ulica" type="text" class="form-control" name="ulica" placeholder="Podaj ulicę" value="{$form->ulica}" />
					</div>
				</div>

				<div class="col-lg-1 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
						<label class="d-none" for="nr_posesji">Nr posesji: </label>
						<input id="nr_posesji" type="text" class="form-control" name="nr_posesji" placeholder="Nr domu" value="{$form->nr_posesji}" />
					</div>
				</div>

				<div class="col-lg-1 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
						<label class="d-none" for="nr_lokalu">Nr lokalu: </label>
						<input id="nr_lokalu" type="text" class="form-control" name="nr_lokalu" placeholder="Nr lokalu" value="{$form->nr_lokalu}" />
					</div>
				</div>

				<div class="col-lg-6 offset-lg-3 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
						<label class="d-none" for="numer_tel">Numer telefonu: </label>
						<input id="numer_tel" type="number" class="form-control" name="numer_tel" placeholder="Podaj numer telefonu" value="{$form->numer_tel}" />
					</div>
				</div>

				<div class="col-lg-6 offset-lg-3 rounded-bottom pb-3 pr-3 pl-3 bg-light-50">
					<div class="d-grid gap-2">
						<input type="submit" value="Dodaj adres" class="btn btn-primary btn-block mb-2"/>
						<a class="btn btn-secondary btn-block mb-2" href="{$conf->action_root}cartProducts" role="button">Powrót</a>
					</div>
				</div>
			</div>	
		</fieldset>
	</form>
</div>
{/block}