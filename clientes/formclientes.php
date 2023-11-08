<!DOCTYPE html>
<html lang="pt">

<head>
    <!-- Adicione o jQuery CDN -->
    <!-- Inclua o jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

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

                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">*Dados Obrigatórios</h5>
                            </div>

                            <div class="card-body">
                                <form action="salvar_cliente.php" enctype="multipart/form-data" method="post">


                                    <div class="mb-3">
                                        <label for="cpfCnpj" class="form-label">CPF/CNPJ</label>
                                        <input type="text" class="form-control" id="cpfCnpj" name="cpfCnpj" placeholder="Digite apenas números" autocomplete="off">
                                    </div>

                                    <div class="mb-3">
                                        <label for="nome_completo" class="form-label">Nome Completo</label>
                                        <input type="text" class="form-control" id="nome_completo" name="nome_completo" autocomplete="off">
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" autocomplete="off">
                                    </div>



                                    <div class="row">
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <label for="cep" class="form-label">Cep:</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="cep" name="cep" maxlength="8" placeholder="ex:38080000" required autocomplete="off">
                                                    <button class="btn btn-outline-secondary" type="button" onclick="buscarCep()">
                                                        <i data-feather="search"></i> <!-- Ícone de pesquisa do conjunto Feather -->
                                                    </button>


                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-8">
                                            <div class="mb-3">
                                                <label for="logradouro" class="form-label">Logradouro</label>
                                                <input type="text" class="form-control" id="logradouro" name="logradouro" required autocomplete="off">
                                            </div>
                                        </div>


                                    </div>



                                    <div class="row">
                                        <div class="col-9">
                                            <div class="mb-3">
                                                <label for="complemento" class="form-label">Complemento</label>
                                                <input type="text" class="form-control" id="complemento" name="complemento" autocomplete="off">
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label for="numero" class="form-label">Nº</label>
                                                <input type="number" class="form-control" id="numero" name="numero" required autocomplete="off">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="bairro" class="form-label">Bairro:</label>
                                        <input type="text" class="form-control" id="bairro" name="bairro" required autocomplete="off">
                                    </div>

                                    <div class="row">
                                        <div class="col-8">
                                            <div class="mb-3">
                                                <label for="cidade" class="form-label">Cidade</label>
                                                <input type="text" class="form-control" id="cidade" name="cidade" require autocomplete="off">
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="mb-3">
                                                <label for="estado" class="form-label">Estado (Sigla)</label>
                                                <input type="text" class="form-control" id="estado" name="estado" required autocomplete="off">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="Telefone" class="form-label">Telefone</label>
                                                <input type="text" class="form-control" id="telefone" name="telefone" autocomplete="off">
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="celular" class="form-label">Celular</label>
                                                <input type="text" class="form-control" id="celular" name="celular" placeholder=" (00) 00000 0000" required autocomplete="off">
                                            </div>
                                        </div>
                                    </div>



                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Documento Pessoal</label>
                                        <input class="form-control" type="file" id="formFile" name="formFile" autocomplete="off">
                                    </div>

                                    <div class="col-12" style="text-align: left;">
                                        <button class="btn btn-primary">Enviar</button>
                                    </div>

                                    <div id="alert-messages"></div>

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