<?php

include "../config.php";
include "../engine/class.imagehelper.php";

$filigrane = getConfig("filigrane");

if(isset($_REQUEST['pourcent']))
{
	$pourcent = $_REQUEST['pourcent'];
	updateConfig("pourcent_filigrane",$pourcent);
}

if(isset($_REQUEST['position']))
{
	$position = $_REQUEST['position'];
	updateConfig("position_filigrane",$position);
}

if(isset($_REQUEST['activer']))
{
	$activer = $_REQUEST['activer'];
	updateConfig("activer_filigrane",$activer);
}

if($pourcent == '')
{
	$pourcent = getConfig("pourcent_filigrane");
}
if($position == '')
{
	$position = getConfig("position_filigrane");
}

$class_image_helper = new ImageHelper();
$class_image_helper->addFiligrane('images/model.jpg','../images/'.$filigrane,$pourcent,$position,true);

?>