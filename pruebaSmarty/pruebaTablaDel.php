<?php
//INCLUYO LA CONFIGURACION DE SAMRTY
include_once("config_SMARTY.php");

//OBTENGO LA TABLA DEL NUMERO A GENERAR
$numero = (int)$_GET['numero'];

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

//GENERO LA TABLA DEL...
$datos=array();
for($pos=0;$pos<=10;$pos++){
	$tmp = array(	"numero"=>$numero,
					"valor"=>$pos,
					"resultado"=>($numero*$pos)
				);
	$datos[]=$tmp;
}

//CARGO LOS VALORES EN EL TEMPLATE
$smarty->assign("numero", $numero);
$smarty->assign("datos", $datos);

/*
 * ENVIO EL TEMPLATE AL CLIENTE
 */
$smarty->display($template . '.tpl');

?>
