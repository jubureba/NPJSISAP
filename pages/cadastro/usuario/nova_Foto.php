
<?php
require_once("../../conexao/conn.php");
session_start();
?>

<?php

$foto=$_POST['foto'];
$idAluno=$_SESSION['usuarioID'];
echo $foto. "    ". $idAluno;

$query = mysql_query("UPDATE usuario SET foto = 'dist/img/$foto' WHERE idUsuario = '$idAluno'");

header("location: ../../../index.php");


?>