{extends file="main.tpl"}
{block name=top}
<div class="container">
  {foreach $wyniki as $w}
    <div class="row bg-white-80 p-2">
      <div class="col-lg-12">
        <h2>{$w["nazwa"]}</h2>
        <h5>Kategoria: {$w["kategoria"]}</h5>
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
              <img class="product-img2" src="img/{$zdjecia[0]}" alt="Pierwszy slajd">
            </div>
            <div class="carousel-item text-center text-center">
              <img class="product-img2" src="img/{$zdjecia[1]}" alt="Drugi slajd">
            </div>
            <div class="carousel-item text-center text-center">
              <img class="product-img2" src="img/{$zdjecia[2]}" alt="Trzeci slajd">
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
        <span class="h4 m-2">Cena: {$w["cena"]} zł</span><br>
        {if $w["srednia_ocen"] != 0}
        <span class="m-2">Ocena: {$w["srednia_ocen"]}/5</span>
        {else}
        <span class="m-2">Ocena: brak ocen</span>
        {/if}
        <br>
        <span class="m-2">Dostępna ilość: {$w["dostepna_ilosc"]}szt.</span>     
      </div>
      <div class="col-lg-3">
        <div class="d-grid gap-3">
          <a class="btn btn-primary btn-block" href="{$conf->action_url}productsList" role="button">Wróć do przeglądania</a>
          <a class="btn btn-success btn-block" href="{$conf->action_url}addToCart&id={$w['IDprodukt']}" role="button">Dodaj do koszyka</a>
          <a class="btn btn-primary btn-block" href="{$conf->action_url}addComment&id={$w['IDprodukt']}" role="button">Oceń produkt</a>
        </div>
      </div>
      <h3>Opis</h3>
      <div style="background-color: #ADD8E6; font-size: 18px;" class="col-lg-12 rounded">
        <span class="p-4 d-block">{$w["opis"]}</span>
      </div>
      <div class="col-lg-12">
        <hr>
      </div>
      <div class="col-lg-12">
        <h3>Opinie ({$ilosc_opinii})</h3>
        {if $ilosc_opinii == 0}
          <span class="h5 m-2">Produkt nie ma jeszcze opinii.</span>
        {/if}
        {foreach $wyniki2 as $w2} 
          <div class="border rounded p-3 bg-gray-10 my-2">
            <div>
              {if ({$w2["IDuzytkownik"]})}
                <span class="font-weight-bold">{$w2["imie"]} ocenił produkt {$w2["ocena"]}/5</span>
              {else}
                <span class="font-weight-bold">Były użytkownik ocenił produkt {$w2["ocena"]}/5</span>
              {/if}
              {if (count($conf->roles)>0 && $smarty.session.IDuzytkownik==1 && ($conf->roles['admin']))}
                <a class="btn btn-danger btn-sm" href="{$conf->action_url}commentDelete&idk={$w2['IDkomentarz']}" role="button">usuń</a>
              {/if}
            </div>
            <div>
              {$w2["komentarz"]}
            </div>
          </div>
        {/foreach}
      </div>
    </div>
    <input type="hidden" name="id" value="{$form->id}">
  {/foreach}
</div>
{/block}