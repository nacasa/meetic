<?php
// set server time
date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, "fr_FR");

session_start();

require_once("models/dbconnect.php");
require_once("models/model.php");

	if(isset($_SESSION['pseudo']))
	{	
    // if (isset($_POST['login'])) { //user logging in

        require 'controllers/login.php';
        
    }

	elseif(!isset($_GET['page']))
	{
		include("controllers/register.php");
	}
	elseif(!empty($_GET['page']) && is_file("controllers/".$_GET['page'].".php"))
	{
		include("controllers/".$_GET['page'].".php");
	}
	else
	{
		include("views/deniedacces.php");
	}


