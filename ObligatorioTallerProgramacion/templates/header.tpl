<html>

<head>
    <meta charset="UTF-8">
    <title>Academia</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/estilo.css" type="text/css" />
</head>

<body>


<header>
        <div class="barraIconos">
            <div class="header">
                <h1>Academia de conducir</h1>
            </div>
            <a href="#"><i class="fa fa-home"></i>
                <p class="nombre">Inicio</p>
            </a>
            {if $user}
            <a href="#reserva"><i class="fa fa-edit"></i>
                <p class="nombre">Reservar</p>
            </a>
            {if $user.esAdmin} 
            <a href="./altaAdmin.php"><i class="fa fa-folder"></i>
                <p class="nombre">Administración</p>
            </a>
            {/if}
            {else}
            <a class="cursor" onclick="document.getElementById('ingreso').style.display='block'" style="width:auto;"><i
                    class="fa fa-pencil"></i>
                <p class="nombre">Login</p> //Tenfria que mostrar el login.php 
            </a>
            {/if}

        </div>
    </header>
    
 </body>

</html>