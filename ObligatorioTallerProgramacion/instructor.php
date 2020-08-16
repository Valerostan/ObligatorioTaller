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


$smarty->assign("action", $_SERVER["REQUEST_URI"]);
$smarty->assign("user", $_SESSION["user"]);
if (isset($mensaje)) {
    $smarty->assign("mensaje", $mensaje);
}

# mostrar el template
$smarty->display('esAdmin.tpl');
