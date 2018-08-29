<?php
error_reporting(E_ALL);
ini_set("display_errors",1);

if(isset($_GET['pseudo'],$_GET['key']) && !empty($_GET['pseudo']) && !empty($_GET['key'])) 
{	
	$userexist = $user_model->requeteVerifKey($_GET['pseudo'],$_GET['key'],$db);
	$infouser = $user_model->requeteRecupKey($_GET['pseudo'],$_GET['key'],$db);
	if($userexist == 1)
	{
		if($infouser['confirmed'] == 0)
		{
			$user_model->ConfirmKey($_GET['pseudo'],$_GET['key'],$db);
			$display = "Votre compte est maintenant validé ! ";
		} 
		else
		{
			$display = "Ce compte déjà validé !";
		}
	}
	else
	{	
		$display = "Ce compte n'hexiste pas !";
	}

	include_once("views/validation.php");
}


?>