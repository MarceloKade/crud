<?php
require_once 'config.php';
//Preparação e inserção de dados no banco de dados
$stmt = $dsn->prepare("INSERT INTO cliente (nome_cliente, cpf_cliente, email_cliente, data_nascimento_cliente) VALUES (?, ?, ?, ?)");
$resultSet = $stmt->execute([$_REQUEST['nome_cliente'], $_REQUEST['cpf_cliente'], $_REQUEST['email_cliente'], $_REQUEST['data_nascimento_cliente']]);
if($resultSet){
}else{
    echo "Ocorreu um erro e não foi possível inserir os dados.";
   exit;
}
require_once 'destruct.php';
?>