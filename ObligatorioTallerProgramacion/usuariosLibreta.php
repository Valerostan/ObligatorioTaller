<?php

require_once('configuracion.php');
require_once("libs/class.Conexion.BD.php");


$conn = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);

if ($conn->conectar()) {
    $sql = 'SELECT usuarios.usuario_id, usuarios.nombre FROM reservas,usuarios where reservas.usuario_id=usuarios.usuario_id 
            and reservas.fecha< Curdate() and (usuarios.usuario_id not in (select usuarios.usuario_id  from libretas))
            having count(1)>=1';

    $parametros = array();
    if ($conn->consulta($sql, $parametros)) {
        $usuarios = $conn->restantesRegistros(); //Le asigno a fila el resultado de la consulta
        if (count($usuarios) == 0) {
            return false;
        }
        session_start();
        
        $_SESSION['url'] = $_SERVER['REQUEST_URI'];
        
        $smarty->assign("usuarios", $usuarios);
        $smarty->assign("acceso", $_SESSION['acceso']);
        $smarty->assign("esAdmin", $_SESSION['esAdmin']);

        $smarty->display('usuariosLibreta.tpl');
        
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

