<?php
require_once("conn_pdo.php");
$conn=Conectar();
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
        <th></th>
        <th>Nome</th>
        <th>Editar</th>
    </tr>

    <?php
    $nomeID = $_SESSION['usuarioID'];
    $sql=$conn->prepare("SELECT nome FROM cliente LIMIT $inicio, $maximo");
    //$sql = "SELECT nome FROM pessoas LIMIT $inicio, $maximo";
    $sql->execute();
    //$stmt = mysql_query($sql);

    while($resultado=$sql->fetch(PDO::FETCH_ASSOC)){
    //while ($resultado = mysql_fetch_array($stmt)) {
        //PEGA O NOME DO ASSISTIDO NA TABELA ASSISTIDODEFENSORIA, COM O ID

        ?>
        <tr id="dados1">
            <td width="16px" align="center"><img src="dist/icons/png/512/new.gif"/> </td>
            <td><?php echo "" . $resultado['nome'] ?></td>
            <td width="16px" align="center"><img src="dist/icons/png/512/edit_property.png" height="16px" width="16px"/></td>
        </tr>

        </tbody>
    <?php }
}else if($tipo=='contador_def_pub'){
    $id=$_SESSION['usuarioID'];
    
    $sql_res=mysql_query("SELECT * FROM nome WHERE idUsuario = '$id'"); //consulta no banco
    $contador=mysql_num_rows($sql_res); //Pegando Quantidade de itens
    echo $contador;
}else{
    echo "Solicitação inválida";
}
?>