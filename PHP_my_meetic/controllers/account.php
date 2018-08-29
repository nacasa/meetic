<?php
require_once("models/dbconnect.php");

error_reporting(E_ALL);
ini_set("display_errors",1);

if(isset($_SESSION['pseudo'])) {
    if(isset($_POST['valid_search']))
    {
        $id = htmlspecialchars($_POST['valid_search']); 
        $info_members = $user_model-> ProfilSelection($id,$db);
    }
    else
    {
        $info_members = $user_model->InfoPerso($db);
    }
}

if(isset($_POST['deleteaccount']))
{
    $user_model->DeleteAccount($db);
    header('Location: index.php?page=logout');
}

if(isset($_POST['former_password']) || isset($_POST['new_password']) || isset($_POST['confirm_password']))
{
    if(md5($_POST['former_password']) == $info_members['password'])
    {
        if($_POST['new_password'] == $_POST['confirm_password'] && strlen($_POST['new_password']) > 1 && strlen($_POST['confirm_password']) > 1)
        {
            $user_model->ModifPassword($_POST['new_password'], $db);
            header('Location: index.php?page=account');
        }
        else
        {
            $mismatch_password = "Le mot de passe saisie ne correspond pas";
        }
    }
    else
    {
        $mismatch_password = "Mauvais mot de passe";
    }
}

if(isset($_POST['name']))
{
    $user_model->NameModif($_POST['name'], $db);
    header('Location: index.php?page=account');
}

if(isset($_POST['surname']))
{
    $user_model->SurnameModif($_POST['surname'], $db);
    header('Location: index.php?page=account');
}

if(isset($_POST['birthdate']))
{
    $user_model->birthdateModif($_POST['birthdate'], $db);
    header('Location: index.php?page=account');
}

if(isset($_POST['city']))
{
    $user_model->cityModif($_POST['city'], $db);
    header('Location: index.php?page=account');
}

if(isset($_POST['email']))
{
    $user_model->EmailModif($_POST['email'], $db);
    header('Location: index.php?page=account');
}

require_once("views/account.php");
?>