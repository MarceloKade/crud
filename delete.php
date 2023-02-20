<?php
require_once "config.php";

if (isset($_POST["id_cliente"])) {
  $idCliente = $_POST["id_cliente"];
  $stmt = $pdo->prepare("DELETE FROM cliente WHERE id_cliente = ?");
  $stmt->execute([$idCliente]);
}
require_once 'destruct.php';
?>
