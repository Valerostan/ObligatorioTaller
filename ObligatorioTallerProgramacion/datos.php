<?php

require_once 'libs/Smarty.class.php';
require_once "libs/class.Conexion.BD.php";
require_once 'configuracion.php';

$conn = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);

function getCantReservas($usuario_id) {
    if($conn->conectar()){
            $sql = "SELECT count(*) FROM reservas where usuario_id=:usuario_id  ";
             $parametros = array();
             $parametros[0] = array("usuario_id",$usuario_id,"int");

    if($conn->consulta($sql, $parametros)){
        $fila = $conn->siguienteRegistro(); //Le asigno a fila el resultado de la consulta
        return $fila;
        
    }
    else{
        echo "Error con Consulta " . $conn->ultimoError();
    }
}
else{
    echo "Error de Conexión " . $conn->ultimoError();
}
}

function usuariosConReservas() {
       if($conn->conectar()){
        $sql = "SELECT usuarios.nombre FROM reservas,usuarios where reservas.usuario_id==ususarios.usuario_id ";
        $parametros = array();
    if($conn->consulta($sql, $parametros)){
        $fila = $conn->siguienteRegistro(); //Le asigno a fila el resultado de la consulta
        if(count($fila)==0){
        return false;
}
        
    }else{
        echo "Error con Consulta " . $conn->ultimoError();
    }
}
else{
    echo "Error de Conexión " . $conn->ultimoError();
}

}

function getUsuario($usuario_id) {
    if($conn->conectar()){
        $sql = "SELECT * FROM usuario WHERE usuario_id=:usuario_id";
        $parametros = array();
             $parametros[0] = array("usuario_id",$usuario_id,"int");

    if($conn->consulta($sql, $parametros)){
        $fila = $conn->siguienteRegistro(); //Le asigno a fila el resultado de la consulta
        return $fila;
        
    }else{
        echo "Error con Consulta " . $conn->ultimoError();
    }
}
else{
    echo "Error de Conexión " . $conn->ultimoError();
}
    
}

function getReservaPorFechaInstruc($date, $inst) {
        if($conn->conectar()){
        $sql = "SELECT nombre,direccion FROM reservas, usuarios WHERE reservas.usuario_id=usuarios.usuario_id and instructor_id=:inst and fecha=:date ORDER BY fecha";
        $parametros = array();
             $parametros[0] = array("date",$date,"string");
             $parametros[1] = array("inst",$inst,"string");

    if($conn->consulta($sql, $parametros)){
        $fila = $conn->siguienteRegistro(); //Le asigno a fila el resultado de la consulta
        return $fila;
        
    }else{
        echo "Error con Consulta " . $conn->ultimoError();
    }
}
else{
    echo "Error de Conexión " . $conn->ultimoError();
}
}




function emailEnUso($email) {
    
    if($conn->conectar()){
            $sql = "SELECT * FROM usuarios WHERE email=:email";
             $parametros = array();
             $parametros[0] = array("email",$email,"string");

    if($conn->consulta($sql, $parametros)){
        $fila = $conn->siguienteRegistro(); //Le asigno a fila el resultado de la consulta
        return isset($fila['usuario_id']);
        
    }else{
        echo "Error con Consulta " . $conn->ultimoError();
    }
}
else{
    echo "Error de Conexión " . $conn->ultimoError();
}
}




