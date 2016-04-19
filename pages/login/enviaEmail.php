<!-- CONEXAO COM O BANCO DE DADOS -->
<?php
$host = "localhost";
$user = "root";
$pass = "";
$banco = "npjdb";
$conexao = mysql_connect($host, $user, $pass) or die(mysql_error());
mysql_select_db($banco) or die(mysql_error());
?>



<html>
<head>
    <title>Recuperando Senha</title>

</head>
<body>









<?php

$email = $_POST['email'];
$result = mysql_query("SELECT * FROM usuario WHERE email='$email'");
$num_rows = mysql_num_rows($result);
if($num_rows=='1'){


	echo"<script>alert('Email Encontrado, Clique em OK para alterar sua senha'),window.open('mudarSenha.php','_self')</script>";


	}else{
		echo"<script>alert('E-mail não cadastrado em nosso sistema'),window.open('recuperarSenha.php','_self')</script>";
	}


?>

</body>

</html>

