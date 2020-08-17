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
        "esAdmin" => false
    );
}

$smarty->assign("action", $_SERVER["REQUEST_URI"]);
$smarty->assign("user", $_SESSION["user"]);
$smarty->assign("usuario_mail", $user);
if (isset($mensaje)) {
    $smarty->assign("mensaje", $mensaje);
}
$smarty->assign("smensaje", "Bienvenido " . $_SESSION["user"]["mail"]);

$smarty->display("login.tpl");



