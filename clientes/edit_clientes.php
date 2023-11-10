<?php
require_once('../data_base/conexao.php');

$mensagemErro = $mensagemSucesso = '';

// Consulta SQL
$sql = "SELECT * FROM clientes ORDER BY cpfcnpj DESC;";
$result = $conexao->query($sql);

// Fechar a conexão quando terminar de usá-la
$conexao->close();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.css">

    <!-- jQuery -->
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>


</head>

<body>
    <div class="container">
        <!-- Formulário de Busca -->
        <div class="card border mx-auto mt-3 ms-3 me-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <div class="mb-3">
                            <label for="cpfCnpj" class="form-label">* Informe o CPF/CNPJ:</label>
                            <input type="text" id="filterInput" placeholder="Filtrar por CPF/CNPJ">
                        </div>
                    </div>
                    <div class="col-4 d-flex align-items-center mt-2">
                        <button class="btn btn-primary" onclick="buscar()">Buscar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabela de Dados -->
        <div class="card border mx-auto mt-3 ms-3 me-3">
            <div class="card-body">
                <div class="table-responsive">
                    <div class="table-container">
                        <table class="table table-striped table-hover" id="edit_clientes">
                            <thead>
                                <tr>
                                    <th>Cpf/Cnpj</th>
                                    <th>Nome</th>
                                    <th>Endereço</th>
                                    <th>Celular</th>
                                    <th>Ações</th>
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
        </div>
    </div>

    <script>
        function buscar() {
            const filterInput = document.getElementById('filterInput');
            const filterValue = filterInput.value.toUpperCase();
            const rows = document.querySelectorAll('tbody tr');

            rows.forEach(row => {
                const cellValue = row.cells[0].textContent || row.cells[0].innerText; // Assume que CPF/CNPJ está na primeira coluna
                if (cellValue.toUpperCase().indexOf(filterValue) > -1) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        // Inicializa DataTables
        $(document).ready(function() {
            // Verifica se a tabela já possui DataTable antes de inicializar
            if (!$.fn.DataTable.isDataTable('#edit_clientes')) {
                $('#edit_clientes').DataTable({
                    responsive: true,
                    "language": {
                        "lengthMenu": "Mostrar _MENU_ registros por página",
                        "zeroRecords": "Nenhum registro encontrado",
                        "info": "Mostrando página _PAGE_ de _PAGES_",
                        "infoEmpty": "Nenhum registro disponível",
                        "infoFiltered": "(filtrado de _MAX_ registros no total)",
                        "search": "Buscar:",
                        "paginate": {
                            "first": "Primeiro",
                            "last": "Último",
                            "next": "Próximo",
                            "previous": "Anterior"
                        }
                    }
                });
            }
        });



        // Adiciona um evento de input ao campo de filtro
        const filterInput = document.getElementById('filterInput');
        filterInput.addEventListener('input', buscar);
    </script>
</body>

</html>