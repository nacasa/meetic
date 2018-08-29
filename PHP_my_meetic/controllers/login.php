<?php

error_reporting(E_ALL);
ini_set("display_errors",1);

if (!isset($_SESSION['pseudo']))
{
	require_once("models/login.php");

	if(isset($_POST['validatelogin']))
	{
	    $connect = new Connexion($_POST['pseudo'],$_POST['password'], $db,$requete);
	}
	require_once("views/login.php");
}
else
{
	header("Location: Location: index.php?page=account");
}
?>