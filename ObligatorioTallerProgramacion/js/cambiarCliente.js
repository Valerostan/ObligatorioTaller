var idC=0;
var cant=0;
$(document).ready(function () {
    $('.changeClientBtn').on('click',function(){
        idC=$(this).attr('data-id');
        updateUsuarioCliente(idC);
        
    });
     $('.changeClientBtn').each(function(){
         cant++;
     })
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
    if (response.status == 'ok') {
        alert('Usuario cambiado a cliente');
        cant--;
        $("#"+idC).remove();
        
        if(cant===0){
            $('.containerL').html('<h1>No hay usuarios para cambiar a clientes</h1>');
        }
        
    } else {
        alert("errorenElsucces");
    }
}
;
function createClientError(error) {
    alert('Lo sentimos, no se pudo realizar');
}

