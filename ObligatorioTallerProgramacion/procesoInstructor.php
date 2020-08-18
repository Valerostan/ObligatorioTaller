<?php

require_once 'datos.php';

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$fecha_nacimiento = $_POST["fecha1"];
$vencimiento = $_POST["fecha2"];
$ci = $_POST["cedula"];

$conn = new ConexionBD(MOTOR, SERVIDOR, BASEDATOS, USUARIOBASE, CLAVEBASE);


if ($conn->conectar()) {
    $sql = "SELECT * FROM instructores WHERE ci=:ci";
    $parametros = array();
    $parametros[0] = array("ci", $ci, "string");

    if ($conn->consulta($sql, $parametros)) {
        $fila = $conn->siguienteRegistro(); //Le asigno a fila el resultado de la consulta
        $ciEnUso = isset($fila['usuario_id']);
    } else {
        echo "Error con Consulta " . $conn->ultimoError();
    }
} else {
    echo "Error de Conexión " . $conn->ultimoError();
}

list($año, $mes, $dia) = explode('-', $fecha_nacimiento);

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

list($año, $mes, $dia) = explode('-', $vencimiento);

if ((date("Y") - $año) < 0) {
    $vencida = false;
} else {
    if ((date("Y") - $año) == 0) {
        if ((date("m") - $mes) < 0) {
            $vencida = false;
        } else {
            if ((date("m") - $mes) == 0) {
                $vencida = (date("d") - $dia) > 0;
            } else {
                $vencida = true;
            }
        }
    } else {
        $vencida = true;
    }
}

if ($vencida) {
    header('location:instructor.php?vencidoErr=1');
    
} else {
    if ($esMenor) {
        header('location:instructor.php?edadErr=1');
        
    } else {
        if ($ciEnUso) {
            header('location:instructor.php?ciErr=1');
        } else {
            if (false) {
                
            } else {
                if ($conn->conectar()) {


                    $sql = "INSERT INTO instructores(nombre ,apellido ,ci,fecha_nacimiento ,vencimiento) VALUES(:nombre, :apellido, :ci, :fecha_nacimiento,:vencimiento)";

                    $parametros = array();
                    $parametros[0] = array("nombre", $nombre, "string");
                    $parametros[1] = array("apellido", $apellido, "string");
                    $parametros[3] = array("fecha_nacimiento", $fecha_nacimiento, "string");
                    $parametros[4] = array("ci", $ci, "string");
                    $parametros[5] = array("vencimiento", $vencimiento, "string");

                    if ($conn->consulta($sql, $parametros)) {
                        $fila = $conn->siguienteRegistro(); //Le asigno a fila el resultado de la consulta
                        header('location:instructor.php?bien=1');
                    } else {
                        echo "Error con Consulta " . $conn->ultimoError();
                    }
                } else {
                    echo "Error de Conexión " . $conn->ultimoError();
                }
            }
        }
    }
}


