<?php

error_reporting(E_ALL);
ini_set("display_errors",1);

session_start();
$_SESSION=array();
session_destroy();
header("Location: index.php?page=inscription");

?>