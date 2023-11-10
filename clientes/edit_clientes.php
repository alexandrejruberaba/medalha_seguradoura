<?php
include('../data_base/conexao.php');
$mensagemErro = $mensagemSucesso = '';
$sql = "SELECT * FROM clientes ORDER BY cpfcnpj DESC;";
$result = $conexao->query($sql);

// Lembre-se de fechar a conexão quando terminar de usá-la
$conexao->close();

?>

<div class="container">
    <div class="card border mx-auto mt-3 ms-3 me-3">
        <div class="card-body">
            <form action="salvar_cliente.php" enctype="multipart/form-data" method="post">
                <div class="row">
                    <div class="col-8">
                        <div class="mb-3">
                            <label for="cpfCnpj" class="form-label">* Informe o CPF/CNPJ:</label>
                            <input type="text" class="form-control" id="cpfCnpj" name="cpfCnpj" placeholder="Digite apenas números" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-4 d-flex align-items-center mt-2">
                        <button class="btn btn-primary">buscar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card border mx-auto mt-3 ms-3 me-3">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Cpf/Cnpj</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">Celular</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    while ($user_data = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $user_data['cpfcnpj'] . "</td>";
                        echo "<td>" . $user_data['nomeCompleto'] . "</td>";
                        echo "<td>" . $user_data['logradouro'] . "</td>";
                        echo "<td>" . $user_data['celular'] . "</td>";
                        echo "<td>ações</td>";
                        echo "</tr>";
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>