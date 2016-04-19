
<?php
require_once("../../conexao/conn.php");
session_start();
?>

<?php

$instituicao=$_POST['instituicao'];
$curso=$_POST['curso'];
$idAluno=$_SESSION['usuarioID'];
$idEducacao = $_SESSION['UsuarioEducacao'];


$sql = mysql_query("INSERT INTO educacao_usuario (instituicao, idUsuario_educacao, curso) VALUES ('$instituicao',$idEducacao, '$curso' )");
header("location: ../../../index.php");


?>