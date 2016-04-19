
<html>
<head>
    <title>cadastrando</title>


    <script type="text/javascript">
        function loginsucessfully(){
            alert("Usuário Cadastrado com Sucesso!")
            setTimeout("window.location='../../index.php'", 100);
        }
    </script>
</head>
<body>



<?php
$host = "localhost";
$user = "root";
$pass = "";
$banco = "npjdb";
$conexao = mysql_connect($host, $user, $pass) or die(mysql_error());
mysql_select_db($banco) or die(mysql_error());


?>

<?php

$nome=$_POST['nome'];
$login=$_POST['login'];
$senha=$_POST['senha'];
$semestre=$_POST['semestre'];
$turma =$_POST['turma'];
$turno=$_POST['turno'];
$telefone=$_POST['telefone'];
$permissao=$_POST['permissao'];

$sql = mysql_query("INSERT INTO usuario(idUsuario, nome, usuario, senha, semestre, turma, turno, telefone, permissao, foto) VALUES (3, '$nome','$login', '$senha', '$semestre',$turma', '$turno', '$telefone', '$permissao', 'teste' )");
echo "Usuario cadastrado com sucesso!";
echo "<script>loginsucessfully()</script>";


?>

</body>

</html>
