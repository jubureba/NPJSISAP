

<?php
require_once("../config/conn.php");

$idMensagem = $_GET["idMensagem"];
$query = mysql_query("DELETE FROM mensagens WHERE id = $idMensagem");


?>
