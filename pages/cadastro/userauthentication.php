
<!-- CONEXAO COM O BANCO DE DADOS -->
<?php
$host = "localhost";
$user = "root";
$pass = "";
$banco = "npj";
$conexao = mysql_connect($host, $user, $pass) or die(mysql_error());
mysql_select_db($banco) or die(mysql_error());
?>

<html>
<head>
    <title>autenticando user</title>

    <script type="text/javascript">
        function loginsucessfully(){
            alert("Voc� foi autenticado com sucesso! Aguarde um instante.")
            setTimeout("window.location='../../index.php'", 100);
        }
        function loginfailed(){
            alert("Nome de usu�rio ou senha inv�lidos! Aguarde um instante.")
            setTimeout("window.location='../index.html'", 100)
        }
    </script>
</head>
<body>



    <?php
        $login=$_POST['login'];
        $senha=$_POST['senha'];
        $sql = mysql_query("SELECT * FROM usuario WHERE login='$login' and senha='$senha'") or die(mysql_error());
        $row = mysql_num_rows($sql);
        if($row > 0) { //verifica se tem usuario com aquele sql passado
            session_start();
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['senha'] = $_POST['senha'];
            $_SESSION['nome'] = $usuario;
            echo "<script>loginsucessfully()</script>";
        }else{

            echo "<script>loginfailed()</script>";
        }
    ?>

</body>

</html>