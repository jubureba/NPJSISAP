<?php
include ("pages/config/conn_pdo.php");

/**
 * função que devolve em formato JSON os dados do cliente
 */
function retorna( $nome )
{
    $conn=Conectar();
    $bd_pessoa = $conn->prepare("SELECT * FROM pessoas WHERE nome = '$nome'");
    $bd_pessoa->execute();

    $arr = Array();

    if($bd_pessoa->rowCount()){
        while($dados=$bd_pessoa->fetch(PDO::FETCH_ASSOC)) {
            $arr['idPessoa'] = $dados['idPessoa'];
            $arr['nome']= $dados['nome'];
            $arr['nomeMenor'] = $dados['nomeMenor'];
            $arr['nomePai'] = $dados['nomePai'];
            $arr['nomeMae'] = $dados['nomeMae'];
        }

        //PEGANDO PARTE DE ENDEREÇO-RESIDENCIAL
        $bd_pessoa = $conn->prepare("SELECT * FROM end_residencial WHERE pessoas_idPessoa = '{$arr['idPessoa']}'");
        $bd_pessoa->execute();
        $dados=$bd_pessoa->fetch(PDO::FETCH_ASSOC);

        $arr['cep'] = $dados['cep'];
        $arr['pais'] = $dados['pais'];
        $arr['estado'] = $dados['estado'];
        $arr['cidade'] = $dados['cidade'];
        $arr['bairro'] = $dados['bairro'];
        $arr['rua'] = $dados['rua'];

        //PEGANDO PARTE DE ENDEREÇO-DE-TRABALHO
        $bd_pessoa = $conn->prepare("SELECT * FROM end_residencial WHERE pessoas_idPessoa = '{$arr['idPessoa']}'");
        $bd_pessoa->execute();
        $dados=$bd_pessoa->fetch(PDO::FETCH_ASSOC);

        $arr['cep'] = $dados['cep'];
        $arr['pais'] = $dados['pais'];
        $arr['estado'] = $dados['estado'];
        $arr['cidade'] = $dados['cidade'];
        $arr['bairro'] = $dados['bairro'];
        $arr['rua'] = $dados['rua'];

    }else{
        $arr['nome'] = 'não encontrado';}


    return json_encode( $arr );
}

/* só se for enviado o parâmetro, que devolve os dados */
if( isset($_GET['nome']) )
{
    $db = new mysqli('localhost', 'root', '', 'npjdb');
    echo retorna( filter ( $_GET['nome'] ), $db );
}

function filter( $var ){
    return $var;//a implementação desta, fica a cargo do leitor
}