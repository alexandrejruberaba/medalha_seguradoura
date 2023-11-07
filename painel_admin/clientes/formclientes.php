<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Adicione o jQuery CDN -->
    <!-- Inclua o jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Inclua o jQuery Mask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <?php include('header.php') ?>

</head>

<body>



    <div class="wrapper">
        <?php include('menu.php') ?>

        <div class="main">
            <?php include('topo.php') ?>

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
                                <form action="salvar_cliente.php" method="post">

                                    <div class="mb-3">
                                        <label for="cpfCnpj" class="form-label">CPF/CNPJ</label>
                                        <input type="text" class="form-control" id="cpfCnpj" placeholder="digite somente números" required autocomplete="off">
                                    </div>

                                    <div class="mb-3">
                                        <label for="nome_completo" class="form-label">Nome Completo</label>
                                        <input type="text" class="form-control" id="nome_completo" required autocomplete="off">
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="name@example.com" required autocomplete="off">
                                    </div>



                                    <div class="row">
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <label for="cep" class="form-label">Cep:</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="cep" maxlength="8" placeholder="ex:38080000" required autocomplete="off">
                                                    <button class="btn btn-outline-secondary" type="button" onclick="buscarCep()">
                                                        <i data-feather="search"></i> <!-- Ícone de pesquisa do conjunto Feather -->
                                                    </button>


                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-8">
                                            <div class="mb-3">
                                                <label for="logradouro" class="form-label">Logradouro</label>
                                                <input type="text" class="form-control" id="logradouro" required autocomplete="off">
                                            </div>
                                        </div>


                                    </div>



                                    <div class="row">
                                        <div class="col-9">
                                            <div class="mb-3">
                                                <label for="complemento" class="form-label">Complemento</label>
                                                <input type="text" class="form-control" id="complemento" autocomplete="off">
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label for="numero" class="form-label">Nº</label>
                                                <input type="number" class="form-control" id="numero" required autocomplete="off">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="bairro" class="form-label">Bairro:</label>
                                        <input type="text" class="form-control" id="bairro" required autocomplete="off">
                                    </div>

                                    <div class="row">
                                        <div class="col-8">
                                            <div class="mb-3">
                                                <label for="cidade" class="form-label">Cidade</label>
                                                <input type="text" class="form-control" id="cidade" require autocomplete="off">
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="mb-3">
                                                <label for="estado" class="form-label">Estado (Sigla)</label>
                                                <input type="text" class="form-control" id="estado" required autocomplete="off">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="Telefone" class="form-label">Telefone</label>
                                                <input type="text" class="form-control" id="telefone" autocomplete="off">
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="celular" class="form-label">Celular</label>
                                                <input type="text" class="form-control" id="celular" required autocomplete="off">
                                            </div>
                                        </div>
                                    </div>



                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Documento Pessoal</label>
                                        <input class="form-control" type="file" id="formFile" autocomplete="off">
                                    </div>

                                    <div class="col-12" style="text-align: left;">
                                        <button class="btn btn-primary">Enviar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <footer class="footer">
                <?php include('footer.php') ?>
            </footer>
        </div>
    </div>

    <script src="js/app.js"></script>

    <!---busca cep-->
    <script src="js/cep.js"></script>

    <!---cria máscara campos-->
    <script src="js/mascara_cliente.js"></script>

</body>

</html>