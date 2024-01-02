{extends file="main.tpl"}
{block name=top}
<div class="d-flex flex-column align-items-center bg-white-80 p-2">
  <form id="search-form" class="pure-form pure-form-stacked" onsubmit="ajaxPostForm('search-form','{$conf->action_root}purchasedProductsViewPart','table'); return false;">
	  <div class="form-group mb-2">
		  <legend>Zakupione produkty</legend>
		  <fieldset>
			  <input type="text" placeholder="Wyszukaj produkt" name="sf_zakupiony" value="{$searchForm->zakupiony_produkt}"/>
      	  </fieldset>
		  <button type="submit" name="submit" class="btn btn-primary mb-2 ml-2">Wyszukaj</button>
	  </div>
  </form>
</div>
{/block}

{block name=bottom}
<div id="table" class="container">
	{include file="PurchasedProductsViewTable.tpl"} 
</div>
{/block}