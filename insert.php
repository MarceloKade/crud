<?php
//Preparação e inserção de dados no banco de dados
$stmt = $dsn->prepare("INSERT INTO cliente (id_cliente, nome_cliente, cpf_cliente, email_cliente, data_nascimento_cliente) VALUES (null,?, ?, ?, ?)");
$resultSet = $stmt->execute([$_POST['nome_cliente'], $_POST['cpf_cliente'], $_POST['email_cliente'], $_POST['data_nascimento_cliente']]);

if($resultSet){
}else{
    echo "Ocorreu um erro e não foi possível inserir os dados.";
   exit;
}
?>