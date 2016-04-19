<?php
require_once("../../conexao/conn.php");
?>

<?php

$processoN = $_POST['processoN'];
$vara = $_POST['vara'];
$data = $_POST['data'];
$nome = $_POST['nome'];
$NomeMenor = $_POST['NomeMenor'];
$nomePai = $_POST['nomePai'];
$nomeMae = $_POST['nomeMae'];
$Nacionalidade = $_POST['Nacionalidade'];
$dataNasc = $_POST['dataNasc'];
$Escolaridade = $_POST['Escolaridade'];
$Profissao = $_POST['Profissao'];
$EstadoCivil = $_POST['EstadoCivil'];
$enderecoResidencial = $_POST['enderecoResidencial'];
$cidade = $_POST['cidade'];
$telefone = $_POST['telefone'];
$EnderecoTrabalho = $_POST['EnderecoTrabalho'];
$cidadeTrabalho = $_POST['cidadeTrabalho'];
$telefoneTrabalho = $_POST['telefoneTrabalho'];
$situacaoHabitacional = $_POST['situacaoHabitacional'];
$Remuneracao = $_POST['Remuneracao'];
$HistoricoRelatorio = $_POST['assunto'];
$fotoNome = $_FILES['arquivo']['name'];
$uploadError = $_FILES['arquivo']['error'];



echo "".$processoN." ".$vara." ".$data." ".$nome." ".$nomePai." ".$nomeMae." ".$Nacionalidade." ".$dataNasc." ".$Escolaridade." "
.$Profissao." ".$EstadoCivil." ".$enderecoResidencial." ".$cidade." ".$telefone." ".$EnderecoTrabalho." ".$cidadeTrabalho." ".$situacaoHabitacional.
" ".$Remuneracao." ".$HistoricoRelatorio." ".$fotoNome." ".$uploadError;


?>
