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

if(isset($_GET["claveErr"])){
    $errorClave=true;
}

$errorMail=false;
if(isset($_GET["emailErr"])){
    $errorMail=true;
}

$errorEdad=false;
if(isset($_GET["edadErr"])){
    $errorEdad=true;
}

# setear variables
$smarty->assign("errorClave", $errorClave);
$smarty->assign("errorMail", $errorMail);
$smarty->assign("errorEdad", $errorEdad);

$smarty->assign("action", $_SERVER["REQUEST_URI"]);
$smarty->assign("user", $_SESSION["user"]);
$smarty->assign("esCliente", $_SESSION['esCliente']);

$smarty->assign("usuario_mail", $user);
if (isset($mensaje)) {
    $smarty->assign("mensaje", $mensaje);
}
$smarty->assign("smensaje", "Bienvenido " . $_SESSION["user"]["mail"]);

# mostrar el template
$smarty->display('signup.tpl');