{extends file="main.tpl"}
{block name=top}
<div class="pos-f-t">
	{if $aktualna_kategoria != NULL}
		<span class="h5 m-2">Kategoria: {$aktualna_kategoria}</span>
	{/if}
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
                      			<a class="d-block {$category[0]} p-2" href="{$conf->action_url}productsList&kategoria=p">Wszystkie podzespoły</a>
                    		</li>
                    		<li class="list-group-item p-0 text-center">
                      			<a class="d-block {$category[1]} p-2" href="{$conf->action_url}productsList&kategoria=1">Karty graficzne</a>
                    		</li>
                    		<li class="list-group-item p-0 text-center">
                     			<a class="d-block {$category[2]} p-2" href="{$conf->action_url}productsList&kategoria=2">Procesory</a>
                   			</li>
                    		<li class="list-group-item p-0 text-center">
                      			<a class="d-block {$category[3]} p-2" href="{$conf->action_url}productsList&kategoria=3">Pamięci RAM</a>
                    		</li>
                    		<li class="list-group-item p-0 text-center">
                      			<a class="d-block {$category[4]} p-2" href="{$conf->action_url}productsList&kategoria=4">Płyty głowne</a>
                    		</li>
                    		<li class="list-group-item p-0 text-center">
                      			<a class="d-block {$category[5]} p-2" href="{$conf->action_url}productsList&kategoria=5">Obudowy</a>
                    		</li>
                    		<li class="list-group-item p-0 text-center">
                      			<a class="d-block {$category[6]} p-2" href="{$conf->action_url}productsList&kategoria=6">Zasilacze</a>
                    		</li>
                    		<li class="list-group-item p-0 text-center">
                      			<a class="d-block {$category[7]} p-2" href="{$conf->action_url}productsList&kategoria=7">Dyski SSD</a>
                    		</li>
                    		<li class="list-group-item p-0 text-center">
                      			<a class="d-block {$category[8]} p-2" href="{$conf->action_url}productsList&kategoria=8">Dyski HDD</a>
                    		</li>
                  		</ul>
                	</div>
                	<div class="col-md-4">
                  		<ul class="list-group list-group-flush">
                    		<li class="list-group-item list-group-item-info">Urządzenia przenośne</li>
                    		<li class="list-group-item p-0 text-center">
                      			<a class="d-block {$category[22]} p-2" href="{$conf->action_url}productsList&kategoria=u">Wszystkie urządzenia przenośne</a>
                    		</li>
                    		<li class="list-group-item p-0 text-center">
                      			<a class="d-block {$category[9]} p-2" href="{$conf->action_url}productsList&kategoria=9">Smartfony</a>
                    		</li>
                    		<li class="list-group-item p-0 text-center">
                      			<a class="d-block {$category[10]} p-2" href="{$conf->action_url}productsList&kategoria=10">Smartwatche</a>
                    		</li>
                   			<li class="list-group-item p-0 text-center">
                      			<a class="d-block {$category[11]} p-2" href="{$conf->action_url}productsList&kategoria=11">Smartbandy</a>
                    		</li>
                    		<li class="list-group-item p-0 text-center">
                      			<a class="d-block {$category[12]} p-2" href="{$conf->action_url}productsList&kategoria=12">Tablety</a>
                    		</li>
							<li class="list-group-item p-0 text-center">
                      			<a class="d-block {$category[13]} p-2" href="{$conf->action_url}productsList&kategoria=13">Czytniki ebook</a>
                    		</li>
                  		</ul>
                	</div>
					<div class="col-md-4">
                  		<ul class="list-group list-group-flush">
                    		<li class="list-group-item list-group-item-info">Urządzenia peryferyjne</li>
                    		<li class="list-group-item p-0 text-center">
                      			<a class="d-block {$category[23]} p-2" href="{$conf->action_url}productsList&kategoria=up">Wszystkie urządzenia peryferyjne</a>
                    		</li>
                    		<li class="list-group-item p-0 text-center">
                      			<a class="d-block {$category[14]} p-2" href="{$conf->action_url}productsList&kategoria=14">Monitory</a>
                    		</li>
                    		<li class="list-group-item p-0 text-center">
                      			<a class="d-block {$category[15]} p-2" href="{$conf->action_url}productsList&kategoria=15">Drukarki</a>
                    		</li>
                   			<li class="list-group-item p-0 text-center">
                      			<a class="d-block {$category[16]} p-2" href="{$conf->action_url}productsList&kategoria=16">Myszki</a>
                    		</li>
                    		<li class="list-group-item p-0 text-center">
                      			<a class="d-block {$category[17]} p-2" href="{$conf->action_url}productsList&kategoria=17">Klawiatury</a>
                    		</li>
							<li class="list-group-item p-0 text-center">
                      			<a class="d-block {$category[18]} p-2" href="{$conf->action_url}productsList&kategoria=18">Słuchawki</a>
                    		</li>
							<li class="list-group-item p-0 text-center">
                      			<a class="d-block {$category[19]} p-2" href="{$conf->action_url}productsList&kategoria=19">Głośniki</a>
                    		</li>
							<li class="list-group-item p-0 text-center">
                      			<a class="d-block {$category[20]} p-2" href="{$conf->action_url}productsList&kategoria=20">Mikrofony</a>
                    		</li>
							<li class="list-group-item p-0 text-center">
                      			<a class="d-block {$category[21]} p-2" href="{$conf->action_url}productsList&kategoria=21">Kamerki internetowe</a>
                    		</li>
                  		</ul>
                	</div>
                	<div class="col-md-12">
                  		<ul class="list-group list-group-flush">
                    		<li class="list-group-item p-0 text-center">
                      			<a class="btn btn-primary btn-block mb-2" href="{$conf->action_url}productsList&kategoria=all" role="button">Pokaż wszystkie produkty</a>
                    		</li>
                  		</ul>
                	</div>
              	</div>
            </div>
        </div>
    </div>
