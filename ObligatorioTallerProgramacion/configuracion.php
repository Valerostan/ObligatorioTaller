<?php

/*
 * CONFIGURACION DE SMARTY  
 */
require_once('libs/Smarty.class.php');

define('APP_PATH', $_SERVER['DOCUMENT_ROOT'] . '/ObligatorioTallerProgramacion/');

define('TEMPLATE_DIR', APP_PATH . 'templates/');
define('COMPILER_DIR', APP_PATH . 'tmp/templates_c/');
define('CONFIG_DIR', APP_PATH . 'tmp/configs/');
define('CACHE_DIR', APP_PATH . 'tmp/cache/');

//Defino parámetros de la conexión
define("MOTOR","mysql");
define("SERVIDOR","localhost");
define("BASEDATOS","obligatorio");
define("USUARIOBASE","root");
define("CLAVEBASE","root");

//DECLARO SAMRTY
$smarty = new Smarty;

$smarty->template_dir = TEMPLATE_DIR;
$smarty->compile_dir = COMPILER_DIR;
$smarty->config_dir = CONFIG_DIR;
$smarty->cache_dir = CACHE_DIR;


?>