{extends file="main.tpl"}
{block name=top}
<div class="container">
	<form action="{$conf->action_root}login" method="post"  class="pure-form pure-form-aligned bottom-margin">
		<fieldset>
			<div class="form-row mt-4">
    			<div class="col-lg-4 offset-lg-4 rounded-top text-center pt-3 pr-3 pl-3 bg-light-50">
					<h3>Zaloguj się</h3>
				</div>

				<div class="col-lg-4 offset-lg-4 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
						<label for="email">E-mail: </label>
						<input id="email" type="text" class="form-control" name="email" placeholder="Podaj email" value="{$form->email}" />
					</div>
				</div>

    			<div class="col-lg-4 offset-lg-4 pr-3 pl-3 bg-light-50">
        			<div class="form-group">
						<label for="haslo">Hasło: </label>
						<input id="haslo" type="password" class="form-control" name="haslo" placeholder="Podaj hasło"/><br/>
					</div>
					<a href="{$conf->action_root}resetPasswordShow">Nie pamiętasz hasła?</a>
				</div>
				<br>
				<div class="col-lg-4 offset-lg-4 rounded-bottom pb-3 pr-3 pl-3 bg-light-50">
					<div class="d-grid gap-2">
						<input type="submit" value="Zaloguj się" class="btn btn-primary btn-block"/>
						<div class="col-lg-4 offset-lg-4 rounded-top text-center pt-3 pr-3 pl-3 bg-light-50">
							<br>
        					<h4>Brak konta?</h4>
						</div>
						<a class="btn btn-outline-primary btn-block" href="{$conf->action_root}registrationShow" role="button">Zarejestruj się!</a>
					</div>
				</div>
			</div>
		</fieldset>
	</form>
</div>
{/block}