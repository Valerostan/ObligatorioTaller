$(document).ready(function () {
    console.log('hola');
    $('.aprobarLibreta').on('click',function(){
        console.log('hola2');
        $id=$(this).attr('data-id');
        aprobarLibreta($id);        
});
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
    console.log(response);
    console.log(obj);
    console.log(mensaje);
    console.log(response.status);
    if (response.status == 'ok') {
        alert('Libreta de usuario aprobada');
        $('#cliente').remove();
    } else {
        alert("errorenElsucces");
    }
}

function aprobarLibretaError(error) {
    alert('Lo sentimos, no se pudo realizar');
}


