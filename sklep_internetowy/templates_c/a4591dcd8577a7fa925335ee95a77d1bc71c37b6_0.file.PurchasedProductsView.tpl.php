<?php
/* Smarty version 3.1.30, created on 2023-11-17 13:44:25
  from "C:\xampp\htdocs\sklep_internetowy\app\views\PurchasedProductsView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_655760290e4137_69945102',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a4591dcd8577a7fa925335ee95a77d1bc71c37b6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sklep_internetowy\\app\\views\\PurchasedProductsView.tpl',
      1 => 1700224854,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
    'file:PurchasedProductsViewTable.tpl' => 1,
  ),
),false)) {
function content_655760290e4137_69945102 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_679172277655760290e2d08_50007741', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_974850376655760290e3dd5_91581229', 'bottom');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_679172277655760290e2d08_50007741 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="d-flex flex-column align-items-center bg-white-80 p-2">
  <form id="search-form" class="pure-form pure-form-stacked" onsubmit="ajaxPostForm('search-form','<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
purchasedProductsViewPart','table'); return false;">
	  <div class="form-group mb-2">
		  <legend>Zakupione produkty</legend>
		  <fieldset>
			  <input type="text" placeholder="Wyszukaj produkt" name="sf_zakupiony" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->zakupiony_produkt;?>
"/>
      	  </fieldset>
		  <button type="submit" name="submit" class="btn btn-primary mb-2 ml-2">Wyszukaj</button>
	  </div>
  </form>
</div>
<?php
}
}
/* {/block 'top'} */
/* {block 'bottom'} */
class Block_974850376655760290e3dd5_91581229 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div id="table" class="container">
	<?php $_smarty_tpl->_subTemplateRender("file:PurchasedProductsViewTable.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
 
</div>
<?php
}
}
/* {/block 'bottom'} */
}
