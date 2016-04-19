
<?php
require_once("../../conexao/conn.php");
session_start();
?>

<?php

$Nota=$_POST['Nota'];
$idAluno = $_SESSION['usuarioID'];

$query = mysql_query("UPDATE usuario SET Nota = '$Nota' WHERE idUsuario = '$idAluno'");

header("location: ../../../index.php");


?>