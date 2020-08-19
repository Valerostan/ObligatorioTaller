<?php

session_start();

require_once('configuracion.php');

$acceso = isset($_SESSION["user"]);


$user = isset($_POST["mail"]) ? $_POST["mail"] : $_COOKIE["usuario_mail"];

// Si el usuario nunca accedió, lo definimos como anónimo
if (!isset($_SESSION["user"])) {
    $_SESSION["user"] = array(
        "mail" => "anónimo",
        "acceso" => false,
        "esAdmin" => false,
        "esCliente" => false
    );
}
$errorMail=false;
if(isset($_GET["emailErr"])){
    $errorMail=true;
}

$errorPassword=false;
if(isset($_GET["passwordErr"])){
    $errorPassword=true;
}

$smarty->assign("action", $_SERVER["REQUEST_URI"]);
$smarty->assign("user", $_SESSION["user"]);
$smarty->assign("usuario_mail", $user);
$smarty->assign("errorMail", $errorMail);
$smarty->assign("errorPassword", $errorPassword);
$smarty->assign("esCliente", $_SESSION['esCliente']);



$smarty->display("login.tpl");



