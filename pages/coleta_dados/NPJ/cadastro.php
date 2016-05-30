<?php
require_once("../../config/conn_pdo.php");
$conn = Conectar();

$processoN = $_POST['processoN'];
$vara = $_POST['vara'];
$data = $_POST['data'];
$aluno = $_POST['aluno'];
$assunto = $_POST['assunto'];
$hist = $_POST['historico'];



$gravar=$conn->prepare("INSERT INTO atend_npj (id_status, proc_num, vara, id_assunto, id_usuario, historico) 
VALUES ('1','$processoN','$vara', '$assunto', '$aluno', '$hist' )");
$gravar->execute();
$ultimoId = $conn->lastInsertId();


$count = 1;
while($_POST["assistido_".$count] || $_POST["requerido_".$count]) {
    $assistido = $_POST["assistido_".$count];
    $requerido = $_POST["requerido_".$count];
    $gravar=$conn->prepare("INSERT INTO cliente_npj (id_atend_npj, id_cliente_assist, id_cliente_requer) 
    VALUES ('$ultimoId', '$assistido', '$requerido' )");
    $gravar->execute();
    $count=$count+1;
}
$redirect = "../../../atend_NPJ.php";
header("location: $redirect");

?>
