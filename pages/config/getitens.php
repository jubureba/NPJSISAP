<?php
require_once("conn.php");
ini_set('default_charset', 'UTF-8');
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
session_start();
$tipo=$_GET['tipo'];
if($tipo=='listagem'){
    $pag=$_GET['pag'];
    $maximo=$_GET['maximo'];
    $inicio = ($pag * $maximo) - $maximo; //Variável para LIMIT da sql
    ?>
    <tbody>
    <tr>
        <th>Protocolo</th>
        <th>Assistido</th>
        <th>Requerido</th>
        <th>Data</th>
        <th>Status</th>
        <th>Observação</th>
    </tr>

    <?php
    $nomeID = $_SESSION['usuarioID'];
    $sql = "SELECT * FROM atendimento_defensoria WHERE Usuario_idUsuario = '$nomeID' LIMIT $inicio, $maximo";
    $stmt = mysql_query($sql);

    while ($resultado = mysql_fetch_array($stmt)) {
        //PEGA O NOME DO ASSISTIDO NA TABELA ASSISTIDODEFENSORIA, COM O ID
        $assistido = $resultado['Assistido_Defensoria_idAssistidoDefensoria'];
        $query = "SELECT * FROM assistido_defensoria WHERE idAssistidoDefensoria = $assistido";
        $assistido = mysql_fetch_array(mysql_query($query));

        //pega o nome do requerido
        $requerido = $resultado['Requerido_idRequerido'];
        $query = "SELECT * FROM requerido WHERE idRequerido = $requerido";
        $requerido = mysql_fetch_array(mysql_query($query));

        $assunto = $resultado['Assunto_Atendimento_idAssunto_Atendimento'];
        $query = "SELECT * FROM assunto_atendimento WHERE idAssunto_Atendimento = $assunto";
        $assunto = mysql_fetch_array(mysql_query($query));


        ?>

        <tr>
            <td><?php echo "" . $resultado['idAtendimento_Defensoria'] ?></td>
            <td><?php echo "" . $assistido['nomeAssistidoDefensoria'] ?></td>
            <td><?php echo "" . $requerido['nomeRequerido'] ?></td>
            <td><?php echo date('d/m/Y', strtotime("".$resultado['data'])) ?></td>
            <script type="text/javascript">
                var status = "<?php echo "".$resultado['status'] ?>";
                if (status == "aberto") {
                    document.getElementById("stats").setAttribute("class", "label label-primary");
                    document.getElementById("stats").setAttribute("id", "class1");
                }
                if (status == "concluído") {
                    document.getElementById("stats").setAttribute("class", "label label-success");
                    document.getElementById("stats").setAttribute("id", "class2");
                }
                if (status == "Não Aprovado") {
                    document.getElementById("stats").setAttribute("class", "label label-danger");
                    document.getElementById("stats").setAttribute("id", "class3");
                }
                if (status == "esperando aprovacao") {
                    document.getElementById("stats").setAttribute("class", "label label-warning");
                    document.getElementById("stats").setAttribute("id", "class4");
                }
            </script>
            <td>
                <span id="stats" class="label label-success"><?php echo $resultado['status'] ?></span>
            </td>

            <td>
                <?php echo "" . $resultado['descricaoAtendimentoDefensoria'] ?>
            </td>
        </tr>
        </tbody>
    <?php }
}else if($tipo=='contador'){
    $id=$_SESSION['usuarioID'];
    $sql_res=mysql_query("SELECT * FROM atendimento_defensoria WHERE Usuario_idUsuario = '$id'"); //consulta no banco
    $contador=mysql_num_rows($sql_res); //Pegando Quantidade de itens
    echo $contador;
}else{
    echo "Solicitação inválida";
}
?>