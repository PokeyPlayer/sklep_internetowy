<?php
/* Smarty version 3.1.30, created on 2023-11-03 12:00:55
  from "C:\xampp\htdocs\sklep_internetowy\app\views\LoginView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6544d2e7dee688_82297262',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '97185e5e8b44fd911e23a0f7da8ef4f0831e16a2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sklep_internetowy\\app\\views\\LoginView.tpl',
      1 => 1698942616,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_6544d2e7dee688_82297262 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1199339326544d2e7dedb08_06067700', 'top');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_1199339326544d2e7dedb08_06067700 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="container">
	<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
login" method="post"  class="pure-form pure-form-aligned bottom-margin">
		<fieldset>
			<div class="form-row mt-4">
    			<div class="col-lg-4 offset-lg-4 rounded-top text-center pt-3 pr-3 pl-3 bg-light-50">
					<h3>Zaloguj się</h3>
				</div>

				<div class="col-lg-4 offset-lg-4 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
						<label for="email">E-mail: </label>
						<input id="email" type="text" class="form-control" name="email" placeholder="Podaj email" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->email;?>
" />
					</div>
				</div>

    			<div class="col-lg-4 offset-lg-4 pr-3 pl-3 bg-light-50">
        			<div class="form-group">
						<label for="haslo">Hasło: </label>
						<input id="haslo" type="password" class="form-control" name="haslo" placeholder="Podaj hasło"/><br/>
					</div>
					<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
resetPasswordShow">Nie pamiętasz hasła?</a>
				</div>
				<br>
				<div class="col-lg-4 offset-lg-4 rounded-bottom pb-3 pr-3 pl-3 bg-light-50">
					<div class="d-grid gap-2">
						<input type="submit" value="Zaloguj się" class="btn btn-primary btn-block"/>
						<div class="col-lg-4 offset-lg-4 rounded-top text-center pt-3 pr-3 pl-3 bg-light-50">
							<br>
        					<h4>Brak konta?</h4>
						</div>
						<a class="btn btn-outline-primary btn-block" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
registrationShow" role="button">Zarejestruj się!</a>
					</div>
				</div>
			</div>
		</fieldset>
	</form>
</div>
<?php
}
}
/* {/block 'top'} */
}
