{* Smarty *}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

    <head>
        <meta charset="UTF-8">
            <title>Academia</title>
            <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="css/estilo.css" type="text/css" />
            <link rel="stylesheet" href="css/jquery.datetimepicker.css" type="text/css"/>
            <link rel="stylesheet" href="css/jquery.timepicker.css" type="text/css"/>
            <script type='text/javascript' src='js/jquery.datetimepicker.full.js'></script>
            <script type="text/javascript" src="js/reserva.js"></script> 
                </head>

                <body id="body">
                    <form method="POST" action="procesoReserva.php" id="formReserva" class="ui form">
                        <div class="contenedorForm">
                            <div class="contenidoForm">
                                <div class="field">
                                    <h4 class="ui dividing header" >Instructor</h4>
                                    <label>Instructores disponibles:</label>
                                    <select class="ui fluid dropdown" name="instructor" id="instructor">
                                        <option value="1">Jose</option>
                                        <option value="2">Pedro</option>
                                    </select>
                                </div>
                                
                                

                                <button class="enviarDatos " type="submit">Realizar reserva</button>
                            </div>
                        </div>
                    </form>



                </body>

                </html>
