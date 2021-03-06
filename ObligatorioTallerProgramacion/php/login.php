<html>

<head>
    <meta charset="UTF-8">
    <title>Academia</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/estilo.css" type="text/css" />
</head>

<body>
    
    <div class="registro">
        <form class="contenido-registro" >
          <div id="salir">
            <i  class="fa fa-close"></i>
          </div>
            <div id="contiene-usuario">
                <img class="usuario"src="./img/avatar.png"/>
            </div>
      
          <div class="datos">
            <label for="mail"><b>Mail:</b></label>
            <input type="email" placeholder="Ingrese mail" name="mail" required>

            <label for="nombre"><b>Nombre:</b></label>
            <input type="text" placeholder="Ingrese nombre" name="nombre" required>

            <label for="apellido"><b>Apellido:</b></label>
            <input type="text" placeholder="Ingrese apellido" name="apellido" required>

            <label for="cedula"><b>Cedula:</b></label>
            <input type="number" placeholder="Ingrese cedula" name="cedula" required>

            <label for="fecha"><b>Fecha de nacimiento:</b></label>
            <input type="date" placeholder="Ingrese fecha" name="fecha" required>

            <label for="direccion"><b>Dirección:</b></label>
            <input type="text" placeholder="Ingrese direccion" name="direccion" required>
      
            <label for="psw"><b>Contraseña:</b></label>
            <input type="password" placeholder="Ingrese Contraseña" name="psw" required>
              
            <button class="enviarDatos " type="submit">Registarme</button>
          </div>
        </form>
      </div>

</body>

</html>
