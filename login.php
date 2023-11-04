<?php
session_start();

include('conexao.php');

$mensagemErro = $mensagemSucesso = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['cpf']) && isset($_POST['senha'])) {
        $cpf = $_POST['cpf'];
        $senha = $_POST['senha'];

        if (empty($cpf)) {
            $mensagemErro = "Preencha seu CPF";
        } elseif (empty($senha)) {
            $mensagemErro = "Preencha sua senha";
        } else {
            $query = "SELECT * FROM usuarios WHERE cpf = ? AND senha = ?";
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("ss", $cpf, $senha);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result) {
                if ($result->num_rows > 0) {
                    $mensagemSucesso = "Login bem-sucedido!";

                    $usuario = $result->fetch_assoc();

                    $_SESSION['cpf'] = $usuario['cpf'];
                    $_SESSION['name'] = $usuario['nome'];

                    header("Location: painel.php");
                    exit();
                } else {
                    $mensagemErro = "Credenciais inválidas";
                }
            } else {
                $mensagemErro = "Erro na consulta: " . $mysqli->error;
            }

            $stmt->close();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Medalha Corretora de Seguros</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="page">
        <form action="" method="POST" class="formLogin">
            <h1>Login</h1>
            <p>Digite os seus dados de acesso no campo abaixo.</p>
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" placeholder="Digite seu CPF" autofocus="true" />
            <label for="password">Senha</label>
            <input type="password" name="senha" placeholder="Digite sua senha" />
            <a href="/">Esqueci minha senha</a>
            <input type="submit" value="Acessar" class="btn" />
        </form>
    </div>
    <script defer src="js/login.js"></script>
</body>

</html>