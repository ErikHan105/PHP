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
	if($action == 1)
	{
		$nom_expediteur_mail = $_REQUEST['nom_expediteur_mail'];
		updateConfig("nom_expediteur_mail",$nom_expediteur_mail);
		
		$adresse_expediteur_mail = $_REQUEST['adresse_expediteur_mail'];
		updateConfig("adresse_expediteur_mail",$adresse_expediteur_mail);
		
		$reply_expediteur_mail = $_REQUEST['reply_expediteur_mail'];
		updateConfig("reply_expediteur_mail",$reply_expediteur_mail);	

		$sujet_mail_inscription = $_REQUEST['sujet_mail_inscription'];
		updateConfig("sujet_mail_inscription",$sujet_mail_inscription);
		
		$email_inscription_html = $_REQUEST['email_inscription_html'];
		updateConfig("email_inscription_html",$email_inscription_html);
		
		$email_inscription_text = $_REQUEST['email_inscription_text'];
		updateConfig("email_inscription_text",$email_inscription_text);
		
		$sujet_mail_reponse_annonce = $_REQUEST['sujet_mail_reponse_annonce'];
		updateConfig("sujet_mail_reponse_annonce",$sujet_mail_reponse_annonce);
		
		$email_reponse_annonce_html = $_REQUEST['email_reponse_annonce_html'];
		updateConfig("email_reponse_annonce_html",$email_reponse_annonce_html);
		
		$email_reponse_annonce_text = $_REQUEST['email_reponse_annonce_text'];
		updateConfig("email_reponse_annonce_text",$email_reponse_annonce_text);
		
		$sujet_mail_depot_annonce = $_REQUEST['sujet_mail_depot_annonce'];
		updateConfig("sujet_mail_depot_annonce",$sujet_mail_depot_annonce);
		
		$email_depot_annonce_html = $_REQUEST['email_depot_annonce_html'];
		updateConfig("email_depot_annonce_html",$email_depot_annonce_html);
		
		$email_depot_annonce_text = $_REQUEST['email_depot_annonce_text'];
		updateConfig("email_depot_annonce_text",$email_depot_annonce_text);
		
		$email_reception = $_REQUEST['email_reception'];
		updateConfig("email_reception",$email_reception);
		
		$sujet_mail_oubliee = $_REQUEST['sujet_mail_oubliee'];
		updateConfig("sujet_mail_oubliee",$sujet_mail_oubliee);
		
		$email_mail_oubliee_html = $_REQUEST['email_mail_oubliee_html'];
		updateConfig("email_mail_oubliee_html",$email_mail_oubliee_html);
		
		$email_mail_oubliee_text = $_REQUEST['email_mail_oubliee_text'];
		updateConfig("email_mail_oubliee_text",$email_mail_oubliee_text);
		
		$sujet_fin_validite_email = $_REQUEST['sujet_fin_validite_email'];
		updateConfig("sujet_fin_validite_email",$sujet_fin_validite_email);
		
		$email_html_fin_validite_email = $_REQUEST['email_html_fin_validite_email'];
		updateConfig("email_html_fin_validite_email",$email_html_fin_validite_email);
		
		$email_text_fin_validite_email = $_REQUEST['email_text_fin_validite_email'];
		updateConfig("email_text_fin_validite_email",$email_text_fin_validite_email);
		
		$sujet_mail_inscription_pro = $_REQUEST['sujet_mail_inscription_pro'];
		updateConfig("sujet_mail_inscription_pro",$sujet_mail_inscription_pro);
		
		$email_inscription_html_pro = $_REQUEST['email_inscription_html_pro'];
		updateConfig("email_inscription_html_pro",$email_inscription_html_pro);
		
		$email_inscription_text_pro = $_REQUEST['email_inscription_text_pro'];
		updateConfig("email_inscription_text_pro",$email_inscription_text_pro);
		
		$sujet_reglement_bancaire_email = $_REQUEST['sujet_reglement_bancaire_email'];
		updateConfig("sujet_reglement_bancaire_email",$sujet_reglement_bancaire_email);
		
		$email_reglement_bancaire_html = $_REQUEST['email_reglement_bancaire_html'];
		updateConfig("email_reglement_bancaire_html",$email_reglement_bancaire_html);
		
		$email_reglement_bancaire_texte = $_REQUEST['email_reglement_bancaire_texte'];
		updateConfig("email_reglement_bancaire_texte",$email_reglement_bancaire_texte);
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
	<style>
	.theme-preview-button
	{
		height: 10px;
		width: 15px;
		margin-top: 10px;
		margin-left: 20px;
	}
	
	.palette-block
	{
		float: left;
		margin-right: 5px;
		width: 40px;
		height: 28px;
	}
	
	.bselected
	{
		border:2px solid #ff0000;
	}
	</style>
	<div class="container">
		<H1>Configuration Email</H1>
		<div class="info">
		Gérer depuis cette interface toutes les informations concernant les emails envoyés à vos utilisateurs.
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<form method="POST" enctype="multipart/form-data">
			<H2>Réception des notifications</H2>
			<label>Email de reception :</label>
			<input type="text" name="email_reception" value="<?php echo getConfig("email_reception"); ?>" placeholder="Entrer l'email ou vous souhaitez recevoir les notifications du script" class="inputbox">
			<H2>Réglages de l'expediteur</H2>
			<label>Nom de l'expéditeur :</label>
			<input type="text" name="nom_expediteur_mail" value="<?php echo getConfig("nom_expediteur_mail"); ?>" placeholder="Entrer le nom de l'expediteur" class="inputbox">
			<label>Adresse email de l'expéditeur :</label>
			<input type="text" name="adresse_expediteur_mail" value="<?php echo getConfig("adresse_expediteur_mail"); ?>" placeholder="Entrer une adresse valide et correspondant à votre domaine pour éviter les spams et indésirable" class="inputbox">
			<label>Email de réponse :</label>
			<input type="text" name="reply_expediteur_mail" value="<?php echo getConfig("reply_expediteur_mail"); ?>" placeholder="Si vous souhaitez que vos utilisateur puissent répondre à vos email automatique (non obligatoire)" class="inputbox">
			<H2>Email d'inscription</H2>
			<div class="info">
			Vous pouvez ici rédiger l'email envoyé après l'inscription à la plateforme à vos utilisateurs, quelques connaissances en HTML sont est nécessaires mais ne sont pas obligatoires, certains champs peuvent
			être utilisés comme les champs de remplissage.<br>
			[logo] = Affiche le logo du site internet en HTML.<br>
			[email] = Adresse email de l'utilisateur .<br>
			[pseudo] = Pseudo de l'utilisateur.<br>
			[lienconfirmation] = Lien de confirmation de l'inscription.<br>
			[saut_ligne] = Sauter une ligne en HTML.<br>
			</div>
			<label>Sujet du mail d'inscription :</label>
			<input type="text" name="sujet_mail_inscription" value="<?php echo getConfig("sujet_mail_inscription"); ?>" placeholder="Entrer le sujet du mail d'inscription" class="inputbox">
			<label>Email d'inscription au format HTML :</label>
			<textarea name="email_inscription_html" class="textareabox" placeholder="Entrer le message de votre email d'inscription au format HTML"><?php echo getConfig("email_inscription_html"); ?></textarea>
			<label>Email d'inscription au format TEXTE :</label>
			<textarea name="email_inscription_text" class="textareabox" placeholder="Entrer le message de votre email d'inscription au format TEXTE"><?php echo getConfig("email_inscription_text"); ?></textarea>
			<H2>Email d'inscription professionel</H2>
			<div class="info">
			Vous pouvez ici rédiger l'email envoyé après l'inscription à la plateforme à vos utilisateurs, quelques connaissances en HTML sont est nécessaires mais ne sont pas obligatoires, certains champs peuvent
			être utilisés comme les champs de remplissage.<br>
			[logo] = Affiche le logo du site internet en HTML.<br>
			[email] = Adresse email de l'utilisateur .<br>
			[pseudo] = Pseudo de l'utilisateur.<br>
			[saut_ligne] = Sauter une ligne en HTML.<br>
			</div>
			<label>Sujet du mail d'inscription professionel :</label>
			<input type="text" name="sujet_mail_inscription_pro" value="<?php echo getConfig("sujet_mail_inscription_pro"); ?>" placeholder="Entrer le sujet du mail d'inscription" class="inputbox">
			<label>Email d'inscription professionel au format HTML :</label>
			<textarea name="email_inscription_html_pro" class="textareabox" placeholder="Entrer le message de votre email d'inscription au format HTML"><?php echo getConfig("email_inscription_html_pro"); ?></textarea>
			<label>Email d'inscription au format TEXTE :</label>
			<textarea name="email_inscription_text_pro" class="textareabox" placeholder="Entrer le message de votre email d'inscription au format TEXTE"><?php echo getConfig("email_inscription_text_pro"); ?></textarea>
			<H2>Email de correspondance</H2>
			<label>Sujet du mail de correspondance :</label>
			<input type="text" name="sujet_mail_reponse_annonce" value="<?php echo getConfig("sujet_mail_reponse_annonce"); ?>" placeholder="Entrer le sujet du mail que recevront les utilisateurs quand il envoie un message pour une annonce" class="inputbox">
			<lable>Email de correspondance au format HTML :</label>
			<textarea name="email_reponse_annonce_html" class="textareabox" placeholder="Entrer le message de votre email d'inscription au format HTML"><?php echo getConfig("email_reponse_annonce_html"); ?></textarea>
			<label>Email de correspondance au format TEXTE :</label>
			<textarea name="email_reponse_annonce_text" class="textareabox" placeholder="Entrer le message de votre email d'inscription au format TEXTE"><?php echo getConfig("email_reponse_annonce_text"); ?></textarea>
			<H2>Email de réponse lors d'un dépôt d'annonce</H2>
			<label>Sujet du mail de reponse lors d'un depot :</label>
			<input type="text" name="sujet_mail_depot_annonce" value="<?php echo getConfig("sujet_mail_depot_annonce"); ?>" placeholder="Entrer le sujet du mail que recevront les utilisateurs quand il auront ajouter une annonce" class="inputbox">
			<lable>Email de réponse dépôt d'annonce HTML :</label>
			<textarea name="email_depot_annonce_html" class="textareabox" placeholder="Entrer le message que les utilisateur recevrons quand il auront remplis une annonce en HTML"><?php echo getConfig("email_depot_annonce_html"); ?></textarea>
			<label>Email de réponse dépôt d'annonce TEXTE :</label>
			<textarea name="email_depot_annonce_text" class="textareabox" placeholder="Entrer le message que les utilisateur recevrons quand il auront remplis une annonce en TEXTE"><?php echo getConfig("email_depot_annonce_text"); ?></textarea>
			<H2>Email de mot de passe oubliée</H2>
			<label>Sujet du mail oubliée :</label>
			<input type="text" name="sujet_mail_oubliee" value="<?php echo getConfig("sujet_mail_oubliee"); ?>" placeholder="Entrer le sujet du mail que recevront les utilisateurs quand il demanderont une réinitialisation de leur mot de passe" class="inputbox">
			<lable>Email mot de passe oubliée HTML :</label>
			<textarea name="email_mail_oubliee_html" class="textareabox" placeholder="Entrer le message que les utilisateur recevrons quand il ont oublier leur mot de passe HTML"><?php echo getConfig("email_mail_oubliee_html"); ?></textarea>
			<label>Email mot de passe oubliée TEXTE :</label>
			<textarea name="email_mail_oubliee_text" class="textareabox" placeholder="Entrer le message que les utilisateur recevrons quand il ont oublier leur mot de passe TEXTE"><?php echo getConfig("email_mail_oubliee_text"); ?></textarea>
			<H2>Email de fin de validité d'annonce</H2>
			<label>Sujet fin de validité d'annonce</label>
			<input type="text" name="sujet_fin_validite_email" class="inputbox" value="<?php echo getConfig("sujet_fin_validite_email"); ?>" placeholder="Entrer le sujet du mail que recevront les utilisateurs quand leur annonce à expirer">
			<label>Email de fin de validité annonce HTML :</label>
			<textarea type="text" name="email_html_fin_validite_email" class="textareabox" placeholder="Entrer le message que les utilisateur recevrons à l'expiration de leur annonce en HTML"><?php echo getConfig("email_html_fin_validite_email"); ?></textarea>
			<label>Email de fin de validité annonce TEXTE :</label>
			<textarea type="text" name="email_text_fin_validite_email" class="textareabox" placeholder="Entrer le message que les utilisateurs recevrons à l'expiration de leur annonce en TEXTE"><?php echo getConfig("email_text_fin_validite_email"); ?></textarea>
			<H2>Email d'attente de réglement de Virement bancaire</H2>
			<label>Sujet d'attente de réglement de Virement bancaire</label>
			<input type="text" name="sujet_reglement_bancaire_email" class="inputbox" value="<?php echo getConfig("sujet_reglement_bancaire_email"); ?>" placeholder="Entrer le sujet du mail que recevront les utilisateurs qui souhaite regler leur annonce par virement bancaire">
			<label>Email d'attente de réglement de Virement bancaire HTML :</label>
			<textarea type="text" name="email_reglement_bancaire_html" class="textareabox" placeholder="Entrer le message que les utilisateur recevrons dans l'attente d'un reglement par virement bancaire de leur annonces HTML"><?php echo getConfig("email_reglement_bancaire_html"); ?></textarea>
			<label>Email d'attente de réglement de Virement bancaire TEXTE :</label>
			<textarea type="text" name="email_reglement_bancaire_texte" class="textareabox" placeholder="Entrer le message que les utilisateurs recevrons dans l'attente d'un reglement par virement bancaire de leur annonces TEXTE"><?php echo getConfig("email_reglement_bancaire_texte"); ?></textarea>
			<input type="hidden" name="action" value="1">
			<input type="submit" value="Modifier" class="btn blue">
		</form>
		<script>
		var oldpalette = 0;
		function selectPalette(id)
		{
			$('#palette-'+oldpalette).css('border','0px solid');
			$('#palette-'+id).css('border','2px solid #ff0000');
			$('#palette_color_cookie').val(id);
			oldpalette = id;
		}
		</script>
	</div>
</body>
</html>