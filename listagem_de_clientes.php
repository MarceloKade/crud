<?php
require_once 'select.php';
// require_once 'insert.php';
// require_once 'update.php';
require_once 'delete.php';
require_once 'destruct.php';

?>
<!DOCTYPE html>
<html>

<head>
    <title>Formulário HTML - Cadastro de Clientes</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h3>Listagem de Clientes</h3>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Nome</th>
                                            <th scope="col">CPF</th>
                                            <th scope="col">E-mail</th>
                                            <th scope="col">Data de Nascimento</th>
                                            <th scope="col">Editar</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            while ($row = $resultSet->fetch(PDO::FETCH_ASSOC)):
                                            ?>
                                        <tr>
                                            <th scope="row">
                                                <?php echo $row['id_cliente']; ?>
                                            </th>
                                            <td>
                                                <?php echo $row['nome_cliente']; ?>
                                            </td>
                                            <td>
                                                <?php echo preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $row['cpf_cliente']); ?>
                                            </td>
                                            <td>
                                                <?php echo $row['email_cliente']; ?>
                                            </td>
                                            <td>
                                                <?php echo date('d/m/Y', strtotime($row['data_nascimento_cliente'])); ?>
                                            </td>
                                            <td>
                                                <a class='btn btn-sm  btn-primary'>
                                                    <img src="img/edit.svg">
                                                </a>
                                            </td>
                                            <td>
                                            <a class="btn btn-sm btn-danger"><img src="img/delete.svg" alt="delete"></a>

                                            </td>
                                        </tr>
                                        <?php
                                        endwhile;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>