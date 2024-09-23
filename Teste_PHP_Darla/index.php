<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body class="boxprincipal" >
    <main>
        <div class="box1">
            <div class="box2">
                <form action="login.php" method="post">
                    <div class="container">
                        <label for="email" class="titulologar">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required><br>
                    </div>
                    <div class="container mt-4">
                        <label for="senha" class="titulologar">Senha:</label>
                        <input type="password" class="form-control" id="senha" name="senha" required><br>
                    </div>
                    <button type="submit" class="btn botaologin">Login</button>
                </form>
                <br>
                <button onclick="window.location.href='register.php'" class="btn botaologin">Cadastrar</button>
            </div>
        </div>
        
    </main>
</body>
</html>