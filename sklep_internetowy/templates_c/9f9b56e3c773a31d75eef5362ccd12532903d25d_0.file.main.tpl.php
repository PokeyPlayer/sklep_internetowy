<?php
/* Smarty version 3.1.30, created on 2023-11-22 18:49:36
  from "C:\xampp\htdocs\sklep_internetowy\app\views\templates\main.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_655e3f305c9546_88050212',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9f9b56e3c773a31d75eef5362ccd12532903d25d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sklep_internetowy\\app\\views\\templates\\main.tpl',
      1 => 1700675364,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_655e3f305c9546_88050212 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta charset="utf-8"/>
	<title>MGM sklep internetowy</title>
	<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/css/style.css">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/css/bootstrap.min.css">
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/js/functions.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/js/bootstrap.min.js"><?php echo '</script'; ?>
>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.0/css/all.css">
</head>

<body style="margin: 20px;">
<?php $_smarty_tpl->_assignInScope('zmienna', "&page=1&sf_nazwa=&kategoria=all&sortowanie=0");
?>
<div class="pure-menu pure-menu-horizontal bottom-margin">
<?php if ((count($_smarty_tpl->tpl_vars['conf']->value->roles) > 0 && $_SESSION['IDuzytkownik'] != 1 && ($_smarty_tpl->tpl_vars['conf']->value->roles['user']))) {?>
	<a class="pure-menu-heading pure-menu-link" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
productsList<?php echo $_smarty_tpl->tpl_vars['zmienna']->value;?>
">
		<img src="img/logo2.svg" width="100" height="30" class="d-inline-block align-top" alt="logo strony">
	</a>
	<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
cartProducts" class="pure-menu-heading pure-menu-link"><i class="fa-solid fa-cart-shopping" style="color: #808080;"></i> Koszyk</a>
	<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
purchasedProductsView" class="pure-menu-heading pure-menu-link"><i class="fa-solid fa-clipboard-list" style="color: #808080;"></i> Zakupione produkty</a>
	<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
walletView" class="pure-menu-heading pure-menu-link"><i class="fa-solid fa-wallet" style="color: #808080;"></i> Portfel: <?php echo $_SESSION['stan_portfela'];?>
 zł</a>
	<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
userProfileEdit" class="pure-menu-heading pure-menu-link"><i class="fa-solid fa-user" style="color: #808080;"></i> Profil</a>
	<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
logout" class="pure-menu-heading pure-menu-link"><i class="fa-solid fa-right-from-bracket" style="color: #808080;"></i> Wyloguj</a>
<?php } elseif ((count($_smarty_tpl->tpl_vars['conf']->value->roles) > 0 && $_SESSION['IDuzytkownik'] == 1 && ($_smarty_tpl->tpl_vars['conf']->value->roles['admin']))) {?>
	<a class="pure-menu-heading pure-menu-link" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
productsList<?php echo $_smarty_tpl->tpl_vars['zmienna']->value;?>
">
		<img src="img/logo2.svg" width="100" height="30" class="d-inline-block align-top" alt="logo strony">
	</a>
	<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
adminView" class="pure-menu-heading pure-menu-link"><i class="fa-solid fa-user-secret" style="color: #808080;"></i> Panel administracyjny</a>
	<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
logout" class="pure-menu-heading pure-menu-link"><i class="fa-solid fa-right-from-bracket" style="color: #808080;"></i> Wyloguj</a>
<?php } else { ?>	
	<a class="pure-menu-heading pure-menu-link" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
productsList<?php echo $_smarty_tpl->tpl_vars['zmienna']->value;?>
">
		<img src="img/logo2.svg" width="100" height="30" class="d-inline-block align-top" alt="logo strony">
	</a>
	<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
loginShow" class="pure-menu-heading pure-menu-link"><i class="fa-solid fa-right-to-bracket" style="color: #808080;"></i> Logowanie</a>
	<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
registrationShow" class="pure-menu-heading pure-menu-link"><i class="fa-solid fa-user-plus" style="color: #808080;"></i> Rejestracja</a>
<?php }?>
</div>
<hr>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1575123486655e3f305c6ea3_12988278', 'messages');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_156250080655e3f305c7dd8_38864735', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_968628105655e3f305c86d6_43617453', 'bottom');
?>

<br><br>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1061245015655e3f305c8f73_34599242', 'footer');
?>


</div>
</body>
</html><?php }
/* {block 'messages'} */
class Block_1575123486655e3f305c6ea3_12988278 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if ($_smarty_tpl->tpl_vars['messages']->value->isError()) {?>
	<div class="messages error">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messages']->value->getErrors(), 'msg');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
?>
		<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
<br>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['messages']->value->isInfo()) {?>
	<div class="messages info">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messages']->value->getInfos(), 'msg');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
?>
		<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
<br>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	</div>
<?php }
}
}
/* {/block 'messages'} */
/* {block 'top'} */
class Block_156250080655e3f305c7dd8_38864735 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block 'top'} */
/* {block 'bottom'} */
class Block_968628105655e3f305c86d6_43617453 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block 'bottom'} */
/* {block 'footer'} */
class Block_1061245015655e3f305c8f73_34599242 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="footer text-center text-light">
	<p>© 2023 Sklep internetowy</p>
</div>
<?php
}
}
/* {/block 'footer'} */
}
