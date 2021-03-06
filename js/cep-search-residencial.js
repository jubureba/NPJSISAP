function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById('end-residencial-rua').value=("");
    document.getElementById('end-residencial-bairro').value=("");
    document.getElementById('city-residencial').value=("");
    document.getElementById('estado-residencial').value=("");
    document.getElementById('pais-residencial').value=("");

}
function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.



        document.getElementById('end-residencial-rua').value=(conteudo.logradouro);
        document.getElementById('end-residencial-bairro').value=(conteudo.bairro);
        document.getElementById('city-residencial').value=(conteudo.localidade);
        document.getElementById('estado-residencial').value=(conteudo.uf);
        document.getElementById('pais-residencial').value=("Brasil");

    } //end if.
    else {
        //CEP não Encontrado.
        limpa_formulário_cep();
        alert("CEP não encontrado.");
    }
}

function pesquisacep(valor) {

    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if(validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('end-residencial-rua').value="pesquisando...";
            document.getElementById('end-residencial-bairro').value="pesquisando...";
            document.getElementById('city-residencial').value="pesquisando..";
            document.getElementById('estado-residencial').value="pesquisando..";

            document.getElementById("loading").setAttribute("class", "overlay");
            document.getElementById("loading").innerHTML="<i class='fa fa-refresh fa-spin'></i>";
            setTimeout(function() {
                //Cria um elemento javascript.
                var script = document.createElement('script');
                //Sincroniza com o callback.
                script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);
                document.getElementById("loading").setAttribute("class", "");
                document.getElementById("loading").innerHTML="<i class=''></i>";
            }, 1500);



        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep();
            document.getElementById('cep-residencial').placeholder=("CEP NÃO ENCONTRADO - TENTE NOVAMENTE");
            alert("Formato de CEP inválido.");
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
};

