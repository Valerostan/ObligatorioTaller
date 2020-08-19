<?php

require_once('configuracion.php');
require_once("libs/class.Conexion.BD.php");


$conn = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);

if ($conn->conectar()) {
    $sql = "SELECT * FROM instructores ";
    $parametros = array();
    if ($conn->consulta($sql, $parametros)) {
        $instructores = $conn->restantesRegistros(); //Le asigno a fila el resultado de la consulta
        $errorInstructores = false;
        if (count($instructores) == 0) {
            $errorInstructores = true;
        }


        session_start();

        $_SESSION['url'] = $_SERVER['REQUEST_URI'];

        $errorFecha = false;
        if (isset($_GET["errFecha"])) {
            $errorFecha = true;
        }


        $bien = false;
        if (isset($_GET["bien"])) {
            $bien = true;
        }


        $errConsulta = false;
        if (isset($_GET["errConsulta"])) {
            $errConsulta = true;
        }
        
       

        $smarty->assign("instructores", $instructores);
        $smarty->assign("acceso", $_SESSION['acceso']);
        $smarty->assign("esAdmin", $_SESSION['esAdmin']);
        $smarty->assign("errorInstru", $errorInstructores);
        $smarty->assign("errorFecha", $errorFecha);
        $smarty->assign("bien", $bien);
        $smarty->assign("errConsulta", $errConsulta);
        $smarty->assign("esCliente", $_SESSION['esCliente']);
        $smarty->assign("usuarioLoggeado", $_SESSION['mail']); //Le asigno al usuarioLoggeado el valor que tiene la sesion en mail




        $smarty->display('reserva.tpl');
    } else {
        echo "Error con Consulta " . $conn->ultimoError();
    }
} else {
    echo "Error de Conexión " . $conn->ultimoError();
}
?>

