<html>

    <head>
        <meta charset="UTF-8">
        <title>Academia/Login</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/estilo.css" type="text/css" />

        <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="js/listadoClases.js"></script>  

    </head>

    <body>
        {include "header.tpl"}
        
            {if $acceso and  $esAdmin}



                <form  class="contenido-registro" method="POST" action="listadoClases.php" id="frmLogin" >
                    <h2 class="ui center aligned icon header">
                        <i class="circular user icon"></i>
                        Vea lista de clientes por fechae instructor
                    </h2>

                    <div class="datos">


                        <div class="labelInput">
                            <label for="cedula"><b>Instructor:</b></label>
                            <select  class="ui fluid dropdown" name="instructor" id="instructor">

                                {if !empty($instructores)}
                                    {foreach from=$instructores item=instructor}
                                        <option value="{$instructor.instructor_id}"> {$instructor.nombre}</option>

                                    {/foreach}
                                {/if}
                            </select>            
                        </div>

                        <div class="labelInput">
                            <label for="fecha"><b>Fecha:</b></label>
                            <input id="fecha" name="fecha" placeholder="Ingrese fecha" required/>
                        </div>

                        <button class="enviarDatos " type="submit">Realizar consulta</button>
                    </div>
                </form>


            {else}
                <div class="containerL">
                <div class="ui message">
                    <div class="header">
                        Usted no tiene permisos para ingresar a esta seccion 
                    </div>
                    <p>Por favor dirijase al inicio o ingrese con un usuario que le permita dar acceso</p>
                </div>
                      </div>
            {/if}
      

        {include "footer.tpl"}
    </body>
</html>