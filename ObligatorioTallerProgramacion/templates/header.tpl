


<header>
        <div class="barraIconos">
            <div class="header">
                <h1>Academia de conducir</h1>
            </div>
            <a href="./index.php"><i class="fa fa-home"></i>
                <p class="nombre">Inicio</p>
            </a>
            {if $acceso}
            <a href="./reserva.php"><i class="fa fa-edit"></i>
                <p class="nombre">Reservar</p>
            </a>
            {if $esAdmin} 
            <a href="./altaAdmin.php"><i class="fa fa-folder"></i>
                <p class="nombre">Administración</p>
            </a>
            {/if}
             <a class="cursor" href="./procesoLogout.php"><i
                    class="fa fa-pencil"></i>
                <p class="nombre">Cerrar sesion</p>  
            </a>
            {else}
            <a class="cursor" href="./login.php"><i
                    class="fa fa-pencil"></i>
                <p class="nombre">Login</p>  
            </a>
            {/if}

        </div>
    </header>
