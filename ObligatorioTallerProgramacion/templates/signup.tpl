{* Smarty *}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
    <meta charset="UTF-8">
    <title>Academia/signup</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/estilo.css" type="text/css" />
    </head>

<body>
    {if $mensaje}
            <div class="mensaje">{$mensaje}</div>
        {/if}
    {if !$user.acceso}
    
    <div class="registro">
        <form class="contenido-registro" method="POST" action="{$action}" id="frmLogin" >
          <div id="salir">
            <i  class="fa fa-close"></i>
          </div>
            <div id="contiene-usuario">
                <img class="usuario"src="./img/avatar.png"/>
            </div>
      
          <div class="datos">
            <label for="mail"><b>Mail:</b></label>
            <input type="email" id="mail" placeholder="Ingrese mail" name="mail" value="{$usuario_mail}" required>

            <label for="nombre"><b>Nombre:</b></label>
            <input type="text" id="nombre" placeholder="Ingrese nombre" name="nombre" required>

            <label for="apellido"><b>Apellido:</b></label>
            <input type="text" id="apellido" placeholder="Ingrese apellido" name="apellido" required>

            <label for="cedula"><b>Cedula:</b></label>
            <input type="number" id="cedula" placeholder="Ingrese cedula" name="cedula" required>

            <label for="fecha"><b>Fecha de nacimiento:</b></label>
            <input type="date" id="fecha" placeholder="Ingrese fecha" name="fecha" required>

            <label for="direccion"><b>Dirección:</b></label>
            <input type="text" id="direccion" placeholder="Ingrese direccion" name="direccion" required>
      
            <label for="psw"><b>Contraseña:</b></label>
            <input type="password" id="contraseña" placeholder="Ingrese Contraseña" name="psw" required>
              
            <button class="enviarDatos " type="submit">Registarme</button>
          </div>
        </form>
      </div>
      {else}
         <form action="{$action}" method="POST">
                <p>{$smensaje}</p>

                <input type="hidden" name="action" value="logout" />

                <button type="submit">Salir</button>
         </form>
      {/if}

</body>

</html>
