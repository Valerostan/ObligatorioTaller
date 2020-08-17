<?php

require_once 'datos.php';


$conn = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);

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

        header("Location: index.php");
    } else {
        echo "Error con Consulta " . $conn->ultimoError();
    }
} else {
    echo "Error de Conexión " . $conn->ultimoError();
}
 


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

