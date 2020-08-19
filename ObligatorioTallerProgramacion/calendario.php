<?php

session_start();

require_once("configuracion.php");
require_once("libs/class.Conexion.BD.php");

$conn = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);
$conn1 = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);


    if ($conn->conectar() && $conn1->conectar()) {
        $sql = "SELECT id_reserva FROM reservas WHERE fecha=:fecha";
        $sql1 = "SELECT count(instructor_id) as cantInstructores FROM instructores";
        
        $parametros = array();
        $parametros[0] = array("fecha", $fecha, "string");
        
        $parametros1 = array();
        $parametros1[0] = array("fecha", $fecha, "string");
        
        if ($conn->consulta($sql, $parametros) && $conn1->consulta($sql1, $parametros1)) {
            $respuestaConsulta['data'] = $conn->restantesRegistros(); 
            $respuestaConsulta['estado'] = 'OK';
            
            $respuestaConsulta1['data'] = $conn1->restantesRegistros(); 
            $respuestaConsulta1['estado'] = 'OK';
            
            $smarty->assign("reservas", $respuestaConsulta);
            $smarty->assign("cantInstructores", $respuestaConsulta1);
            
            
        } else {
            $respuestaConsulta['estado'] = "ERROR";
            $respuestaConsulta1['estado'] = "ERROR";
        }
    } else {
        $respuestaConsulta['estado'] = "ERROR";
        $respuestaConsulta1['estado'] = "ERROR";
    }

