<?php
require_once('config.php');
// Verifica se o banco de dados existe, senão existir ele cria
$createDb = file_get_contents("sql/createDatabase.sql");
$stmv = $dsn->prepare($createDB);
$dsn->exec($createDb);

// Seleciona o banco de dados criado ou existente
$useDb = "USE " . DBNAME;
$stmu = $dsn->prepare($useDb);
$dsn->exec($useDb);

//Verifica se a tabela existe, senão existir ele cria
$table = file_get_contents("sql/create.sql");
$stmt = $dsn->prepare($table);
$createTable = $stmt->execute();


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