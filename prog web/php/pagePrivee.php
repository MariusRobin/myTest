<?php
    session_start();
    if (isset($_SESSION["NOM_USER"]))
    {
	echo "Bonjour ".$_SESSION["NOM_USER"];
    }
    else
    {
	$url = $_SERVER["REQUEST_URI"];
	header("Location: pageConnexion.php?url=".$url);
    }
?>
