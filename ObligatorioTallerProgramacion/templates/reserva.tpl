{* Smarty *}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

    <head>
        <meta charset="UTF-8">
            <title>Academia</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <link rel="stylesheet" href="css/estilo.css" type="text/css" />
                </head>

                <body id="body">
                    <form method="POST" action="procesoReserva.php" id="formReserva" class="ui form">
                        <div class="contenedorForm">
                            <div class="contenidoForm">
                                <h4 class="ui dividing header">Fecha:</h4>
                                <div class="two fields">
                                    <div class="field">
                                        <label>Dia</label>
                                        <select name="dia" class="ui fluid dropdown">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="19">19</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>

                                        </select>
                                    </div>
                                    <div class="field">
                                        <label>Mes</label>
                                        <select name="mes" class="ui fluid dropdown">
                                            <option value="1">Enero</option>
                                            <option value="2">Febrero</option>
                                            <option value="3">Marzo</option>
                                            <option value="4">Abril</option>
                                            <option value="5">Mayo</option>
                                            <option value="6">Junio</option>
                                            <option value="7">Julio</option>
                                            <option value="8">Agosto</option>
                                            <option value="9">Setiembre</option>
                                            <option value="10">Octubre</option>
                                            <option value="11">Noviembre</option>
                                            <option value="12">Diceimbre</option>
                                        </select>
                                    </div>
                                    <div class="field">
                                        <label>Año</label>
                                        <select name="año" class="ui fluid dropdown">
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                        </select>
                                    </div>
                                </div>
                                <h4 class="ui dividing header">Instructor</h4>
                                <div class="field">
                                    <label>Instructores disponibles:</label>
                                    <select class="ui fluid dropdown" name="instructor">
                                        <option value="Jose">Jose</option>
                                        <option value="Pedro">Pedro</option>
                                    </select>
                                </div>

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
