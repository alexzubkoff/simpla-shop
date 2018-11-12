/**
 * Created by alexz on 12.11.2018.
 */
"use strict";
$(document).ready(function(){
    $(".modalbox").fancybox();
    $("#f_contact").submit(function(){ return false; });
    $("#f_send").on("click", function(){

        // тут дальнейшие действия по обработке формы
        // закрываем окно, как правило делать это нужно после обработки данных
        $("#f_contact").fadeOut("fast", function(){
            $(this).before("<p><strong>Ваше сообщение отправлено!</strong></p>");
            setTimeout("$.fancybox.close()", 1000);
        });
    });
});