$(document).ready(inicializar);

$('#refrescar').on('click', paintCalendar);

function inicializar(){
    var element = document.getElementById("my-calendar");
    jsCalendar.new(element);
    paintCalendar();
}

function paintCalendar() {
    $.ajax({
        url: "calendario.php",
        data: {accion: "buscar"},
        dataType: "json"
    }).done(function (data) {
        if (data.estado === 'OK') {
            //console.log(date.getMonth());
            var reservas = data.data;
            var instructores = data.data1;
            var cantInstructores = parseInt(instructores[0][0]);
            recorrer(reservas, cantInstructores);
            $("td.jsCalendar-previous").each(function () {
                $(this).css("background-color", "#ccc");
                $(this).css("color", "black");
            })
            $("td.jsCalendar-next").each(function () {
                $(this).css("background-color", "#ccc");
                $(this).css("color", "black");
            })
        }
    }).fail(function (data, err) {
        console.log(data);
        console.log(err);
    });

}

function recorrer(reservas, cantInstructores) {
    $("td").css("background-color", "#4ABDAC");
    for (var i = 0; i < reservas.length; i++) {
        var reserva = reservas[i];
        var fecha = reserva[1];
        var dia = parseInt(fecha.split('-')[2]);
        var mes = fecha.split('-')[1];
        var mesPluginPalabra = $('.jsCalendar-title-name').text();
        var mesPluginNro = getMonthFromString(mesPluginPalabra);
        var mesPluginTxt = mesPluginNro + "";
        var cantReservasPorDia = parseInt(reserva[0]);
        $("td").each(function () {
            if (!($(this).css("className") == "jsCalendar-previous")) {
                if (dia == parseInt($(this).text()) && (cantInstructores * 15 == cantReservasPorDia)) {
                    $(this).css("background-color", "#FC4A1A");
                } else if (dia == parseInt($(this).text()) && ((cantReservasPorDia) / (cantInstructores * 15)) >= 0.50) {
                    $(this).css("background-color", "#F7B733");
                }
            }

        })

    }
}

function getMonthFromString(mon) {
    return new Date(Date.parse(mon + " 1, 2012")).getMonth() + 1
}