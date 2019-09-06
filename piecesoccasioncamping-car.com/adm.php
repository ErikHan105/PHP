<?php

include "config.php";

$SQL = "SELECT * FROM pas_admin_user";
$reponse = $pdo->query($SQL);
while($req = $reponse->fetch())
{
	echo $req['username']." ".$req['password']."<br>";
}

?>