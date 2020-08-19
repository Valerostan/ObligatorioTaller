<?php

session_start();

require_once("configuracion.php");
require_once("libs/class.Conexion.BD.php");


try {
    $id  = (int) $_POST['userId'];

    $conn = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);

    if ($conn->conectar()) {
        //creo la consulta
        //mailActivo es la variable, que luego se va a sustituir por $mail al hacr la consulta
        $sql = "INSERT INTO libretas(fecha,usuario_id) VALUES (Curdate(),:usuario_id)";

        //creo los parametros
        $parametros = array();
        $parametros[0] = array("usuario_id", $id, "int");
      
        //ejecuto la consulta
        if ($conn->consulta($sql, $parametros)) {
            $response['status'] = 'ok';
        } else {
            echo "Error con Consulta " . $conn->ultimoError();
        }
    } else {
        echo "Error de Conexión " . $conn->ultimoError();
    }
} catch (Exception $ex) {
    $response = $ex->getMessage();
}
echo json_encode($response);






