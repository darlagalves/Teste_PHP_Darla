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
                <div class="container">
                <label for="nome"  class="titulologar">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" required><br>
                </div>
                <div class="container">
                <label for="cpf"  class="titulologar">CPF:</label>
                <input type="text" class="form-control" id="cpf" name="cpf" required><br>
                </div>
                <div class="container">
                <label for="email"  class="titulologar">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required><br>
                </div>
                <div class="container">
                <label for="telefone"  class="titulologar">Telefone:</label>
                <input type="text" class="form-control" id="telefone" name="telefone" required><br>
                </div>
                <div class="container">
                <label for="cep"  class="titulologar">CEP:</label>
                <input type="text" class="form-control" id="cep" name="cep" required><br>
                </div>
                <div class="container">
                <label for="endereco"  class="titulologar">Endereço:</label>
                <input type="text" class="form-control" id="endereco" name="endereco" required><br>
                </div>
                <div class="container">
                <label for="numero"  class="titulologar">Número:</label>
                <input type="text" class="form-control" id="numero" name="numero" required><br>
                </div>
                <div class="container">
                <label for="complemento"  class="titulologar">Complemento:</label>
                <input type="text" class="form-control" id="complemento" name="complemento"><br>
                </div>
                <div class="container">
                <label for="bairro"  class="titulologar">Bairro:</label>
                <input type="text" class="form-control" id="bairro" name="bairro" required><br>
                </div>
                <div class="container">
                <label for="cidade"  class="titulologar">Cidade:</label>
                <input type="text" class="form-control" id="cidade" name="cidade" required><br>
                </div>
                <div class="container">
                <label for="estado"  class="titulologar">Estado:</label>
                <input type="text" class="form-control" id="estado" name="estado" required><br>
                </div>
                <div class="container">
                <label for="nascimento"  class="titulologar">Data de Nascimento:</label>
                <input type="date" class="form-control" id="nascimento" name="nascimento" required><br>
                </div>
                <div class="container">
                <label for="senha"  class="titulologar">Senha:</label>
                <input type="password" class="form-control" id="senha" name="senha" required><br>
                </div>
                <button type="submit" class="btn botaologin">Cadastrar</button>
            </form>
            </div>
        </div>
    </main>
</body>
</html>
