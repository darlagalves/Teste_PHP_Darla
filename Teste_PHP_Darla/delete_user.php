<?php
include('config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Excluir o usuário do banco de dados
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        echo "Usuário excluído com sucesso!";
    } else {
        echo "Erro ao excluir usuário: " . $conn->error;
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
