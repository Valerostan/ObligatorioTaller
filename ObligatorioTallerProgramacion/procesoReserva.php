<?php
session_start();


//Incluyo la clase de conexion.
require_once("configuracion.php");
require_once("libs/class.Conexion.BD.php");

$dia = $_POST['dia'];
$mes = $_POST['mes'];
$año = $_POST['año'];
$hora = $_POST['hora'];
$instructor = "1";
$user = $_SESSION['idActivo'];
$fecha = "";

//Creo el objeto para la conexion
$conn = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);

if ($conn->conectar()) {
    
    //concateno la fecha
    $fecha="{$año}-{$mes}-{$dia}";
    $fechaFormateada = DateTime::createFromFormat('Y-m-d', $fecha);
    //creo la consulta
    $sql = "INSERT INTO reservas (fecha, hora, instructor_id, usuario_id)";
    $sql .= " VALUES (:fecha,:hora,:instructor_id,:usuario_id)";

    //creo los parametros para la consulta
    $parametros = array();
    $parametros[0] = array("fecha", $fechaFormateada->format('Y-m-d'), "date");
    $parametros[1] = array("hora", $hora, "int");
    $parametros[2] = array("instructor_id", $instructor, "int");
    $parametros[3] = array("usuario_id", $user, "int");

    //ejecuto la consulta
    if ($conn->consulta($sql, $parametros)) {
        header("Location: reserva.php");
    } else {
        echo "Error con Consulta " . $conn->ultimoError();
    }
} else {
    echo "Error de Conexión " . $conn->ultimoError();
}
?>


