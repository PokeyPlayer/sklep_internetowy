<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta charset="utf-8"/>
	<title>MGM sklep internetowy</title>
	<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
	<link rel="stylesheet" href="{$conf->app_url}/css/style.css">
	<link rel="stylesheet" href="{$conf->app_url}/css/bootstrap.min.css">
	<script type="text/javascript" src="{$conf->app_url}/js/functions.js"></script>
	<script type="text/javascript" src="{$conf->app_url}/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.0/css/all.css">
</head>

<body style="margin: 20px;">
{$zmienna = "&page=1&sf_nazwa=&kategoria=all&sortowanie=0"}
<div class="pure-menu pure-menu-horizontal bottom-margin">
{if (count($conf->roles)>0 && $smarty.session.IDuzytkownik!=1 && ($conf->roles['user']))}
	<a class="pure-menu-heading pure-menu-link" href="{$conf->action_root}productsList{$zmienna}">
		<img src="img/logo2.svg" width="100" height="30" class="d-inline-block align-top" alt="logo strony">
	</a>
	<a href="{$conf->action_root}cartProducts" class="pure-menu-heading pure-menu-link"><i class="fa-solid fa-cart-shopping" style="color: #808080;"></i> Koszyk</a>
	<a href="{$conf->action_root}purchasedProductsView" class="pure-menu-heading pure-menu-link"><i class="fa-solid fa-clipboard-list" style="color: #808080;"></i> Zakupione produkty</a>
	<a href="{$conf->action_root}walletView" class="pure-menu-heading pure-menu-link"><i class="fa-solid fa-wallet" style="color: #808080;"></i> Portfel: {$smarty.session.stan_portfela} zł</a>
	<a href="{$conf->action_root}userProfileEdit" class="pure-menu-heading pure-menu-link"><i class="fa-solid fa-user" style="color: #808080;"></i> Profil</a>
	<a href="{$conf->action_root}logout" class="pure-menu-heading pure-menu-link"><i class="fa-solid fa-right-from-bracket" style="color: #808080;"></i> Wyloguj</a>
{elseif (count($conf->roles)>0 && $smarty.session.IDuzytkownik==1 && ($conf->roles['admin']))}
	<a class="pure-menu-heading pure-menu-link" href="{$conf->action_root}productsList{$zmienna}">
		<img src="img/logo2.svg" width="100" height="30" class="d-inline-block align-top" alt="logo strony">
	</a>
	<a href="{$conf->action_root}adminView" class="pure-menu-heading pure-menu-link"><i class="fa-solid fa-user-secret" style="color: #808080;"></i> Panel administracyjny</a>
	<a href="{$conf->action_root}logout" class="pure-menu-heading pure-menu-link"><i class="fa-solid fa-right-from-bracket" style="color: #808080;"></i> Wyloguj</a>
{else}	
	<a class="pure-menu-heading pure-menu-link" href="{$conf->action_root}productsList{$zmienna}">
		<img src="img/logo2.svg" width="100" height="30" class="d-inline-block align-top" alt="logo strony">
	</a>
	<a href="{$conf->action_root}loginShow" class="pure-menu-heading pure-menu-link"><i class="fa-solid fa-right-to-bracket" style="color: #808080;"></i> Logowanie</a>
	<a href="{$conf->action_root}registrationShow" class="pure-menu-heading pure-menu-link"><i class="fa-solid fa-user-plus" style="color: #808080;"></i> Rejestracja</a>
{/if}
</div>
<hr>

{block name=messages}
{if $messages->isError()}
	<div class="messages error">
		{foreach $messages->getErrors() as $msg}
		{strip}
			{$msg}
			<br>
		{/strip}
		{/foreach}
	</div>
{/if}

{if $messages->isInfo()}
	<div class="messages info">
		{foreach $messages->getInfos() as $msg}
		{strip}
			{$msg}
			<br>
		{/strip}
		{/foreach}
	</div>
{/if}
{/block}

{block name=top} {/block}

{block name=bottom} {/block}
<br><br>

{block name=footer}
<div class="footer text-center text-light">
	<p>© 2023 Sklep internetowy</p>
</div>
{/block}

</div>
</body>
</html>