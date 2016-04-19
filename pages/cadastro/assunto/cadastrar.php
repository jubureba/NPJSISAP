<html>

<head>
    <script type="text/javascript">
        function loginsucessfully(){
            alert("Novo Assunto Cadastrado com Sucesso!")
            setTimeout("window.location='novo_assunto.php'", 100);
        }
    </script>
</head>

<body>

<?php

require_once("../../../pages/conexao/conn.php");

$novoAssunto = $_POST['novoAssunto'];

$query = mysql_query("INSERT INTO assunto_atendimento (descricao) values ('$novoAssunto')");

echo "<script>loginsucessfully()</script>";
?>



</body>
</html>
