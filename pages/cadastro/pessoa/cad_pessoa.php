<?php
//include('pages/config/conn.php');
include('../../../pages/config/conn_pdo.php');
session_start();


$conn = Conectar();
//VARIAVEIS
$nome = $_POST['nome'];
$nomeMenor = $_POST['NomeMenor'];
$nomePai = $_POST['nomePai'];
$nomeMae = $_POST['nomeMae'];
$pais_nat = $_POST['pais-naturalidade'];
$estado_nat = $_POST['estado-naturalidade'];
$cidade_nat = $_POST['city-naturalidade'];
$cep_res = $_POST['cep-residencial'];
$pais_res = $_POST['pais-residencial'];
$estado_res = $_POST['estado-residencial'];
$cidade_res = $_POST['city-residencial'];
$bairro_res = $_POST['end-residencial-bairro'];
$rua_res = $_POST['end-residencial-rua'];
$data_nasc = $_POST['date'];
$escolaridade = $_POST['escolaridade'];
$est_civil = $_POST['estado-civil'];
$tel_res = $_POST['telefone'];
$profissao = $_POST['Profissao'];
$remuneracao = $_POST['Remuneracao'];
$cep_work = $_POST['cep-work'];
$pais_wok = $_POST['pais-work'];
$estado_work = $_POST['estado-work'];
$cidade_work = $_POST['city-work'];
$bairro_work = $_POST['end-work-bairro'];
$rua_work = $_POST['end-work-rua'];
$tel_work = $_POST['telefoneTrabalho'];
$sit_habit = $_POST['situacaoHabitacional'];

//dados
$cpf = $_SESSION['cpf'];
$rg = $_SESSION['rg'];
$ctps = $_SESSION['ctps'];
$nascimento = $_SESSION['nascimento'];
//IMGS
$imgCpf = $_SESSION['img-cpf'];
$imgRg = $_SESSION['img-rg'];
$imgCasamento = $_SESSION['img-casamento'];
$imgContracheque = $_SESSION['img-contracheque'];
$imgCtps = $_SESSION['img-ctps'];
$imgNascimento = $_SESSION['img-nascimento'];
$imgObito = $_SESSION['img-obito'];
$imgResidencia = $_SESSION['img-residencia'];
//GRAVAR NO BANCO DE DADOS

$ver_existencia = $conn->prepare("SELECT * FROM pessoas WHERE cpf=?");
$ver_existencia->execute(array($cpf));
if($ver_existencia->rowCount()==0){
    $stmt = $conn->prepare("INSERT INTO pessoas
(nome, telefone, nomeMenor, nomePai, nomeMae, naturalidade, nacionalidade, dataNascimento, escolaridade, profissao, estadoCivil, situacaoHabitacional, remuneracao, rg, cpf, ctps)
VALUES
(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bindParam(1, $nome);
    $stmt->bindParam(2, $tel_res);
    $stmt->bindParam(3, $nomeMenor);
    $stmt->bindParam(4, $nomePai);
    $stmt->bindParam(5, $nomeMae);
    $stmt->bindParam(6, $pais_nat);
    $stmt->bindParam(7, $estado_nat);
    $stmt->bindParam(8, $dataNascimento);
    $stmt->bindParam(9, $escolaridade);
    $stmt->bindParam(10, $profissao);
    $stmt->bindParam(11, $est_civil);
    $stmt->bindParam(12, $sit_habit);
    $stmt->bindParam(13, $remuneracao);
    $stmt->bindParam(14, $rg);
    $stmt->bindParam(15, $cpf);
    $stmt->bindParam(16, $ctps);
    $stmt->execute();
    $ultimoId = $conn->lastInsertId();

//TABELA ENDEREÇO RESIDENCIAL
    $stmt = $conn->prepare("INSERT INTO end_residencial
(cep, pais, estado, cidade, bairro, rua, pessoas_idPessoa)
VALUES
(?,?,?,?,?,?,?)");
    $stmt->bindParam(1, $cep_res);
    $stmt->bindParam(2, $pais_res);
    $stmt->bindParam(3, $estado_res);
    $stmt->bindParam(4, $cidade_res);
    $stmt->bindParam(5, $bairro_res);
    $stmt->bindParam(6, $rua_res);
    $stmt->bindParam(7, $ultimoId);
    $stmt->execute();

//TABELA ENDEREÇO DE TRABALHO
    $stmt = $conn->prepare("INSERT INTO end_work
(cep, pais, estado, cidade, bairro, rua, telefone, pessoas_idPessoa)
VALUES
(?,?,?,?,?,?,?,?)");
    $stmt->bindParam(1, $cep_work);
    $stmt->bindParam(2, $pais_work);
    $stmt->bindParam(3, $estado_work);
    $stmt->bindParam(4, $cidade_work);
    $stmt->bindParam(5, $bairro_work);
    $stmt->bindParam(6, $rua_work);
    $stmt->bindParam(7, $tel_work);
    $stmt->bindParam(8, $ultimoId);
    $stmt->execute();

}else{
    echo "ja existe";
}

?>