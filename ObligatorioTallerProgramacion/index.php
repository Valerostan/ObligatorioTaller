<?php
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];

require_once('configuracion.php');

//Seteo el charset de la página como utf-8
header('Content-Type: text/html; charset=utf-8');


$smarty->assign("user", $_SESSION['user']);
$smarty->display("index.tpl");

?>
