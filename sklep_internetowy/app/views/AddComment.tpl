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

      <div class="col-lg-7">
        <a href="{$conf->action_url}productView&id={$w['IDprodukt']}" class="btn btn-primary btn-block">Wróć do produktu</a>
        <form class="pure-form pure-form-aligned" action="{$conf->action_root}saveComment" method="post">
          <input type="hidden" name="id" value="{$form->id}">
          <div class="form-group">
            <label for="ocena">Ocena:</label>
            <select class="form-control" style="height:40px" id="ocena" name="ocena">
              <option value="0">--Wybierz--</option>
              <option value="1">1 - niedostatecznie</option>
              <option value="2">2 - dopuszczająco</option>
              <option value="3">3 - dostatecznie</option>
              <option value="4">4 - dobrze</option>
              <option value="5">5 - bardzo dobrze</option>
            </select>
          </div>
          <div class="form-group">
            <label for="komentarz">Komentarz:</label>
            <textarea class="form-control" id="komentarz" name="komentarz" aria-describedby="komentarzPomoc" rows="4"></textarea>
            <small id="komentarzPomoc" class="form-text text-muted">Komentarz nie jest obowiązkowy, możesz dodać samą ocenę. Pamiętaj jednak, że nie możesz dodać komentarza bez oceny</small>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Dodaj opinię</button><br>
        </form>
      </div>
      <h3>Opis</h3>
      <div style="background-color: #ADD8E6; font-size: 18px;" class="col-lg-12 rounded">
        <span class="p-4 d-block">{$w["opis"]}</span>
      </div>
    </div>
    <input type="hidden" name="id" value="{$form->id}">
    <input type="hidden" name="id" value="{$form->IDuzytkownik}">
  {/foreach}
</div>
{/block}