<?php
/* Smarty version 3.1.30, created on 2023-11-03 12:14:54
  from "C:\xampp\htdocs\sklep_internetowy\app\views\AddComment.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6544d62ed12d27_28413043',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e360191c5abb67ed5a4d88dfa850423e89f65b57' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sklep_internetowy\\app\\views\\AddComment.tpl',
      1 => 1699009398,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_6544d62ed12d27_28413043 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14871706636544d62ed12154_10825513', 'top');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_14871706636544d62ed12154_10825513 extends Smarty_Internal_Block
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

      <div class="col-lg-7">
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
productView&id=<?php echo $_smarty_tpl->tpl_vars['w']->value['IDprodukt'];?>
" class="btn btn-primary btn-block">Wróć do produktu</a>
        <form class="pure-form pure-form-aligned" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
saveComment" method="post">
          <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id;?>
">
          <div class="form-group">
            <label for="ocena">Ocena:</label>
            <select class="form-control" style="height:40px" id="ocena" name="ocena">
              <option value="0">--Wybierz--</option>
              <option value="1">1 - niedostatecznie</option>
              <option value="2">2 - dopuszczająco</option>
              <option value="3">3 - dostatecznie</option>
              <option value="4">4 - dobrze</option>
              <option value="5">5 - bardzo dobrze</option>
            </select>
          </div>
          <div class="form-group">
            <label for="komentarz">Komentarz:</label>
            <textarea class="form-control" id="komentarz" name="komentarz" aria-describedby="komentarzPomoc" rows="4"></textarea>
            <small id="komentarzPomoc" class="form-text text-muted">Komentarz nie jest obowiązkowy, możesz dodać samą ocenę. Pamiętaj jednak, że nie możesz dodać komentarza bez oceny</small>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Dodaj opinię</button><br>
        </form>
      </div>
      <h3>Opis</h3>
      <div style="background-color: #ADD8E6; font-size: 18px;" class="col-lg-12 rounded">
        <span class="p-4 d-block"><?php echo $_smarty_tpl->tpl_vars['w']->value["opis"];?>
</span>
      </div>
    </div>
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id;?>
">
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->IDuzytkownik;?>
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
