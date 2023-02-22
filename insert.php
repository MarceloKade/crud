<?php
require_once('config.php');
//Verifica se a tabela existe, senão existir ele cria
$database = file_get_contents("sql/createDatabase.sql");
$table = file_get_contents("sql/createTable.sql");
$stmt = $dsn->prepare($database);
$stmt = $dsn->prepare($table);
$stmt->execute();


//Preparação e inserção de dados no banco de dados
$stmt = $dsn->prepare("INSERT INTO cliente (nome_cliente, cpf_cliente, email_cliente, data_nascimento_cliente) VALUES (?, ?, ?, ?)");

// Verifica se a tabela está vazia
$count = $dsn->query("SELECT count(*) FROM cliente")->fetchColumn();
if ($count == 0) {
    // Se estiver vazia, define o ID como 1
    $dsn->query("ALTER SEQUENCE cliente_id_cliente_seq RESTART WITH 1");
}

$resultSet = $stmt->execute([$_REQUEST['nome_cliente'], $_REQUEST['cpf_cliente'], $_REQUEST['email_cliente'], $_REQUEST['data_nascimento_cliente']]);
if($resultSet){
    header('Location: listagem_de_clientes.php');
} else {
    echo "Ocorreu um erro e não foi possível inserir os dados.";
    exit;
}



?>