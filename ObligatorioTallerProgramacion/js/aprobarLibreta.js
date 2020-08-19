var idC=0;
var cant=0;

$(document).ready(function () {
    console.log('hola');
    $('.aprobarLibreta').on('click',function(){
        console.log('hola2');
        $idC=$(this).attr('data-id');
        aprobarLibreta($idC);        
});
     $('.aprobarLibreta').each(function(){
         cant++;
     })
});

function aprobarLibreta(userId) {
    $.ajax({
        url: "confirmarLibreta.php",
        type: "POST",
        dataType: "JSON",
        data: {'userId': userId},
        success: aprobarLibretaSucces,
        error: aprobarLibretaError
    });
}

function aprobarLibretaSucces(response,obj,mensaje) {
    if (response.status == 'ok') {
        alert('Libreta de usuario aprobada');
        $('#cliente').remove();
        cant--;
        $("#"+idC).remove();
                if(cant===0){
            $('.containerL').html('<h1>No hay usuarios para aprobar</h1>');
        }
    } else {
        alert("errorenElsucces");
    }
}

function aprobarLibretaError(error) {
    alert('Lo sentimos, no se pudo realizar');
}


