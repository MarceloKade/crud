<?php
require_once 'config.php';
//Preparação e seleção no banco
$instruçãoSQL = "Select id_cliente, nome_cliente, cpf_cliente, email_cliente, data_nascimento_cliente From cliente";
$resultSet = $dsn->query($instruçãoSQL);
require_once 'destruct.php';
?>