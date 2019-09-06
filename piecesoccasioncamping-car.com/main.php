<?php

include "config.php";
include "engine/engine.php";
include "checkuserconnected.php";

/* Langue principale du site internet */
$language = getConfig("langue_principal");

function AntiInjectionSQL($value)
{
	$value = strip_tags($value);
	
    $search = array("\\",  "\x00", "\n",  "\r",  "'",  '"', "\x1a");
    $replace = array("\\\\","\\0","\\n", "\\r", "\'", '\"', "\\Z");

    return str_replace($search, $replace, $value);
}

?>
