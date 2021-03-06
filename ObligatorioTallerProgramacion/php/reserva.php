<html>

<head>
    <meta charset="UTF-8">
    <title>Academia</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/estilo.css" type="text/css" />
</head>

<body id="body">

    <div class="barraIconos">
        <div class="header">
            <h1>Academia de conducir</h1>
        </div>
        <a href="#"><i class="fa fa-home"></i><p class="nombre">Inicio</p></a> 
        <a onclick="
                    document. body. style. background ='#fff'
        ">
        <i class="fa fa-pencil"></i><p class="nombre">Login</p></a> 
        <a href="#"><i class="fa fa-edit"></i><p class="nombre">Reservar</p></a> 
        <a href="#"><i class="fa fa-folder"></i><p class="nombre">Administración</p></a>
     
    </div>

    <form class="ui form">
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

    

</body>

</html>
