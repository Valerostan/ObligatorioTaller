<?php
session_start();

//Incluyo la clase de conexion.
require_once("configuracion.php");
require_once("libs/class.Conexion.BD.php");

$mail = $_POST['mail'];
$password = $_POST['psw'];
$idActivo = "";

//Creo el objeto para la conexion
$conn = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);

if($conn->conectar()){
    //creo la consulta
    //mailActivo es la variable, que luego se va a sustituir por $mail al hacr la consulta
    $sql = "SELECT * FROM usuarios WHERE email = :mailActivo";
    
    //creo los parametros
    $parametros = array();
    $parametros[0] = array("mailActivo",$mail,"string");
    
    //ejecuto la consulta
    if($conn->consulta($sql, $parametros)){
        $fila = $conn->siguienteRegistro(); //Le asigno a fila el resultado de la consulta
        if($password==$fila["password"]){ //Como la consulta retorno algo (porque entro al mail) verifico que la ocnstraseña sea correcta
            $_SESSION['acceso'] = true;
            $_SESSION['mail'] = $mail;
            $_SESSION['idActivo'] = $fila["usuario_id"];
            if($fila['usuario_tipo_id'] == 1){
                $_SESSION['esAdmin'] = true;
            }else{
                $_SESSION['esAdmin'] = false;
            }
            setcookie("mail",$mail, time()+(60*60*24));
            header("Location: index.php");
        }
        else{
            $_SESSION['acceso'] = false;
            $_SESSION['mensaje'] = "Usuario y/o contaseña erroneos";
            header("Location: login.php");
        }
    }
    else{
        echo "Error con Consulta " . $conn->ultimoError();
    }
}
else{
    echo "Error de Conexión " . $conn->ultimoError();
}
?>