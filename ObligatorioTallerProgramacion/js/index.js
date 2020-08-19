//$(document).ready(paintCalendar);
//
//function paintCalendar() {
//    var element = document.getElementById("my-calendar");
//     jsCalendar.new(element);
//    $("td").css("background-color", "yellow");
//    
//    //$(this).css("background-color", "#ECF8E0");
//    
//    $.ajax({
//        url: "calendario.php",
//        data: {accion: "buscar"},
//        dataType: "json"
//    }).done(function (data) {
//        
//        if (data['estado'] === 'ok'){
//            $resp = data['data'];
//        $(".auto-jsCalendar jsCalendar").each(function (index) {
//         $(this).children("td").each(function (index2) {
//         if ($resp.contains(index2.html())){
//
//         }
//         
//         $(this).css("background-color", "#ECF8E0");
//         if (data['data'] === 15){
//         //$("td").css("background-color", "red");
//         }
//         else if (data['data'] < 15 && data['data'] >= 7){
//         //$("td").css("background-color", "yellow");
//         }
//         else{
//         //$("td").css("background-color", "green");
//         }
//         }
//         
//         
//         //console.log($("td").innerHTML);
//    }).fail(function (data, err) {
//        console.log(data);
//        console.log(err);
//    })
//   
//         
//}
