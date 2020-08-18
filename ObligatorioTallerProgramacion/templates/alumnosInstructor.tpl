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
        <h3 class="titlulo" >Listado de alumnos en la fecha {$fecha} por el instructor {$instructor}</h3>
        <div class="ui celled list">
            {if !empty($alumnos)}
                {foreach from=$alumnos item=alumno}


                    <div class="item">
                        <div class="content">
                            <div class="header">{$alumno.nombre}</div>
                            con direccion {$alumno.direccion}
                        </div>
                    </div>

                {/foreach}
            {else}
                <h1>No hay alumnos en esa fecha con ese instructor</h1>
            {/if}

        </div>

        {include "footer.tpl"}
    </body>
</html>
