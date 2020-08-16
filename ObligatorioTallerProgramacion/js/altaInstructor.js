$(document).ready(inicializar);

function inicializar() {
    $("#formInstructor").submit(function (e) {
        if (!validarForm()) {
            e.preventDefault();
        }       
    });
    
    $("#fecha2").datetimepicker({
            timepicker: false,
            format: 'Y-m-d',
            maxDate: Date.parse("2001-01-01") //cambiar que se actualice solo
        });
        
        $("#fecha1").datetimepicker({
            timepicker: false,
            format: 'Y-m-d',
            maxDate: Date.parse("2001-01-01") //cambiar que se actualice solo
        });

  //  $("div.labelInput input").focus(function () {
  //      $(this).addClass("foco");
   // }).blur(function () {
   //     $(this).removeClass("foco");
   //     validarForm();
   // });

}

function validarForm(){
    var valido =true;
    return valido;
}


