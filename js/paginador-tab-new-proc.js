var numitens_new_proc=5;//quantidade de itens a ser mostrado por página
var pagina_new_proc=1;	//página inicial - DEIXE SEMPRE 1

$(document).ready(function(){
    getitens_new_proc(pagina_new_proc,numitens_new_proc); //Chamando função que lista os itens
})
function getitens_new_proc(pag, maximo){
    pagina_new_proc=pag;
    $.ajax({
        type: 'GET',
        data: 'tipo=listagem&pag='+pag +'&maximo='+maximo,
        url:'pages/config/getitens_def_pub-new-proc.php',
        success: function(retorno){
            $('#conteudo_new_proc').html(retorno);
            contador_new_proc() //Chamando função que conta os itens e chama o paginador_def_pub
        }
    })
}
function contador_new_proc(){
    $.ajax({
        type: 'GET',
        data: 'tipo=contador_def_pub',
        url:'pages/config/getitens_def_pub-new-proc.php',
        success: function(retorno_pg){
            paginador_new_proc(retorno_pg)
        }
    })
}
function paginador_new_proc(cont){
    if(cont<=numitens_new_proc){
        $('#paginador_new_proc').html('<li><a href="#"> Apenas uma Página</a></li>')
    }else{
        $('#paginador_new_proc').html('<li></li>');
        if(pagina_new_proc!=1){
            document.getElementById("loading_new_proc").setAttribute("class", "overlay");
            document.getElementById("loading_new_proc").innerHTML="<i class='fa fa-refresh fa-spin'></i>";
            setTimeout(function() {
                $('#paginador_new_proc').append('<li><a href="#" onclick="getitens_def_pub-new-proc('+(pagina_new_proc-1)+', '+numitens_new_proc+')">«</a></li>');
                document.getElementById("loading_new_proc").setAttribute("class", "");
                document.getElementById("loading_new_proc").innerHTML="<i class=''></i>";
            }, 500);

        }
        var qtdpaginas=Math.ceil(cont/numitens_new_proc)
        for(var i=1;i<=qtdpaginas;i++){
            if(pagina_new_proc==i){
                $('#paginador_new_proc').append('<li><a href="#" onclick="getitens_def_pub-new-proc('+i+', '+numitens_new_proc+')">'+i+'</a></li>')
            }else{
                $('#paginador_new_proc').append('<li><a href="#" onclick="getitens_def_pub-new-proc('+i+', '+numitens_new_proc+')">'+i+'</a></li>')
            }
        }
        if(pagina_new_proc!=qtdpaginas){
            document.getElementById("loading_new_proc").setAttribute("class", "overlay");
            document.getElementById("loading_new_proc").innerHTML="<i class='fa fa-refresh fa-spin'></i>";
            setTimeout(function() {
                $('#paginador_new_proc').append('<li><a href="#" onclick="getitens_def_pub-new-proc('+(pagina_new_proc+1)+', '+numitens_new_proc+')">»</a></li>');
                document.getElementById("loading_new_proc").setAttribute("class", "");
                document.getElementById("loading_new_proc").innerHTML="<i class=''></i>";
            }, 500);

        }
    }
}
			