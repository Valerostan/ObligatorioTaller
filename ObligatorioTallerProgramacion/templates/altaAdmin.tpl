{* Smarty *}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

    <head>
        <meta charset="UTF-8">
            <title>Academia/Administraci</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
            <link rel="stylesheet" href="css/estilo.css" type="text/css" />

            <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
            <script type="text/javascript" src="js/altaInstructor.js"></script>

            <script type='text/javascript' src='js/jquery.datetimepicker.full.js'></script>
    </head>

    <body>
        {include "header.tpl"}

        {if $esAdmin} 
            <div class="registro">
                <form action="procesoInstructor.php" id="formInstructor"  method="POST" class="contenido-registro">
                    <div class="contiene-titulo">
                        <h2 class="ui center aligned icon header">
                            <i class="circular users icon"></i>
                            Alta instructor
                        </h2>

                        <div id="salir">
                            <i class="fa fa-close"></i>
                        </div>
                    </div>


                    <div class="datos">

                        <label for="nombre"><b>Nombre:</b></label>
                        <input type="text" placeholder="Ingrese nombre" name="nombre" required />

                        <label for="apellido"><b>Apellido:</b></label>
                        <input type="text" placeholder="Ingrese apellido" name="apellido" required />

                        <label for="cedula"><b>Cedula:</b></label>
                        <input type="number" placeholder="Ingrese cedula" name="cedula" required />

                        <label for="fecha"><b>Fecha de nacimiento:</b></label>
                        <input type="date" placeholder="Ingrese fecha" name="fecha1" name="fecha1" required />

                        <label for="fecha"><b>Fecha de vencimiento de licencia:</b></label>
                        <input type="date" placeholder="Ingrese fecha vencimiento" id="fecha2" name="fecha2" required />

                        <button class="enviarDatos " type="submit">Dar de alta</button>
                    </div>
                </form>
                <div class="botones">
                    <a href="./aprobarCliente.php"><i class="fa fa-pencil"></i>
                        <p class="nombre">Aprobar Cliente</p>
                    </a>
                    <a href="./actualizarLibreta.php"><i class="fa fa-pencil"></i>
                        <p class="nombre">Confirmar Libreta</p>
                    </a>
                    <a href="./listadoClases.php"><i class="fa fa-pencil"></i>
                        <p class="nombre">Listado de clases por instructor</p>
                    </a>
                </div>
            </div>


        {/if}
        {include "footer.tpl"}
    </body>
</html>
