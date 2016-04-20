<html>

<head>
    <script type="text/javascript">
        function exclusaosucessfully(){
            alert("Assunto Excluido!")
            setTimeout("window.location='../../../novo_assunto.php'", 100);
        }
    </script>
</head>

<body>

<?php
    require_once("../../../pages/config/conn.php");
    $dadosExcluir = $_POST['AssuntosCadastrados'];
    $query = mysql_query("DELETE FROM assunto_atendimento WHERE idAssunto_Atendimento = $dadosExcluir");


echo "<script>exclusaosucessfully()</script>";
?>



</body>
</html>
