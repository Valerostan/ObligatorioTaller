$(document).ready(inicializar);


function inicializar() {
    $('#pluginCalendario').datetimepicker({
    timepicker:false,
    format: 'Y-m-d',
    onGenerate:function( ct ){
    jQuery(this).find('.xdsoft_date.xdsoft_weekend')
      .addClass('xdsoft_disabled');
    },
    minDate:'-2020/08/16',
    onChangeDateTime:function(dp, $input){
            alert($input.val());
            }  
    });
    $('#instructor').change(cambio);
}



function cambio() {
    var dias = $('#pluginCalendario').datetimepicker('getValue');
    var result;
    var instructor = $("#instructor").val();
    var data = "instructor="+instructor;
    $.ajax({
        url: "procesoReserva.php",
        method: "POST",
        dataType: "json",
        data: data,
        success: muestro,
    });
    
    
}

function muestro(data){
    console.log("entre");
    if (data['estado'] !== "") {
        var div = '<div id="agregarFecha"><h4 class="ui dividing header">\n\
                   Fecha:</h4><input type="text" id="pluginCalendario" name="pluginCalendario"/></div>';
        $(".contenidoForm").append(div);
        $("#pluginCalendario").datetimepicker();
    }
}


/*<h4 class="ui dividing header">Hora</h4>
 <div class="field">
 <select class="ui fluid dropdown" name="hora">
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
 </div>*/

function validoPelicula() {
    let poster = $("#imgPelicula").val();
    let titulo = $("#txtTitulo").val();
    let genero = $("#txtGenero").val();
    let fecha = $("#fecLan").val();
    let resumen = $("#txtResumen").val();
    let director = $("#txtDirector").val();
    let elenco = $("#txtElenco").val();

    if (!esVacio(poster) && !esVacio(titulo) && !esVacio(genero) && !esVacio(fecha) && !esVacio(resumen) &&
            !esVacio(director) && !esVacio(elenco)) {
        $("#formAltaPelicula").submit();
    } else {
        $("#mensajes").html("Todos los campos con un <a style='color: red'>*</a> son obligatorios");
    }
}

function validoNoVacio() {
    let dato = $(this).val();
    if (esVacio(dato)) {
        $("#err_" + $(this).attr("id")).html("El dato no puede ser vacío");
    } else {
        $("#err_" + $(this).attr("id")).html("");
    }
}

function esVacio(cadena) {
    let retorno = false;
    if ($.trim(cadena) == "" || cadena.length == 0) {
        retorno = true;
    }
    return retorno;
}