

<?php

require_once('configuracion.php');
require_once("libs/class.Conexion.BD.php");

$inst = $_POST['instructor'];
$date = $_POST['fecha'];

$conn = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);

if ($conn->conectar()) {
    $sql = "SELECT distinct nombre,direccion FROM reservas, usuarios WHERE reservas.usuario_id=usuarios.usuario_id and instructor_id=:inst and fecha=:date ORDER BY fecha";
        $parametros = array();
             $parametros[0] = array("date",$date,"string");
             $parametros[1] = array("inst",$inst,"string");

    if($conn->consulta($sql, $parametros)){
        $alumnos = $conn->restantesRegistros(); //Le asigno a fila el resultado de la consulta
        if (count($alumnos) == 0) {
            
        }
        
        session_start();
        
        $_SESSION['url'] = $_SERVER['REQUEST_URI'];
        
        $smarty->assign("alumnos", $alumnos);
        $smarty->assign("acceso", $_SESSION['acceso']);
        $smarty->assign("esAdmin", $_SESSION['esAdmin']);
        $smarty->assign("fecha", $date);
        $smarty->assign("instructor", $inst);
        

        $smarty->display("alumnosInstructor.tpl");
    } else {
        echo "Error con Consulta " . $conn->ultimoError();
    }
} else {
    echo "Error de Conexión " . $conn->ultimoError();
}
?>

