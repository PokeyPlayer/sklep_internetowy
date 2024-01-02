{extends file="main.tpl"}
{block name=top}
<div class="container">
	<form action="{$conf->action_root}resetPassword" method="post"  class="pure-form pure-form-aligned bottom-margin">
		<fieldset>
			<div class="form-row mt-4">
    			<div class="col-lg-4 offset-lg-4 rounded-top text-center pt-3 pr-3 pl-3 bg-light-50">
					<h3>Resetuj hasło</h3>
				</div>

				<div class="col-lg-4 offset-lg-4 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
						<label for="email">E-mail: </label>
						<input id="email" type="text" class="form-control" name="email" placeholder="Podaj email" value="{$form->email}" />
					</div>
				</div>
				<br>
				<div class="col-lg-4 offset-lg-4 rounded-bottom pb-3 pr-3 pl-3 bg-light-50">
					<div class="d-grid gap-2">
						<input type="submit" value="Resetuj hasło" class="btn btn-primary btn-block mb-2"/>
						<a class="btn btn-secondary btn-block mb-2" href="{$conf->action_root}loginShow" role="button">Powrót</a>
					</div>
				</div>
			</div>
		</fieldset>
	</form>
</div>
{/block}