<?php
/* Smarty version 3.1.30, created on 2023-11-17 11:32:47
  from "C:\xampp\htdocs\sklep_internetowy\app\views\ProductsList.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6557414fd67553_27846750',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eec5194d3b659a9f24405c5bd10deb2b49c4512c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sklep_internetowy\\app\\views\\ProductsList.tpl',
      1 => 1700217094,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
    'file:ProductsListTable.tpl' => 1,
  ),
),false)) {
function content_6557414fd67553_27846750 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13150991116557414fd62b23_51668899', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6812977006557414fd660e4_36332726', 'bottom');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_13150991116557414fd62b23_51668899 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="pos-f-t">
	<?php if ($_smarty_tpl->tpl_vars['aktualna_kategoria']->value != NULL) {?>
		<span class="h5 m-2">Kategoria: <?php echo $_smarty_tpl->tpl_vars['aktualna_kategoria']->value;?>
</span>
	<?php }?>
    <nav class="navbar navbar-light">
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="">Kategorie</span>
        </button>
    </nav>
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="p-4">
            <div class="container">
              	<div class="row">
                	<div class="col-md-4">
                  		<ul class="list-group list-group-flush">
                   			<li class="list-group-item list-group-item-info">Podzespoły komputerowe</li>
                    		<li class="list-group-item p-0 text-center">
                      			<a class="d-block <?php echo $_smarty_tpl->tpl_vars['category']->value[0];?>
 p-2" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
productsList&kategoria=p">Wszystkie podzespoły</a>
                    		</li>
                    		<li class="list-group-item p-0 text-center">
                      			<a class="d-block <?php echo $_smarty_tpl->tpl_vars['category']->value[1];?>
 p-2" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
productsList&kategoria=1">Karty graficzne</a>
                    		</li>
                    		<li class="list-group-item p-0 text-center">
                     			<a class="d-block <?php echo $_smarty_tpl->tpl_vars['category']->value[2];?>
 p-2" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
productsList&kategoria=2">Procesory</a>
                   			</li>
                    		<li class="list-group-item p-0 text-center">
                      			<a class="d-block <?php echo $_smarty_tpl->tpl_vars['category']->value[3];?>
 p-2" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
productsList&kategoria=3">Pamięci RAM</a>
                    		</li>
                    		<li class="list-group-item p-0 text-center">
                      			<a class="d-block <?php echo $_smarty_tpl->tpl_vars['category']->value[4];?>
 p-2" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
productsList&kategoria=4">Płyty głowne</a>
                    		</li>
                    		<li class="list-group-item p-0 text-center">
                      			<a class="d-block <?php echo $_smarty_tpl->tpl_vars['category']->value[5];?>
 p-2" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
productsList&kategoria=5">Obudowy</a>
                    		</li>
                    		<li class="list-group-item p-0 text-center">
                      			<a class="d-block <?php echo $_smarty_tpl->tpl_vars['category']->value[6];?>
 p-2" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
productsList&kategoria=6">Zasilacze</a>
                    		</li>
                    		<li class="list-group-item p-0 text-center">
                      			<a class="d-block <?php echo $_smarty_tpl->tpl_vars['category']->value[7];?>
 p-2" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
productsList&kategoria=7">Dyski SSD</a>
                    		</li>
                    		<li class="list-group-item p-0 text-center">
                      			<a class="d-block <?php echo $_smarty_tpl->tpl_vars['category']->value[8];?>
 p-2" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
productsList&kategoria=8">Dyski HDD</a>
                    		</li>
                  		</ul>
                	</div>
                	<div class="col-md-4">
                  		<ul class="list-group list-group-flush">
                    		<li class="list-group-item list-group-item-info">Urządzenia przenośne</li>
                    		<li class="list-group-item p-0 text-center">
                      			<a class="d-block <?php echo $_smarty_tpl->tpl_vars['category']->value[22];?>
 p-2" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
productsList&kategoria=u">Wszystkie urządzenia przenośne</a>
                    		</li>
                    		<li class="list-group-item p-0 text-center">
                      			<a class="d-block <?php echo $_smarty_tpl->tpl_vars['category']->value[9];?>
 p-2" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
productsList&kategoria=9">Smartfony</a>
                    		</li>
                    		<li class="list-group-item p-0 text-center">
                      			<a class="d-block <?php echo $_smarty_tpl->tpl_vars['category']->value[10];?>
 p-2" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
productsList&kategoria=10">Smartwatche</a>
                    		</li>
                   			<li class="list-group-item p-0 text-center">
                      			<a class="d-block <?php echo $_smarty_tpl->tpl_vars['category']->value[11];?>
 p-2" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
productsList&kategoria=11">Smartbandy</a>
                    		</li>
                    		<li class="list-group-item p-0 text-center">
                      			<a class="d-block <?php echo $_smarty_tpl->tpl_vars['category']->value[12];?>
 p-2" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
productsList&kategoria=12">Tablety</a>
                    		</li>
							<li class="list-group-item p-0 text-center">
                      			<a class="d-block <?php echo $_smarty_tpl->tpl_vars['category']->value[13];?>
 p-2" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
productsList&kategoria=13">Czytniki ebook</a>
                    		</li>
                  		</ul>
                	</div>
					<div class="col-md-4">
                  		<ul class="list-group list-group-flush">
                    		<li class="list-group-item list-group-item-info">Urządzenia peryferyjne</li>
                    		<li class="list-group-item p-0 text-center">
                      			<a class="d-block <?php echo $_smarty_tpl->tpl_vars['category']->value[23];?>
 p-2" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
productsList&kategoria=up">Wszystkie urządzenia peryferyjne</a>
                    		</li>
                    		<li class="list-group-item p-0 text-center">
                      			<a class="d-block <?php echo $_smarty_tpl->tpl_vars['category']->value[14];?>
 p-2" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
productsList&kategoria=14">Monitory</a>
                    		</li>
                    		<li class="list-group-item p-0 text-center">
                      			<a class="d-block <?php echo $_smarty_tpl->tpl_vars['category']->value[15];?>
 p-2" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
productsList&kategoria=15">Drukarki</a>
                    		</li>
                   			<li class="list-group-item p-0 text-center">
                      			<a class="d-block <?php echo $_smarty_tpl->tpl_vars['category']->value[16];?>
 p-2" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
productsList&kategoria=16">Myszki</a>
                    		</li>
                    		<li class="list-group-item p-0 text-center">
                      			<a class="d-block <?php echo $_smarty_tpl->tpl_vars['category']->value[17];?>
 p-2" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
productsList&kategoria=17">Klawiatury</a>
                    		</li>
							<li class="list-group-item p-0 text-center">
                      			<a class="d-block <?php echo $_smarty_tpl->tpl_vars['category']->value[18];?>
 p-2" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
productsList&kategoria=18">Słuchawki</a>
                    		</li>
							<li class="list-group-item p-0 text-center">
                      			<a class="d-block <?php echo $_smarty_tpl->tpl_vars['category']->value[19];?>
 p-2" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
productsList&kategoria=19">Głośniki</a>
                    		</li>
							<li class="list-group-item p-0 text-center">
                      			<a class="d-block <?php echo $_smarty_tpl->tpl_vars['category']->value[20];?>
 p-2" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
productsList&kategoria=20">Mikrofony</a>
                    		</li>
							<li class="list-group-item p-0 text-center">
                      			<a class="d-block <?php echo $_smarty_tpl->tpl_vars['category']->value[21];?>
 p-2" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
productsList&kategoria=21">Kamerki internetowe</a>
                    		</li>
                  		</ul>
                	</div>
                	<div class="col-md-12">
                  		<ul class="list-group list-group-flush">
                    		<li class="list-group-item p-0 text-center">
                      			<a class="btn btn-primary btn-block mb-2" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
productsList&kategoria=all" role="button">Pokaż wszystkie produkty</a>
                    		</li>
                  		</ul>
                	</div>
              	</div>
            </div>
        </div>
    </div>
</div>

<div class="d-flex flex-column align-items-center bg-white-80 p-2">
 	<form id="search-form" class="pure-form pure-form-aligned" onsubmit="ajaxPostForm('search-form','<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
productsListPart','table'); return false;">
	  	<div class="form-group mb-2 text-center">
		  	<legend>Lista produktów</legend>
		  	<fieldset>
				<input style="height:40px; width:210px; display:inline-block" type="text" placeholder="Wyszukaj produkt" name="sf_nazwa" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->nazwa;?>
"/>
				<button type="submit" name="submit" class="btn btn-primary" style="height:40px; width:95px">Wyszukaj</button>
      	 	</fieldset>
	  	</div>
  	</form>

	<form id="sort-form" class="pure-form pure-form-aligned bottom-margin" onsubmit="ajaxPostForm('sort-form','<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
productsListPart','table'); return false;">
    	<div class="form-group mb-2">
    		<label for="sortowanie" class="sr-only">Sortuj</label>
        	<select style="height:40px; width:210px; display:inline-block" name="sortowanie" id="sortowanie" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->sortowanie;?>
">
            	<option <?php echo $_smarty_tpl->tpl_vars['select']->value[0];?>
 value="0">Sortowanie domyślne</option>
            	<option <?php echo $_smarty_tpl->tpl_vars['select']->value[1];?>
 value="1">Po cenie: od najniższej</option>
            	<option <?php echo $_smarty_tpl->tpl_vars['select']->value[2];?>
 value="2">Po cenie: od najwyższej</option>
            	<option <?php echo $_smarty_tpl->tpl_vars['select']->value[3];?>
 value="3">Po nazwie: od A do Z</option>
            	<option <?php echo $_smarty_tpl->tpl_vars['select']->value[4];?>
 value="4">Po nazwie: od Z do A</option>
				<option <?php echo $_smarty_tpl->tpl_vars['select']->value[5];?>
 value="5">Po ocenie: od najlepszej</option>
				<option <?php echo $_smarty_tpl->tpl_vars['select']->value[6];?>
 value="6">Po ocenie: od najgorszej</option>
        	</select>
			<button type="submit" name="submit" class="btn btn-primary" style="height:40px; width:95px">Sortuj</button>
    	</div>
	</form>
</div>
<?php
}
}
/* {/block 'top'} */
/* {block 'bottom'} */
class Block_6812977006557414fd660e4_36332726 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div id="table" class="container">
	<?php $_smarty_tpl->_subTemplateRender("file:ProductsListTable.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</div>
<?php
}
}
/* {/block 'bottom'} */
}
