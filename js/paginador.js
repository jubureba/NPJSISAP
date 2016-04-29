var numitens=3; //quantidade de itens a ser mostrado por página
var pagina=1;	//página inicial - DEIXE SEMPRE 1
$(document).ready(function(){
	getitens(pagina,numitens); //Chamando função que lista os itens
})
function getitens(pag, maximo){
	pagina=pag; 
	$.ajax({
	type: 'GET',
	data: 'tipo=listagem&pag='+pag +'&maximo='+maximo,
	url:'pages/config/getitens.php',
   	success: function(retorno){
    	$('#conteudo').html(retorno); 
        	contador() //Chamando função que conta os itens e chama o paginador
     	}
    })
}
function contador(){
	$.ajax({
      	type: 'GET',
      	data: 'tipo=contador',
      	url:'pages/config/getitens.php',
   		success: function(retorno_pg){
        	paginador(retorno_pg)
      	}
    })
}
function paginador(cont){
	if(cont<=numitens){
		$('#paginador').html('<li><a href="#"> Apenas uma Página</a></li>')
	}else{
		$('#paginador').html('<li></li>');
		if(pagina!=1){
			document.getElementById("loading").setAttribute("class", "overlay");
			document.getElementById("loading").innerHTML="<i class='fa fa-refresh fa-spin'></i>";
			setTimeout(function() {
				$('#paginador').append('<li><a href="#" onclick="getitens('+(pagina-1)+', '+numitens+')">«</a></li>');
				document.getElementById("loading").setAttribute("class", "");
				document.getElementById("loading").innerHTML="<i class=''></i>";
			}, 500);

		}
		var qtdpaginas=Math.ceil(cont/numitens)
		for(var i=1;i<=qtdpaginas;i++){
			if(pagina==i){
				$('#paginador').append('<li><a href="#" onclick="getitens('+i+', '+numitens+')">'+i+'</a></li>')
			}else{
				$('#paginador').append('<li><a href="#" onclick="getitens('+i+', '+numitens+')">'+i+'</a></li>')
				}
		}
		if(pagina!=qtdpaginas){
			document.getElementById("loading").setAttribute("class", "overlay");
			document.getElementById("loading").innerHTML="<i class='fa fa-refresh fa-spin'></i>";
			setTimeout(function() {
				$('#paginador').append('<li><a href="#" onclick="getitens('+(pagina+1)+', '+numitens+')">»</a></li>');
				document.getElementById("loading").setAttribute("class", "");
				document.getElementById("loading").innerHTML="<i class=''></i>";
			}, 500);

		}
	}
}
			