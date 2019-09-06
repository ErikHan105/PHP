<?php

include "main.php";

$errorMail = "";

if(isset($_REQUEST['action']))
{
	$action = $_REQUEST['action'];
	if($action == 1)
	{
		$email = AntiInjectionSQL($_REQUEST['email']);		
		$errorMail = $class_user->sendLostMessage($email);
	}
}

$class_templateloader->showHead('mot_de_passe_oubliee');
$class_templateloader->openBody();
	
include "header.php";

if($errorMail == 1)
{
	$errormessage = '<div class="errormsg">'."\n";
	$errormessage .= getLangue("lost_password_error_message",$language)."\n";
	$errormessage .= '</div>';
}
else if($errorMail == 2)
{
	$errormessage = '<div class="errormsg">'."\n";
	$errormessage .= 'Un email vient de vous être envoyez pour réinitialiser votre mot de passe.'."\n";
	$errormessage .= '</div>';
}
else
{
	$errormessage = "";
}

$class_templateloader->loadTemplate("tpl/lostpassword.tpl");
$class_templateloader->assign("{errormail}",$errormessage);
$class_templateloader->show();

include "footer.php";

$class_templateloader->closeBody();
$class_templateloader->closeHTML();
	
?>
