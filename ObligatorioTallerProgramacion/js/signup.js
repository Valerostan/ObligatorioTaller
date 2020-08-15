$(document).ready(inicializar);

function inicializar() {
    $("#formLogin").submit(function (e) {
        if (!validarForm()) {
            e.preventDefault();
        }       
    });
     $("#fecha").datetimepicker({
            dateFormat: 'd/mm/yy', 
            maxDate: Date.parse("2001-01-01"), //cambiar que se actualice solo
        });
    $("div.labelInput input").focus(function () {
        $(this).addClass("foco");
    }).blur(function () {
        $(this).removeClass("foco");
        validarForm();
    });

}

function validarForm() {
    var valido = true;

    var user = $("#mail").removeClass("error");
    var pass = $("#contraseña").removeClass("error");
    var direccion = $("#direccion").removeClass("error");
    var cedula = $("#cedula").removeClass("error");
    var fecha = $("#fecha").removeClass("error");
    var nombre = $("#nombre").removeClass("error");
    var apellido = $("#apellido").removeClass("error");

    
    if (user.val().length < 7) {
        user.addClass("error");
        valido = false;
    }
    
    if (direccion.val().length < 2) {
        direccion.addClass("error");
        valido = false;
    }
    
    if (cedula.val().length < 7) {
        cedula.addClass("error");
        valido = false;
    }
    
    if (nombre.val().length < 3) {
        nombre.addClass("error");
        valido = false;
    }
    
    if (apellido.val().length < 3) {
        apellido.addClass("error");
        valido = false;
    }

    if (pass.val().length < 6) {
        valido = false;
        pass.addClass("error");
    }

    return valido;
}/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


