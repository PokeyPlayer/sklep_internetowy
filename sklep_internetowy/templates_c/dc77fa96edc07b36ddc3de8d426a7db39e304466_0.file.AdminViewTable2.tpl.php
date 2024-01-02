<?php
/* Smarty version 3.1.30, created on 2023-11-13 21:53:08
  from "C:\xampp\htdocs\sklep_internetowy\app\views\AdminViewTable2.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_65528cb44ca790_46287047',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dc77fa96edc07b36ddc3de8d426a7db39e304466' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sklep_internetowy\\app\\views\\AdminViewTable2.tpl',
      1 => 1699905538,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65528cb44ca790_46287047 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table class="table table-hover bg-white-80">
	<thead>
		<tr>
			<th class= tabelka>ID</th>
            <th class= tabelka>Zdjecie</th>
            <th class= tabelka>Nazwa</th>
            <th class= tabelka>Kategoria</th>
            <th class= tabelka>Ilość sztuk</th>
            <th class= tabelka>Czy dostępny?</th>
            <th class= tabelka>Cena</th>
			<th class= tabelka>Poprzednia cena</th>
			<th class= tabelka>Data obowiązywania poprzedniej ceny</th>
            <th class= tabelka>Edycja</th>
            <th class= tabelka>Usuwanie</th>
		</tr>
    </thead>

	<tbody>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['produkty']->value, 'p', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['p']->value) {
?>
		<tr><th><?php echo $_smarty_tpl->tpl_vars['p']->value["IDprodukt"];?>
</th><th class="d-block img-mh-130"><img src="img/<?php echo $_smarty_tpl->tpl_vars['zdjecia']->value[$_smarty_tpl->tpl_vars['key']->value];?>
" class="img-fluid d-block mx-auto product-img" alt="Zdjecie produktu"></th><th><?php echo $_smarty_tpl->tpl_vars['p']->value["nazwa"];?>
</th><th><?php echo $_smarty_tpl->tpl_vars['p']->value["kategoria"];?>
</th><th><?php echo $_smarty_tpl->tpl_vars['p']->value["dostepna_ilosc"];?>
</th><th><?php echo $_smarty_tpl->tpl_vars['p']->value["czy_dostepny"];?>
</th><th><?php echo $_smarty_tpl->tpl_vars['p']->value["cena"];?>
zł</th><th><?php echo $_smarty_tpl->tpl_vars['p']->value["poprzednia_cena"];?>
 (zł)</th><th><?php echo $_smarty_tpl->tpl_vars['p']->value["data_obow_poprz_ceny"];?>
</th><th><a class="btn btn-block btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
productEdit&id=<?php echo $_smarty_tpl->tpl_vars['p']->value['IDprodukt'];?>
" role="button">Edytuj</a></th><th><a class="btn btn-block btn-danger" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
productDelete&id=<?php echo $_smarty_tpl->tpl_vars['p']->value['IDprodukt'];?>
" role="button">Usuń</a></th></tr>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	</tbody>
</table><?php }
}
