<?php

session_start();


//Incluyo la clase de conexion.
require_once("configuracion.php");
require_once("libs/class.Conexion.BD.php");

$varAjax=$POST_['peticion'];
$dia = $_POST['dia'];
$mes = $_POST['mes'];
$año = $_POST['año'];
$hora = $_POST['hora'];
$instructor = "1";
$user = $_SESSION['idActivo'];
$fecha = $_POST['pluginCalendario'];

//Creo el objeto para la conexion
$conn = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);

if ($conn->conectar()) {

     $sql = "SELECT * FROM reservas WHERE instructor_id = :instructor";
     
    //concateno la fecha
    $fecha = "{$año}-{$mes}-{$dia}";
    $fechaFormateada = DateTime::createFromFormat('Y-m-d', $fecha);

    //creo los parametros para la consulta
    $parametros = array();
    #$parametros[0] = array("fecha", $fechaFormateada->format('Y-m-d'), "date");
    #$parametros[1] = array("hora", $hora, "int");
    $parametros[0] = array("instructor_id", $instructor);
    
    
    //ejecuto la consulta
    if ($conn->consulta($sql, $parametros)) {
        $respuesta['estado'] = "OK";
        $respuesta['data'] = $conn->restantesRegistros();
        header("Location: reserva.php");


    } else {
        $respuesta['estado'] = "ERROR";
        $respuesta['error'] = "Error al ejecutar consulta";
    }
} else {
    $respuesta['estado'] = "ERROR";
    $respuesta['error'] = "Error al ejecutar consulta";
}

echo json_encode($respuesta);
?>


