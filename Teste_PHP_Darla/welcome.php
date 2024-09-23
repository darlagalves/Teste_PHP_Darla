<?php
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body class="bodylogout">
    <div class="containerlogout">
        <h1 class="h1logout">Bem-vindo, <?php echo htmlspecialchars($_SESSION['login_user']); ?>!</h1>
        <a href="logout.php" class="btn btn-danger btn-logout">Logout</a>
        <a href="list_users.php" class="btn btn-primary btn-logout">Lista de Usuários</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
