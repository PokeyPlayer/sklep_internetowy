<?php
/* Smarty version 3.1.30, created on 2023-11-17 13:46:37
  from "C:\xampp\htdocs\sklep_internetowy\app\views\ProductsListTable.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_655760ad183bc5_07174361',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '80887b11f190d4987be2a0662e7ebdacdc1edcae' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sklep_internetowy\\app\\views\\ProductsListTable.tpl',
      1 => 1700225121,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_655760ad183bc5_07174361 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section class="row"> 
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['wyniki']->value, 'w', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['w']->value) {
?>
  <article class="col-12 m-1 p-3 border-bottom bg-light-50 product-size">
    <div class="row">
      <div class="col-lg-2 col-md-3">
        <a class="d-block img-mh-130" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
productView&id=<?php echo $_smarty_tpl->tpl_vars['w']->value['IDprodukt'];?>
"><img src="img/<?php echo $_smarty_tpl->tpl_vars['zdjecia']->value[$_smarty_tpl->tpl_vars['key']->value];?>
" class="img-fluid d-block mx-auto img-size product-img" alt="Zdjęcie produktu"></a>
      </div>
      <div class="col-lg-7 col-md-5">
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
         <span class="h3 m-2">Cena: <?php echo $_smarty_tpl->tpl_vars['w']->value["cena"];?>
 zł</span>
         <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
addToCart&id=<?php echo $_smarty_tpl->tpl_vars['w']->value['IDprodukt'];?>
" class="btn btn-success btn-block m-2" role="button" aria-pressed="true">Dodaj do koszyka</a>
         <?php if ($_smarty_tpl->tpl_vars['w']->value["srednia_ocen"] != 0) {?>
         <span class="m-2">Ocena: <?php echo $_smarty_tpl->tpl_vars['w']->value["srednia_ocen"];?>
/5 (<?php echo $_smarty_tpl->tpl_vars['ilosc_opinii']->value[$_smarty_tpl->tpl_vars['key']->value];?>
)</span>
         <?php } else { ?>
         <span class="m-2">Ocena: brak</span>
         <?php }?>
         <span class="m-2">Dostępna ilość: <?php echo $_smarty_tpl->tpl_vars['w']->value["dostepna_ilosc"];?>
szt.</span>
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
<?php if ($_smarty_tpl->tpl_vars['ilosc']->value == 0) {?>
  <span class="h4 m-2">Brak produktów spełniających wybrane kryteria :(</span>
<?php }
if ($_smarty_tpl->tpl_vars['strony']->value > 1) {?>
    <?php echo $_smarty_tpl->tpl_vars['s']->value;?>

<?php }?>
</div><?php }
}
