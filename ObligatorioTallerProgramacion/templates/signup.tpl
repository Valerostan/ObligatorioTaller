{* Smarty *}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
    <meta charset="UTF-8">
    <title>Academia/signup</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/estilo.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css"> 
    
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="js/signup.js"></script>    
        <script type='text/javascript' src='js/jquery.datetimepicker.full.js'></script>

    </head>

<body>
    
    <div class="registro">
    {include "header.tpl"}
    {if $mensaje}
            <div class="mensaje">{$mensaje}</div>
        {/if}
    {if !$user.acceso}
    
        <form class="contenido-registro" method="POST" action="{$action}" id="frmLogin" >
          <div id="salir">
            <i  class="fa fa-close"></i>
          </div>
            <div id="contiene-usuario">
                <img class="usuario"src="./img/avatar.png"/>
            </div>
      
          <div class="datos">
            
              <div class="labelInput">
                <label for="mail"><b>Mail:</b></label>
                <input type="email" id="mail" name="mail" placeholder="Ingrese mail" name="mail" value="{$usuario_mail}" required/>
              </div>
           
            <div class="labelInput">
                <label for="nombre"><b>Nombre:</b></label>
                <input type="text" id="nombre" name="nombre" placeholder="Ingrese nombre" name="nombre" required/>
            </div>
            
            <div class="labelInput">
                <label for="apellido"><b>Apellido:</b></label>
                <input type="text" id="apellido" name="apellido" placeholder="Ingrese apellido" name="apellido" required/>
            </div>
            
            <div class="labelInput">
                <label for="cedula"><b>Cedula:</b></label>
                <input type="number" id="cedula" name="cedula" placeholder="Ingrese cedula" name="cedula" required/>
            </div>
              
            <div class="labelInput">
                <label for="fecha"><b>Fecha de nacimiento:</b></label>
                <input id="fecha" name="fecha" placeholder="Ingrese fecha" name="fecha" required/>
            </div>
              
            <div class="labelInput">
                <label for="direccion"><b>Dirección:</b></label>
                <input type="text" id="direccion" name="direccion" placeholder="Ingrese direccion" name="direccion" required/>
            </div>
            
            <div class="labelInput">
                <label for="psw"><b>Contraseña:</b></label>
                <input type="password" id="contraseña" name="contraseña" placeholder="Ingrese Contraseña" name="psw" required/>
            </div>
              
            <input type="hidden" name="action" value="signup" />
            <button class="enviarDatos " type="submit">Registarme</button>
          </div>
        </form>
      </div>
      {else}
         <form class="contenido-registro" action="{$action}" method="POST">
                <label>{$smensaje}</label>

                <input type="hidden" name="action" value="logout" />

                <button class="enviarDatos " type="submit">Cerrar sesion</button>
         </form>
      {/if}

</body>

</html>
