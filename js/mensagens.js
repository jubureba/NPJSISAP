
$(document).ready(function(){
    getmensagens(); //Chamando função que lista os itens
})
function getmensagens(){
    $.ajax({
        type: 'GET',
        data: '',
        url:'pages/config/db-msg.php',
        success: function(retorno){

            document.getElementById("loading-msg").setAttribute("class", "overlay");
            document.getElementById("loading-msg").innerHTML="<i class='fa fa-refresh fa-spin'></i>";

            setTimeout(function() {
                $('#msgs').html(retorno);
                document.getElementById("loading-msg").setAttribute("class", "");
                document.getElementById("loading-msg").innerHTML="<i class=''></i>";
            }, 500);

        }
    })
}


jQuery(document).ready(function(){
    jQuery('#formulario').submit(function(){
        var dados = jQuery( this ).serialize();

        jQuery.ajax({
            type: "POST",
            url: "pages/chat/gravaMensagem.php",
            data: dados,
            success: function( data )
            {
                document.getElementById("loading-msg").setAttribute("class", "overlay");
                document.getElementById("loading-msg").innerHTML="<i class='fa fa-refresh fa-spin'></i>";
                document.getElementById("button-enviando").innerHTML="<i class='fa fa-refresh fa-spin'></i>";
                setTimeout(function() {
                    $('#msgs').load('pages/config/db-msg.php');
                    document.getElementById("loading-msg").setAttribute("class", "");
                    document.getElementById("loading-msg").innerHTML="<i class=''></i>";
                    document.getElementById("mensagem").value="";
                    document.getElementById("button-enviando").innerHTML="Enviar Mensagem";

                }, 500);
            }
        });

        return false;
    });
});