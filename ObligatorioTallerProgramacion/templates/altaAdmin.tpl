{* Smarty *}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

<head>
    <meta charset="UTF-8">
    <title>Academia/Administraci</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/estilo.css" type="text/css" />
</head>

<body>

    <div class="registro">
        <form class="contenido-registro">
            <span class="alta">Alta Instructor</span>

            <div id="salir">
                <i class="fa fa-close"></i>
            </div>

            <div id="contiene-usuario">
                <img class="usuario"src="./img/avatar.png"/>
            </div>

            <div class="datos">

                <label for="nombre"><b>Nombre:</b></label>
                <input type="text" placeholder="Ingrese nombre" name="nombre" required>

                <label for="apellido"><b>Apellido:</b></label>
                <input type="text" placeholder="Ingrese apellido" name="apellido" required>

                <label for="cedula"><b>Cedula:</b></label>
                <input type="number" placeholder="Ingrese cedula" name="cedula" required>

                <label for="fecha"><b>Fecha de nacimiento:</b></label>
                <input type="date" placeholder="Ingrese fecha" name="fecha" required>

                <label for="fecha"><b>Fecha de vencimiento de licencia:</b></label>
                <input type="date" placeholder="Ingrese fecha vencimiento" name="fecha" required>

                <button class="enviarDatos " type="submit">Dar de alta</button>
            </div>
        </form>
    </div>
</body>
</html>
