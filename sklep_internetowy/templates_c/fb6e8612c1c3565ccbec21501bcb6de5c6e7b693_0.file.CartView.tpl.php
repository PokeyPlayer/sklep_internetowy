<?php
/* Smarty version 3.1.30, created on 2023-11-17 13:13:43
  from "C:\xampp\htdocs\sklep_internetowy\app\views\CartView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_655758f76083f4_93693201',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fb6e8612c1c3565ccbec21501bcb6de5c6e7b693' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sklep_internetowy\\app\\views\\CartView.tpl',
      1 => 1700223204,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_655758f76083f4_93693201 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_61347335655758f7607be6_60514202', 'top');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_61347335655758f7607be6_60514202 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="container">
  <section class="row">
    <div class="col-lg-4 offset-lg-4 rounded-top text-center pt-3 pr-3 pl-3 bg-light-50">
				<h2>Koszyk</h2><br>
	  </div>
    <div class="table-responsive">
      <table class="table table-hover bg-white-80">
        <thead>
	        <tr>
            <th>Nazwa</th>
            <th>Zdjęcie</th>
            <th>Kategoria</th>
            <th>Ilość sztuk</th>
            <th>Cena</th>
            <th>Usuń</th>
          </tr>
        </thead>
        
        <tbody>  
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['wyniki']->value, 'w', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['w']->value) {
?>
        <tr><th><?php echo $_smarty_tpl->tpl_vars['w']->value["nazwa"];?>
</th><th class="d-block img-mh-130"><img src="img/<?php echo $_smarty_tpl->tpl_vars['zdjecia']->value[$_smarty_tpl->tpl_vars['key']->value];?>
" class="img-fluid d-block mx-auto product-img" alt="Zdjecie produktu"></th><th><?php echo $_smarty_tpl->tpl_vars['w']->value["kategoria"];?>
</th><th><form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
quantityChange" method="post" class="pure-form pure-form-aligned bottom-margin"><input type="number" id="ilosc" class="form-control" name="ilosc" style="width:15em" value="<?php echo $_smarty_tpl->tpl_vars['w']->value["ilosc"];?>
"><input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['w']->value["IDprodukt"];?>
"><br><input type="submit" class="btn btn-primary btn-block mt-2" value="OK"></form></th><th><?php echo $_smarty_tpl->tpl_vars['w']->value["cena"];?>
zł</th><th><a class="btn btn-block btn-danger" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
deleteFromCart&id=<?php echo $_smarty_tpl->tpl_vars['w']->value['IDprodukt'];?>
" role="button">Usuń</a></th></tr>
        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id;?>
">
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </tbody>
      </table>
      <?php if ($_smarty_tpl->tpl_vars['ilosc_produktow']->value == 0) {?>
        <h3>Brak produktów w koszyku</h3><br>
      <?php } else { ?>
        <h3>Wartość koszyka: <?php echo $_smarty_tpl->tpl_vars['wartosc_koszyka']->value;?>
zł</h3><br>
      <?php }?>
    </div>
    <br>
    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
order" method="post"  class="pure-form pure-form-aligned bottom-margin">
      <div class="rounded border p-3 bg-light-50 mb-3">
        <div class="row">
          <div class="col-md-9">
            <h2> Adres dostawy:</h2>
          </div>
          <div class="col-md-3">
            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
addAddressShow" class="btn btn-primary btn-block">Dodaj nowy adres</a>
          </div>
        
          <div class="col-md-4">
            <div class="list-group mt-3">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['adresy']->value, 'a');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['a']->value) {
?>
              <label class="list-group-item list-group-item-action flex-column align-items-start" for="adres<?php echo $_smarty_tpl->tpl_vars['a']->value["IDadres"];?>
">
                <div class="d-flex w-100 justify-content-between">
                  <div class="form-check mb-1">
                    <input class="form-check-input" type="radio" name="adres" id="adres<?php echo $_smarty_tpl->tpl_vars['a']->value["IDadres"];?>
" value="<?php echo $_smarty_tpl->tpl_vars['a']->value["IDadres"];?>
">
                  </div>
                  <div class="text-right">
                    <a class="btn btn-primary btn-sm" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
editAddress&IDadres=<?php echo $_smarty_tpl->tpl_vars['a']->value['IDadres'];?>
" role="button">edytuj</a>
                    <a class="btn btn-danger btn-sm" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
deleteAddress&IDadres=<?php echo $_smarty_tpl->tpl_vars['a']->value['IDadres'];?>
" role="button">usuń</a>
                  </div>
                </div>
                <p class="mb-1">
                  <?php ob_start();
echo $_smarty_tpl->tpl_vars['a']->value["imie"];
$_prefixVariable1=ob_get_clean();
echo ucfirst($_prefixVariable1);?>
 <?php ob_start();
echo $_smarty_tpl->tpl_vars['a']->value["nazwisko"];
$_prefixVariable2=ob_get_clean();
echo ucfirst($_prefixVariable2);?>

                  <br>
                  <?php echo $_smarty_tpl->tpl_vars['a']->value["ulica"];?>
 <?php echo $_smarty_tpl->tpl_vars['a']->value["nr_posesji"];?>
/<?php echo $_smarty_tpl->tpl_vars['a']->value["nr_lokalu"];?>

                  <br>
                  <?php echo $_smarty_tpl->tpl_vars['a']->value["kod_pocztowy"];?>
 <?php echo $_smarty_tpl->tpl_vars['a']->value["miejscowosc"];?>

                  <br>
                  tel: <?php echo $_smarty_tpl->tpl_vars['a']->value["numer_tel"];?>

                </p>
              </label>
              <input type="hidden" name="IDadres" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->IDadres;?>
">
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="rounded border p-3 bg-light-50">
        <h2>Sposób dostawy:</h2>
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <input type="radio" style="height:31px" id="sposob_dostawy" name="sposob_dostawy" value="1">
            </div>
          </div>
          <input type="text" class="form-control bg-white" style="color:black; height:45px;" value="Kurier" disabled>
        </div>

        <div class="input-group mt-2">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <input type="radio" style="height:31px" id="sposob_dostawy" name="sposob_dostawy" value="2">
            </div>
          </div>
          <input type="text" class="form-control bg-white" style="color:black; height:45px;" value="Poczta polska" disabled>
        </div>

        <div class="input-group mt-2">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <input type="radio" style="height:31px" id="sposob_dostawy" name="sposob_dostawy" value="3">
            </div>
          </div>
          <input type="text" class="form-control bg-white" style="color:black; height:45px;" value="Paczkomat" disabled>
        </div>

        <div class="input-group mt-2">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <input type="radio" style="height:31px" id="sposob_dostawy" name="sposob_dostawy" value="4">
            </div>
          </div>
          <input type="text" class="form-control bg-white" style="color:black; height:45px;" value="Paczka w Ruchu" disabled>
        </div>
      </div>
      <br><br>
      <div class="rounded border p-3 bg-light-50">
        <h2>Sposób płatności:</h2>
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <input type="radio" style="height:31px" id="sposob_platnosci" name="sposob_platnosci" value="1">
            </div>
          </div>
          <input type="text" class="form-control bg-white" style="color:black; height:45px;" value="Portfel elektroniczny" disabled>
        </div>
      </div>
      <br>
      <input type="hidden" id="suma" name="suma" value="<?php echo $_smarty_tpl->tpl_vars['wartosc_koszyka']->value;?>
">
      <input type="submit" class="btn btn-lg btn-primary btn-block mt-2" value="Zamów i zapłać">
    </form>
  </section>
</div>
<?php
}
}
/* {/block 'top'} */
}
