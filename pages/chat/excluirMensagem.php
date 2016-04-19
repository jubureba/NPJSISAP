<html>

<head>

    <script type="text/javascript">
        function excluido(){
            setTimeout("window.location='../../index.php'", 1);
        }
    </script>
</head>

<body>


<?php
require_once("../conexao/conn.php");

$idMensagem = $_GET["idMensagem"];
$query = mysql_query("DELETE FROM mensagens WHERE id = $idMensagem");
echo "<script>excluido();</script>";

?>


</body>
</html>
