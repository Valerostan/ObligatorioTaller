{* Smarty *}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

<head>
    <meta charset="UTF-8">
    <title>Academia/Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/estilo.css" type="text/css" />
</head>
	
    <body>
        <h1>Login</h1>
        {if $mensaje}
            <div class="mensaje">{$mensaje}</div>
        {/if}
        {if !$user.acceso}
         
        <div id="ingreso">
          <div id="salir">
              <i class="fa fa-close"></i>
          </div>
            
             <form method="POST" action="{$action}" id="formLogin">

                <div class="datos">
                    <label for="mail"><b>Mail:</b></label>
                    <input type="email" id ="mail" placeholder="Ingrese mail" name="mail" value="{$usuario_mail}" required />
                    <label for="psw"><b>Contraseña:</b></label>
                    <input type="password" id="contraseña" placeholder="Ingrese Contraseña" name="psw" required />

                    <button class="enviarDatos" type="submit">Ingresar</button>
                    <label id="lbl">No estoy registrado, <a href="./login.php">registrarme</a> </label>

                </div>
            
             </form>
        </div>
        {else}
            <form action="{$action}" method="POST">
                <p>{$smensaje}</p>
                
                <p>
                    {if $user.esAdmin}
                    <a href="altaAdmin.php">Panel de administración</a>
                    {/if}
                </p>

                <input type="hidden" name="action" value="logout" />

                <button type="submit">Salir</button>
            </form>
        {/if}
    </body>

</html>
