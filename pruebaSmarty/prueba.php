<?php

//INCLUYO LA CONFIGURACION DE SAMRTY
include_once("config_SMARTY.php");

//DECLARO SAMRTY
$smarty = new Smarty;

//COLOCO LA DESIGNACION DE DIRECTORIOS
$smarty->template_dir = TEMPLATE_DIR;
$smarty->compile_dir = COMPILER_DIR;
$smarty->config_dir = CONFIG_DIR;
$smarty->cache_dir = CACHE_DIR;

/*
 * OTENGO EL NOMBRE DEL TPL QUE ES EL MISMO QUE EL FUENTE PHP
 */
$nomPag = substr($_SERVER['PHP_SELF'], strrpos($_SERVER['PHP_SELF'], '/') + 1);
$template = substr($nomPag, 0, strlen($template) - 4);

/*
 * PROCESO EL CONTENIDO DEL TEMPLATE
 */
$smarty->assign("texto", "Hola Mundo!");

/*
 * ENVIO EL TEMPLATE AL CLIENTE
 */
$smarty->display($template . '.tpl');

?>
