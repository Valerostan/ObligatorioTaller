<?php

$respuestaConsulta = array();

session_start();

require_once("configuracion.php");
require_once("libs/class.Conexion.BD.php");

$conn = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);
$conn1 = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);


    if ($conn->conectar() && $conn1->conectar()) {
        $sql = "SELECT COUNT( reserva_id) AS cantidad, fecha FROM reservas WHERE MONTH(curdate()) = MONTH(fecha)
                GROUP BY (fecha)";
        $sql1 = "SELECT count(instructor_id) as cantInstructores FROM instructores";
        
        $parametros = array();
        
        $parametros1 = array();
        
        if ($conn->consulta($sql, $parametros) && $conn1->consulta($sql1, $parametros1)) {
            $respuestaConsulta["data"] = $conn->restantesRegistros(); 
            $respuestaConsulta["estado"] = "OK";
            $respuestaConsulta["data1"] = $conn1->restantesRegistros(); 
            
            //$smarty->assign("reservas", $respuestaConsulta);
            //$smarty->assign("cantInstructores", $respuestaConsulta1);
            
            
        } else {
            $respuestaConsulta["estado"] = "ERROR";
        }
    } else {
        $respuestaConsulta["estado"] = "ERROR";
    }
    
            echo json_encode($respuestaConsulta);
