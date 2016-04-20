<html>
<head>
    <title>cadastrando</title>
    <script type="text/javascript">
        function loginsucessfully(){
            alert("Usuário Cadastrado com Sucesso!")
            setTimeout("window.location='../../../index.php'", 100);
        }
    </script>
</head>
<body>

<?php
require_once("../../config/conn.php");
?>

<?php

$nome=$_POST['nome'];
$login=$_POST['login'];
$email=$_POST['email'];
$telefone=$_POST['telefone'];
$foto=$_POST['foto'];
$senha=$_POST['senha'];
$turma =$_POST['turma'];
$semestre=$_POST['semestre'];
$turno=$_POST['turno'];
$permissao=$_POST['permissao'];

$sql = mysql_query("INSERT INTO usuario(nome, login, senha, semestre, turma, turno, telefone, permissao, foto, email) VALUES ('$nome','$login', '$senha', '$semestre','$turma', '$turno', '$telefone', '$permissao', 'dist/img/$foto', '$email' )");
echo "<script>loginsucessfully()</script>";


?>

</body>

</html>
