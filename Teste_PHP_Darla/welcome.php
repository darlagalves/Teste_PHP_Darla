<?php
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Bem-vindo</title>
</head>
<body>
    <h1>Bem-vindo, <?php echo $_SESSION['login_user']; ?>!</h1>
    <a href="logout.php">Logout</a>
</body>
</html>
