<?php

global $isConnected;
$isConnected = false;

if(isset($_SESSION['email']))
{
	if(isset($_SESSION['password']))
	{
		$SQL = "SELECT COUNT(*) FROM pas_user WHERE email = '".$_SESSION['email']."' AND password = '".$_SESSION['password']."'";
		$reponse = $pdo->query($SQL);
		$req = $reponse->fetch();

		if($req[0] == 0)
		{
			$isConnected = false;
		}
		else
		{
			$isConnected = true;
		}
	}
}

?>