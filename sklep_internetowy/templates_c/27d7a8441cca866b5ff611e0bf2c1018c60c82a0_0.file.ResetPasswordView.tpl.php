<?php
/* Smarty version 3.1.30, created on 2023-11-03 12:28:53
  from "C:\xampp\htdocs\sklep_internetowy\app\views\ResetPasswordView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6544d975550326_38069556',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '27d7a8441cca866b5ff611e0bf2c1018c60c82a0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sklep_internetowy\\app\\views\\ResetPasswordView.tpl',
      1 => 1698945504,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_6544d975550326_38069556 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15550679136544d97554fda0_17653358', 'top');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_15550679136544d97554fda0_17653358 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="container">
	<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
resetPassword" method="post"  class="pure-form pure-form-aligned bottom-margin">
		<fieldset>
			<div class="form-row mt-4">
    			<div class="col-lg-4 offset-lg-4 rounded-top text-center pt-3 pr-3 pl-3 bg-light-50">
					<h3>Resetuj hasło</h3>
				</div>

				<div class="col-lg-4 offset-lg-4 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
						<label for="email">E-mail: </label>
						<input id="email" type="text" class="form-control" name="email" placeholder="Podaj email" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->email;?>
" />
					</div>
				</div>
				<br>
				<div class="col-lg-4 offset-lg-4 rounded-bottom pb-3 pr-3 pl-3 bg-light-50">
					<div class="d-grid gap-2">
						<input type="submit" value="Resetuj hasło" class="btn btn-primary btn-block mb-2"/>
						<a class="btn btn-secondary btn-block mb-2" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
loginShow" role="button">Powrót</a>
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
