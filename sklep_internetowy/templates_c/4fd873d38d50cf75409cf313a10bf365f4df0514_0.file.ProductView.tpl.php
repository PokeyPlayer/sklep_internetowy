<?php
/* Smarty version 3.1.30, created on 2023-11-15 21:10:33
  from "C:\xampp\htdocs\sklep_internetowy\app\views\ProductView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_655525b926b003_66421869',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4fd873d38d50cf75409cf313a10bf365f4df0514' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sklep_internetowy\\app\\views\\ProductView.tpl',
      1 => 1700079028,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_655525b926b003_66421869 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_483804237655525b926a9d8_56849953', 'top');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_483804237655525b926a9d8_56849953 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="container">
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['wyniki']->value, 'w');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['w']->value) {
?>
    <div class="row bg-white-80 p-2">
      <div class="col-lg-12">
        <h2><?php echo $_smarty_tpl->tpl_vars['w']->value["nazwa"];?>
</h2>
        <h5>Kategoria: <?php echo $_smarty_tpl->tpl_vars['w']->value["kategoria"];?>
</h5>
      </div>
  
      <div class="col-lg-5">
        <div id="slider" class="carousel slide">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#slider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slajd 1"></button>
            <button type="button" data-bs-target="#slider" data-bs-slide-to="1" aria-label="Slajd 2"></button>
            <button type="button" data-bs-target="#slider" data-bs-slide-to="2" aria-label="Slajd 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active text-center">
              <img class="product-img2" src="img/<?php echo $_smarty_tpl->tpl_vars['zdjecia']->value[0];?>
" alt="Pierwszy slajd">
            </div>
            <div class="carousel-item text-center text-center">
              <img class="product-img2" src="img/<?php echo $_smarty_tpl->tpl_vars['zdjecia']->value[1];?>
" alt="Drugi slajd">
            </div>
            <div class="carousel-item text-center text-center">
              <img class="product-img2" src="img/<?php echo $_smarty_tpl->tpl_vars['zdjecia']->value[2];?>
" alt="Trzeci slajd">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Poprzedni</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Następny</span>
          </button>
        </div>
      </div>

      <div class="col-lg-4">
        <span class="h4 m-2">Cena: <?php echo $_smarty_tpl->tpl_vars['w']->value["cena"];?>
 zł</span><br>
        <?php if ($_smarty_tpl->tpl_vars['w']->value["srednia_ocen"] != 0) {?>
        <span class="m-2">Ocena: <?php echo $_smarty_tpl->tpl_vars['w']->value["srednia_ocen"];?>
/5</span>
        <?php } else { ?>
        <span class="m-2">Ocena: brak ocen</span>
        <?php }?>
        <br>
        <span class="m-2">Dostępna ilość: <?php echo $_smarty_tpl->tpl_vars['w']->value["dostepna_ilosc"];?>
szt.</span>     
      </div>
      <div class="col-lg-3">
        <div class="d-grid gap-3">
          <a class="btn btn-primary btn-block" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
productsList" role="button">Wróć do przeglądania</a>
          <a class="btn btn-success btn-block" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
addToCart&id=<?php echo $_smarty_tpl->tpl_vars['w']->value['IDprodukt'];?>
" role="button">Dodaj do koszyka</a>
          <a class="btn btn-primary btn-block" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
addComment&id=<?php echo $_smarty_tpl->tpl_vars['w']->value['IDprodukt'];?>
" role="button">Oceń produkt</a>
        </div>
      </div>
      <h3>Opis</h3>
      <div style="background-color: #ADD8E6; font-size: 18px;" class="col-lg-12 rounded">
        <span class="p-4 d-block"><?php echo $_smarty_tpl->tpl_vars['w']->value["opis"];?>
</span>
      </div>
      <div class="col-lg-12">
        <hr>
      </div>
      <div class="col-lg-12">
        <h3>Opinie (<?php echo $_smarty_tpl->tpl_vars['ilosc_opinii']->value;?>
)</h3>
        <?php if ($_smarty_tpl->tpl_vars['ilosc_opinii']->value == 0) {?>
          <span class="h5 m-2">Produkt nie ma jeszcze opinii.</span>
        <?php }?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['wyniki2']->value, 'w2');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['w2']->value) {
?> 
          <div class="border rounded p-3 bg-gray-10 my-2">
            <div>
              <?php ob_start();
echo $_smarty_tpl->tpl_vars['w2']->value["IDuzytkownik"];
$_prefixVariable1=ob_get_clean();
if (($_prefixVariable1)) {?>
                <span class="font-weight-bold"><?php echo $_smarty_tpl->tpl_vars['w2']->value["imie"];?>
 ocenił produkt <?php echo $_smarty_tpl->tpl_vars['w2']->value["ocena"];?>
/5</span>
              <?php } else { ?>
                <span class="font-weight-bold">Były użytkownik ocenił produkt <?php echo $_smarty_tpl->tpl_vars['w2']->value["ocena"];?>
/5</span>
              <?php }?>
              <?php if ((count($_smarty_tpl->tpl_vars['conf']->value->roles) > 0 && $_SESSION['IDuzytkownik'] == 1 && ($_smarty_tpl->tpl_vars['conf']->value->roles['admin']))) {?>
                <a class="btn btn-danger btn-sm" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
commentDelete&idk=<?php echo $_smarty_tpl->tpl_vars['w2']->value['IDkomentarz'];?>
" role="button">usuń</a>
              <?php }?>
            </div>
            <div>
              <?php echo $_smarty_tpl->tpl_vars['w2']->value["komentarz"];?>

            </div>
          </div>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

      </div>
    </div>
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id;?>
">
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</div>
<?php
}
}
/* {/block 'top'} */
}
