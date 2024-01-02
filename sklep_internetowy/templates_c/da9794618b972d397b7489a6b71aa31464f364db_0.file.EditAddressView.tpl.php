<?php
/* Smarty version 3.1.30, created on 2023-11-03 12:22:58
  from "C:\xampp\htdocs\sklep_internetowy\app\views\EditAddressView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6544d812df43f9_38879441',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'da9794618b972d397b7489a6b71aa31464f364db' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sklep_internetowy\\app\\views\\EditAddressView.tpl',
      1 => 1698942042,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_6544d812df43f9_38879441 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12847212886544d812df3f10_26712088', 'top');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_12847212886544d812df3f10_26712088 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="container">
	<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
editAddressSave" method="post"  class="pure-form pure-form-aligned bottom-margin">
		<fieldset>
			<div class="row g-3">
    			<div class="col-lg-4 offset-lg-4 rounded-top text-center pt-3 pr-3 pl-3 bg-light-50">
					<h3>Edytowanie adresu dostawy</h3><br>
				</div>

				<div class="col-lg-3 offset-lg-3 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
						<label class="d-none" for="imie">Imię: </label>
						<input id="imie" type="text" class="form-control" name="imie" placeholder="Podaj imię" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->imie;?>
" />
					</div>
				</div>

				<div class="col-lg-3 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
						<label class="d-none" for="nazwisko">Nazwisko: </label>
						<input id="nazwisko" type="text" class="form-control" name="nazwisko" placeholder="Podaj nazwisko" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->nazwisko;?>
" />
					</div>
				</div>

				<div class="col-lg-4 offset-lg-3 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
						<label class="d-none" for="miejscowosc">Miejscowość: </label>
						<input id="miejscowosc" type="text" class="form-control" name="miejscowosc" placeholder="Podaj miejscowosc" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->miejscowosc;?>
" />
					</div>
				</div>

				<div class="col-lg-2 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
						<label class="d-none" for="kod_pocztowy">Kod pocztowy: </label>
						<input id="kod_pocztowy" type="text" class="form-control" name="kod_pocztowy" placeholder="Podaj kod pocztowy" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->kod_pocztowy;?>
" />
					</div>
				</div>

				<div class="col-lg-4 offset-lg-3 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
						<label class="d-none" for="ulica">Ulica: </label>
						<input id="ulica" type="text" class="form-control" name="ulica" placeholder="Podaj ulicę" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->ulica;?>
" />
					</div>
				</div>

				<div class="col-lg-1 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
						<label class="d-none" for="nr_posesji">Nr posesji: </label>
						<input id="nr_posesji" type="text" class="form-control" name="nr_posesji" placeholder="Nr domu" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->nr_posesji;?>
" />
					</div>
				</div>

				<div class="col-lg-1 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
						<label class="d-none" for="nr_lokalu">Nr lokalu: </label>
						<input id="nr_lokalu" type="text" class="form-control" name="nr_lokalu" placeholder="Nr lokalu" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->nr_lokalu;?>
" />
					</div>
				</div>

				<div class="col-lg-6 offset-lg-3 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
						<label class="d-none" for="numer_tel">Numer telefonu: </label>
						<input id="numer_tel" type="number" class="form-control" name="numer_tel" placeholder="Podaj numer telefonu" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->numer_tel;?>
" />
					</div>
				</div>

				<div class="col-lg-6 offset-lg-3 rounded-bottom pb-3 pr-3 pl-3 bg-light-50">
					<div class="d-grid gap-2">
						<input type="submit" value="Edytuj adres" class="btn btn-primary btn-block mb-2"/>
						<a class="btn btn-secondary btn-block mb-2" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
cartProducts" role="button">Powrót</a>
					</div>
				</div>
				<input type="hidden" name="IDadres" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->IDadres;?>
">
			</div>	
		</fieldset>
	</form>
</div>
<?php
}
}
/* {/block 'top'} */
}
