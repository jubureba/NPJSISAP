<?php
session_start();
include("../../../pages/config/conn_pdo.php");
$conn = Conectar();


$nome=$_GET['nome'];
    if(isset($nome)) {
        $busca = $conn->prepare("SELECT * FROM pessoas WHERE nome = ?");
        $busca->execute(array($nome));
        $linha = $busca->fetch(PDO::FETCH_ASSOC);
        echo $linha['nome'];

        $_SESSION['nome'] = $linha['nome'];

    }

?>
