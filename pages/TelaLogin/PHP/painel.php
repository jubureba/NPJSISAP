<?php
$host = "localhost";
$user = "root";
$pass = "";
$banco = "npjdb";
$conexao = mysql_connect($host, $user, $pass) or die(mysql_error());
mysql_select_db($banco) or die(mysql_error());
?>
<?php
    session_start();
    //caso ele tenha uma sess�o aberta ele ta logado -
    //OBS: ASPAS DUPLAS POR QUE N�O � EM JS E SIM EM PHP

    if((!isset($_SESSION["login"])) || (!isset($_SESSION["senha"]))){
        header("Location: ../index.html");
        session_destroy();
        exit; //encerra as fun��es
    } else
        echo "<center>Voc� est� logado! :D</center>";


?>

<html>
<head>
    <title>painel</title>

</head>
<body>
<br/>
<?php
 echo "<a href='../index.html' session_destroy() >Sair </a>";
?>
</body>

</html>
