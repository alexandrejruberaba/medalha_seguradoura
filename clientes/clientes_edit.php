<?php include('../login/protect.php') ?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <?php include('../painel_admin/header.php') ?>
    <?php include('../data_base/conexao.php') ?>
</head>

<body>
    <div class="wrapper">
        <?php include('menu_clientes.php') ?>

        <div class="main">
            <?php include('../painel_admin/topo.php') ?>

            <main class="content">
                <div class="container-fluid p-0">
                    <h1 class="h3 mb-3">Formulário Edição de Clientes</h1>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header text-white">

                                <div class="card-body">
                                    <!-- Formulário de Cadastro -->
                                    <form action="salvar_cliente.php" enctype="multipart/form-data" method="post">
                                        <!-- Campos do formulário de cadastro -->
                                        <?php include('editar_clientes.php') ?>
                                        <!-- ... -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </main>

            <footer class="footer">
                <?php include('../painel_admin/footer.php') ?>
            </footer>
        </div>
    </div>

    <script src="/static/js/app.js"></script>
    <script src="./js/cep.js"></script>
    <script src="./js/mascara_cliente.js"></script>

    <script>
        $(document).ready(function() {
            // Função para exibir mensagens formatadas
            function exibirMensagem(mensagem, tipo) {
                return '<div class="alert alert-' + tipo + '" role="alert">' + mensagem + '</div>';
            }

            // Função para limpar os campos do formulário
            function limparCamposFormulario() {
                $("form")[0].reset();
            }

            // Submissão do formulário
            $("form").submit(function(event) {
                event.preventDefault(); // Impede a submissão normal do formulário

                // Envia os dados do formulário usando AJAX
                $.ajax({
                    type: "POST",
                    url: "salvar_cliente.php",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // Certifique-se de verificar se a resposta é um objeto antes de tentar fazer o parsing
                        if (typeof response === 'object' && response !== null) {
                            // Limpa mensagens anteriores
                            $("#alert-messages").html('');

                            // Exibe as mensagens
                            if (response.mensagemSucesso) {
                                $("#alert-messages").append(exibirMensagem(response.mensagemSucesso, 'success'));

                                // Limpa os campos do formulário
                                limparCamposFormulario();
                            }
                            if (response.mensagemErro) {
                                $("#alert-messages").append(exibirMensagem(response.mensagemErro, 'danger'));

                                // Se a mensagem de erro for "Cliente já existe", limpa os campos do formulário
                                if (response.mensagemErro.includes("Cliente já cadastrado")) {
                                    limparCamposFormulario();
                                }
                            }
                        } else {
                            // Se a resposta não for um objeto, exiba um alerta ou registre no console para depuração
                            console.error('Resposta do servidor não é um objeto JSON válido:', response);
                        }
                    },
                    error: function(xhr, status, error) {
                        // Lidar com erros de requisição AJAX
                        console.error('Erro na requisição AJAX:', status, error);
                    }
                });
            });
        });
    </script>


</body>

</html>