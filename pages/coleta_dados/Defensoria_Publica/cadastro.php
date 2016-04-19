<?php
require_once("../../../pages/conexao/conn.php");
session_start();

//VARIÁVEIS PARA RECEBER OS DADOS DO POST

$nomeAssistido = $_POST['nomeAssistido'];
$telefoneAssistido = $_POST['telefoneAssistido'];
$enderecoAssistido = $_POST['enderecoAssistido'];
$estadoAssistido = $_POST['estadoAssistido'];
$cidadeAssistido = $_POST['cidadeAssistido'];
$enderecoAssistido = $_POST['enderecoAssistido'];
$nomeRequerido = $_POST['nomeRequerido'];
$telefoneRequerido = $_POST['telefoneRequerido'];
$estadoRequerido = $_POST['estadoRequerido'];
$cidadeRequerido = $_POST['cidadeRequerido'];
$enderecoRequerido = $_POST['enderecoRequerido'];
$assunto = $_POST['assunto'];
$documentos = $_POST['documentos'];
$observacao = $_POST['observacao'];
$login = $_POST['loginDefensoria'];
$aluno = $_POST['AlunoVinculo'];

//VARIÁVEL DE SESSÃO, PARA ENVIAR PARA OUTRAS PAGINAS

$_SESSION['nomeAssistido'] = $nomeAssistido;
$_SESSION['telefoneAssistido'] = $telefoneAssistido;
$_SESSION['enderecoAssistido'] = $enderecoAssistido;
$_SESSION['estadoAssistido'] = $estadoAssistido;
$_SESSION['cidadeAssistido'] = $cidadeAssistido;
$_SESSION['nomeRequerido'] = $nomeRequerido;
$_SESSION['telefoneRequerido'] = $telefoneRequerido;
$_SESSION['estadoRequerido'] = $estadoRequerido;
$_SESSION['cidadeRequerido'] = $cidadeRequerido;
$_SESSION['enderecoRequerido'] = $enderecoRequerido;
$_SESSION['assunto'] = $assunto;
$_SESSION['observacao'] = $observacao;
$_SESSION['login'] = $login;
$_SESSION['aluno'] = $aluno;

//INSERÇÃO NO BANCO DE DADOS ===========================

$query = mysql_query("INSERT INTO assistido_defensoria (nomeAssistidoDefensoria, telefoneAssistidoDefensoria, loginDefensoria ) values('$nomeAssistido', '$telefoneAssistido','$login')");
$query = mysql_query("INSERT INTO requerido (nomeRequerido, telefoneRequerido) values ('$nomeRequerido','$telefoneRequerido')");
$query = mysql_query("INSERT INTO endereco_assistido (logradouroAssistido, CidadeAssistido, EstadoAssistido) VALUES ('$enderecoAssistido', '$cidadeAssistido', '$estadoAssistido')");
$query = mysql_query("INSERT INTO endereco_requerido (logradouroRequerido, CidadeRequerido, EstadoRequerido) values ('$enderecoRequerido', '$cidadeRequerido', '$estadoRequerido')");

//RECEBE OS ID DOS CAMPOS ==============================================================================================

$idAssistidoDef = mysql_query("SELECT idAssistidoDefensoria FROM assistido_defensoria WHERE nomeAssistidoDefensoria = '$nomeAssistido'");
$idRequerido = mysql_query("SELECT idRequerido FROM requerido WHERE nomeRequerido = '$nomeRequerido'");
$idAssunto = mysql_query("SELECT idAssunto_Atendimento FROM assunto_atendimento WHERE descricao = '$assunto'");
$idEndAssistido = mysql_query("SELECT idEndereco_Assistido FROM endereco_assistido WHERE logradouroAssistido = '$enderecoAssistido' ");
$idEndRequerido = mysql_query("SELECT idEndereco_Requerido FROM endereco_requerido WHERE logradouroRequerido = '$enderecoRequerido' ");
$idAluno = mysql_query("SELECT idUsuario FROM usuario WHERE nome = '$aluno' AND permissao = 'Aluno'");

$idAssistidoDef_ = mysql_fetch_array($idAssistidoDef);
$idRequerido_ = mysql_fetch_array($idRequerido);
$idAssunto_ = mysql_fetch_array($idAssunto);
$idEndAssistido_ = mysql_fetch_array($idEndAssistido);
$idEndRequerido_ = mysql_fetch_array($idEndRequerido);
$idAluno_ = mysql_fetch_array($idAluno);

print "".$idAssistidoDef_['idAssistidoDefensoria'].", ".$idRequerido_['idRequerido'].", ".$idAssunto_['idAssunto_Atendimento'].", ".$idEndAssistido_['idEndereco_Assistido'].", ".$idEndRequerido_['idEndereco_Requerido'].", ".$idAluno_['idUsuario']. ",". $observacao;
$idAssistidoDef = $idAssistidoDef_['idAssistidoDefensoria'];
$idRequerido = $idRequerido_['idRequerido'];
$idAssunto = $idAssunto_['idAssunto_Atendimento'];
$idEndAssistido = $idEndAssistido_['idEndereco_Assistido'];
$idEndRequerido = $idEndRequerido_['idEndereco_Requerido'];
$idAluno = $idAluno_['idUsuario'];

//FIM - RECEBE OS ID DOS CAMPOS ========================================================================================
//UPDATE

$query = mysql_query("UPDATE assistido_defensoria SET Endereco_Assistido_idEndereco_Assistido = '$idEndAssistido' WHERE idAssistidoDefensoria = '$idAssistidoDef'");
$query = mysql_query("UPDATE requerido SET Endereco_Requerido_idEndereco_Requerido = '$idEndRequerido' WHERE idRequerido = '$idRequerido'");

$query = mysql_query("INSERT INTO atendimento_defensoria (descricaoAtendimentoDefensoria, Assistido_Defensoria_idAssistidoDefensoria, Requerido_idRequerido, Usuario_idUsuario, Assunto_Atendimento_idAssunto_Atendimento, status) VALUES ('$observacao','$idAssistidoDef', '$idRequerido', '$idAluno', '$idAssunto', 'aberto')");

header("location: ../../acompanhamento/acompanhamento.php");
?>