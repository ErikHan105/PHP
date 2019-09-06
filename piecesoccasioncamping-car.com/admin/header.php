<?php

include "version.php";
include "class.update.php";

$update = new Update();
$reponse = $update->getUpdateAvaible($version);

if(isset($_REQUEST['changelangue']))
{
	$changelangue = $_REQUEST['changelangue'];
	updateConfig("langue_administration",$changelangue);
}

$langue = getConfig("langue_administration");

if($reponse)
{
	if($langue == 'fr')
	{
		$title = '1 Mise à jour disponible';
	}
	if($langue == 'en')
	{
		$title = '1 Update available';
	}
	if($langue == 'it')
	{
		$title = '1 aggiornamento disponibile';
	}
	if($langue == 'bg')
	{
		$title = '1 Налична актуализация';
	}
	$icon = '<div class="icon-update">1</div>';
}
else
{
	if($langue == 'fr')
	{
		$title = 'Aucune mise à jour disponible';
	}
	if($langue == 'en')
	{
		$title = 'No update available';
	}
	if($langue == 'it')
	{
		$title = 'Nessun aggiornamento disponibile';
	}
	if($langue == 'bg')
	{
		$title = 'Няма налична актуализация';
	}
	$icon = '';
}

if($langue == 'fr')
{
	$btn_voir_le_site = "Voir le site";
	$btn_aide = "Aide";
	$btn_logout = "Se déconnecter";
}
if($langue == 'en')
{
	$btn_voir_le_site = "See the website";
	$btn_aide = "Help";
	$btn_logout = "Sign out";
}
if($langue == 'it')
{
	$btn_voir_le_site = "Vedi il sito web";
	$btn_aide = "Aiuto";
	$btn_logout = "Esci";
}
if($langue == 'bg')
{
	$btn_voir_le_site = "Вижте сайта";
	$btn_aide = "помощ";
	$btn_logout = "Изход";
}

?>
<header>
	<div class="logo">
		<img src="<?php echo $url_script; ?>/images/mini-logo-pas.png"> v.<?php echo $version; ?>
	</div>
	<div class="menu">
		<ul>
			<li>
				<?php
				if($langue == 'fr')
				{
					?>
					<a href="javascript:void(0);"><img src="images/fr-flag-icon.png" title="Français"></a>
					<?php
				}
				if($langue == 'en')
				{
					?>
					<a href="javascript:void(0);"><img src="images/en-flag-icon.png" title="English"></a>
					<?php
				}
				if($langue == 'it')
				{
					?>
					<a href="javascript:void(0);"><img src="images/it-flag-icon.png" title="Italiano"></a>
					<?php
				}
				if($langue == 'bg')
				{
					?>
					<a href="javascript:void(0);"><img src="images/bg-flag-icon.png" title="български"></a>
					<?php
				}
				?>
				<ul>
					<li><a href="?changelangue=fr"><img src="images/fr-flag-icon.png" title="Français"></a></li>
					<li><a href="?changelangue=en"><img src="images/en-flag-icon.png" title="English"></a></li>
					<li><a href="?changelangue=it"><img src="images/it-flag-icon.png" title="Italiano"></a></li>
					<li><a href="?changelangue=bg"><img src="images/bg-flag-icon.png" title="български"></a></li>
				</ul>
			</li>
			<li><a href="maj.php"><?php echo $icon; ?><img src="images/update-icon.png" title="<?php echo $title; ?>"></a></li>
			<li><a href="<?php echo $url_script; ?>" target="websitepage"><img src="images/loupe-icon.png" title="<?php echo $btn_voir_le_site; ?>"></a></li>
			<li><a href="logout.php"><img src="images/logout-icon.png" title="<?php echo $btn_logout; ?>"></a></li>
		</ul>
	</div>
</header>