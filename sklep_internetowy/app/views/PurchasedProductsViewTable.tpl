<section class="row"> 
  {foreach $wyniki as $key=>$w}
    <article class="col-12 m-1 p-3 border-bottom bg-light-50 rounded product-size">
      <div class="row">
        <div class="col-lg-2 col-md-3">
          <img src="img/{$zdjecia[$key]}" class="img-fluid d-block mx-auto  product-img" alt="Zdjęcie produktu">
        </div>
        <div class="col-lg-5 col-md-5">
          <a href="{$conf->action_url}productView&id={$w['IDprodukt']}" class="h4 m-2">{$w["nazwa"]}</a>
			    <ul class="m-0">
            <li>{$w["kategoria"]}</li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-4">
          <span class="h6 m-2">Numer zamówienia: {$w["nr_zamowienia"]}</span>
          <br>
          <span class="m-2">Zakupiona ilość: {$w["ilosc"]}szt.</span>
          <br>
          {if $w["srednia_ocen"] != 0}
          <span class="m-2">Ocena produktu: {$w["srednia_ocen"]}/5 ({$ilosc_opinii[$key]})</span>
          {else}
          <span class="m-2">Ocena produktu: brak ocen</span>
          {/if}
          <br>
          <span class="m-2">Data zamówienia: {$w["data_zlozenia"]}</span>
        </div>  
        <div class="col-lg-2 col-md-4">
          <div class="d-grid gap-1">
            <a class="btn btn-primary btn-block mb-2" href="{$conf->action_url}productView&id={$w['IDprodukt']}" role="button">Przeglądaj produkt</a>
            <a class="btn btn-success btn-block mb-2" href="{$conf->action_url}addComment&id={$w['IDprodukt']}" role="button">Oceń produkt</a>
          </div>
        </div>
      </div>
    </article>
	{/foreach}
</section>
<br>
<div class="btn-toolbar mb-2" role="toolbar" style="justify-content: center; display: flex;" aria-label="Toolbar with button groups">
{if $ilosc_wynikow == -1}
  <span class="h4 m-2">Brak zakupionych produktów.</span>
{elseif $ilosc_wynikow == 0}
  <span class="h4 m-2">Brak wyszukiwanych zakupionych produktów :(</span>
{/if}
</div>