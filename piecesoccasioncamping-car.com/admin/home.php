<?php

include "../config.php";
include "version.php";
include "../engine/class.monetaire.php";
include "../engine/class.statistique-visiteur.php";

$class_statistique_visiteur = new Statistique_Visiteur();

@session_start();

$SQL = "SELECT COUNT(*) FROM pas_admin_user WHERE username = '".$_SESSION['admin_username']."' AND password = '".$_SESSION['admin_password']."'";
$reponse = $pdo->query($SQL);
$req = $reponse->fetch();

if($req[0] == 0)
{
	header("Location: index.php");
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
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<style>
	.stats-box
	{
		float: left;
		padding: 20px;
		box-sizing: border-box;
		background-color: #00afff;
		border-radius: 5px;
		text-align: center;
		color: #fff;
		font-size: 18px;
		margin-right: 1%;
		width: 24%;
	}
	
	.number-box
	{
		font-size:32px;
	}
	
	.stats-englobe
	{
		overflow:auto;
	}
	</style>
	<div class="container">
		<H1><i class="fas fa-tachometer-alt"></i> Tableau de bord</H1>
		<?php
		
		$monetaire = new Monetaire();
		$sigle = $monetaire->getSigle();
		
		$SQL = "SELECT COUNT(*) FROM pas_user";
		$reponse = $pdo->query($SQL);
		$req = $reponse->fetch();
		
		$count_user = $req[0];
		
		$SQL = "SELECT COUNT(*) FROM pas_annonce WHERE valider = 'yes'";
		$reponse = $pdo->query($SQL);
		$req = $reponse->fetch();
		
		$count_annonce = $req[0];
		
		$SQL = "SELECT * FROM pas_paiement ORDER BY id DESC LIMIT 1";
		$reponse = $pdo->query($SQL);
		$req = $reponse->fetch();
		$montantlast = $req['montant'];
		
		?>
	<div class="stats-englobe">
		<div class="stats-box">
			<div class="number-box">
				<i class="fas fa-users"></i> <?php echo $count_user; ?>
			</div>
			<div class="title-box">
			Nombre d'utilisateur
			</div>
		</div>
		<div class="stats-box">
			<div class="number-box">
				<i class="fas fa-vote-yea"></i> <?php echo $count_annonce; ?>
			</div>
			<div class="title-box">
			Nombre d'annonces
			</div>
		</div>
		<div class="stats-box">
			<div class="number-box">
				<i class="fas fa-money-bill-wave"></i> <?php echo number_format($montantlast,2); ?> <?php echo $sigle; ?>
			</div>
			<div class="title-box">
			Dernier paiement
			</div>
		</div>
		<div class="stats-box">
			<div class="number-box">
				<i class="fas fa-user"></i> <?php echo $class_statistique_visiteur->getVisiteur(date('Y')."-".date('m')."-".date('d')); ?>
			</div>
			<div class="title-box">
			Visiteur aujourd'hui
			</div>
		</div>
	</div>
	<br>
	<?php
	
	$data = file_get_contents("http://www.shua-creation.com/help/aide-en-ligne-pas-script-v1.26.5.php");
	echo $data;
	
	?>
	</div>
	</div>
</body>
</html>