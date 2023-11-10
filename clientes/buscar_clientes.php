<?php
include('../data_base/conexao.php');

$mensagemErro = $mensagemSucesso = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os parâmetros do formulário
    $cpfCnpj = $_POST["cpfCnpj"];

    // Construa a consulta SQL
    $sql = "SELECT * FROM clientes WHERE cpfcnpj LIKE '%$cpfCnpj%' ORDER BY cpfcnpj DESC;";

    // Execute a consulta
    $result = $conexao->query($sql);

    // Construa o HTML da tabela
    $tableHTML = '';
    while ($user_data = mysqli_fetch_assoc($result)) {
        $tableHTML .= "<tr>";
        $tableHTML .= "<td>" . $user_data['cpfcnpj'] . "</td>";
        $tableHTML .= "<td>" . $user_data['nomeCompleto'] . "</td>";
        $tableHTML .= "<td>" . $user_data['logradouro'] . "</td>";
        $tableHTML .= "<td>" . $user_data['celular'] . "</td>";
        $tableHTML .= "<td>ações</td>";
        $tableHTML .= "</tr>";
    }

    // Retorne o HTML da tabela
    echo $tableHTML;

    // Lembre-se de fechar a conexão quando terminar de usá-la
    $conexao->close();
}
