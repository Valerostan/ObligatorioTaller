<html>

    <head>
        <meta charset="UTF-8">
        <title>Academia/Login</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/estilo.css" type="text/css" />

        <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="js/cambiarCliente.js"></script>  

    </head>

    <body>

        {include "header.tpl"}
        <div class="containerL">
            {if $acceso and  $esAdmin}
                {if !empty($usuarios)}
                    {foreach from=$usuarios item=usuario}
                        <div class="ui middle aligned animated list">
                            <div class="item">
                                <div class="content">
                                    <div class="changeClientBtn" data-id="{$usuario.usuario_id}">
                                    <div class="header"> cambiar a cliente el usuario: {$usuario.nombre}</div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    {/foreach}
                {else}
                    <h1>No hay usuarios para cambiar a clientes</h1>
                {/if}
            {else}
                <div class="ui message">
                    <div class="header">
                        Usted no tiene permisos para ingresar a esta seccion 
                    </div>
                    <p>Por favor dirijase al inicio o ingrese con un usuario que le permita dar acceso</p>
                </div>
            {/if}

        </div>
        {include "footer.tpl"}

    </body>
</html>