</div>

<div class="d-flex flex-column align-items-center bg-white-80 p-2">
 	<form id="search-form" class="pure-form pure-form-aligned" onsubmit="ajaxPostForm('search-form','{$conf->action_root}productsListPart','table'); return false;">
	  	<div class="form-group mb-2 text-center">
		  	<legend>Lista produktów</legend>
		  	<fieldset>
				<input style="height:40px; width:210px; display:inline-block" type="text" placeholder="Wyszukaj produkt" name="sf_nazwa" value="{$searchForm->nazwa}"/>
				<button type="submit" name="submit" class="btn btn-primary" style="height:40px; width:95px">Wyszukaj</button>
      	 	</fieldset>
	  	</div>
  	</form>

	<form id="sort-form" class="pure-form pure-form-aligned bottom-margin" onsubmit="ajaxPostForm('sort-form','{$conf->action_root}productsListPart','table'); return false;">
    	<div class="form-group mb-2">
    		<label for="sortowanie" class="sr-only">Sortuj</label>
        	<select style="height:40px; width:210px; display:inline-block" name="sortowanie" id="sortowanie" value="{$searchForm->sortowanie}">
            	<option {$select[0]} value="0">Sortowanie domyślne</option>
            	<option {$select[1]} value="1">Po cenie: od najniższej</option>
            	<option {$select[2]} value="2">Po cenie: od najwyższej</option>
            	<option {$select[3]} value="3">Po nazwie: od A do Z</option>
            	<option {$select[4]} value="4">Po nazwie: od Z do A</option>
				<option {$select[5]} value="5">Po ocenie: od najlepszej</option>
				<option {$select[6]} value="6">Po ocenie: od najgorszej</option>
        	</select>
			<button type="submit" name="submit" class="btn btn-primary" style="height:40px; width:95px">Sortuj</button>
    	</div>
	</form>
</div>
{/block}

{block name=bottom}
<div id="table" class="container">
	{include file="ProductsListTable.tpl"}
</div>
{/block}