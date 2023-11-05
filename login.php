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
            // Consulta o banco de dados para obter o hash e o salt
            $query = "SELECT id, senha, salt, tipo FROM usuarios WHERE cpf = ?";
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("s", $cpf);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result && $result->num_rows > 0) {
                $usuario = $result->fetch_assoc();

                // Verifica a senha usando password_verify()
                if (password_verify($senha . $usuario['salt'], $usuario['senha'])) {
                    // Autenticação bem-sucedida
                    $_SESSION['cpf'] = $cpf;
                    $_SESSION['name'] = $usuario['nome'];

                    // Verifica o tipo de usuário e redireciona
                    if ($usuario['tipo'] === 'admin') {
                        header("Location: painel_admin.php");
                    } else {
                        header("Location: painel.php");
                    }

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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="page">

        <p>Sign in to your account to continue</p>
        <p class="error-message" id="error-message"></p>

        <a href="index.html" class="home-link">
            <i class="fas fa-home"></i>
        </a>

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

        <script src="/js/login.js"></script>


        <?php if (!empty($mensagemErro)) {
            echo "<script>
            exibirMensagemErro('" . $mensagemErro . "');
        </script>";
        } ?>

    </div>

</body>

</html>