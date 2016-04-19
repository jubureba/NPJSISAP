<?php
session_start();
// Remove as variáveis da sessão (caso elas existam)
unset($_SESSION['usuarioID'], $_SESSION['usuarioNome'], $_SESSION['usuarioLogin'], $_SESSION['usuarioSenha'], $_SESSION['permissaoUser']);
// Manda pra tela de login
header("Location: index.php");

?>