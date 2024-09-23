<?php
session_start();
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $email = stripslashes($email);
    $senha = stripslashes($senha);
    $email = mysqli_real_escape_string($conn, $email);
    $senha = mysqli_real_escape_string($conn, $senha);

    $sql = "SELECT id, senha FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if (mysqli_num_rows($result) == 1 && password_verify($senha, $row['senha'])) {
        $_SESSION['login_user'] = $email;
        header("location: welcome.php");
    } else {
        echo "Email ou senha inválidos.";
    }
}
?>