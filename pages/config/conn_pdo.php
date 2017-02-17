<?php
function Conectar(){
    try{
        $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
        $conn = new PDO("mysql:host=localhost; dbname=npj;", "root", "", $opcoes);
        return $conn;
    } catch (Exception $e){
        echo 'Erro: '.$e->getMessage();
        return null;
    }
}
?>