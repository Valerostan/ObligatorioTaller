<?php

require_once 'datos.php';

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$fecha_nacimiento = $_POST["fecha1"];
$vencimiento = $_POST["fecha2"];
$ci = $_POST["cedula"];

$conn = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);



if ($ciEnUso) {
    $_SESSION['mensaje'] = "Ese instructor ya se ingreso";
    header('location:instructor.php?');
} else {
    if (false) {
    } else {
        if ($conn->conectar()) {
            
         
            $sql = "INSERT INTO instructores(nombre ,apellido ,ci,fecha_nacimiento ,vencimiento) VALUES(:nombre, :apellido, :ci, :fecha_nacimiento,:vencimiento)";

            $parametros = array();
            $parametros[0] = array("nombre", $nombre, "string");
            $parametros[1] = array("apellido", $apellido, "string");
            $parametros[3] = array("fecha_nacimiento", $fecha_nacimiento, "string");
            $parametros[4] = array("ci", $ci, "string");
            $parametros[5] = array("vencimiento", $vencimiento, "string");

            if ($conn->consulta($sql, $parametros)) {
                $fila = $conn->siguienteRegistro(); //Le asigno a fila el resultado de la consulta
                alert("Instructor ingresado con éxito");
                 header("Location: index.php");

            } else {
                echo "Error con Consulta " . $conn->ultimoError();
            }
        } else {
            echo "Error de Conexión " . $conn->ultimoError();
        }
    }
}


