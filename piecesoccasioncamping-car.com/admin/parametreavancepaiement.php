<?php
include "../config.php";
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
	
	/* Changement monétaire */
	if($action == 1)
	{
		$currency = $_REQUEST['currency'];
		updateConfig("currency",$currency);
		
		$currency_show = $_REQUEST['currency_show'];
		updateConfig("currency_show",$currency_show);
		
		$currency_position = $_REQUEST['currency_position'];
		updateConfig("currency_position",$currency_position);
		
		header("Location: parametreavancepaiement.php");
		exit;
	}
	
	/* Prix des annonces */
	if($action == 2)
	{
		$prix_urgente = $_REQUEST['prix_urgente'];
		updateConfig("prix_urgente",$prix_urgente);
		
		$prix_remonter_semaine = $_REQUEST['prix_remonter_semaine'];
		updateConfig("prix_remonter_semaine",$prix_remonter_semaine);
		
		$prix_remonter_mois = $_REQUEST['prix_remonter_mois'];
		updateConfig("prix_remonter_mois",$prix_remonter_mois);	

		$prix_annonce = $_REQUEST['prix_annonce'];
		updateConfig("prix_annonce",$prix_annonce);
		
		$prix_photo_supplementaire = $_REQUEST['prix_photo_supplementaire'];
		updateConfig("prix_photo_supplementaire",$prix_photo_supplementaire);
		
		header("Location: parametreavancepaiement.php");
		exit;
	}
	
	/* Activation des options des annonces */
	if($action == 3)
	{
		$annonce_classique_payante = $_REQUEST['annonce_classique_payante'];
		if($annonce_classique_payante == 'yes')
		{
			updateConfig("annonce_classique_payante",$annonce_classique_payante);
		}
		else
		{
			updateConfig("annonce_classique_payante","no");
		}
		
		$annonce_urgente_activer = $_REQUEST['annonce_urgente_activer'];
		if($annonce_urgente_activer == 'yes')
		{
			updateConfig("annonce_urgente_activer",$annonce_urgente_activer);
		}
		else
		{
			updateConfig("annonce_urgente_activer","no");
		}
		
		$annonce_remonter_semaine = $_REQUEST['annonce_remonter_semaine'];
		if($annonce_remonter_semaine == 'yes')
		{
			updateConfig("annonce_remonter_semaine",$annonce_remonter_semaine);
		}
		else
		{
			updateConfig("annonce_remonter_semaine","no");
		}
		
		$annonce_remonter_mois = $_REQUEST['annonce_remonter_mois'];
		if($annonce_remonter_mois == 'yes')
		{
			updateConfig("annonce_remonter_mois",$annonce_remonter_mois);
		}
		else
		{
			updateConfig("annonce_remonter_mois","no");
		}
		
		$pack_photo_activer = $_REQUEST['pack_photo_activer'];
		if($pack_photo_activer == 'yes')
		{
			updateConfig("pack_photo_activer",$pack_photo_activer);
		}
		else
		{
			updateConfig("pack_photo_activer","no");
		}
		
		header("Location: parametreavancepaiement.php");
		exit;
	}
	
	/* Compte professionel */
	if($action == 4)
	{
		$compte_pro_payant = $_REQUEST['compte_pro_payant'];
		if($compte_pro_payant == 'yes')
		{
			$compte_pro_payant = 'yes';
		}
		else
		{
			$compte_pro_payant = 'no';
		}
		
		$compte_pro_type_paiement = $_REQUEST['compte_pro_type_paiement'];
		updateConfig("compte_pro_type_paiement",$compte_pro_type_paiement);
		
		updateConfig("compte_pro_payant",$compte_pro_payant);
		
		$pro_paiement_price_unique = $_REQUEST['pro_paiement_price_unique'];
		updateConfig("pro_paiement_price_unique",$pro_paiement_price_unique);
		
		$pro_paiement_price_mois = $_REQUEST['pro_paiement_price_mois'];
		updateConfig("pro_paiement_price_mois",$pro_paiement_price_mois);
		
		$pro_paiement_price_annonces = $_REQUEST['pro_paiement_price_annonces'];
		updateConfig("pro_paiement_price_annonces",$pro_paiement_price_annonces);
		
		header("Location: parametreavancepaiement.php");
		exit;
	}
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
	
	?>
	<div class="container">
		<H1>Paramètres avancés des paiements</H1>
		<div class="info">
		Depuis cette interface vous pourrez régler tous les aspect monétaire des paiements.
		</div>
		<H2>Réglages monétaires</H2>
		<label>Transaction sur le site en :</label>
		<form>
		<select name="currency" class="inputbox">
		<?php
		$currency = getConfig("currency");
		if($currency == "EUR")
		{
			?>
			<option value="EUR" selected>Euro (€)</option>
			<?php
		}
		else
		{
			?>
			<option value="EUR">Euro (€)</option>
			<?php
		}
		if($currency == "USD")
		{
			?>
			<option value="USD" selected>Dollars US ($)</option>
			<?php
		}
		else
		{
			?>
			<option value="USD">Dollars US ($)</option>
			<?php
		}
		if($currency == "CAD")
		{
			?>
			<option value="CAD" selected>Dollars Canadien ($)</option>
			<?php
		}
		else
		{
			?>
			<option value="CAD">Dollars Canadien ($)</option>
			<?php
		}
		if($currency == "FCFA")
		{
			?>
			<option value="FCFA" selected>Franc CFA (FCFA)</option>
			<?php
		}
		else
		{
			?>
			<option value="FCFA">Franc CFA (FCFA)</option>
			<?php
		}
		if($currency == "CHF")
		{
			?>
			<option value="CHF" selected>Francs Suisse (CHF)</option>
			<?php
		}
		else
		{
			?>
			<option value="CHF">Francs Suisse (CHF)</option>
			<?php
		}
		if($currency == "GBP")
		{
			?>
			<option value="GBP" selected>Livre sterling (£)</option>
			<?php
		}
		else
		{
			?>
			<option value="GBP">Livre sterling (£)</option>
			<?php
		}
		if($currency == "AUD")
		{
			?>
			<option value="AUD" selected>Dollars Australien ($)</option>
			<?php
		}
		else
		{
			?>
			<option value="AUD">Dollars Australien ($)</option>
			<?php
		}
		if($currency == "BRL")
		{
			?>
			<option value="BRL" selected>Réal Brézilien (R$)</option>
			<?php
		}
		else
		{
			?>
			<option value="BRL">Réal Brézilien (R$)</option>
			<?php
		}
		if($currency == "DZD")
		{
			?>
			<option value="DZD" selected>Dinar Algérien (DA)</option>
			<?php
		}
		else
		{
			?>
			<option value="DZD">Dinar Algérien (DA)</option>
			<?php
		}
		if($currency == "TND")
		{
			?>
			<option value="TND" selected>Dinar Tunisien (DT)</option>
			<?php
		}
		else
		{
			?>
			<option value="TND">Dinar Tunisien (DT)</option>
			<?php
		}
		if($currency == "MAD")
		{
			?>
			<option value="MAD" selected>Dirham Marocain (MAD)</option>
			<?php
		}
		else
		{
			?>
			<option value="MAD">Dirham Marocain (MAD)</option>
			<?php
		}
		if($currency == "BGN")
		{
			?>
			<option value="BGN" selected>Leva Bulgare лв (BGN)</option>
			<?php
		}
		else
		{
			?>
			<option value="BGN">Leva Bulgare лв (BGN)</option>
			<?php
		}
		if($currency == "CNY")
		{
			?>
			<option value="CNY" selected>Yuan (¥)</option>
			<?php
		}
		else
		{
			?>
			<option value="CNY">Yuan (¥)</option>
			<?php
		}
		if($currency == "THB")
		{
			?>
			<option value="THB" selected>Baht Thalandais (฿)</option>
			<?php
		}
		else
		{
			?>
			<option value="THB">Baht Thalandais (฿)</option>
			<?php
		}
		if($currency == "TWD")
		{
			?>
			<option value="TWD" selected>New taïwan dollars (NT$)</option>
			<?php
		}
		else
		{
			?>
			<option value="TWD">New taïwan dollars (NT$)</option>
			<?php
		}
		
		?>
		</select>
		<label>Affichage des prix :</label>
		<select name="currency_show" class="inputbox">
		<?php
		if(getConfig("currency_show") == 1)
		{
			?>
			<option value="1" selected>10000 €</option>
			<?php
		}
		else
		{
			?>
			<option value="1">10000 €</option>
			<?php
		}
		if(getConfig("currency_show") == 2)
		{
			?>
			<option value="2" selected>10000,00 €</option>
			<?php
		}
		else
		{
			?>
			<option value="2">10000,00 €</option>
			<?php
		}
		if(getConfig("currency_show") == 3)
		{
			?>
			<option value="3" selected>10000.00 €</option>
			<?php
		}
		else
		{
			?>
			<option value="3">10000.00 €</option>
			<?php
		}
		if(getConfig("currency_show") == 4)
		{
			?>
			<option value="4" selected>10 000 €</option>
			<?php
		}
		else
		{
			?>
			<option value="4">10 000 €</option>
			<?php
		}
		if(getConfig("currency_show") == 5)
		{
			?>
			<option value="5" selected>10 000,00 €</option>
			<?php
		}
		else
		{
			?>
			<option value="5">10 000,00 €</option>
			<?php
		}
		if(getConfig("currency_show") == 6)
		{
			?>
			<option value="6" selected>10 000.00 €</option>
			<?php
		}
		else
		{
			?>
			<option value="6">10 000.00 €</option>
			<?php
		}
		?>
		</select>
		<label>Position de la devise :</label>
		<select name="currency_position" class="inputbox">
		<?php
		if(getConfig("currency_position") == 1)
		{
			?>
			<option value="1" selected>A gauche (€ 100)</option>
			<option value="2">A droite (100 €)</option>
			<?php
		}
		else
		{
			?>
			<option value="1">A gauche (€ 100)</option>
			<option value="2" selected>A droite (100 €)</option>
			<?php
		}
		?>
		</select>
		<input type="hidden" name="action" value="1">
		<div style="margin-top:20px;margin-bottom:20px;">
			<input type="submit" value="Modifier" class="btn blue">
		</div>
		</form>
		<HR>
		<H2>Tarif des compte professionel</H2>
		<form method="POST">
		<?php
		if(getConfig("compte_pro_payant") == 'yes')
		{
			$display_pro = 'display:block;';
			?>
			<input type="checkbox" name="compte_pro_payant" value="yes" onchange="updatePayantPro();" checked> Compte professionel Payant<br>
			<?php
		}
		else
		{
			$display_pro = 'display:none;';
			?>
			<input type="checkbox" name="compte_pro_payant" value="yes" onchange="updatePayantPro();"> Compte professionel Payant<br>
			<?php
		}
		?>
		<div id="compte_pro_payant" style="<?php echo $display_pro; ?>">
			<select name="compte_pro_type_paiement" class="inputbox" id="compte_pro_payant_select" onchange="updatePrice();">
			<?php
			if(getConfig("compte_pro_type_paiement") == 'paiement_unique')
			{
				?>
				<option value="paiement_unique" selected>Forfait à paiement unique</option>
				<?php
			}
			else
			{
				?>
				<option value="paiement_unique">Forfait à paiement unique</option>
				<?php
			}
			if(getConfig("compte_pro_type_paiement") == 'paiement_mensuel')
			{
				?>
				<option value="paiement_mensuel" selected>Forfait à paiement mensuelle</option>
				<?php
			}
			else
			{
				?>
				<option value="paiement_mensuel">Forfait à paiement mensuelle</option>
				<?php
			}
			if(getConfig("compte_pro_type_paiement") == 'paiement_annonce')
			{
				?>
				<option value="paiement_annonce" selected>Gratuit mais toute les annonces sont payante</option>
				<?php
			}
			else
			{
				?>
				<option value="paiement_annonce">Gratuit mais toute les annonces sont payante</option>
				<?php
			}
			?>
			</select>
			<div id="price_unique">
				<label>Prix du paiement unique :</label>
				<input type="text" name="pro_paiement_price_unique" value="<?php echo getConfig("pro_paiement_price_unique"); ?>" class="inputbox">
			</div>
			<div id="price_mensuelle" style="display:none;">
				<label>Prix du paiement mensuelle :</label>
				<input type="text" name="pro_paiement_price_mois" value="<?php echo getConfig("pro_paiement_price_mois"); ?>" class="inputbox">
			</div>
			<div id="price_annonce_pro" style="display:none;">
				<label>Prix des annonces :</label>
				<input type="text" name="pro_paiement_price_annonces" value="<?php echo getConfig("pro_paiement_price_annonces"); ?>" class="inputbox">
			</div>
		</div>
		<input type="hidden" name="action" value="4">
		<div style="margin-top:20px;margin-bottom:20px;">
		<input type="submit" value="Modifier" class="btn blue">
		</div>
		</form>
		<script>
		function updatePrice()
		{
			var selection = $('#compte_pro_payant_select').val();
			if(selection == 'paiement_unique')
			{
				$('#price_unique').css('display','block');
				$('#price_mensuelle').css('display','none');
				$('#price_annonce_pro').css('display','none');
			}
			else if(selection == 'paiement_mensuel')
			{
				$('#price_unique').css('display','none');
				$('#price_mensuelle').css('display','block');
				$('#price_annonce_pro').css('display','none');
			}
			else
			{
				$('#price_unique').css('display','none');
				$('#price_mensuelle').css('display','none');
				$('#price_annonce_pro').css('display','block');
			}
		}
		
		function updatePayantPro()
		{
			if($('#compte_pro_payant').css('display') == 'none')
			{
				$('#compte_pro_payant').css('display','block');
			}
			else
			{
				$('#compte_pro_payant').css('display','none');
			}
		}
		</script>
		<HR>
		<H2>Tarif des annonces</H2>
		<form>
		<label>Prix des annonces :</label>
		<input type="text" name="prix_annonce" class="inputbox" value="<?php echo getConfig("prix_annonce"); ?>" placeholder="Prix des annonces classique (Exemple : 1.00)">
		<label>Prix des annonces URGENTES :</label>
		<input type="text" name="prix_urgente" class="inputbox" value="<?php echo getConfig("prix_urgente"); ?>" placeholder="Prix des annonces URGENTES (Exemple : 1.00)">
		<label>Prix des annonces 15 jours (2 remontées toutes les semaines) :</label>
		<input type="text" name="prix_remonter_semaine" class="inputbox" value="<?php echo getConfig("prix_remonter_semaine"); ?>" placeholder="Prix des annonces 15 Jours (Exemple : 1.00)">
		<label>Prix des annonces 30 jours (4 remontées toutes les semaines) :</label>
		<input type="text" name="prix_remonter_mois" class="inputbox" value="<?php echo getConfig("prix_remonter_mois"); ?>" placeholder="Prix des annonces 30 Jours (Exemple : 1.00)">
		<label>Prix pack photo supplémentaire :</label>
		<input type="text" name="prix_photo_supplementaire" class="inputbox" value="<?php echo getConfig("prix_photo_supplementaire"); ?>" placeholder="Prix du pack de photo supplémentaire (Exemple : 1.00)">
		<input type="hidden" name="action" value="2">
		<div style="margin-top:20px;margin-bottom:20px;">
			<input type="submit" value="Modifier" class="btn blue">
		</div>
		</form>
		<HR>
		<H2>Options activées sur les annonces</H2>
		<form>
		<?php
		
		if(getConfig("annonce_classique_payante") == "yes")
		{
			?>
			<input type="checkbox" name="annonce_classique_payante" value="yes" checked> Toutes les annonces payantes<br>
			<?php
		}
		else
		{
			?>
			<input type="checkbox" name="annonce_classique_payante" value="yes"> Toutes les annonces payantes<br>
			<?php
		}
		
		if(getConfig("annonce_urgente_activer") == "yes")
		{
			?>
			<input type="checkbox" name="annonce_urgente_activer" value="yes" checked> Annonces URGENTES<br>
			<?php
		}
		else
		{
			?>
			<input type="checkbox" name="annonce_urgente_activer" value="yes"> Annonces URGENTES<br>
			<?php
		}
		
		if(getConfig("annonce_remonter_semaine") == "yes")
		{
			?>
			<input type="checkbox" name="annonce_remonter_semaine" value="yes" checked> Annonces 15 jours (2 remontées par semaines)<br>
			<?php
		}
		else
		{
			?>
			<input type="checkbox" name="annonce_remonter_semaine" value="yes"> Annonces 15 jours (2 remontées par semaines)<br>
			<?php
		}
		
		if(getConfig("annonce_remonter_mois") == "yes")
		{
			?>
			<input type="checkbox" name="annonce_remonter_mois" value="yes" checked> Annonces 30 jours (4 remontées par semaines)<br>
			<?php
		}
		else
		{
			?>
			<input type="checkbox" name="annonce_remonter_mois" value="yes"> Annonces 30 jours (4 remontées par semaines)<br>
			<?php
		}
		
		if(getConfig("pack_photo_activer") == "yes")
		{
			?>
			<input type="checkbox" name="pack_photo_activer" value="yes" checked> Pack photo supplémentaire<br>
			<?php
		}
		else
		{
			?>
			<input type="checkbox" name="pack_photo_activer" value="yes"> Pack photo supplémentaire<br>
			<?php
		}
		?>
		<input type="hidden" name="action" value="3">
		<div style="margin-top:20px;margin-bottom:20px;">
			<input type="submit" value="Modifier" class="btn blue">
		</div>
		</form>
	</div>
</body>
</html>