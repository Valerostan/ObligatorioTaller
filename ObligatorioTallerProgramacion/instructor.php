<?php
require_once 'datos.php';
require_once("configuracion.php");

# cargar datos
session_start();

$_SESSION['url'] = $_SERVER['REQUEST_URI'];

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
$errorCi=false;
if(isset($_GET["ciErr"])){
    $errorCi=true;
}

$errorEdad=false;
if(isset($_GET["edadErr"])){
    $errorEdad=true;
}

$errorVencido=false;
if(isset($_GET["vencidoErr"])){
    $errorVencido=true;
}

$bien=false;
if(isset($_GET["bien"])){
    $bien=true;
}
   

$smarty->assign("action", $_SERVER["REQUEST_URI"]);
$smarty->assign("user", $_SESSION["user"]);
$smarty->assign("errorVencido", $errorVencido);
$smarty->assign("errorEdad", $errorEdad);
$smarty->assign("errorCi", $errorCi);
$smarty->assign("bien", $bien);
$smarty->assign("acceso", $_SESSION['acceso']);
$smarty->assign("esAdmin", $_SESSION['esAdmin']);
$smarty->assign("esCliente", $_SESSION['esCliente']);



$smarty->display('altaAdmin.tpl');
