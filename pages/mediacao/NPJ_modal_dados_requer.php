<?php
include("../config/conn_pdo.php");
$conn = Conectar();
$proc_num_npj = $_GET['val'];
$query = $conn->prepare("SELECT DISTINCT
                                                                    atend_npj.data_atend, documentos.cpf_valor, documentos.rg_valor, atend_npj.id_status, atend_npj.proc_num, cliente.nome, situacao.status_atual, assuntos.assunto, 
                                                                    (SELECT nome FROM cliente c WHERE c.id_pessoas = cliente_npj.id_cliente_requer) as REQUERIDO ,
                                                                    (SELECT cpf_valor FROM documentos WHERE documentos.cliente_id = cliente_npj.id_cliente_requer) as CPF_REQUERIDO ,
                                                                    (SELECT rg_valor FROM documentos WHERE documentos.cliente_id = cliente_npj.id_cliente_requer) as RG_REQUERIDO
                                                                   
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
while ($rs = $query->fetch(PDO::FETCH_ASSOC)) {
    echo "Nome: <b>" . $rs['REQUERIDO'] . "</b></br>";
    echo "RG: <b>" . $rs['RG_REQUERIDO'] . "</b></br>";
    echo "CPF: <b>" . $rs['CPF_REQUERIDO'] . "</b></br>";
}

?>
