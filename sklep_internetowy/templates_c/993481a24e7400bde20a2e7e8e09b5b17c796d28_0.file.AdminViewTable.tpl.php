<?php
/* Smarty version 3.1.30, created on 2023-11-03 12:33:20
  from "C:\xampp\htdocs\sklep_internetowy\app\views\AdminViewTable.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6544da80b10989_97464870',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '993481a24e7400bde20a2e7e8e09b5b17c796d28' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sklep_internetowy\\app\\views\\AdminViewTable.tpl',
      1 => 1698938204,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6544da80b10989_97464870 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table class="table table-hover bg-white-80">
    <thead>
	    <tr>
		    <th>ID</th>
		    <th>Imię</th>
		    <th>Nazwisko</th>
		    <th>Email</th>
            <th>Edycja</th>
            <th>Usuwanie</th>
			<th>Blokuj/Odblokuj</th>
	    </tr>
    </thead>

    <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['uzytkownicy']->value, 'u');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['u']->value) {
?>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['u']->value["IDuzytkownik"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['u']->value["imie"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['u']->value["nazwisko"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['u']->value["email"];?>
</td><td><a class="btn btn-block btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
userEditAdmin&id=<?php echo $_smarty_tpl->tpl_vars['u']->value['IDuzytkownik'];?>
" role="button">Edytuj</a></td><td><a class="btn btn-block btn-danger" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
userDelete&id=<?php echo $_smarty_tpl->tpl_vars['u']->value['IDuzytkownik'];?>
" role="button">Usuń</a></td><?php ob_start();
echo $_smarty_tpl->tpl_vars['u']->value['blokada'] == 0;
$_prefixVariable1=ob_get_clean();
if ($_prefixVariable1) {?><td><a class="btn btn-block btn-danger" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
userBlock&id=<?php echo $_smarty_tpl->tpl_vars['u']->value['IDuzytkownik'];?>
" role="button">Zablokuj</a></td><?php } else { ?><td><a class="btn btn-block btn-success" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
userUnlock&id=<?php echo $_smarty_tpl->tpl_vars['u']->value['IDuzytkownik'];?>
" role="button">Odblokuj</a></td><?php }?></tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </tbody>
</table><?php }
}
