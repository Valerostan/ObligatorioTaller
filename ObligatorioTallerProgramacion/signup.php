<?php
session_start();

require_once('configuracion.php');

$acceso = isset($_SESSION["user"]);

if (isset($_POST["mail"]) && !strlen($_POST["mail"])) {
    $mensaje = "Debe ingresar un valor para el mail.";
}

if (isset($_POST["nombre"]) && !strlen($_POST["nombre"])) {
    $mensaje = "Debe ingresar un valor para el nombre.";
}

if (isset($_POST["apellido"]) && !strlen($_POST["apellido"])) {
    $mensaje = "Debe ingresar un valor para el apellido.";
}

if (isset($_POST["cedula"]) && !strlen($_POST["cedula"])) {
    $mensaje = "Debe ingresar un valor para el cedula.";
}


if (isset($_POST["fecha"]) && !strlen($_POST["fecha"])) {
    $mensaje = "Debe ingresar un valor para el fecha.";
}

if (isset($_POST["direccion"]) && !strlen($_POST["direccion"])) {
    $mensaje = "Debe ingresar un valor para el direccion.";
}

if (isset($_POST["contraseña"]) && !strlen($_POST["contraseña"])) {
    $mensaje = "Debe ingresar un valor para el contraseña.";
}




$usuariosValidos = array( //Por mientras
    "root@root" => "root",
    "admin" => "0192023a7bbd73250516f069df18b500",
    "user@user" => "user"
);

if (isset($_POST["action"]) && $_POST["action"] == "signup") {
    $nombre = $_POST["nombre"];
    $pass = $_POST["contraseña"];
    $apellido = $_POST["apellido"];
    $cedula = $_POST["cedula"];
    $fecha = $_POST["fecha"];
    $direccion = $_POST["direccion"];
    $user = $_POST["mail"];

    

    setcookie("usuario_mail", $user, time() + 60 * 60 * 24); //para que es esto
    
    if (isset($usuariosValidos[$user])) {
        $acceso = false;
        $mensaje = "Este usuario ya esta registrado";
    }else{
        $acceso = true;
         $_SESSION["user"] = array(
            "mail" => $user,
            "acceso" => $acceso,
            "esAdmin" => $user == "root@root" || $user == "admin" ? true : false
       
        );
        
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
$smarty->assign("smensaje", " usted ya esta registrado así que diríjase a la página de inicio o puede salir de la sesion con el siguiente boton, bienvenido " . $_SESSION["user"]["mail"]);

$smarty->display("signup.tpl");