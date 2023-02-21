<?php
require_once('config.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $stmt = $dsn->prepare("SELECT * FROM cliente WHERE id_cliente = :id_cliente");
    $stmt->execute([$id]);
    
    $cliente = $stmt->fetch();
    
    if (!$cliente) {
        // Se o cliente não existir, redirecione de volta para a página de listagem
        header('Location: listagem_de_clientes.php');
        exit;
    }
} else {
    // Se nenhum ID foi passado na URL, redirecione de volta para a página de listagem
    header('Location: listagem_de_clientes.php');
    exit;
}
?>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form method="post">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h3>Editar dados do cliente</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nome_cliente" class="form-group">Nome</label>
                                    <input type="text" name="nome_cliente" id="nome_cliente"
                                        value="<?php echo $cliente['nome_cliente'] ?>" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="cpf_cliente" class="form-group">CPF</label>
                                    <input type="text" name="cpf_cliente" id="cpf_cliente" minlength="11" maxlength="11"
                                        value="<?php echo $cliente['cpf_cliente'] ?>" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="email_cliente" class="form-group">E-mail</label>
                                    <input type="email" name="email_cliente" id="email_cliente"
                                        value="<?php echo $cliente['email_cliente'] ?>" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="data_nascimento_cliente" class="form-group">Data de Nascimento</label>
                                    <input type="date" name="data_nascimento_cliente" id="data_nascimento_cliente"
                                        value="<?php echo date('Y-m-d', strtotime($cliente['data_nascimento_cliente'])) ?>"
                                        class="form-control">
                                </div>

                                <div class="form-group">
                                    <input type="submit" value="Salvar" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $dsn->prepare("UPDATE cliente SET nome_cliente = ?, cpf_cliente = ?, email_cliente = ?, data_nascimento_cliente = ? WHERE id_cliente = ?");
    
    $resultSet = $stmt->execute([
        $_POST['nome_cliente'],
        $_POST['cpf_cliente'],
        $_POST['email_cliente'],
        $_POST['data_nascimento_cliente'],
        $cliente['id_cliente']
    ]);
    
    if ($resultSet) {
        // Se a atualização foi bem-sucedida, redirecione de volta para a página de listagem
        header('Location: listagem_de_clientes.php');
        exit;
    } else {
        echo "Ocorreu um erro e não foi possível atualizar os dados.";
    }
}
?>