// quando o documento estiver pronto, faça.
$(function(){

	/*
		Keyup é um evento que é disparado sempre que o usuário tirou o dedo da tecla.
		Ou seja, não queremos fazer nada quando o usuário clica, somente quando ele solta
		a tecla.
	*/
	$(".form-control").keyup(function(event){

		// abaixo algumas variáveis que iremos utilizar.
		
		// pega a span onde esta a quantidade máxima de caracteres.
		var target	= $("#content-countdown");
		
		// pego pelo atributo title a quantidade maxima permitida.
		var max		= target.attr('title');

		// tamanho da string dentro da textarea.
		var len 	= $(this).val().length;
		
		// quantidade de caracteres restantes dentro da textarea.
		var remain	= max - len;

		// caso a quantidade dentro da textarea seja maior que
		// a quantidade maxima.
		if(len > max)
		{
			// abaixo vamos pegar tudo que tiver na string e limitar
			// a quantidade de caracteres para o máximo setado.
			// isso significa que qualquer coisa que seja maior que 
			// o máximo será cortado.
			var val = $(this).val();
			$(this).val(val.substr(0, max));
			
			// setamos o restante para 0.
			remain = 0;
		}

		// atualizamos a quantidade de caracteres restantes.
		target.html(remain);
		
	});

});
