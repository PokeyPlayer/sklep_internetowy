<?php
/* Smarty version 3.1.30, created on 2023-11-03 12:36:47
  from "C:\xampp\htdocs\sklep_internetowy\app\views\ProductEditView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6544db4f171957_22407508',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '132ea47b653ccfd5f71c8c04d9417902a18a9e51' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sklep_internetowy\\app\\views\\ProductEditView.tpl',
      1 => 1698939251,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_6544db4f171957_22407508 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9120173896544db4f171463_32158772', 'top');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_9120173896544db4f171463_32158772 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="container">
	<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
productEditSave" method="post"  class="pure-form pure-form-aligned bottom-margin">
    	<fieldset>
			<div class="row g-1">
        		<div class="col-lg-4 offset-lg-4 rounded-top text-center pt-3 pr-3 pl-3 bg-light-50">
			   		<h2>Edycja produktu</h2><br>
		    	</div>

        		<div class="col-lg-4 offset-lg-2 pr-3 pl-3 bg-light-50">
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
							<option value="<?php echo $_smarty_tpl->tpl_vars['form']->value->kategoria;?>
"><?php echo $_smarty_tpl->tpl_vars['form']->value->kategoria_nazwa;?>
</option>
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

				<div class="col-lg-8 offset-lg-2 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
						<label for="opis">Opis produktu: </label>
						<textarea id="opis" type="text" class="form-control" name="opis" placeholder="Podaj opis produktu"  rows="10"><?php echo $_smarty_tpl->tpl_vars['form']->value->opis;?>
</textarea>
					</div>
				</div>

				<div class="col-lg-4 offset-lg-2 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
						<label for="ilosc">Dostęna ilość produktu: </label>
						<input id="ilosc" type="number" class="form-control" style="height:40px" name="ilosc" placeholder="Podaj ilość produktu" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->ilosc;?>
"/>
					</div>
				</div>

				<div class="col-lg-4 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
						<label for="cena">Cena produktu: </label>
						<input id="cena" type="number" class="form-control" style="height:40px" name="cena" placeholder="Podaj cenę produktu" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->cena;?>
" />
					</div>
				</div>

				<div class="col-lg-4 offset-lg-2 pr-3 pl-3 bg-light-50">
					<div class="form-group form-check">
						<label class="form-check-label" for="czy_dostepny">Czy udostępnić produkt w sklepie?</label>
        				<input type="checkbox" name="czy_dostepny" class="form-check-input" id="czy_dostepny" <?php echo $_smarty_tpl->tpl_vars['form']->value->czy_dostepny ? "checked" : '';?>
 >
      				</div>
				</div>

        		<div class="col-lg-8 offset-lg-2 rounded-bottom pb-3 pr-3 pl-3 bg-light-50">
					<div class="d-grid gap-1"><br>
            			<input type="submit" class="btn btn-primary btn-block mb-2" value="Edytuj produkt">
            			<a class="btn btn-secondary btn-block mb-2" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
adminView" role="button">Powrót</a>
          			</div>
        		</div>
		    	<input type="hidden" name="IDprodukt" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->IDprodukt;?>
">
      		</div>
    	</fieldset>
	</form>		
</div>
<?php
}
}
/* {/block 'top'} */
}
