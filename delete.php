<?php
require_once('config.php');
if (isset($_GET['id'])){
    $id = $_GET['id'];
}

if (isset($id) && is_numeric($id)) {
    $stmt = $dsn->prepare('DELETE FROM cliente WHERE id_cliente = :id_cliente');
    $stmt->bindParam(':id_cliente', $id);
    $stmt->execute();
    header('Location: listagem_de_clientes.php');
    exit();
}


require_once('destruct.php');
?>
