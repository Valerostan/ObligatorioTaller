<?php

session_start();

require_once('configuracion.php');

$acceso = isset($_SESSION["user"]);


unset($_SESSION["user"]);
$acceso=false;
session_destroy();
header("location: login.php");
die();


$smarty->display("login.tpl");

