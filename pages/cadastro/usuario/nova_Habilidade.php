
<?php
require_once("../../conexao/conn.php");
session_start();
?>

<?php

$habilidade=$_POST['habilidade'];
$qualidade=$_POST['qualidade'];
$idAluno = $_SESSION['usuarioID'];


$sql = mysql_query("INSERT INTO habilidades_usuario (habilidade, qualidade, idUsuario_Habilidade) VALUES ('$habilidade','$qualidade', $idAluno )");

header("location: ../../../index.php");


?>