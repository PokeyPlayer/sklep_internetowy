<?php
/* Smarty version 3.1.30, created on 2023-11-17 13:48:48
  from "C:\xampp\htdocs\sklep_internetowy\app\views\PurchasedProductsViewTable.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_65576130c98bd1_43067348',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '54ad10ff45510362007bea779ad622a87e488b6e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sklep_internetowy\\app\\views\\PurchasedProductsViewTable.tpl',
      1 => 1700225116,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65576130c98bd1_43067348 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section class="row"> 
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['wyniki']->value, 'w', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['w']->value) {
?>
    <article class="col-12 m-1 p-3 border-bottom bg-light-50 rounded product-size">
      <div class="row">
        <div class="col-lg-2 col-md-3">
          <img src="img/<?php echo $_smarty_tpl->tpl_vars['zdjecia']->value[$_smarty_tpl->tpl_vars['key']->value];?>
" class="img-fluid d-block mx-auto  product-img" alt="Zdjęcie produktu">
        </div>
        <div class="col-lg-5 col-md-5">
          <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
productView&id=<?php echo $_smarty_tpl->tpl_vars['w']->value['IDprodukt'];?>
" class="h4 m-2"><?php echo $_smarty_tpl->tpl_vars['w']->value["nazwa"];?>
</a>
			    <ul class="m-0">
            <li><?php echo $_smarty_tpl->tpl_vars['w']->value["kategoria"];?>
</li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-4">
          <span class="h6 m-2">Numer zamówienia: <?php echo $_smarty_tpl->tpl_vars['w']->value["nr_zamowienia"];?>
</span>
          <br>
          <span class="m-2">Zakupiona ilość: <?php echo $_smarty_tpl->tpl_vars['w']->value["ilosc"];?>
szt.</span>
          <br>
          <?php if ($_smarty_tpl->tpl_vars['w']->value["srednia_ocen"] != 0) {?>
          <span class="m-2">Ocena produktu: <?php echo $_smarty_tpl->tpl_vars['w']->value["srednia_ocen"];?>
/5 (<?php echo $_smarty_tpl->tpl_vars['ilosc_opinii']->value[$_smarty_tpl->tpl_vars['key']->value];?>
)</span>
          <?php } else { ?>
          <span class="m-2">Ocena produktu: brak ocen</span>
          <?php }?>
          <br>
          <span class="m-2">Data zamówienia: <?php echo $_smarty_tpl->tpl_vars['w']->value["data_zlozenia"];?>
</span>
        </div>  
        <div class="col-lg-2 col-md-4">
          <div class="d-grid gap-1">
            <a class="btn btn-primary btn-block mb-2" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
productView&id=<?php echo $_smarty_tpl->tpl_vars['w']->value['IDprodukt'];?>
" role="button">Przeglądaj produkt</a>
            <a class="btn btn-success btn-block mb-2" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
addComment&id=<?php echo $_smarty_tpl->tpl_vars['w']->value['IDprodukt'];?>
" role="button">Oceń produkt</a>
          </div>
        </div>
      </div>
    </article>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</section>
<br>
<div class="btn-toolbar mb-2" role="toolbar" style="justify-content: center; display: flex;" aria-label="Toolbar with button groups">
<?php if ($_smarty_tpl->tpl_vars['ilosc_wynikow']->value == -1) {?>
  <span class="h4 m-2">Brak zakupionych produktów.</span>
<?php } elseif ($_smarty_tpl->tpl_vars['ilosc_wynikow']->value == 0) {?>
  <span class="h4 m-2">Brak wyszukiwanych zakupionych produktów :(</span>
<?php }?>
</div><?php }
}
