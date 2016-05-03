function limpa_formulário_cep_work() {
    //Limpa valores do formulário de cep.
    document.getElementById('end-work-rua').value=("");
    document.getElementById('end-work-bairro').value=("");
    document.getElementById('city-work').value=("");
    document.getElementById('estado-work').value=("");
    document.getElementById('pais-work').value=("");

}
function meu_callback_work(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.

        document.getElementById('end-work-rua').value=(conteudo.logradouro);
        document.getElementById('end-work-bairro').value=(conteudo.bairro);
        document.getElementById('city-work').value=(conteudo.localidade);
        document.getElementById('estado-work').value=(conteudo.uf);
        document.getElementById('pais-work').value=("Brasil");

    } //end if.
    else {
        //CEP não Encontrado.
        limpa_formulário_cep_work();
        alert("CEP não encontrado.");
    }
}

function pesquisacep_work(valor) {

    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if(validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('end-work-rua').value="pesquisando...";
            document.getElementById('end-work-bairro').value="pesquisando...";
            document.getElementById('city-work').value="pesquisando..";
            document.getElementById('estado-work').value="pesquisando..";

            document.getElementById("loading-work").setAttribute("class", "overlay");
            document.getElementById("loading-work").innerHTML="<i class='fa fa-refresh fa-spin'></i>";
            setTimeout(function() {
                //Cria um elemento javascript.
                var script = document.createElement('script');
                //Sincroniza com o callback.
                script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback_work';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);
                document.getElementById("loading-work").setAttribute("class", "");
                document.getElementById("loading-work").innerHTML="<i class=''></i>";
            }, 1500);



        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep_work();
            document.getElementById('cep-work').placeholder=("CEP NÃO ENCONTRADO - TENTE NOVAMENTE");
            alert("Formato de CEP inválido.");
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep_work();
    }
};

