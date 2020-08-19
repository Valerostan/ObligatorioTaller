<?php

session_start();

require_once("configuracion.php");
require_once("libs/class.Conexion.BD.php");

try {
    $user = $_SESSION['idActivo'];

    echo $_POST['userId'];

    $conn = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);


    if ($conn->conectar()) {
        $sql = "SELECT * FROM libretas WHERE usuario_id=:usuario_id";
        $parametros = array();
        $parametros[0] = array("usuario_id", $user, "int");
        if ($conn->consulta($sql, $parametros)) {
            $respuestaConsulta['data'] = $conn->restantesRegistros(); //Le asigno a fila el resultado de la consulta
            $libretaExistente = empty($respuestaConsulta['data']);
        } else {
            $respuestaConsulta['estado'] = "ERROR";
        }
    } else {
        $respuestaConsulta['estado'] = "ERROR";
    }


    if ($libretaExistente) {
        //creo la consulta
        //mailActivo es la variable, que luego se va a sustituir por $mail al hacr la consulta
        $sql = "INSERT INTO `libretas`(`fecha`, `usuario_id`) VALUES (Curdate(),:usuario_id)";

        //creo los parametros
        $parametros = array();
        $parametros[0] = array("usuario_id", $user, "int");

        //ejecuto la consulta
        if ($conn->consulta($sql, $parametros)) {
            return true;
        } else {
            echo "Error con Consulta " . $conn->ultimoError();
        }
    } else {
        echo "Error de Conexión " . $conn->ultimoError();
    }
} catch (Exception $ex) {
    
}




