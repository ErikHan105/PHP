<?php
include "../config.php";
include "../engine/class.monetaire.php";
include "version.php";

$monetaire = new Monetaire();
$sigle = $monetaire->getSigle();
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
		$id = $_REQUEST['id'];
		$SQL = "DELETE FROM pas_paiement WHERE id = $id";
		$pdo->query($SQL);
		
		header("Location: paiement.php");
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
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
</head>
<body>
<?php	

include "header.php";
include "sidebar.php";

?>
<style>	
td
{
	font-size:14px;
	height:30px;
}
.bButton
{
	height: 38px;
	margin-top: 5px;
	margin-bottom: 5px;
}
.boxChiffre
{
	float:left;
	width: 30%;
	padding: 20px;
	box-sizing: border-box;
	background-color: #00aeff;
	border-radius: 5px;
	margin-bottom: 20px;
	color: #ffffff;
	margin-right:3.33%;
}
.ChiffreAffaire
{
	font-size: 48px;
	color: #ffffff;
}
.boxStatistique
{
	overflow:auto;
}
.greenvente
{
	background-color:#049b10;
}
.orangevente
{
	background-color:#ffb300;
}
</style>
<div class="container">
	<H1>Paiement</H1>
	<div class="info">
	Retrouvez sur cette page tous les réglements effectués sur votre site internet.
	</div>
	<?php
	
	$total = 0;
	$nbr = 0;
	$SQL = "SELECT * FROM pas_paiement";
	$reponse = $pdo->query($SQL);
	while($req = $reponse->fetch())
	{
		$total = $total + $req['montant'];
		$nbr = $nbr + 1;
	}
	$SQL = "SELECT * FROM pas_paiement ORDER BY id DESC LIMIT 1";
	$reponse = $pdo->query($SQL);
	$req = $reponse->fetch();
	$montantlast = $req['montant'];
	?>
	<div class="boxStatistique">
		<div class="boxChiffre">
			<div class="ChiffreAffaire">
			<?php echo number_format($total,2,",",""); ?> <?php echo $sigle; ?>
			</div>
			<div class="Chiffretexte">Chiffre d'affaire</div>
		</div>
		<div class="boxChiffre orangevente">
			<div class="ChiffreAffaire">
			<?php echo $nbr; ?>
			</div>
			<div class="Chiffretexte">
			Nombre de ventes
			</div>
		</div>
		<div class="boxChiffre greenvente">
			<div class="ChiffreAffaire">
			<?php echo number_format($montantlast,2,",",""); ?> <?php echo $sigle; ?>
			</div>
			<div class="Chiffretexte">
			Dernière ventes
			</div>
		</div>
	</div>
	<table>
		<tr>
			<th>Date</th>
			<th>N° Transaction</th>
			<th>Email</th>
			<th>Montant</th>
			<th>Type</th>
			<th>Annonce</th>
		</tr>
		<?php
			$SQL = "SELECT COUNT(*) FROM pas_paiement";
			$reponse = $pdo->query($SQL);
			$req = $reponse->fetch();
			if($req[0] == 0)
			{
			?>
			</table>
			<center><H1>Aucune transaction pour le moment</H1></center>
			<?php
			}
			else
			{
				$SQL = "SELECT * FROM pas_paiement ORDER BY id DESC";
				$reponse = $pdo->query($SQL);
				while($req = $reponse->fetch())
				{
					?>
					<tr>
						<td>
						<?php 
						$date_paiement = $req['date_paiement']; 
						$date_paiement = explode(" ",$date_paiement);
						$heure_paiement = $date_paiement[1];
						$date_paiement = $date_paiement[0];
						
						$date_paiement = explode("-",$date_paiement);
						
						echo "<b>".$date_paiement[2]."/".$date_paiement[1]."/".$date_paiement[0]." à ".$heure_paiement."</b>";
						?>
						</td>
						<td><?php echo $req['id_transaction']; ?></td>
						<td><a href="mailto:<?php echo $req['email_user']; ?>" target="_blank" style="color:#000000;"><?php echo $req['email_user']; ?></a></td>
						<td><b><font color=green><?php echo number_format($req['montant'],2,",",""); ?> <?php echo $sigle; ?></b></font></td>
						<td style="font-size:20px;">
						<?php 
						if($req['type_paiement'] == 'paypal')
						{
							?>
							<i class="fab fa-paypal" title="Payer avec Paypal"></i>
							<?php
						}
						else if($req['type_paiement'] == 'stripe')
						{
							?>
							<i class="fab fa-stripe" title="Payer avec Stripe"></i>
							<?php
						}
						else if($req['type_paiement'] == 'cheque')
						{
							?>
							<i class="fas fa-money-check" title="Payer par Chèque"></i>
							<?php
						}
						else if($req['type_paiement'] == 'virement')
						{
							?>
							<i class="fas fa-university" title="Payer par Virement Bancaire"></i>
							<?php
						}
						else if($req['type_paiement'] == 'mobicash')
						{
							?>
							<i class="fas fa-mobile-alt" title="Payer par Mobicash"></i>
							<?php
						}
						else
						{
							echo $req['type_paiement'];
						}
						?>
						</td>
						<td>
							<a href="paiement.php?id=<?php echo $req['id']; ?>&action=1" class="btn red">Supprimer</a>
							<a href="annonce.php?md5=<?php echo $req['md5']; ?>&action=5" class="btn blue">Voir l'annonce</a>
						</td>
					</tr>
					<?php
				}
				?>
				</table>
				<?php
			}
			?>
			</div>
		</body>
	</html>