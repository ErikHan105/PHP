<?php

include "../config.php";
include "version.php";

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
	<div class="connexion">
		<div class="logoconnexion">
			<div class="round">
				<img src="<?php echo $url_script; ?>/images/big-toutou-pas-script.png">
			</div>
		</div>
		<?php
		
		if(isset($_REQUEST['error']))
		{
			?>
			<div class="errormsg">
			L'utilisateur ou le mot de passe est incorrect
			</div>
			<?php
		}
		
		if($demo)
		{
		?>
		<div class="info">
		Pour vous connecter à l'administration de démonstration utiliser les identifiants suivant :<br><br>
		Username : admin<br>
		Mot de passe : admin<br>
		</div>
		<?php
		}
		?>
		<form method="POST" action="connexion.php">
		<H1>Connectez vous à votre Administration</H1>
		<input type="text" name="username" placeholder="Votre nom d'utilisateur" class="inputbox">
		<input type="password" name="password" placeholder="Votre mot de passe" class="inputbox">
		<input type="submit" value="Connexion" class="btn blue">
		</form>
	</div>
</body>
</html>