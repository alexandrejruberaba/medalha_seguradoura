<!DOCTYPE html>
<html lang="pt">

<head>
    <!-- Adicione o jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Substitua os links do Bootstrap 4 pelos links do Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Inclua o jQuery Mask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <?php include('../painel_admin/header.php') ?>
    <?php include('../data_base/conexao.php') ?>

</head>

<body>

    <div class="wrapper">
        <?php include('../painel_admin/menu.php') ?>

        <div class="main">
            <?php include('../painel_admin/topo.php') ?>

            <!-- Corpo principal --->
            <main class="content">
                <div class="container-fluid p-0">
                    <h1 class="h3 mb-3">Formulário Cliente</h1>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header text-white">

                                <ul class="nav nav-pills" id="clienteTabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="cadastro-tab" data-bs-toggle="pill" href="#cadastro" role="tab" aria-controls="cadastro" aria-selected="true">Cadastrar</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="editar-tab" data-bs-toggle="pill" href="#editar" role="tab" aria-controls="editar" aria-selected="false">Editar/ Buscar</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="cadastro">
                                        <!-- Formulário de Cadastro -->
                                        <form action="salvar_cliente.php" enctype="multipart/form-data" method="post">
                                            <!-- Campos do formulário de cadastro -->
                                            <?php include('cadstrocliente.php') ?>
                                            <!-- ... -->
                                        </form>
                                    </div>

                                    <div class="tab-pane fade" id="editar">
                                        <!-- Formulário de Edição -->
                                        <form action="editar_cliente.php" enctype="multipart/form-data" method="post">
                                            <!-- Campos do formulário de edição -->
                                            <!-- ... -->

                                            <button class="btn btn-primary">Salvar Alterações</button>
                                        </form>
                                    </div>
                                </div>
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

    <!---busca cep-->
    <script src="cep.js"></script>

    <!---cria máscara campos-->
    <script src="mascara_cliente.js"></script>

    <script>
        $(document).ready(function() {
            // Ative as abas do Bootstrap
            var tabs = new bootstrap.Tab(document.getElementById('cadastro-tab'));
            tabs.show();

            $('#clienteTabs a').on('shown.bs.tab', function(e) {
                // Ative a máscara do jQuery Mask quando a aba for exibida
                $('#telefone, #celular').mask("(00) 0000-00009");
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Função para exibir mensagens formatadas
            function exibirMensagem(mensagem, tipo) {
                return '<div class="alert alert-' + tipo + '" role="alert">' + mensagem + '</div>';
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
                        var data = JSON.parse(response);

                        // Limpa mensagens anteriores
                        $("#alert-messages").html('');

                        // Exibe as mensagens
                        if (data.mensagemSucesso) {
                            $("#alert-messages").append(exibirMensagem(data.mensagemSucesso, 'success'));

                            // Limpa os campos do formulário
                            $("form")[0].reset();
                        }
                        if (data.mensagemErro) {
                            $("#alert-messages").append(exibirMensagem(data.mensagemErro, 'danger'));
                        }
                    }
                });
            });
        });
    </script>


</body>

</html>