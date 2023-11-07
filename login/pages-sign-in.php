<?php
session_start();

include('/conexao.php');

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
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-in.html" />

	<title>Login</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Seja Bem Vindo!</h1>
							<p class="lead">
								Informe seus dados para continuar...
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-3">
									<form action="" method="POST">
										<div class="mb-3">
											<label class="form-label">CPF</label>
											<input class="form-control form-control-lg" type="text" name="cpf" placeholder="Informe seu CPF" />
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="senha" placeholder="Informe sua senha" />
										</div>
										<div>
											<div class="form-check align-items-center">
												<input id="customControlInline" type="checkbox" class="form-check-input" value="remember-me" name="remember-me" checked>
												<label class="form-check-label text-small" for="customControlInline">Remember me</label>
											</div>
										</div>
										<div class="d-grid gap-2 mt-3">
											<button type="submit" class="btn btn-lg btn-primary">Sign in</button>
										</div>
									</form>

									<?php
									// Adicione esta linha para chamar a função JavaScript para exibir a mensagem de erro
									if (!empty($mensagemErro)) {
										echo "<script>exibirMensagemErro('" . $mensagemErro . "');</script>";
									}
									?>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="js/app.js"></script>

</body>

</html>