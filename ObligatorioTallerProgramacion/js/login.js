$(document).ready(inicializar);

function inicializar() {
    $("#formLogin").submit(function (e) {
        if (!validarForm()) {
            e.preventDefault();
        }       
    });

    $("div.rango input").focus(function () {
        $(this).addClass("foco");
    }).blur(function () {
        $(this).removeClass("foco");
        validarForm();
    });

}

function validarForm() {
    var valido = true;

    var user = $("#mail").removeClass("error");
    var pass = $("#psw").removeClass("error");

    if (user.val().length < 7) {
        user.addClass("error");
        valido = false;
    }

    if (pass.val().length < 6) {
        valido = false;
        pass.addClass("error");
    }

    return valido;
}


