<?php

session_start();


//Incluyo la clase de conexion.
require_once("configuracion.php");
require_once("libs/class.Conexion.BD.php");

$fecha = $_POST['pluginCalendario'];
$hora = $_POST['hora'];
$instructor = $_POST['instructor'];
$user = $_SESSION['idActivo'];



//Creo el objeto para la conexion
$conn = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);

if ($conn->conectar()) {
    $sql = "SELECT * FROM reservas WHERE instructor_id=:instructor_id and  fecha=:fecha and hora=:hora";
    $parametros = array();
    $parametros[0] = array("instructor_id", $instructor, "int");
    $parametros[1] = array("fecha", $fecha, "string");
    $parametros[2] = array("hora", $hora, "int");

    if ($conn->consulta($sql, $parametros)) {
        $respuestaConsulta['data'] = $conn->restantesRegistros(); //Le asigno a fila el resultado de la consulta
        $reservaExistente = empty($respuestaConsulta['data']);
    } else {
        $respuestaConsulta['estado'] = "ERROR";
    }
} else {
    $respuestaConsulta['estado'] = "ERROR";
}

list($año, $mes, $dia) = explode('-', $fecha);

if ((date("Y") - $año) < 0) {
    $yaPaso = false;
} else {
    if ((date("Y") - $año) == 0) {
        if ((date("m") - $mes) < 0) {
            $yaPaso = false;
        } else {
            if ((date("m") - $mes) == 0) {
                $yaPaso = (date("d") - $dia) > 0;
            } else {
                $yaPaso = true;
            }
        }
    } else {
        $yaPaso = true;
    }
}

if ($yaPaso) {
    header("Location: reserva.php?errFecha=1");
} else {

    if (($reservaExistente)) {
        if ($conn->conectar()) {

            $sql1 = "INSERT INTO reservas(fecha, hora ,instructor_id , usuario_id) "
                    . "VALUES(:fecha, :hora, :instructor_id, :usuario_id)";

            $parametros2 = array();
            $parametros2[0] = array("fecha", $fecha, "string");
            $parametros2[1] = array("hora", $hora, "int");
            $parametros2[2] = array("instructor_id", $instructor, "int");
            $parametros2[3] = array("usuario_id", $user, "int");

            //setcookie("mail", $fila["mail"], time() + (60 * 60 * 24));
            //header("Location: index.php");
            //ejecuto la consulta
            if ($conn->consulta($sql1, $parametros2)) {
                $respuestaConsulta['estado'] = "OK";
                $respuestaConsulta['data'] = $conn->restantesRegistros();
                header("Location: reserva.php?bien=1");
            } else {
                $respuestaConsulta['estado'] = "ERROR";
                $respuestaConsulta['error'] = "Error al ejecutar consulta" . " " . $fecha . " " . $hora . " " . $instructor . " " . $usuario_id;
                header("Location: reserva.php?errConsulta=1");
            }
        } else {
            $respuestaConsulta['estado'] = "ERROR";
            $respuestaConsulta['error'] = "Error al ejecutar consulta1";
            header("Location: reserva.php?errConsulta=1");
        }
    } else {
        header("Location: reserva.php?errFecha=1");
    }
}
?>
           
