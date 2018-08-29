<?php

require_once("models/member.php");
require_once("models/email.php");

error_reporting(E_ALL);
ini_set("display_errors",1);

if(isset($_POST['valid']))
{
	$newMember=new Member($_POST['name'],$_POST['surname'],$_POST['birthdate'],$_POST['email'],$_POST['pseudo'],$_POST['password'],$_POST['repassword'],$_POST['gender'],$_POST['city'],$db,$user_model);
}

require_once("views/register.php");
?>

