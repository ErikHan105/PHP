<?php

include "main.php";

if(isset($_REQUEST['action']))
{
	$action = $_REQUEST['action'];
	if($action == 1)
	{
		$email = $_REQUEST['email'];
		$nom = $_REQUEST['nom'];
		$msg = $_REQUEST['message'];
		
		$subject = "Nouvelle demande de contact sur $url_script";
		$message = "Bonjour,<br><br>";
		$message .= "Une nouvelle demande de contact à été effectuer sur le formulaire de contact du site $url_script<br><br>";
		$message .= "<b>Nom :</b> $nom<br>";
		$message .= "<b>Email :</b> $email<br>";
		$message .= "<b>Message :</b><br><br>";
		$message .= $msg.'<br><br>';
		$message .= "Ce message à été envoyer automatiquement depuis le formulaire de contact";
		$email = getConfig("email_reception");
		$class_email->sendMailTemplate($email,$subject,$message);
		
		header("Location: $url_script/contact.php?valid=1");
		exit;
	}
}

$class_templateloader->showHead('contact');
$class_templateloader->openBody();

include "header.php";

$class_templateloader->loadTemplate("tpl/contact.tpl");
$valid_msg = '';
if(isset($_REQUEST['valid']))
{
	$valid_msg = '<div class="validmsg">Votre message à bien été envoyer, nous y répondrons dans les plus bref délais</div>';
}

$class_templateloader->assign("{valid_msg}",$valid_msg);
$class_templateloader->show();

include "footer.php";

$class_templateloader->closeBody();
$class_templateloader->closeHTML();

?>