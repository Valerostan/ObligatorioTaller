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
                        {if !$user.acceso}
                            <form method="POST" action="procesoLogin.php" id="formLogin">

                                <div class="datos">
                                    {if $errorMail}<p>Contraseña incorrecta/usuario incorrecto</p> {/if}
                                    {if $errorPassword}<p>Contraseña incorrecta/usuario incorrecto</p> {/if}
                                    <div class="labelInput">
                                        <label for="mail"><b>Mail:</b></label>
                                        <input type="email" id ="mail" placeholder="Ingrese mail" name="mail" value="{$usuario_mail}" required />
                                    </div>

                                    <div class="labelInput">
                                        <label for="psw"><b>Contraseña:</b></label>
                                        <input type="password" id="psw" placeholder="Ingrese Contraseña" name="psw" required />
                                    </div>

                                    <button class="enviarDatos" type="submit">Ingresar</button>
                                    <label id="lbl">No estoy registrado, <a href="./signup.php">registrarme</a> </label>
                                </div>

                            </form>
                        {else}
                            <form action="login.php" method="POST" >
                                <div class="ui success message">
                                    <div class="header">{$smensaje}</div>
                                    <p>usted ya se encuentra ingresado, dirijase a la pagina de inicio
                                        para ver todo o puede salir de sesion </p>
                                </div>
                            </form>
                        {/if}
                    </div>
                    {include "footer.tpl"}
                </body>

                </html>
