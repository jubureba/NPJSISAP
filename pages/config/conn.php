<?php
// Informações para conexão
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
$host = "localhost"; //host ip
$usuario = "root";  //usuario de acesso
$senha = ""; //senha de acesso
$banco = "npjdb"; //nome do banco de dados
// Realizando conexão e selecioando banco de dados
$conn = mysql_connect($host, $usuario, $senha) or die(mysql_error());
$db = mysql_select_db($banco, $conn) or die(mysql_error());
mysql_set_charset('utf8');
?>