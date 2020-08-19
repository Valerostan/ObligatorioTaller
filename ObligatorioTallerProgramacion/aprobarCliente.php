<?php

require_once('configuracion.php');
require_once("libs/class.Conexion.BD.php");


$conn = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);

if ($conn->conectar()) {
    $sql = "SELECT distinct usuarios.* FROM usuarios where usuario_tipo_id=2 ";
    $parametros = array();
    if ($conn->consulta($sql, $parametros)) {
        $usuarios = $conn->restantesRegistros(); //Le asigno a fila el resultado de la consulta

        
        session_start();
        
        $_SESSION['url'] = $_SERVER['REQUEST_URI'];
        
        $smarty->assign("usuarios", $usuarios);
        $smarty->assign("acceso", $_SESSION['acceso']);
        $smarty->assign("esAdmin", $_SESSION['esAdmin']);
        $smarty->assign("esCliente", $_SESSION['esCliente']);


        $smarty->display('pre_vista_usuarios.tpl');
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

