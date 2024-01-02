{extends file="main.tpl"}
{block name=top}
<div class="container">
  <section class="row">
    <div class="col-lg-4 offset-lg-4 rounded-top text-center pt-3 pr-3 pl-3 bg-light-50">
				<h2>Koszyk</h2><br>
	  </div>
    <div class="table-responsive">
      <table class="table table-hover bg-white-80">
        <thead>
	        <tr>
            <th>Nazwa</th>
            <th>Zdjęcie</th>
            <th>Kategoria</th>
            <th>Ilość sztuk</th>
            <th>Cena</th>
            <th>Usuń</th>
          </tr>
        </thead>
        
        <tbody>  
        {foreach $wyniki as $key=>$w}
        {strip}
          <tr>
            <th>{$w["nazwa"]}</th>
		        <th class="d-block img-mh-130"><img src="img/{$zdjecia[$key]}" class="img-fluid d-block mx-auto product-img" alt="Zdjecie produktu"></th>
		        <th>{$w["kategoria"]}</th>
		        <th>
              <form action="{$conf->action_root}quantityChange" method="post"  class="pure-form pure-form-aligned bottom-margin">
                <input type="number" id="ilosc" class="form-control" name="ilosc" style="width:15em" value="{$w["ilosc"]}">
                <input type="hidden" name="id" value="{$w["IDprodukt"]}"><br>
                <input type="submit" class="btn btn-primary btn-block mt-2" value="OK">
              </form>
            </th>
            <th>{$w["cena"]}zł</th>
            <th>
              <a class="btn btn-block btn-danger" href="{$conf->action_url}deleteFromCart&id={$w['IDprodukt']}" role="button">Usuń</a>
            </th>
          </tr>
        {/strip}
        <input type="hidden" name="id" value="{$form->id}">
        {/foreach}
        </tbody>
      </table>
      {if $ilosc_produktow == 0}
        <h3>Brak produktów w koszyku</h3><br>
      {else}
        <h3>Wartość koszyka: {$wartosc_koszyka}zł</h3><br>
      {/if}
    </div>
    <br>
    <form action="{$conf->action_root}order" method="post"  class="pure-form pure-form-aligned bottom-margin">
      <div class="rounded border p-3 bg-light-50 mb-3">
        <div class="row">
          <div class="col-md-9">
            <h2> Adres dostawy:</h2>
          </div>
          <div class="col-md-3">
            <a href="{$conf->action_url}addAddressShow" class="btn btn-primary btn-block">Dodaj nowy adres</a>
          </div>
        
          <div class="col-md-4">
            <div class="list-group mt-3">
            {foreach $adresy as $a}
              <label class="list-group-item list-group-item-action flex-column align-items-start" for="adres{$a["IDadres"]}">
                <div class="d-flex w-100 justify-content-between">
                  <div class="form-check mb-1">
                    <input class="form-check-input" type="radio" name="adres" id="adres{$a["IDadres"]}" value="{$a["IDadres"]}">
                  </div>
                  <div class="text-right">
                    <a class="btn btn-primary btn-sm" href="{$conf->action_url}editAddress&IDadres={$a['IDadres']}" role="button">edytuj</a>
                    <a class="btn btn-danger btn-sm" href="{$conf->action_url}deleteAddress&IDadres={$a['IDadres']}" role="button">usuń</a>
                  </div>
                </div>
                <p class="mb-1">
                  {ucfirst({$a["imie"]})} {ucfirst({$a["nazwisko"]})}
                  <br>
                  {$a["ulica"]} {$a["nr_posesji"]}/{$a["nr_lokalu"]}
                  <br>
                  {$a["kod_pocztowy"]} {$a["miejscowosc"]}
                  <br>
                  tel: {$a["numer_tel"]}
                </p>
              </label>
              <input type="hidden" name="IDadres" value="{$form->IDadres}">
            {/foreach}
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="rounded border p-3 bg-light-50">
        <h2>Sposób dostawy:</h2>
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <input type="radio" style="height:31px" id="sposob_dostawy" name="sposob_dostawy" value="1">
            </div>
          </div>
          <input type="text" class="form-control bg-white" style="color:black; height:45px;" value="Kurier" disabled>
        </div>

        <div class="input-group mt-2">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <input type="radio" style="height:31px" id="sposob_dostawy" name="sposob_dostawy" value="2">
            </div>
          </div>
          <input type="text" class="form-control bg-white" style="color:black; height:45px;" value="Poczta polska" disabled>
        </div>

        <div class="input-group mt-2">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <input type="radio" style="height:31px" id="sposob_dostawy" name="sposob_dostawy" value="3">
            </div>
          </div>
          <input type="text" class="form-control bg-white" style="color:black; height:45px;" value="Paczkomat" disabled>
        </div>

        <div class="input-group mt-2">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <input type="radio" style="height:31px" id="sposob_dostawy" name="sposob_dostawy" value="4">
            </div>
          </div>
          <input type="text" class="form-control bg-white" style="color:black; height:45px;" value="Paczka w Ruchu" disabled>
        </div>
      </div>
      <br><br>
      <div class="rounded border p-3 bg-light-50">
        <h2>Sposób płatności:</h2>
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <input type="radio" style="height:31px" id="sposob_platnosci" name="sposob_platnosci" value="1">
            </div>
          </div>
          <input type="text" class="form-control bg-white" style="color:black; height:45px;" value="Portfel elektroniczny" disabled>
        </div>
      </div>
      <br>
      <input type="hidden" id="suma" name="suma" value="{$wartosc_koszyka}">
      <input type="submit" class="btn btn-lg btn-primary btn-block mt-2" value="Zamów i zapłać">
    </form>
  </section>
</div>
{/block}