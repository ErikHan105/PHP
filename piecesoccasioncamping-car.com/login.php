<?php

include "main.php";

$class_templateloader->showHead('connexion');
$class_templateloader->openBody();

include "header.php";
	
if(isset($_REQUEST['error']))
{
	$error = $_REQUEST['error'];
	if($error == 1)
	{
		$errormessage = '<div class="errormsg">'."\n";
		$errormessage .= getLangue("message_error_connection",$language);
		$errormessage .= '</div>'."\n";
	}
	else if($error == 2)
	{
		$errormessage = '<div class="errormsg">'."\n";
		$errormessage .= getLangue("message_error_validate_account",$language);
		$errormessage .= '</div>'."\n";
	}
	else if($error == 3)
	{
		$errormessage = '<div class="errormsg">'."\n";
		$errormessage .= getLangue("message_error_ban_account",$language);
		$errormessage .= '</div>';
	}
	else
	{
		$errormessage = "";
	}
}
else
{
	$errormessage = "";
}

$class_templateloader->loadTemplate("tpl/login.tpl");

if(getConfig("google_connect_activate") == 'yes')
{
	$social = '<div class="englobe-line-separator">'."\n";
	$social .= '<div class="line-left">'."\n";
	$social .= '</div>'."\n";
	$social .= '<div class="or-connect">'."\n";
	$social .= 'ou'."\n";
	$social .= '</div>'."\n";
	$social .= '<div class="line-left">'."\n";
	$social .= '</div>'."\n";
	$social .= '</div>'."\n";
	$social .= '<div class="englobe-line-separator ctCenter">'."\n";
	$social .= '<button class="btnConfirm" onclick="location.href=\''.$class_google_connect->getURL().'\'"><img src="images/google-sign-in-icon.png"> Se connecter avec Google</button>'."\n";
	$social .= '</div>'."\n";
	$class_templateloader->assign("{social_connect}",$social);
}
else
{
	$class_templateloader->assign("{social_connect}","");
}

$class_templateloader->assign("{error_message}",$errormessage);
$class_templateloader->show();

include "footer.php";
	
$class_templateloader->closeBody();
$class_templateloader->closeHTML();

?>