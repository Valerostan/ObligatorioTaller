<?php

require_once 'datos.php';

$nombre = $_POST["nombre"];
$email = $_POST["mail"];
$contraseña = $_POST["contraseña"];
$direccion = $_POST["direccion"];
$fecha = $_POST["fecha"];
$ci = $_POST["cedula"];
$apellido = $_POST["apellido"];

$conn = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);


if ($conn->conectar()) {
    $sql = "SELECT * FROM usuarios WHERE email=:email";
    $parametros = array();
    $parametros[0] = array("email", $email, "string");

    if ($conn->consulta($sql, $parametros)) {
        $fila = $conn->siguienteRegistro(); //Le asigno a fila el resultado de la consulta
        $mailEnUso = isset($fila['usuario_id']);
    } else {
        echo "Error con Consulta " . $conn->ultimoError();
    }
} else {
    echo "Error de Conexión " . $conn->ultimoError();
}

list($año, $mes, $dia) = explode('-', $fecha);

if ((date("Y") - $año) > 18) {
    $esMenor = false;
} else {
    if ((date("Y") - $año) == 18) {
        if ((date("m") - $mes) > 0) {
            $esMenor = false;
        } else {
            if ((date("m") - $mes) == 0) {
                $esMenor = (date("d") - $dia) < 0;
            } else {
                $esMenor = true;
            }
        }
    } else {
        $esMenor = true;
    }
}


if ($esMenor) {
    $_SESSION['acceso'] = false;
    header('location:signup.php?edadErr=1');
    
} else {
    if ($mailEnUso) {
        $_SESSION['acceso'] = false;
        header('location:signup.php?emailErr=1');
        
    } else {
        if (strlen($contraseña) < 5) {
            $_SESSION['acceso'] = false;
            $_SESSION['mensaje'] = "contraseña corta";
            header('location:signup.php?claveErr=1');
        } else {
            if ($conn->conectar()) {

                $sql = "INSERT INTO usuarios(email, nombre ,apellido ,ci,fecha_nacimiento ,direccion,password,usuario_tipo_id) VALUES(:email,:nombre,  :apellido, :ci, :fecha_nacimiento,:direccion,:clave,2)";

                $parametros = array();
                $parametros[0] = array("email", $email, "string");
                $parametros[1] = array("nombre", $nombre, "string");
                $parametros[2] = array("apellido", $apellido, "string");
                $parametros[3] = array("fecha_nacimiento", $fecha, "string");
                $parametros[4] = array("ci", $ci, "string");
                $parametros[5] = array("direccion", $direccion, "string");
                $parametros[6] = array("clave",  md5($contraseña), "string");

                if ($conn->consulta($sql, $parametros)) {
                    $fila = $conn->siguienteRegistro(); //Le asigno a fila el resultado de la consulta

                    session_start();

                    $_SESSION['acceso'] = true;
                    $_SESSION['mail'] = $fila["mail"];
                    $_SESSION['idActivo'] = $fila["usuario_id"];
                    if ($fila['usuario_tipo_id'] == 1) {
                        $_SESSION['esAdmin'] = true;
                        $_SESSION['esCliente'] = false;
                    } else {
                        if ($fila['usuario_tipo_id'] == 3) {
                            $_SESSION['esCliente'] = true;
                        }else{
                            $_SESSION['esCliente'] = false;
                            $_SESSION['esAdmin'] = false;
                        }
                        
                    }
                    setcookie("mail", $fila["mail"], time() + (60 * 60 * 24));
                    header("Location: index.php");
                } else {
                    echo "Error con Consulta " . $conn->ultimoError();
                }
            } else {
                echo "Error de Conexión " . $conn->ultimoError();
            }
        }
    }
}


