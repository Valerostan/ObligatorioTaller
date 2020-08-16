<?php 

session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];

require_once('configuracion.php');
require_once("libs/class.Conexion.BD.php");

//Seteo el charset de la página como utf-8
header('Content-Type: text/html; charset=utf-8');

//Creo el objeto para la conexion
$conn = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);

$smarty->assign("acceso", $_SESSION['acceso']);
$smarty->assign("esAdmin", $_SESSION['esAdmin']);

$smarty->display("altaAdmin.tpl");
?>