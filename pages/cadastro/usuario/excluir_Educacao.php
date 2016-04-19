<html>

<head>
    <meta charset="utf-8"/>

    <script type="text/javascript">
        function excluido(){
            setTimeout("window.location='../../../index.php'", 1);
        }
    </script>
</head>

<body>
<?php
require_once("../../conexao/conn.php");


$idEducacao = $_GET["idUsuarioEducacao"];

$query = mysql_query("DELETE FROM educacao_usuario WHERE idEducacao = $idEducacao ");

echo "<script>excluido()</script>";

?>


</body>
</html>
