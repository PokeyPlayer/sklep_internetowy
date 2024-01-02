<?php
/* Smarty version 3.1.30, created on 2023-11-03 12:33:20
  from "C:\xampp\htdocs\sklep_internetowy\app\views\AdminView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6544da80adae32_32923412',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '75b883a648c490bde2289d3230db169456c4ab68' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sklep_internetowy\\app\\views\\AdminView.tpl',
      1 => 1698942727,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
    'file:AdminViewTable.tpl' => 1,
    'file:AdminViewTable2.tpl' => 1,
  ),
),false)) {
function content_6544da80adae32_32923412 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5470356616544da80ad62d7_72092790', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17106931276544da80ada9a1_21255711', 'bottom');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_5470356616544da80ad62d7_72092790 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="d-flex flex-column align-items-center bg-white-80 p-2">
	<form id="search-form" class="pure-form pure-form-aligned" onsubmit="ajaxPostForm('search-form','<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
adminViewPart','table'); return false;">
		<div class="form-group mb-2">
			<h3>Zarządzanie użytkownikami</h3>
			<fieldset>
				<input type="text" placeholder="Wyszukaj użytkownika" name="sf_uzytkownik" value="<?php echo $_smarty_tpl->tpl_vars['searchForm2']->value->uzytkownik;?>
" />
			</fieldset>
			<button type="submit" class="btn btn-primary mb-2">Wyszukaj</button>
		</div>
	</form>
</div>	
<?php
}
}
/* {/block 'top'} */
/* {block 'bottom'} */
class Block_17106931276544da80ada9a1_21255711 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="container">
  <section class="row">
      <div id="table" class="table-responsive">
	  	<?php $_smarty_tpl->_subTemplateRender("file:AdminViewTable.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

      </div>
  </section>
  <br>
  <hr>
  <br>

  <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
addProduct" method="post" enctype="multipart/form-data" class="pure-form pure-form-aligned bottom-margin">
    <fieldset>
		<div class="row g-3">
    		<div class="col-lg-4 offset-lg-4 rounded-top text-center pt-3 pr-3 pl-3 bg-light-50">
				<h3>Dodawanie produktów</h3>
			</div>
			<div class="col-lg-8 pr-3 pl-3 bg-light-50">
    			<div class="form-group">
					<label for="nazwa">Nazwa produktu: </label>
					<input id="nazwa" type="text" class="form-control" style="height:40px" name="nazwa" placeholder="Podaj nazwę produktu" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->nazwa;?>
" />
				</div>
			</div>

			<div class="col-lg-4 pr-3 pl-3 bg-light-50">
				<div class="form-group">
            		<label for="kategoria">Kategoria produktu:</label>
            		<select class="form-control" style="height:40px" id="kategoria" name="kategoria" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->kategoria;?>
">
						<option value="0">--wybierz--</option>
            			<optgroup label="Podzespoły komputerowe">
            				<option value="1">Karty graficzne</option>
            				<option value="2">Procesory</option>
           					<option value="3">Pamięć RAM</option>
           					<option value="4">Płyty główne</option>
            				<option value="5">Obudowy</option>
            				<option value="6">Zasilacze</option>
            				<option value="7">Dyski SSD</option>
            				<option value="8">Dyski HDD</option>
            			</optgroup>
						<optgroup label="Smartfony i smartwatche">
            				<option value="9">Smartfony</option>
            				<option value="10">Smartwatche</option>
           					<option value="11">Smartbandy</option>
           					<option value="12">Tablety</option>
            				<option value="13">Czytniki ebook</option>
            			</optgroup>
						<optgroup label="Urządzenia peryferyjne">
            				<option value="14">Monitory</option>
            				<option value="15">Drukarki</option>
           				 	<option value="16">Myszki</option>
           				 	<option value="17">Klawiatury</option>
            			 	<option value="18">Słuchawki</option>
            			 	<option value="19">Głośniki</option>
            			 	<option value="20">Mikrofony</option>
            			 	<option value="21">Kamerki internetowe</option>
            			</optgroup>
            		</select>
          		</div>
			</div>

			<div class="col-lg-12 pr-3 pl-3 bg-light-50">
    			<div class="form-group">
					<label for="opis">Opis produktu: </label>
					<textarea id="opis" type="text" class="form-control" name="opis" placeholder="Podaj opis produktu"  rows="10" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->opis;?>
"></textarea>
				</div>
			</div>

			<div class="col-lg-6 pr-3 pl-3 bg-light-50">
    			<div class="form-group">
					<label for="ilosc">Dostęna ilość produktu: </label>
					<input id="ilosc" type="number" class="form-control" style="height:40px" name="ilosc" placeholder="Podaj ilość produktu" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->ilosc;?>
"/>
				</div>
			</div>

			<div class="col-lg-6 pr-3 pl-3 bg-light-50">
    			<div class="form-group">
					<label for="cena">Cena produktu: </label>
					<input id="cena" type="number" class="form-control" style="height:40px" name="cena" placeholder="Podaj cenę produktu" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->cena;?>
" />
				</div>
			</div>

			<div class="form-group">
      			<label for="zdjecie1">Prześlij zdjęcie 1</label>
      			<input type="file" name="zdjecie1" class="form-control-file" id="zdjecie1" />
    		</div>
			<div class="form-group">
      			<label for="zdjecie2">Prześlij zdjęcie 2</label>
      			<input type="file" name="zdjecie2" class="form-control-file" id="zdjecie2" />
    		</div>
			<div class="form-group">
      			<label for="zdjecie3">Prześlij zdjęcie 3</label>
      			<input type="file" name="zdjecie3" class="form-control-file" id="zdjecie3" />
    		</div>

			<div class="form-group form-check">
				<label class="form-check-label" for="czy_dostepny">Czy udostępnić produkt w sklepie?</label>
        		<input type="checkbox" name="czy_dostepny" class="form-check-input" id="czy_dostepny" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->czy_dostepny;?>
">
      		</div>
			
			<div class="col-lg-12 rounded-bottom pb-3 pr-3 pl-3 bg-light-50">
				<div class="d-grid gap-2">
					<input class="btn btn-primary btn-block mb-2" type="submit" name="submit" value="Dodaj produkt" />
				</div>
			</div>		
		</div>	
	</fieldset>
  </form>
  <hr>
  <br>

  <div class="d-flex flex-column align-items-center bg-white-80 p-2">
	<form id="search-form3" class="pure-form pure-form-aligned" onsubmit="ajaxPostForm('search-form3','<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
adminViewPart2','table2'); return false;">
		<div class="form-group mb-2">
			<h3>Zarządzanie produktami</h3>
			<fieldset>
				<input type="text" placeholder="Wyszukaj produkt" name="sf_produkt" value="<?php echo $_smarty_tpl->tpl_vars['searchForm3']->value->produkt;?>
" />
			</fieldset>
			<button type="submit" class="btn btn-primary mb-2">Wyszukaj</button>
		</div>
	</form>
  </div>	
  <section class="row">
    <div id="table2" class="table-responsive">
	  	<?php $_smarty_tpl->_subTemplateRender("file:AdminViewTable2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    </div>
  </section>
</div>
<?php
}
}
/* {/block 'bottom'} */
}
