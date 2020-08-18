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
        {if $acceso and  $esAdmin}
            {if !empty($usuarios)}
                {foreach from=$usuarios item=usuario}
                    <div class="changeClientBtn" data-id="{$usuario.usuario_id}">
                        Cambiar usuario {$usuario.nombre}
                    </div>

                {/foreach}
            {else}
                <h1>No hay reservas</h1>
            {/if}
        {/if}

        {include "footer.tpl"}

    </body>
</html>
