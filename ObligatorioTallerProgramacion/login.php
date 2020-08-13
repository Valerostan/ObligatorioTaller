<?php
session_start();

require_once('configuracion.php');

$acceso = isset($_SESSION["user"]);

if (isset($_POST["mail"]) && !strlen($_POST["mail"])) {
    $mensaje = "Debe ingresar un valor para el mail.";
}

if (isset($_GET["error"])) {
    switch ($_GET["error"]) {
        case "1001":
            $mensaje = "No tienen los permisos necesarios para acceder a esa página";
            break;
    }
}

$usuariosValidos = array( //Por mientras
    "root" => "63a9f0ea7bb98050796b649e85481845",
    "admin" => "0192023a7bbd73250516f069df18b500",
    "user" => "ee11cbb19052e40b07aac0ca060c23ee"
);

if (isset($_POST["action"]) && $_POST["action"] == "login") {
    $user = $_POST["mail"];
    $pass = $_POST["contraseña"];

    setcookie("usuario_mail", $user, time() + 60 * 60 * 24);
    
    if (isset($usuariosValidos[$user]) && md5($pass) == $usuariosValidos[$user]) {
        $acceso = true;
        $_SESSION["user"] = array(
            "mail" => $user,
            "acceso" => $acceso,
            "esAdmin" => $user == "root" || $user == "admin" ? true : false
        );
        
    } else {
        $mensaje = "Nombre de mail o contraseña inválidos";
    }
}

if (isset($_POST["action"]) && $_POST["action"] == "logout") {
    unset($_SESSION["user"]);
    header("location: login.php");
    die();
}

$user = isset($_POST["mail"]) ? $_POST["mail"] : $_COOKIE["usuario_mail"];

// Si el usuario nunca accedió, lo definimos como anónimo
if(!isset($_SESSION["user"])){
    $_SESSION["user"] = array(
            "nombre" => "anónimo",
            "acceso" => false,
            "esAdmin" => false
        );
}

$smarty->assign("action", $_SERVER["REQUEST_URI"]);
$smarty->assign("user", $_SESSION["user"]);
$smarty->assign("usuario_mail", $user);
if (isset($mensaje)) { $smarty->assign("mensaje", $mensaje); }
$smarty->assign("smensaje", "Bienvenido " . $_SESSION["user"]["nombre"]);

$smarty->display("login.tpl");



