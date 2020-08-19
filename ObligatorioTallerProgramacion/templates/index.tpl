{* Smarty *}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

    <head>
        <meta charset="UTF-8">
            <title>Academia</title>
            <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
            <script type="text/javascript" src="js/jsCalendar.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <link rel="stylesheet" href="css/estilo.css" type="text/css" />
                <link rel="stylesheet" type="text/css" href="css/jsCalendar.css">


                    </head>

                    <body>
                        {include "header.tpl"}


                        <section class="inicioT">
                            <form id="inscriptos">
                                <div id="textoInscriptos">
                                    <label>Alumnos inscriptos:</label> {$cantUsuarios[0].cantUsuarios}
                                </div>
                                <div id="textoLibreta">
                                    <label>Usuarios con libreta:</label> {$cantLibretas[0].cantLibretas}
                                </div>
                            </form>

                            <div id="calendarioYrefes">
                                <div id="my-calendar" data-navigator="false"></div>

                                <div id="referencias"> 
                                    <ul>
                                        <li>Referencias:</li>
                                        <div class="referenciaB"> <p class="colorReferenciaR"></p><li>100% clases reservadas</li></div>
                                        <div  class="referenciaB"><p class="colorReferenciaY" ></p><li>Mas del 50% clases reservadas</li></div>
                                        <div  class="referenciaB"><p class="colorReferenciaG"></p><li>Menos 50% clases reservadas</li></div>
                                        <ul>

                                            </div>
                                            </div>

                                            <form method="POST" action="procesoReserva.php" id="formLogin">
                                                <div class="datosClases">
                                                    <div class="condiciones">
                                                        <h2>Condiciones para</h2>
                                                        <h2>obtener la libreta:</h2>
                                                        <ul>
                                                            <li>Registrarse en nuestro sistema</li>
                                                            <li>Ser aprobado como cliente por algun administrador</li>
                                                            <li>Tomar 15 clases</li>
                                                        </ul>
                                                    </div>

                                                    <div class="precio">
                                                        <h2>Costo por clase:</h2>
                                                        <h1>$800</h1>
                                                        {if $acceso && $esCliente}
                                                            <button class="reservarDatos" type="submit">Contratar servicio!</button>
                                                        {/if}
                                                    </div>

                                                </div>
                                            </form>
                                            </section>

                                            {include "footer.tpl"}


                                            </body>
                                            <script type="text/javascript" src="js/index.js"></script>
                                            </html>
