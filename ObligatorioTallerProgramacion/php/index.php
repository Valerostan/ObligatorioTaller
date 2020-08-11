<html>

<head>
    <meta charset="UTF-8">
    <title>Academia</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/estilo.css" type="text/css" />
</head>

<body>
    <div id="contenido">
        <div class="barraIconos">
            <div class="header">
                <h1>Academia de conducir</h1>
            </div>
            <a href="#"><i class="fa fa-home"></i>
                <p class="nombre">Inicio</p>
            </a>
            <a class="cursor" onclick="document.getElementById('ingreso').style.display='block'" style="width:auto;"><i
                    class="fa fa-pencil"></i>
                <p class="nombre">Login</p>
            </a>
            <a href="#reserva"><i class="fa fa-edit"></i>
                <p class="nombre">Reservar</p>
            </a>
            <a href="./altaAdmin.php"><i class="fa fa-folder"></i>
                <p class="nombre">Administración</p>
            </a>

        </div>

        <div id="ingreso">
            <div id="salir">
                <i class="fa fa-close"></i>
            </div>
            <div class="datos">
                <label for="mail"><b>Mail:</b></label>
                <input type="email" placeholder="Ingrese mail" name="mail" required>
                <label for="psw"><b>Contraseña:</b></label>
                <input type="password" placeholder="Ingrese Contraseña" name="psw" required>

                <button class="enviarDatos" type="submit">Ingresar</button>
                <label id="lbl">No estoy registrado, <a href="./login.php">registrarme</a> </label>

            </div>
        </div>

        <div>
            <label>Alumnos inscriptos:</label>
            <label>Usuarios con libreta:</label>
        </div>

        <div class="calendario">
            <div class="mes">
                <ul>
                    <li>
                        <i class="fa fa-calendar"></i>
                        Agosto<br>
                        <p>2020</p>

                    </li>
                </ul>
            </div>

            <ul class="semana">
                <li>Lunes</li>
                <li>Martes</li>
                <li>Miercoles</li>
                <li>Jueves</li>
                <li>Viernes</li>
                <li>Sabado</li>
                <li id="borrar">Domingo</li>
            </ul>

            <ul class="dia">
                <li>1</li>
                <li>2</li>
                <li>3</li>
                <li>4</li>
                <li>5</li>
                <li>6</li>
                <li>7</li>
                <li>8</li>
                <li>9</li>
                <li>10</li>
                <li>11</li>
                <li>12</li>
                <li>13</li>
                <li>14</li>
                <li>15</li>
                <li>16</li>
                <li>17</li>
                <li>18</li>
                <li>19</li>
                <li>20</li>
                <li>21</li>
                <li>22</li>
                <li>23</li>
                <li>24</li>
                <li>25</li>
                <li>26</li>
                <li>27</li>
                <li>28</li>
                <li>29</li>
                <li>30</li>
                <li>31</li>
            </ul>

        </div>

        <form id="reserva" class=" ui form">
            <div class="contenedorForm">
                <div class="contenidoForm">
                    <h4 class="ui dividing header">Fecha:</h4>
                    <div class="two fields">
                        <div class="field">
                            <label>Dia</label>
                            <select class="ui fluid dropdown">
                                <option value="Lunes">Lunes</option>
                                <option value="Martes">Martes</option>
                                <option value="Miercoles">Miercoles</option>
                                <option value="Jueves">Jueves</option>
                                <option value="Viernes">Viernes</option>
                            </select>
                        </div>
                        <div class="field">
                            <label>Mes</label>
                            <select class="ui fluid dropdown">
                                <option value="Enero">Enero</option>
                                <option value="Febrero">Febrero</option>
                                <option value="Marzo">Marzo</option>
                                <option value="Abril">Abril</option>
                                <option value="Mayo">Mayo</option>
                                <option value="Junio">Junio</option>
                                <option value="Julio">Julio</option>
                                <option value="Agosto">Agosto</option>
                                <option value="Setiembre">Setiembre</option>
                                <option value="Octubre">Octubre</option>
                                <option value="Noviembre">Noviembre</option>
                                <option value="Diceimbre">Diceimbre</option>
                            </select>
                        </div>
                        <div class="field">
                            <label>Año</label>
                            <select class="ui fluid dropdown">
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                            </select>
                        </div>
                    </div>
                    <h4 class="ui dividing header">Instructor</h4>
                    <div class="field">
                        <label>Instructores disponibles:</label>
                        <select class="ui fluid dropdown">
                            <option value="Jose">Jose</option>
                            <option value="Pedro">Pedro</option>
                        </select>
                    </div>

                    <h4 class="ui dividing header">Hora</h4>
                    <div class="field">
                        <select class="ui fluid dropdown">
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


                    <button class="enviarDatos " type="submit">Realizar reserva:</button>
                </div>
            </div>

        </form>

        <div class="administrador">

        </div>


    </div>

</body>

</html>
