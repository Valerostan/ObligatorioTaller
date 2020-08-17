<?php
require_once 'datos.php';
require_once("configuracion.php");

# cargar datos
session_start();

$acceso = isset($_SESSION["user"]);

    if (isset($_SESSION["user"])){
        $user = $_SESSION["user"];
    }
    else{
        $_SESSION["user"] = array(
        "mail" => "anónimo",
        "acceso" => false,
        "esAdmin" => false
    );
    }
$user = isset($_POST["mail"]) ? $_POST["mail"] : $_COOKIE["usuario_mail"];


$smarty->assign("action", $_SERVER["REQUEST_URI"]);
$smarty->assign("user", $_SESSION["user"]);
$smarty->assign("usuario_mail", $user);
if (isset($mensaje)) {
    $smarty->assign("mensaje", $mensaje);
}
$smarty->assign("smensaje", "Bienvenido " . $_SESSION["user"]["mail"]);

# mostrar el template
$smarty->display('signup.tpl');