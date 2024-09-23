<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cep = $_POST['cep'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $nascimento = $_POST['nascimento']; 

    $sql = "UPDATE users SET 
                nome = ?, 
                cpf = ?, 
                email = ?, 
                telefone = ?, 
                cep = ?, 
                endereco = ?, 
                numero = ?, 
                complemento = ?, 
                bairro = ?, 
                cidade = ?, 
                estado = ?, 
                nascimento = ? 
            WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssssssssssi', $nome, $cpf, $email, $telefone, $cep, $endereco, $numero, $complemento, $bairro, $cidade, $estado, $nascimento, $id);

    if ($stmt->execute()) {
        echo "Usuário atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar usuário: " . $conn->error;
    }

    $stmt->close();
    $conn->close();

    header("Location: list_users.php");
    exit();
} else {
    echo "Método de requisição inválido.";
}
?>
