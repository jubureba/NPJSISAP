<?php
$nomeID = $_SESSION['usuarioID'];
$sql = "SELECT * FROM atendimento_defensoria WHERE Usuario_idUsuario = '$nomeID' ";
$stmt = mysql_query($sql);

while ($resultado = mysql_fetch_array($stmt)) {
//PEGA O NOME DO ASSISTIDO NA TABELA ASSISTIDODEFENSORIA, COM O ID
$assistido = $resultado['Assistido_Defensoria_idAssistidoDefensoria'];
$query = "SELECT * FROM assistido_defensoria WHERE idAssistidoDefensoria = $assistido";
$assistido = mysql_fetch_array(mysql_query($query));

//pega o nome do requerido
$requerido = $resultado['Requerido_idRequerido'];
$query = "SELECT * FROM requerido WHERE idRequerido = $requerido";
$requerido = mysql_fetch_array(mysql_query($query));

$assunto = $resultado['Assunto_Atendimento_idAssunto_Atendimento'];
$query = "SELECT * FROM assunto_atendimento WHERE idAssunto_Atendimento = $assunto";
$assunto = mysql_fetch_array(mysql_query($query));

?>