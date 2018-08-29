<?php
require_once("models/dbconnect.php");

error_reporting(E_ALL);
ini_set("display_errors",1);

if(isset($_POST['search_partner_gender']))
{
   $result_profil = $user_model->ProfilSearch($_POST['gender_search'],$_POST['city_search'], $db);
}

if(isset($_POST['user_search']))
{
    $info_members = $user_model->MemberSearch($_POST['user_search'], $db);
}


require_once("views/search.php");
?>