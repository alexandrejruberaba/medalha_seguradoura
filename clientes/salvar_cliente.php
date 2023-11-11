<?php
include('../data_base/conexao.php');

$mensagemErro = $mensagemSucesso = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter dados do formulário
    $cpfCnpj = $_POST["cpfCnpj"];
    $nomeCompleto = $_POST["nome_completo"];
    $cep = $_POST["cep"];
    $logradouro = $_POST["logradouro"];
    $numero = $_POST["numero"];

    // Verificar se todos os campos necessários estão preenchidos
    if (empty($cpfCnpj) || empty($nomeCompleto) || empty($cep) || empty($logradouro) || empty($numero)) {
        $mensagemErro = "Todos os campos obrigatórios devem ser preenchidos.";
    } else {
        // Verificar se o cliente já existe
        $sqlVerificar = "SELECT * FROM clientes WHERE cpfCnpj = '$cpfCnpj'";
        $resultadoVerificar = $conexao->query($sqlVerificar);

        if ($resultadoVerificar->num_rows > 0) {
            $mensagemErro = "Cliente já cadastrado no sistema.";
        } else {
            // Restante do seu código para upload de arquivo e inserção no banco de dados
            // ...

            // Inserção no banco de dados
            $sql = "INSERT INTO clientes (cpfCnpj, nomeCompleto, cep, logradouro, numero) VALUES ('$cpfCnpj', '$nomeCompleto', '$cep', '$logradouro', $numero)";

            if ($conexao->query($sql) === TRUE) {
                $mensagemSucesso = "Dados inseridos com sucesso!";
            } else {
                $mensagemErro = "Erro ao inserir dados: " . $conexao->error;
            }
        }
    }

    // Cabeçalhos para indicar que estamos enviando JSON
    header('Content-Type: application/json');

    // Saída formatada para ser exibida no formclientes.php
    echo json_encode(array("mensagemSucesso" => $mensagemSucesso, "mensagemErro" => $mensagemErro));

    // Garante que nada mais seja executado no script após enviar a resposta JSON
    exit();
} else {
    // Se o método da requisição não for POST, retorne uma mensagem de erro
    header('Content-Type: application/json');
    echo json_encode(array("mensagemErro" => "Método de requisição inválido."));
    exit();
}
?>
