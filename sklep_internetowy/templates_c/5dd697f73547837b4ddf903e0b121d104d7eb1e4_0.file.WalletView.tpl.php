<?php
/* Smarty version 3.1.30, created on 2023-11-03 12:21:07
  from "C:\xampp\htdocs\sklep_internetowy\app\views\WalletView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6544d7a35d9c01_70922602',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5dd697f73547837b4ddf903e0b121d104d7eb1e4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sklep_internetowy\\app\\views\\WalletView.tpl',
      1 => 1698940360,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_6544d7a35d9c01_70922602 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14497239036544d7a35d9613_90885481', 'top');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_14497239036544d7a35d9613_90885481 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="container">
	<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
topUpWallet" method="post"  class="pure-form pure-form-aligned bottom-margin">
    	<fieldset>
			<div class="row g-2">
       			<div class="col-lg-4 offset-lg-4 rounded-top text-center pt-3 pr-3 pl-3 bg-light-50">
			   		<h2>Portfel elektroniczny</h2><br>
		    	</div>

        		<div class="col-lg-2 offset-lg-3 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
						<label for="rodzaj_karty">Rodzaj karty: </label>
						<select class="form-control" style="height:40px" name="rodzaj_karty" id="rodzaj_karty">
             				<option value="0">--wybierz--</option>
             				<option value="1">Visa</option>
             				<option value="2">MasterCard</option>
             				<option value="3">AmericanExpress</option>
           				</select>
				  	</div>
			 	</div>

			 	<div class="col-lg-3 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
					  	<label for="nr_karty">Numer karty: </label>
					  	<input type="number" class="form-control" style="height:40px" name="nr_karty" id="nr_karty" placeholder="Wpisz numer swojej karty" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->nr_karty;?>
" minlength="16" maxlength="16">
				  	</div>
			  	</div>

			  	<div class="col-lg-1 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
					  	<label for="nr_cvv">Numer CVV: </label>
					 	<input type="number" class="form-control" style="height:40px" name="nr_cvv" id="nr_cvv" placeholder="Wpisz numer CVV swojej karty" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->nr_cvv;?>
" minlength="3" maxlength="3">
				  	</div>
			  	</div>

			  	<div class="col-lg-2 offset-lg-3 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
						<label for="dzien_wygasniecia">Dzień wygaśniecia karty: </label>
						<select class="form-control" style="height:40px" name="dzien_wygasniecia" id="dzien_wygasniecia">
             				<option value="0">--wybierz--</option>
             				<?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 31+1 - (1) : 1-(31)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
						 		<option value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option>
							<?php }
}
?>

           				</select>
					</div>
			  	</div>

			  	<div class="col-lg-2 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
						<label for="miesiac_wygasniecia">Miesiąc wygaśniecia karty: </label>
						<select class="form-control" style="height:40px" name="miesiac_wygasniecia" id="miesiac_wygasniecia">
              				<option value="0">--wybierz--</option>
              				<?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 12+1 - (1) : 1-(12)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
						 		<option value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option>
							<?php }
}
?>

            			</select>
					</div>
			  	</div>

			  	<div class="col-lg-2 pr-3 pl-3 bg-light-50">
    				<div class="form-group">
						<label for="rok_wygasniecia">Rok wygaśniecia karty: </label>
						<select class="form-control" style="height:40px" name="rok_wygasniecia" id="rok_wygasniecia">
              				<option value="0">--wybierz--</option>
              				<?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 2100+1 - (2023) : 2023-(2100)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 2023, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
						 		<option value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option>
							<?php }
}
?>

            			</select>
				  	</div>
			  	</div>

			  	<div class="col-lg-2 offset-lg-3 pr-3 pl-3 bg-light-50">
    		  		<div class="form-group">
					  	<label for="imie">Imię: </label>
					  	<input  type="text" class="form-control" style="height:40px" id="imie" name="imie" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->imie;?>
" readonly/>
				  	</div>
			  	</div>

			  	<div class="col-lg-2 pr-3 pl-3 bg-light-50">
    		  		<div class="form-group">
					  	<label for="nazwisko">Nazwisko: </label>
					  	<input  type="text" class="form-control" style="height:40px" id="nazwisko" name="nazwisko" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->nazwisko;?>
" readonly/>
				  	</div>
			  	</div>

			  	<div class="col-lg-2 pr-3 pl-3 bg-light-50">
    		  		<div class="form-group">
					  	<label for="nr_telefonu">Numer telefonu: </label>
					  	<input  type="text" class="form-control" style="height:40px" id="nr_telefonu" name="nr_telefonu" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->nr_telefonu;?>
" readonly/>
				  	</div>
			  	</div>

			  	<div class="col-lg-2 offset-lg-3 pr-3 pl-3 bg-light-50">
    		  		<div class="form-group">
					  	<label for="miejscowosc">Miejscowość: </label>
					  	<input  type="text" class="form-control" style="height:40px" id="miejscowosc" name="miejscowosc" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->miejscowosc;?>
" readonly/>
				  	</div>
			  	</div>

			  	<div class="col-lg-2 pr-3 pl-3 bg-light-50">
    		  		<div class="form-group">
					  	<label for="kod_pocztowy">Kod pocztowy: </label>
					  	<input  type="text" class="form-control" style="height:40px" id="kod_pocztowy" name="kod_pocztowy" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->kod_pocztowy;?>
" readonly/>
				  	</div>
			  	</div>

			  	<div class="col-lg-2 pr-3 pl-3 bg-light-50">
    		  		<div class="form-group">
					 	<label for="email">Email: </label>
					 	<input  type="text" class="form-control" style="height:40px" id="email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->email;?>
" readonly/>
				  	</div>
			  	</div>

			  	<div class="col-lg-2 offset-lg-3 pr-3 pl-3 bg-light-50">
    		  		<div class="form-group">
					  	<label for="kwota_doladowania">Kwota doładowania (zł): </label>
					  	<input type="number" class="form-control" style="height:40px" name="kwota_doladowania" id="kwota_doladowania" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->kwota_doladowania;?>
" placeholder="Wpisz kwotę np. 25">
				  	</div>
			  	</div>
			
        		<div class="col-lg-6 offset-lg-3 rounded-bottom pb-3 pr-3 pl-3 bg-light-50">
					<div class="d-grid gap-1">
            			<input type="submit" class="btn btn-primary btn-block mb-2" value="Doładuj portfel">
            			<a class="btn btn-secondary btn-block mb-2" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
productsList" role="button">Powrót</a>
          			</div>
        			<br>
					<h5>Swoje dane możesz zmienić w profilu użytkownika.</h5>
        		</div>
      		</div>
    	</fieldset>
	</form>		
</div>
<?php
}
}
/* {/block 'top'} */
}
