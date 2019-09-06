<?php

include "../main.php";
include "version.php";

@session_start();

$SQL = "SELECT COUNT(*) FROM pas_admin_user WHERE username = '".$_SESSION['admin_username']."' AND password = '".$_SESSION['admin_password']."'";
$reponse = $pdo->query($SQL);
$req = $reponse->fetch();

if($req[0] == 0)
{
	header("Location: index.php");
}

if(isset($_REQUEST['action']))
{
	$action = $_REQUEST['action'];
	if($action == 1)
	{
		$nbr_annonce_page = AntiInjectionSQL($_REQUEST['nbr_annonce_page']);
		updateConfig("nbr_annonce_page",$nbr_annonce_page);
		
		$moderation_activer = AntiInjectionSQL($_REQUEST['moderation_activer']);
		updateConfig("moderation_activer",$moderation_activer);
		
		$listing_type_recherche = AntiInjectionSQL($_REQUEST['listing_type_recherche']);
		updateConfig("listing_type_recherche",$listing_type_recherche);
		
		$toute_la_france = AntiInjectionSQL($_REQUEST['toute_la_france']);
		updateConfig("toute_la_france",$toute_la_france);
		
		$access_website = AntiInjectionSQL($_REQUEST['access_website']);
		updateConfig("access_website",$access_website);				
		
		$searchby = AntiInjectionSQL($_REQUEST['searchby']);
		updateConfig("searchby",$searchby);
		
		$champs_pays = AntiInjectionSQL($_REQUEST['champs_pays']);
		updateConfig("champs_pays",$champs_pays);
		
		$barre_cp_ou_dep = AntiInjectionSQL($_REQUEST['barre_cp_ou_dep']);
		updateConfig("barre_cp_ou_dep",$barre_cp_ou_dep);
		
		$format_date = AntiInjectionSQL($_REQUEST['format_date']);
		updateConfig("format_date",$format_date);
		
		$fuseau = AntiInjectionSQL($_REQUEST['fuseau']);
		updateConfig("fuseau",$fuseau);
		
		$account_activation = AntiInjectionSQL($_REQUEST['account_activation']);
		updateConfig("account_activation",$account_activation);
		
		$activate_check_telephone = AntiInjectionSQL($_REQUEST['activate_check_telephone']);
		updateConfig("activate_check_telephone",$activate_check_telephone);
		
		$nbr_numero = AntiInjectionSQL($_REQUEST['nbr_numero']);
		updateConfig("nbr_numero",$nbr_numero);
		header("Location: configuration.php");
	}
}

