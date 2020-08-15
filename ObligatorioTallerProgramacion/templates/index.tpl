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

<body>
   {include "header.tpl"}
       
    
    <section>
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
        
        <div class="datosClases">
            <div class="condiciones">
                <h2>Condiciones para</h2>
                <h2>obtener la libreta:</h2>
                <ul>
                    <li>Registrarse en nuestro sistema</li>
                    <li>Ser aprobado como cliente por algun administrador</li>
                    <li>Tomar 15 clases</li>
                </ul>
            </div>
            
            <div class="precio">
                <h2>Costo por clase:</h2>
                <h1>$800</h1>
                <button class="reservarDatos" type="submit">Contratar servicio!</button>
            </div>
            
        </div>
    </section>

        {include "footer.tpl"}


    

</body>

</html>
