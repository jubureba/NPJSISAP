<?php
ini_set( 'display_errors', true );
error_reporting( E_ALL );
require_once("conn_pdo.php");
$conn=Conectar();
session_start();
$tipo=$_GET['tipo'];
if($tipo=='listagem'){
    $pag=$_GET['pag'];
    $maximo=$_GET['maximo'];
    $inicio = ($pag * $maximo) - $maximo; //Variável para LIMIT da sql
    ?>
    <tbody>
    <tr>
        <th style="width: 5%">Protocolo</th>
        <th style="width: 20%">Assistido</th>
        <th style="width: 20%">Requerido</th>
        <th style="width: 10%">Data | Hora</th>
        <th style="width: 10%">Status</th>
        <th style="width: 35%">Assunto</th>
    </tr>

    <?php
    $linha=0;
    $query_qtd=$conn->prepare("
    SELECT DISTINCT
        atend_npj.data_atend, atend_npj.id_status, atend_npj.proc_num, cliente.nome, situacao.status_atual, assuntos.assunto, 
        (SELECT nome FROM cliente c WHERE c.id_pessoas = cliente_npj.id_cliente_requer) as REQUERIDO 
        FROM 
        atend_npj, cliente, cliente_npj, situacao, assuntos 
        WHERE 
        cliente_npj.id_cliente_assist = cliente.id_pessoas 
        AND 
        cliente_npj.id_atend_npj = atend_npj.id_atend_npj 
        AND
        atend_npj.id_assunto = assuntos.id_assunto
        AND
        situacao.id_status = atend_npj.id_status
        ORDER BY 
        cliente_npj.id_cliente_npj LIMIT $inicio, $maximo");//COLOCAR WHERE COM ID DO ALUNO
    $query_qtd->execute();

    while($query=$query_qtd->fetch(PDO::FETCH_ASSOC)){
        ?>
            <tr id="dados">
                <td><?php echo $query['proc_num'] ?></td>
                <td><?php echo $query['nome']; ?></td>
                <td><?php echo $query['REQUERIDO']; ?></td>
                <td><?php echo date('d/m/Y - h:m:s', strtotime($query['data_atend'])); ?></td>
                <script type="text/javascript">
                    var status = <?php echo $query['id_status']; ?>;
                    if (status == 1) {
                        document.getElementById("stats").setAttribute("class", "label label-primary");
                        document.getElementById("stats").setAttribute("id", "class1");
                    }
                    if (status == 4) {
                        document.getElementById("stats").setAttribute("class", "label label-success");
                        document.getElementById("stats").setAttribute("id", "class2");
                    }
                    if (status == 3) {
                        document.getElementById("stats").setAttribute("class", "label label-danger");
                        document.getElementById("stats").setAttribute("id", "class3");
                    }
                    if (status == 2) {
                        document.getElementById("stats").setAttribute("class", "label label-warning");
                        document.getElementById("stats").setAttribute("id", "class4");
                    }
                </script>
                <td>
                    <span id="stats" class="label label-success"><?php echo $query['status_atual']; ?></span>
                </td>

                <td>
                    <?php echo $query['assunto']; ?>
                </td>
            </tr>
        </tbody>
    <?php

    }
}else if($tipo=='contador_def_pub'){
    $id=$_SESSION['usuarioID'];
    $query_qtd=$conn->prepare("
    SELECT DISTINCT
        atend_npj.data_atend, atend_npj.id_status, atend_npj.proc_num, cliente.nome, situacao.status_atual, assuntos.assunto, 
        (SELECT nome FROM cliente c WHERE c.id_pessoas = cliente_npj.id_cliente_requer) as REQUERIDO 
        FROM 
        atend_npj, cliente, cliente_npj, situacao, assuntos 
        WHERE 
        cliente_npj.id_cliente_assist = cliente.id_pessoas 
        AND 
        cliente_npj.id_atend_npj = atend_npj.id_atend_npj 
        AND
        atend_npj.id_assunto = assuntos.id_assunto
        AND
        situacao.id_status = atend_npj.id_status
        ORDER BY 
        cliente_npj.id_cliente_npj");//COLOCAR WHERE COM ID DO ALUNO
    $query_qtd->execute();
    $contador=$query_qtd->rowCount(); //Pegando Quantidade de itens
    echo $contador;
}else{
    echo "Solicitação inválida";
}
