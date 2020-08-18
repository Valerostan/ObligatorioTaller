<?php

require_once('configuracion.php');
require_once("libs/class.Conexion.BD.php");


$conn = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);

if ($conn->conectar()) {
    $sql = "SELECT * FROM instructores ";
    $parametros = array();
    if ($conn->consulta($sql, $parametros)) {
        $instructores = $conn->restantesRegistros(); //Le asigno a fila el resultado de la consulta
        
        if (count($instructores) == 0) {
             $mensaje="No hay instructores";
        }
        
        echo $instructores;
        
        session_start();
        
        $_SESSION['url'] = $_SERVER['REQUEST_URI'];
        
        $smarty->assign("instructores", $instructores);
        $smarty->assign("acceso", $_SESSION['acceso']);
        $smarty->assign("esAdmin", $_SESSION['esAdmin']);

        $smarty->display('reserva.tpl');
    } else {
        echo "Error con Consulta " . $conn->ultimoError();
    }
} else {
    echo "Error de Conexión " . $conn->ultimoError();
}

?>

