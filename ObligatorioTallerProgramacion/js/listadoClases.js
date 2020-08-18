$(document).ready(inicializar);

function inicializar() {
   
     $("#fecha").datetimepicker({
            dateFormat: 'd/mm/yy', 
            timepicker: false,
            format: 'Y-m-d'
        });

}


