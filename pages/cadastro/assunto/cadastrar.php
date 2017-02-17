<html>

<head>
    <script type="text/javascript">
        function loginsucessfully(){
            alert("Novo Assunto Cadastrado com Sucesso!")
            setTimeout("window.location='../../../new_subject.php'", 100);
        }
    </script>
</head>

<body>

<?php

require_once("../../../pages/config/conn_pdo.php");

$conn = Conectar();
$novoAssunto = $_POST['novoAssunto'];

$stmt = $conn->prepare("INSERT INTO assuntos (assunto) values ('$novoAssunto')");
$stmt->execute();

echo "<script>loginsucessfully()</script>";
?>



</body>
</html>