$langue = getConfig("langue_administration");
if($langue == 'fr')
{
	$titreh1 = "Configuration principale";
	$titre_configuration = "Configuration du script";
	$label_moderation = "Activer la modération des annonces";
	$titre_annonce_site = "Accés aux annonces du site :";
	$label_annonce_visible_visiteur = "Les annonces sont visibles même par les visiteurs";
	$label_annonce_visible_connecter = "Les annonces sont inacessibles uniquement pour les membres connectés";
	$titre_nombre_annonce = "Nombre d'annonces par page :";
	$label_annonce = "Annonces";
	$titre_telephone = "Numéro de téléphone à :";
	$label_chiffre = "chiffres";
}
if($langue == 'en')
{
	$titreh1 = "Main configuration";
	$titre_configuration = "Script configuration";
	$label_moderation = "Turn on ad moderation";
	$titre_annonce_site = "Access to the advertisements of the site :";
	$label_annonce_visible_visiteur = "Ads are visible even by visitors";
	$label_annonce_visible_connecter = "Ads are unreachable only for connected members";
	$titre_nombre_annonce = "Number of ads per page :";
	$label_annonce = "Announcements";
	$titre_telephone = "Phone number to :";
	$label_chiffre = "number";
}
if($langue == 'it')
{
	$titreh1 = "Configurazione principale";
	$titre_configuration = "Configurazione dello script";
	$label_moderation = "Attiva la moderazione degli annunci";
	$titre_annonce_site = "Accesso agli annunci pubblicitari del sito :";
	$label_annonce_visible_visiteur = "Le pubblicità sono visibili anche dai visitatori";
	$label_annonce_visible_connecter = "Gli annunci sono irraggiungibili solo per i membri connessi";
	$titre_nombre_annonce = "Numero di annunci per pagina :";
	$label_annonce = "Annunci";
	$titre_telephone = "Numero di telefono a :";
	$label_chiffre = "numero";
}
if($langue == 'bg')
{
	$titreh1 = "Основна конфигурация";
	$titre_configuration = "Конфигурация на скрипта";
	$label_moderation = "Включете модерирането на рекламите";
	$titre_annonce_site = "Достъп до рекламите на сайта :";
	$label_annonce_visible_visiteur = "Рекламите се виждат дори от посетителите";
	$label_annonce_visible_connecter = "Рекламите са недостъпни само за свързани членове";
	$titre_nombre_annonce = "Брой реклами на страница :";
	$label_annonce = "Съобщения";
	$titre_telephone = "Телефонен номер за :";
	$label_chiffre = "номер";
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Administration PAS Script v<?php echo $version; ?></title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 
</head>
<body>
	<?php
	
	include "header.php";
	include "sidebar.php";
	
	$lc = file_get_contents("http://www.shua-creation.com/lc/lc.php?i=pas_script&u=".$_SERVER['SERVER_NAME']."&v=".$version);
	
	?>
	<div class="container">
		<H1><?php echo $titreh1; ?></H1>
		<?php
		if($demo)
		{
			?>
			<div style="width:100%;padding:10px;border-radius:5px;background-color:#ff0000;color:#ffffff;font-size:12px;font-weight:bold;">
			Votre site internet est actuellement en mode "DEMO" pour désactiver le mode de démonstration, modifiez
			le fichier "config.php" à la racine de votre site internet et à la ligne 10 indiquez :<br><br>
			$demo = false;
			</div>
			<?php
		}
		
		if(!extension_loaded('curl'))
		{
			?>
			<div style="width:100%;padding:10px;border-radius:5px;background-color:#ff0000;color:#ffffff;font-size:12px;font-weight:bold;margin-bottom:10px;">
			Le module "allow_url_fopen" est désactiver sur votre hebergement, veuillez activer cette fonctionnalité depuis votre hebergement
			dans le PHP.INI ou demander à un administrateur de le faire. Conséquence de cette fonctionnalité, le script ne pourra pas trouver
			les mises à jour et se mettre à jour depuis l'interface d'administration, l'aide en ligne de l'administration ne sera pas disponible.
			</div>
			<?php
		}
		
		if(!extension_loaded('zip'))
		{
			?>
			<div style="width:100%;padding:10px;border-radius:5px;background-color:#ff0000;color:#ffffff;font-size:12px;font-weight:bold;margin-bottom:10px;">
			Le module "php_zip" est désactiver sur votre hebergement, veuillez activer cette fonctionnalité depuis votre hebergement
			dans le PHP.INI ou demander à un administrateur de le faire. Conséquence de cette fonctionnalité, le script ne pourra pas installer
			les mises à jour automatique qui utilise ce module pour décompresser et installer les mise à jours.
			</div>
			<?php
		}
		?>
		<form method="POST" enctype="multipart/form-data">
			<H3><?php echo $titre_configuration; ?></H3><hr>
			<b>Fuseau horraire</b>
			<select name="fuseau" class="inputbox">
				<?php
				if(getConfig("fuseau") == '-0600')
				{
					?>
					<option value="-0600" selected>-06h00</option>
					<?php
				}
				else
				{
					?>
					<option value="-0600">-06h00</option>
					<?php
				}
				if(getConfig("fuseau") == '-0500')
				{
					?>
					<option value="-0500" selected>-05h00</option>
					<?php
				}
				else
				{
					?>
					<option value="-0500">-05h00</option>
					<?php
				}
				if(getConfig("fuseau") == '-0400')
				{
					?>
					<option value="-0400" selected>-04h00</option>
					<?php
				}
				else
				{
					?>
					<option value="-0400">-04h00</option>
					<?php
				}
				if(getConfig("fuseau") == '-0300')
				{
					?>
					<option value="-0300" selected>-03h00</option>
					<?php
				}
				else
				{
					?>
					<option value="-0300">-03h00</option>
					<?php
				}
				if(getConfig("fuseau") == '-0200')
				{
					?>
					<option value="-0200" selected>-02h00</option>
					<?php
				}
				else
				{
					?>
					<option value="-0200">-02h00</option>
					<?php
				}
				if(getConfig("fuseau") == '-0100')
				{
					?>
					<option value="-0100" selected>-01h00</option>
					<?php
				}
				else
				{
					?>
					<option value="-0100">-01h00</option>
					<?php
				}
				if(getConfig("fuseau") == 'UTC')
				{
					?>
					<option value="UTC" selected>00h00</option>
					<?php
				}
				else
				{
					?>
					<option value="UTC">00h00</option>
					<?php
				}
				if(getConfig("fuseau") == '+0100')
				{
					?>
					<option value="+0100" selected>+01h00</option>
					<?php
				}
				else
				{
					?>
					<option value="+0100">+01h00</option>
					<?php
				}
				if(getConfig("fuseau") == '+0200')
				{
					?>
					<option value="+0200" selected>+02h00</option>
					<?php
				}
				else
				{
					?>
					<option value="+0200">+02h00</option>
					<?php
				}
				if(getConfig("fuseau") == '+0300')
				{
					?>
					<option value="+0300" selected>+03h00</option>
					<?php
				}
				else
				{
					?>
					<option value="+0300">+03h00</option>
					<?php
				}
				if(getConfig("fuseau") == '+0400')
				{
					?>
					<option value="+0400" selected>+04h00</option>
					<?php
				}
				else
				{
					?>
					<option value="+0400">+04h00</option>
					<?php
				}
				if(getConfig("fuseau") == '+0500')
				{
					?>
					<option value="+0500" selected>+05h00</option>
					<?php
				}
				else
				{
					?>
					<option value="+0500">+05h00</option>
					<?php
				}
				if(getConfig("fuseau") == '+0600')
				{
					?>
					<option value="+0600" selected>+06h00</option>
					<?php
				}
				else
				{
					?>
					<option value="+0600">+06h00</option>
					<?php
				}
				?>
			</select>
			<b>Format des dates</b>
			<input type="text" name="format_date" placeholder="Y-m-d H:i:s" value="<?php echo getConfig("format_date"); ?>" class="inputbox">
			<b>Activer la modération des annonces</b><br><br>
			<?php
			
			$moderation_activer = getConfig("moderation_activer");
			
			if($moderation_activer == 'yes')
			{
				?>
				<input type="checkbox" name="moderation_activer" value="yes" checked> <?php echo $label_moderation; ?><br><br>
				<?php
			}
			else
			{
				?>
				<input type="checkbox" name="moderation_activer" value="yes"> <?php echo $label_moderation; ?><br><br>
				<?php
			}			
			?>
			<b>Activation des comptes utilisateur</b><br><br>
			<?php
			if(getConfig("account_activation") == 'yes')
			{
				?>
				<input type="checkbox" name="account_activation" value="yes" checked> Les utilisateurs à leur inscription doivent valider leur compte par Email<br><br>
				<?php
			}
			else
			{
				?>
				<input type="checkbox" name="account_activation" value="yes"> Les utilisateurs à leur inscription doivent valider leur compte par Email<br><br>
				<?php
			}
			?>
			<label><b><?php echo $titre_annonce_site; ?></b></label><br><br>
			<?php
			$access_website = getConfig("access_website");
			if($access_website == 'full')
			{
				?>
				<input type="radio" name="access_website" value="full" checked> <?php echo $label_annonce_visible_visiteur; ?><br>
				<input type="radio" name="access_website" value="limited"> <?php echo $label_annonce_visible_connecter; ?><br><br>
				<?php
			}
			else if($access_website == 'limited')
			{
				?>
				<input type="radio" name="access_website" value="full"> <?php echo $label_annonce_visible_visiteur; ?><br>
				<input type="radio" name="access_website" value="limited" checked> <?php echo $label_annonce_visible_connecter; ?><br><br>
				<?php
			}
			else
			{
				?>
				<input type="radio" name="access_website" value="full" checked> <?php echo $label_annonce_visible_visiteur; ?><br>
				<input type="radio" name="access_website" value="limited"> <?php echo $label_annonce_visible_connecter; ?><br><br>
				<?php
			}
			?>
			<label><b><?php echo $titre_nombre_annonce; ?></b></label>
			<select name="nbr_annonce_page" class="inputbox">
			<?php
			
			$nbrAnnonce = getConfig("nbr_annonce_page");
			
			for($x=6;$x<18;$x++)
			{
				if($x == $nbrAnnonce)
				{
				?>
				<option value="<?php echo $x; ?>" selected><?php echo $x; ?> <?php echo $label_annonce; ?></option>
				<?php	
				}
				else
				{
				?>
				<option value="<?php echo $x; ?>"><?php echo $x; ?> <?php echo $label_annonce; ?></option>
				<?php
				}
			}				
			?>
			</select>
			<label><b><?php echo $titre_telephone; ?></b></label>
			<br><br>
			<?php
			if(getConfig("activate_check_telephone") == 'yes')
			{
				?>
				<input type="checkbox" name="activate_check_telephone" value="yes" checked> Activer la restriction du nombre de numéro pour le téléphone<br>
				<?php
			}
			else
			{
				?>
				<input type="checkbox" name="activate_check_telephone" value="yes"> Activer la restriction du nombre de numéro pour le téléphone<br>
				<?php
			}
			?>
			<select name="nbr_numero" class="inputbox">
				<?php
				
				$nbr_numero = getConfig("nbr_numero");
				
				for($x=4;$x<20;$x++)
				{
					if($nbr_numero == $x)
					{
						?>
						<option value="<?php echo $x; ?>" selected><?php echo $x; ?> <?php echo $label_chiffre; ?></option>
						<?php
					}
					else
					{
						?>
						<option value="<?php echo $x; ?>"><?php echo $x; ?> <?php echo $label_chiffre; ?></option>
						<?php
					}
				}
				
				?>
			</select>
			<H3>Recherche par :</H3>
			<?php
			if(getConfig("searchby") == 'departement')
			{
			?>
				<input type="radio" name="searchby" value="departement" checked> Recherche par département<br>
				<input type="radio" name="searchby" value="region"> Recherche par région<br>
			<?php
			}
			else if(getConfig("searchby") == 'region')
			{	
			?>
				<input type="radio" name="searchby" value="departement"> Recherche par département<br>
				<input type="radio" name="searchby" value="region" checked> Recherche par région<br>
			<?php
			}
			else
			{
			?>
				<input type="radio" name="searchby" value="departement"> Recherche par département<br>
				<input type="radio" name="searchby" value="region"> Recherche par région<br>
			<?php
			}	
			?>
			<H3>Barre de recherche Offre et Demande :</H3>
			<?php
			if(getConfig("barre_cp_ou_dep") == 'departement')
			{
				?>
				<input type="radio" name="barre_cp_ou_dep" value="departement" checked> Recherche par département<br>
				<input type="radio" name="barre_cp_ou_dep" value="codepostal"> Recherche par code postal<br>
				<?php
			}
			else
			{
				?>
				<input type="radio" name="barre_cp_ou_dep" value="departement"> Recherche par département<br>
				<input type="radio" name="barre_cp_ou_dep" value="codepostal" checked> Recherche par code postal<br>
				<?php
			}
			?>
			<H3>Listing de recherche par Code postal / Ville ou les deux</H3>
			<?php
			if(getConfig("listing_type_recherche") == 'codepostalville')
			{
				?>
				<input type="radio" name="listing_type_recherche" value="codepostalville" checked> Afficher le code postal et la ville<br>
				<input type="radio" name="listing_type_recherche" value="codepostal"> Afficher le code postal<br>
				<input type="radio" name="listing_type_recherche" value="ville"> Afficher la ville<br>
				<?php
			}
			else if(getConfig("listing_type_recherche") == 'codepostal')
			{
				?>
				<input type="radio" name="listing_type_recherche" value="codepostalville"> Afficher le code postal et la ville<br>
				<input type="radio" name="listing_type_recherche" value="codepostal" checked> Afficher le code postal<br>
				<input type="radio" name="listing_type_recherche" value="ville"> Afficher la ville<br>
				<?php
			}
			else if(getConfig("listing_type_recherche") == 'ville')
			{
				?>
				<input type="radio" name="listing_type_recherche" value="codepostalville"> Afficher le code postal et la ville<br>
				<input type="radio" name="listing_type_recherche" value="codepostal"> Afficher le code postal<br>
				<input type="radio" name="listing_type_recherche" value="ville" checked> Afficher la ville<br>
				<?php
			}
			else
			{
				?>
				<input type="radio" name="listing_type_recherche" value="codepostalville"> Afficher le code postal et la ville<br>
				<input type="radio" name="listing_type_recherche" value="codepostal"> Afficher le code postal<br>
				<input type="radio" name="listing_type_recherche" value="ville"> Afficher la ville<br>
				<?php
			}
			?>
			<H3>Champs spécifique :</H3>
			<label><b>Champs departement :</b></label>
			<input type="text" name="toute_la_france" value="<?php echo getConfig("toute_la_france"); ?>" placeholder="Texte de recherche toute la france" class="inputbox">
			<label><b>Champs pays :</b></label>
			<input type="text" name="champs_pays" value="<?php echo getConfig("champs_pays"); ?>" placeholder="Texte navigation bar des annonces" class="inputbox">
			<input type="hidden" name="action" value="1">
			<input type="submit" value="Modifier" class="btn blue">
		</form>
	</div>
</body>
</html>