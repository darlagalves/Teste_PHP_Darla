<?php
include('config.php');

$registros_por_pagina = 10;
$pagina_atual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$inicio = ($pagina_atual - 1) * $registros_por_pagina;

$search = isset($_GET['search']) ? $_GET['search'] : '';

if ($search) {
    $sql = "SELECT * FROM users WHERE nome LIKE ? OR cpf LIKE ? LIMIT ?, ?";
    $stmt = $conn->prepare($sql);
    $search_param = '%' . $search . '%';
    $stmt->bind_param('ssii', $search_param, $search_param, $inicio, $registros_por_pagina);
} else {
    $sql = "SELECT * FROM users LIMIT ?, ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ii', $inicio, $registros_por_pagina);
}

$stmt->execute();
$result = $stmt->get_result();

$sql_total = "SELECT COUNT(*) FROM users";
$result_total = $conn->query($sql_total);
$total_registros = $result_total->fetch_row()[0];
$total_paginas = ceil($total_registros / $registros_por_pagina);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script>
        function validarFormulario() {
            const cpf = document.getElementById('cpf').value;
            const email = document.getElementById('email').value;

            if (!validarCPF(cpf)) {
                alert('CPF inválido!');
                return false;
            }

            if (!validarEmail(email)) {
                alert('Email inválido!');
                return false;
            }

            return true;
        }

        function validarCPF(cpf) {
            cpf = cpf.replace(/[^\d]+/g, '');
            if (cpf.length !== 11 || /^(\d)\1+$/.test(cpf)) return false;

            let soma = 0;
            for (let i = 0; i < 9; i++) {
                soma += parseInt(cpf.charAt(i)) * (10 - i);
            }
            let resto = 11 - (soma % 11);
            if (resto === 10 || resto === 11) resto = 0;
            if (resto !== parseInt(cpf.charAt(9))) return false;

            soma = 0;
            for (let i = 0; i < 10; i++) {
                soma += parseInt(cpf.charAt(i)) * (11 - i);
            }
            resto = 11 - (soma % 11);
            if (resto === 10 || resto === 11) resto = 0;
            if (resto !== parseInt(cpf.charAt(10))) return false;

            return true;
        }

        function validarEmail(email) {
            const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return regex.test(email);
        }

        function confirmDelete(id) {
            if (confirm('Tem certeza que deseja excluir este usuário?')) {
                window.location.href = 'delete_user.php?id=' + id;
            }
        }

        function confirmBlock(id) {
            if (confirm('Tem certeza que deseja bloquear este usuário?')) {
                window.location.href = 'block_user.php?id=' + id;
            }
        }
    </script>
</head>
<body>
    <h1>Lista de Usuários</h1>
    <div class="d-flex justify-content-between mb-3">
        <button onclick="window.location.href='register.php'" class="btn botaologin">Adicionar Usuário</button>
        <form class="form-inline" method="GET" action="">
            <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar por nome ou CPF" aria-label="Pesquisar" name="search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
        </form>
    </div>
    <table border="1" class="tabela">
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['nome']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['telefone']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#viewModal<?php echo $row['id']; ?>">Ver</button>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal<?php echo $row['id']; ?>">Editar</button>
                <button type="button" class="btn btn-danger" onclick="confirmDelete(<?php echo $row['id']; ?>)">Excluir</button>
                <button type="button" class="btn btn-danger" onclick="confirmBlock(<?php echo $row['id']; ?>)">Block</button>
            </td>
        </tr>

        <!-- Modal Ver -->
        <div class="modal fade" id="viewModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewModalLabel<?php echo $row['id']; ?>">Informações do Usuário</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><strong>ID:</strong> <?php echo $row['id']; ?></p>
                        <p><strong>Nome:</strong> <?php echo $row['nome']; ?></p>
                        <p><strong>CPF:</strong> <?php echo $row['cpf']; ?></p>
                        <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
                        <p><strong>Telefone:</strong> <?php echo $row['telefone']; ?></p>
                        <p><strong>CEP:</strong> <?php echo $row['cep']; ?></p>
                        <p><strong>Endereço:</strong> <?php echo $row['endereco']; ?></p>
                        <p><strong>Número:</strong> <?php echo $row['numero']; ?></p>
                        <p><strong>Complemento:</strong> <?php echo $row['complemento']; ?></p>
                        <p><strong>Bairro:</strong> <?php echo $row['bairro']; ?></p>
                        <p><strong>Cidade:</strong> <?php echo $row['cidade']; ?></p>
                        <p><strong>Estado:</strong> <?php echo $row['estado']; ?></p>
                        <p><strong>Data de Nascimento:</strong> <?php echo $row['nascimento']; ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Editar -->
        <div class="modal fade" id="editModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel<?php echo $row['id']; ?>">Editar Usuário</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="edit_user.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <div class="form-group">
                                <label for="nome">Nome:</label>
                                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $row['nome']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="cpf">CPF:</label>
                                <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $row['cpf']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="telefone">Telefone:</label>
                                <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $row['telefone']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="cep">CEP:</label>
                                <input type="text" class="form-control" id="cep" name="cep" value="<?php echo $row['cep']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="endereco">Endereço:</label>
                                <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $row['endereco']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="numero">Número:</label>
                                <input type="text" class="form-control" id="numero" name="numero" value="<?php echo $row['numero']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="complemento">Complemento:</label>
                                <input type="text" class="form-control" id="complemento" name="complemento" value="<?php echo $row['complemento']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="bairro">Bairro:</label>
                                <input type="text" class="form-control" id="bairro" name="bairro" value="<?php echo $row['bairro']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="cidade">Cidade:</label>
                                <input type="text" class="form-control" id="cidade" name="cidade" value="<?php echo $row['cidade']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="estado">Estado:</label>
                                <input type="text" class="form-control" id="estado" name="estado" value="<?php echo $row['estado']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="nascimento">Data de Nascimento:</label>
                                <input type="date" class="form-control" id="nascimento" name="nascimento" value="<?php echo $row['nascimento']; ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

        <?php endwhile; ?>
    </table>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
