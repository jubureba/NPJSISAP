
function apagarMsg(id){
    $.ajax({
        type: 'GET',
        data: '',
        url:'pages/chat/excluirMensagem.php?idMensagem='+id,
        success: function(retorno){
            document.getElementById("loading-msg").setAttribute("class", "overlay");
            document.getElementById("loading-msg").innerHTML="<i class='fa fa-refresh fa-spin'></i>";
            setTimeout(function() {
                $('#msgs').load('pages/config/db-msg.php');
                document.getElementById("loading-msg").setAttribute("class", "");
                document.getElementById("loading-msg").innerHTML="<i class=''></i>";
            }, 500);
        }
    })
}


