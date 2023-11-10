<?php include('../login/protect.php') ?>

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

                <div class="container-fluid  p-0">
                    <h1 class="h3 mb-3">Formulário Clientes</h1>
                    <div class="card border">
                        <div class="card-header text-white">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Cadastrar Clientes</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Editar/Buscar</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Orçamentos</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-disabled" aria-selected="false" disabled>Disabled</button>
                                </li>
                            </ul>
                        </div>


                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                                <form action="salvar_cliente.php" enctype="multipart/form-data" method="post">
                                    <!-- Formulário de Cadastro -->
                                    <?php include('cad_clientes.php') ?>

                                </form>
                            </div>

                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">

                                <?php include('edit_clientes.php') ?>


                            </div>


                            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">.asdfasdf..</div>
                            <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab" tabindex="0">...</div>
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
                            $("#alert-messages").append('<div class="alert alert-success" role="alert">' + data.mensagemSucesso + '</div>');
                            // Limpa os campos do formulário
                            $("form")[0].reset();
                        }
                        if (data.mensagemErro) {
                            $("#alert-messages").append('<div class="alert alert-danger" role="alert">' + data.mensagemErro + '</div>');
                            // Limpa os campos do formulário
                            $("form")[0].reset();
                        }
                    }
                });
            });

        });
    </script>