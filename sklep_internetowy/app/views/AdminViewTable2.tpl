<table class="table table-hover bg-white-80">
	<thead>
		<tr>
			<th class= tabelka>ID</th>
            <th class= tabelka>Zdjecie</th>
            <th class= tabelka>Nazwa</th>
            <th class= tabelka>Kategoria</th>
            <th class= tabelka>Ilość sztuk</th>
            <th class= tabelka>Czy dostępny?</th>
            <th class= tabelka>Cena</th>
			<th class= tabelka>Poprzednia cena</th>
			<th class= tabelka>Data obowiązywania poprzedniej ceny</th>
            <th class= tabelka>Edycja</th>
            <th class= tabelka>Usuwanie</th>
		</tr>
    </thead>

	<tbody>
	{foreach $produkty as $key=>$p}
		{strip}
			<tr>
				<th>{$p["IDprodukt"]}</th>
		    	<th class="d-block img-mh-130"><img src="img/{$zdjecia[$key]}" class="img-fluid d-block mx-auto product-img" alt="Zdjecie produktu"></th>
		    	<th>{$p["nazwa"]}</th>
		    	<th>{$p["kategoria"]}</th>
				<th>{$p["dostepna_ilosc"]}</th>
				<th>{$p["czy_dostepny"]}</th>
				<th>{$p["cena"]}zł</th>
				<th>{$p["poprzednia_cena"]} (zł)</th>
				<th>{$p["data_obow_poprz_ceny"]}</th>
				<th>
			    	<a class="btn btn-block btn-primary" href="{$conf->action_url}productEdit&id={$p['IDprodukt']}" role="button">Edytuj</a>
				</th>
				<th>
			    	<a class="btn btn-block btn-danger" href="{$conf->action_url}productDelete&id={$p['IDprodukt']}" role="button">Usuń</a>
				</th>
			</tr>
		{/strip}
	{/foreach}
	</tbody>
</table>