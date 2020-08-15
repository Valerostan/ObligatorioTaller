{* Smarty *}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

<head>
    <meta charset="UTF-8">
    <title>Academia/Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/estilo.css" type="text/css" />
   <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="js/login.js"></script>
</head>
	
    <body>
         {include "header.tpl"}
         
        <div id="ingreso">
        {if $mensaje}
            <div class="mensaje">{$mensaje}</div>
        {/if}
        {if !$user.acceso}
         

          <div id="salir">
              <i class="fa fa-close"></i>
          </div>
            
             <form method="POST" action="{$action}" id="formLogin">

                <div class="datos">
                    <div class="rango">
                        <label for="mail"><b>Mail:</b></label>
                        <input type="email" id ="mail" placeholder="Ingrese mail" name="mail" value="{$usuario_mail}" required />
                    </div>
                    <br/>
                    <div class="rango">
                        <label for="psw"><b>Contraseña:</b></label>
                        <input type="password" id="psw" placeholder="Ingrese Contraseña" name="psw" required />
                    </div>
                
                    
                    <button class="enviarDatos" type="submit">Ingresar</button>
                    <input type="hidden" name="action" value="login" />
                    <label id="lbl">No estoy registrado, <a href="./signup.php">registrarme</a> </label>
                </div>
            
             </form>
        {else}
            <form action="{$action}" method="POST">
                
                <h3>{$smensaje}</h3><br/>
                <i class="fa fa-thumbs"></i>
                <label>usted ya se encuentra ingresado, dirijase a la pagina de inicio
                para ver todo o puede salir de sesion </label>
                

                <input type="hidden" name="action" value="logout" />

                <button class="enviarDatos" type="submit">Salir</button>
            </form>
        {/if}
         </div>
    </body>

</html>
