<?php
//Conexão com o banco de dados
//Constantes para armazenamento das variáveis de Conexão
define ('HOST', 'localhost');
define('PORT', '5432');
define('DBNAME', 'teste');
define('USER', 'postgres');
define('PASSWORD', '1234');

try {
    $dsn = new PDO ("pgsql:host=". HOST . ";port=".PORT.";dbname=" . DBNAME . ";user=" . USER . ";password=" . PASSWORD);
} catch (PDOException $e) {
    echo 'A conexão falhou e retornou a seguinte mensagem de erro: ' . $e->getMessage();
}
?>