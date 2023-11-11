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
        <?php include('../painel_admin/menu.php') ?>

        <div class="main">
            <?php include('../painel_admin/topo.php') ?>

            <main class="content">
                <div class="container-fluid p-0">
                    <h1 class="h3 mb-3">Formulário Clientes</h1>
                    <div class="card border">
                        <div class="card-header text-white">
                            <!-- ... Código do cabeçalho ... -->
                        </div>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                                <form id="formCliente" enctype="multipart/form-data" method="post">
                                    <?php include('cad_clientes.php') ?>
                                </form>
                            </div>

                            <!-- ... Outras abas ... -->

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
    <script src="cep.js"></script>
    <script src="mascara_cliente.js"></script>

    <script>
        $(document).ready(function() {
            $("#formCliente").submit(function(event) {
                event.preventDefault();
                var form = $(this);
                var url = "salvar_cliente.php";

                // Adicione um feedback visual, se necessário

                $.ajax({
                    type: "POST",
                    url: url,
                    data: new FormData(form[0]),
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        var data = JSON.parse(response);
                        $("#alert-messages").html('');

                        if (data.mensagemSucesso) {
                            $("#alert-messages").append('<div class="alert alert-success" role="alert">' + data.mensagemSucesso + '</div>');
                            form[0].reset();
                        }
                        if (data.mensagemErro) {
                            $("#alert-messages").append('<div class="alert alert-danger" role="alert">' + data.mensagemErro + '</div>');
                            form[0].reset();
                        }

                        // Remova o feedback visual, se necessário
                    }
                });
            });
        });
    </script>
</body>

</html>