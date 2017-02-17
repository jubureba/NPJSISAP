
<?php
include("../config/conn_pdo.php");
$conn = Conectar();
$proc_num_npj = $_GET['val'];
$query=$conn->prepare(" SELECT DISTINCT
                                                                    atend_npj.data_atend, documentos.cpf_valor, documentos.rg_valor, atend_npj.id_status, atend_npj.proc_num, cliente.nome, situacao.status_atual, assuntos.assunto, 
                                                                    (SELECT nome FROM cliente c WHERE c.id_pessoas = cliente_npj.id_cliente_requer) as REQUERIDO 
                                                                    FROM 
                                                                    atend_npj, documentos, cliente, cliente_npj, situacao, assuntos 
                                                                    WHERE 
                                                                    cliente_npj.id_cliente_assist = cliente.id_pessoas 
                                                                    AND 
                                                                    cliente_npj.id_atend_npj = atend_npj.id_atend_npj 
                                                                    AND
                                                                    atend_npj.proc_num = $proc_num_npj
                                                                    AND
                                                                    atend_npj.id_assunto = assuntos.id_assunto
                                                                    AND
                                                                    documentos.cliente_id = cliente.id_pessoas
                                                                    AND
                                                                    situacao.id_status = atend_npj.id_status
                                                                    ORDER BY 
                                                                    cliente_npj.id_cliente_npj");
$query->execute();
while($rs=$query->fetch(PDO::FETCH_ASSOC)){
    echo "Numero de Processo: <b>".$rs['proc_num']."</b></br>";

    echo "Data de Atendimento: <b>".date('d/m/Y - h:m:s', strtotime($rs['data_atend']))."</b></br>";
    echo "Ação: <b>".$rs['assunto']."</b></br>";
}

?>
