<?php
/* Smarty version 3.1.30, created on 2023-11-03 12:34:49
  from "C:\xampp\htdocs\sklep_internetowy\app\views\AdminUserEditView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6544dad9a5cf58_61462244',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '68270225cef36d1d9baa207d31d1f720b263364f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sklep_internetowy\\app\\views\\AdminUserEditView.tpl',
      1 => 1698939654,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_6544dad9a5cf58_61462244 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16772374266544dad9a5ca43_48432543', 'top');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_16772374266544dad9a5ca43_48432543 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="container">
	<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
userSaveAdmin" method="post"  class="pure-form pure-form-aligned bottom-margin">
    	<fieldset>
			<div class="row g-1">
        		<div class="col-lg-4 offset-lg-4 rounded-top text-center pt-3 pr-3 pl-3 bg-light-50">
			 	   <h2>Edycja profilu użytkownika</h2><br>
		   		</div>

        		<div class="col-lg-3 offset-lg-3 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
						<label for="imie">Imię: </label>
						<input id="imie" type="text" class="form-control" name="imie" placeholder="Podaj imię" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->imie;?>
" />
					</div>
				</div>

				<div class="col-lg-3 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
						<label for="nazwisko">Nazwisko: </label>
						<input id="nazwisko" type="text" class="form-control" name="nazwisko" placeholder="Podaj nazwisko" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->nazwisko;?>
" />
					</div>
			  	</div>

			  	<div class="col-lg-4 offset-lg-3 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
						<label for="miejscowosc">Miejscowość: </label>
						<input id="miejscowosc" type="text" class="form-control" name="miejscowosc" placeholder="Podaj miejscowosc" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->miejscowosc;?>
" />
				  	</div>
			  	</div>

			  	<div class="col-lg-2 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
						<label for="kod_pocztowy">Kod pocztowy: </label>
						<input id="kod_pocztowy" type="text" class="form-control" name="kod_pocztowy" placeholder="Podaj kod pocztowy" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->kod_pocztowy;?>
" />
				  	</div>
			  	</div>

			  	<div class="col-lg-4 offset-lg-3 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
						<label for="ulica">Ulica: </label>
						<input id="ulica" type="text" class="form-control" name="ulica" placeholder="Podaj ulicę" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->ulica;?>
" />
				  	</div>
			  	</div>

			  	<div class="col-lg-1 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
						<label for="nr_posesji">Nr posesji: </label>
						<input id="nr_posesji" type="text" class="form-control" name="nr_posesji" placeholder="Nr domu" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->nr_posesji;?>
" />
				  	</div>
			  	</div>

			  	<div class="col-lg-1 pr-3 pl-3 bg-light-50">
    		  		<div class="form-group">
						<label for="nr_lokalu">Nr lokalu: </label>
						<input id="nr_lokalu" type="text" class="form-control" name="nr_lokalu" placeholder="Nr lokalu" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->nr_lokalu;?>
" />
					</div>
			  	</div>

			  	<div class="col-lg-3 offset-lg-3 pr-3 pl-3 bg-light-50">
    		  		<div class="form-group">
						<label for="numer_tel">Numer telefonu: </label>
						<input id="numer_tel" type="number" class="form-control" name="numer_tel" placeholder="Podaj numer telefonu" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->numer_tel;?>
" />
					</div>
			  	</div>

			  	<div class="col-lg-3 pr-3 pl-3 bg-light-50">
    		  		<div class="form-group">
						<label for="email">E-mail: </label>
						<input id="email" type="text" class="form-control" name="email" placeholder="Podaj email" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->email;?>
" />
					</div>
			  	</div>

        		<div class="col-lg-6 offset-lg-3 rounded-bottom pb-3 pr-3 pl-3 bg-light-50">
					<div class="d-grid gap-1"><br>
            			<input type="submit" class="btn btn-primary btn-block mb-2" value="Edytuj profil">
            			<a class="btn btn-secondary btn-block mb-2" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
adminView" role="button">Powrót</a>
          			</div>
        		</div>
		    	<input type="hidden" name="IDuzytkownik" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->IDuzytkownik;?>
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
