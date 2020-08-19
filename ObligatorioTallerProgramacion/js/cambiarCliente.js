$(document).ready(function () {
    $('.changeClientBtn').on('click',function(){
        $id=$(this).attr('data-id');
        updateUsuarioCliente($id);
        
    });
})


function updateUsuarioCliente(userId) {
    $.ajax({
        url: "changeUser.php",
        type: "POST",
        dataType: "JSON",
        data: {'userId': userId},
        success: createClientSucces,
        error: createClientError
    });
}
;
function createClientSucces(response,obj,mensaje) {
    console.log(response);
    console.log(obj);
    console.log(mensaje);
    console.log(response.status);
    if (response.status == 'ok') {
        alert('Usuario cambiado a cliente');
        $('#cliente').remove();
    } else {
        alert("errorenElsucces");
    }
}
;
function createClientError(error) {
    alert('Lo sentimos, no se pudo realizar');
}

