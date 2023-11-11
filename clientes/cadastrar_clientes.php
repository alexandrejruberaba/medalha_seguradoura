<div class="col-10 px-4">
    <div class="card border mx-auto ">
        <div class="card-header">
            <h5 class="card-title mb-0">*Dados Obrigatórios</h5>
        </div>

        <div class="card-body ">
            <form action="salvar_cliente.php" enctype="multipart/form-data" method="post">


                <div class="mb-3">
                    <label for="cpfCnpj" class="form-label">CPF/CNPJ *</label>
                    <input type="text" class="form-control" id="cpfCnpj" name="cpfCnpj" placeholder="Digite apenas números" autocomplete="off">
                </div>

                <div class="mb-3">
                    <label for="nome_completo" class="form-label">Nome Completo *</label>
                    <input type="text" class="form-control" id="nome_completo" name="nome_completo" autocomplete="off">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" autocomplete="off">
                </div>



                <div class="row">
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="cep" class="form-label">Cep: *</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="cep" name="cep" maxlength="8" placeholder="Apenas números" autocomplete="off">
                                <button class="btn btn-outline-secondary" type="button" onclick="buscarCep()">
                                    <i data-feather="search"></i> <!-- Ícone de pesquisa do conjunto Feather -->
                                </button>


                            </div>
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="mb-3">
                            <label for="logradouro" class="form-label">Logradouro *</label>
                            <input type="text" class="form-control" id="logradouro" name="logradouro" autocomplete="off">
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
                            <label for="numero" class="form-label">Nº *</label>
                            <input type="number" class="form-control" id="numero" name="numero" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="bairro" class="form-label">Bairro: *</label>
                    <input type="text" class="form-control" id="bairro" name="bairro" autocomplete="off">
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="mb-3">
                            <label for="cidade" class="form-label">Cidade *</label>
                            <input type="text" class="form-control" id="cidade" name="cidade" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                            <label for="estado" class="form-label">Estado (Sigla) *</label>
                            <input type="text" class="form-control" id="estado" name="estado" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="Telefone" class="form-label">Telefone</label>
                            <input type="text" class="form-control" id="telefone" name="telefone" placeholder=" (00) 0000 0000" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3">
                            <label for="celular" class="form-label">Celular *</label>
                            <input type="text" class="form-control" id="celular" name="celular" placeholder=" (00) 00000 0000" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Documento Pessoal</label>
                    <input class="form-control" type="file" id="formFile" name="formFile" autocomplete="off">
                </div>

                <div class="col-12" style="text-align: left;">
                    <button class="btn btn-primary">Salvar</button>
                </div>

                <div class="mb-3">
                    <div id="alert-messages" style="padding-top: 20px"></div>
                </div>
        </div>
    </div>
</div>