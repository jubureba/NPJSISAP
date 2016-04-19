<?php
require_once("../conexao/conn.php");
session_start();

$mensagem = $_POST["mensagem"];
$nome = $_SESSION['usuarioNome'];
$imagem = $_SESSION['imagem'];
$email = $_SESSION['email'];

$query = mysql_query("INSERT INTO mensagens (nome, email, mensagem, foto) VALUES ( '$nome', '$email', '$mensagem', '$imagem')");


header("location: ../../index.php");
?>
