<section class="row"> 
{foreach $wyniki as $key=>$w}
  <article class="col-12 m-1 p-3 border-bottom bg-light-50 product-size">
    <div class="row">
      <div class="col-lg-2 col-md-3">
        <a class="d-block img-mh-130" href="{$conf->action_url}productView&id={$w['IDprodukt']}"><img src="img/{$zdjecia[$key]}" class="img-fluid d-block mx-auto img-size product-img" alt="Zdjęcie produktu"></a>
      </div>
      <div class="col-lg-7 col-md-5">
        <a href="{$conf->action_url}productView&id={$w['IDprodukt']}" class="h4 m-2">{$w["nazwa"]}</a>
			  <ul class="m-0">
          <li>{$w["kategoria"]}</li>
        </ul>
      </div>
      <div class="col-lg-3 col-md-4">
         <span class="h3 m-2">Cena: {$w["cena"]} zł</span>
         <a href="{$conf->action_url}addToCart&id={$w['IDprodukt']}" class="btn btn-success btn-block m-2" role="button" aria-pressed="true">Dodaj do koszyka</a>
         {if $w["srednia_ocen"] != 0}
         <span class="m-2">Ocena: {$w["srednia_ocen"]}/5 ({$ilosc_opinii[$key]})</span>
         {else}
         <span class="m-2">Ocena: brak</span>
         {/if}
         <span class="m-2">Dostępna ilość: {$w["dostepna_ilosc"]}szt.</span>
      </div>
    </div>
  </article>
{/foreach}
</section>
<br>
<div class="btn-toolbar mb-2" role="toolbar" style="justify-content: center; display: flex;" aria-label="Toolbar with button groups">
{if $ilosc == 0}
  <span class="h4 m-2">Brak produktów spełniających wybrane kryteria :(</span>
{/if}
{if $strony > 1}
    {$s}
{/if}
</div>