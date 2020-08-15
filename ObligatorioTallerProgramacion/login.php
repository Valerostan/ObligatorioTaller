<?php

session_start();

require_once('configuracion.php');

$acceso = isset($_SESSION["user"]);

if (isset($_POST["mail"]) && !strlen($_POST["mail"])) {
    $mensaje = "Debe ingresar un valor para el mail.";
}

$usuariosValidos = array( //Por mientras
    "root@root" => "rootroot",
    "admin" => "0192023a7bbd73250516f069df18b500",
    "user@user" => "user"
);

if (isset($_POST["action"]) && $_POST["action"] == "login") {
    $user = $_POST["mail"];
    $pass = $_POST["psw"];

    setcookie("usuario_mail", $user, time() + 60 * 60 * 24);

    if (isset($usuariosValidos[$user]) && $pass == $usuariosValidos[$user]) {
        $acceso = true;
        $_SESSION["user"] = array(
            "mail" => $user,
            "acceso" => $acceso,
            "esAdmin" => $user == "root@root" || $user == "admin" ? true : false
        );
    } else {
        $mensaje = "Nombre de mail o contraseña inválidos";
    }
}

if (isset($_POST["action"]) && $_POST["action"] == "cerrar") {
    header("location: index.php");
}

if (isset($_POST["action"]) && $_POST["action"] == "logout") {
    unset($_SESSION["user"]);
    header("location: login.php");
    die();
}

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



