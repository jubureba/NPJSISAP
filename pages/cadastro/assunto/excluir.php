<html>

<head>
    <script type="text/javascript">
        function exclusaosucessfully(){
            alert("Assunto Excluido!")
            setTimeout("window.location='../../../new_subject.php'", 100);
        }
    </script>
</head>

<body>

<?php
    require_once("../../../pages/config/conn_pdo.php");
    $conn = Conectar();
    $dadosExcluir = $_POST['AssuntosCadastrados'];
    $stmt=$conn->prepare("DELETE FROM assuntos WHERE id_assunto = $dadosExcluir");
    $stmt->execute();

echo "<script>exclusaosucessfully()</script>";
?>



</body>
</html>
