<?php
include('config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Atualizar os dados do usuário no banco de dados
    $sql = "UPDATE users SET 
                status = 'BLOQUEADO'
            WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        echo "Usuário bloqueado com sucesso!";
    } else {
        echo "Erro ao bloquear o usuário: " . $conn->error;
    }

    $stmt->close();
    $conn->close();

    // Redirecionar de volta para a página de lista de usuários
    header("Location: list_users.php");
    exit();
} else {
    echo "ID do usuário não fornecido.";
}
?>

