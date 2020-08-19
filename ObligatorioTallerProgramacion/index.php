<?php

session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];

require_once('configuracion.php');
require_once("libs/class.Conexion.BD.php");

//Seteo el charset de la página como utf-8
header('Content-Type: text/html; charset=utf-8');

//Creo el objeto para la conexion
$conn = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);
$conn2 = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);

if ($conn->conectar() && $conn2->conectar()) {
    $sql = "SELECT count(usuarios.usuario_id) as cantUsuarios FROM usuarios";
    $parametros = array();
    $sql1 = "SELECT count(libretas.usuario_id) as cantLibretas FROM libretas";
    $parametros1 = array();
    
    if ($conn->consulta($sql, $parametros) && $conn2->consulta($sql1, $parametros1)) {
        $usuarios = $conn->restantesRegistros();
        $libretas = $conn2->restantesRegistros();
        
        session_start();

        $_SESSION['url'] = $_SERVER['REQUEST_URI'];

        $smarty->assign("cantUsuarios", $usuarios);
        $smarty->assign("cantLibretas", $libretas);
        $smarty->assign("acceso", $_SESSION['acceso']);
        $smarty->assign("esAdmin", $_SESSION['esAdmin']);

        $smarty->assign("esCliente", $_SESSION['esCliente']);
        $smarty->assign("usuarioLoggeado", $_SESSION['mail']); //Le asigno al usuarioLoggeado el valor que tiene la sesion en mail
        $smarty->display("index.tpl");

    } else {
        echo "Error con Consulta " . $conn->ultimoError();
    }
} else {
    echo "Error de Conexión " . $conn->ultimoError();
}
?>
