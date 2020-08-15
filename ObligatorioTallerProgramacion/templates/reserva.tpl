{* Smarty *}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

    <head>
        <meta charset="UTF-8">
            <title>Academia</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="css/estilo.css" type="text/css" />
            <link rel="stylesheet" href="css/jquery.datetimepicker.css" type="text/css"/>
            <link rel="stylesheet" href="css/jquery.timepicker.css" type="text/css"/>
            <script> src="css/jquery.datetimepicker.full.js" </script>
                </head>

                <body id="body">
                    <form method="POST" action="procesoReserva.php" id="formReserva" class="ui form">
                        <div class="contenedorForm">
                            <div class="contenidoForm">
                                <div class="field">
                                    <h4 class="ui dividing header">Instructor</h4>
                                    <label>Instructores disponibles:</label>
                                    <select class="ui fluid dropdown" name="instructor">
                                        <option value="Jose">Jose</option>
                                        <option value="Pedro">Pedro</option>
                                    </select>
                                </div>
                                <h4 class="ui dividing header">Fecha:</h4>
                                
                                <input type="date" id="pluginCalendario" />

                                <h4 class="ui dividing header">Hora</h4>
                                <div class="field">
                                    <select class="ui fluid dropdown" name="hora">
                                        <option value="7">7:00</option>
                                        <option value="8">8:00</option>
                                        <option value="9">9:00</option>
                                        <option value="10">10:00</option>
                                        <option value="11">11:00</option>
                                        <option value="12">12:00</option>
                                        <option value="13">13:00</option>
                                        <option value="14">14:00</option>
                                        <option value="15">15:00</option>
                                        <option value="16">16:00</option>
                                        <option value="17">17:00</option>
                                        <option value="18">18:00</option>
                                        <option value="19">19:00</option>
                                        <option value="20">20:00</option>
                                        <option value="21">21:00</option>
                                    </select>
                                </div>

                                <button class="enviarDatos " type="submit">Realizar reserva</button>
                            </div>
                        </div>
                    </form>



                </body>

                </html>
