<html>
<head>

</head>
<body>

<!-- O tipo de encoding de dados, enctype, DEVE ser especificado abaixo -->
<form action="upload.php" method="post" enctype="multipart/form-data">
    <fieldset>
        <p><label for="Enviar arquivo">Enviar arquivo:</label></p>
        <input type="file" name="arquivo" class="width233"/>
        <input type="submit" name="enviar" value="Enviar" />
    </fieldset>
</form>

</body>
</html>