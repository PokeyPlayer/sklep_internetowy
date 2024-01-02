<table class="table table-hover bg-white-80">
    <thead>
	    <tr>
		    <th>ID</th>
		    <th>Imię</th>
		    <th>Nazwisko</th>
		    <th>Email</th>
            <th>Edycja</th>
            <th>Usuwanie</th>
			<th>Blokuj/Odblokuj</th>
	    </tr>
    </thead>

    <tbody>
    {foreach $uzytkownicy as $u}
    {strip}
	    <tr>
		    <td>{$u["IDuzytkownik"]}</td>
		    <td>{$u["imie"]}</td>
		    <td>{$u["nazwisko"]}</td>
		    <td>{$u["email"]}</td>
		    <td>
			    <a class="btn btn-block btn-primary" href="{$conf->action_url}userEditAdmin&id={$u['IDuzytkownik']}" role="button">Edytuj</a>
		    </td>
            <td>
                <a class="btn btn-block btn-danger" href="{$conf->action_url}userDelete&id={$u['IDuzytkownik']}" role="button">Usuń</a>
            </td>
			{if {$u['blokada']==0}}
			<td>
			    <a class="btn btn-block btn-danger" href="{$conf->action_url}userBlock&id={$u['IDuzytkownik']}" role="button">Zablokuj</a>
		    </td>
			{else}
			<td>
			    <a class="btn btn-block btn-success" href="{$conf->action_url}userUnlock&id={$u['IDuzytkownik']}" role="button">Odblokuj</a>
		    </td>
			{/if}
	    </tr>
    {/strip}
    {/foreach}
    </tbody>
</table>