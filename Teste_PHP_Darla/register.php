<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastrar</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
    </script>
</head>
<body class="boxprincipal">
    <main>
        <div class="box1">
            <div class="box2">
            <form action="register_process.php" method="post" onsubmit="return validarFormulario()">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required><br>
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" required><br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br>
                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="telefone" required><br>
                <label for="cep">CEP:</label>
                <input type="text" id="cep" name="cep" required><br>
                <label for="endereco">Endereço:</label>
                <input type="text" id="endereco" name="endereco" required><br>
                <label for="numero">Número:</label>
                <input type="text" id="numero" name="numero" required><br>
                <label for="complemento">Complemento:</label>
                <input type="text" id="complemento" name="complemento"><br>
                <label for="bairro">Bairro:</label>
                <input type="text" id="bairro" name="bairro" required><br>
                <label for="cidade">Cidade:</label>
                <input type="text" id="cidade" name="cidade" required><br>
                <label for="estado">Estado:</label>
                <input type="text" id="estado" name="estado" required><br>
                <label for="nascimento">Data de Nascimento:</label>
                <input type="date" id="nascimento" name="nascimento" required><br>
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required><br>
                <button type="submit" class="btn botaologin">Cadastrar</button>
            </form>
            </div>
        </div>
    </main>
</body>
</html>
