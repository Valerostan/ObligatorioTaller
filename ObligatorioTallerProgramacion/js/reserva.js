$(document).ready(inicializar);



function inicializar() {
    muestro();
}

function cambio() {
    var fecha = $('#pluginCalendario').val().toString();
    var instructor = $("#instructor").val();
    var hora = $("#hora").val();
    $.ajax({
        url: "chequeoReserva.php",
        method: "POST",
        dataType: "json",
        data: "fechab=" + fecha + "&instructorb=" + instructor + "&horab=" + hora,
        success: disponibilidad,
    });
}

function muestro() {
    $("#pluginCalendario").datetimepicker();
    $('#pluginCalendario').datetimepicker({
        format: 'Y-m-d',
        timepicker: false,
        allowTimes: [
            '7', '8', '9', '10', '11', '12', '13', '14', '15', 
            '16', '17', '18', '19', '20', '21'
        ],
        onGenerate: function (ct) {
            jQuery(this).find('.xdsoft_date.xdsoft_weekend')
                    .addClass('xdsoft_disabled');
        },
        minDate: '-2020/08/16'
    });
    

}

function disponibilidad(respuestaAjax) {
    if(respuestaAjax['estado'] == "EXISTE"){
        $("#ingresoReserva").html("YA ESITE");
    }
    if(respuestaAjax['estado'] == "OK"){
        var fecha = $('#pluginCalendario').val().toString();
        var hora = $('#hora').val();
        var instructor = $('#instructor').val();
        window.location = "procesoReserva.php?fechaa=" + fecha + "&horaa=" + hora + "&instructora=" + instructor;
        $("#ingresoReserva").html("SE RE SERVO amigo");
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