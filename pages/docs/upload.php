<?php
$arquivo = $_FILES['arquivo'];
    $novonome = $arquivo['name'];
    $dir = "docs/";
    if (!file_exists($dir))
    {
        mkdir($dir, 0755);
    }
    $caminho = $dir.$novonome;
    move_uploaded_file($arquivo['tmp_name'],$caminho);
    echo '<script type="text/javascript">alert("Arquivo enviado!")</script>';
    echo '<meta http-equiv="refresh" content="1; url=index.html" />';

?>