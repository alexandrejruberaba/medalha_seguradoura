<?php
// ... (seção de conexão)
include('/conexao.php');
$mensagemErro = $mensagemSucesso = '';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cpfCnpj = $_POST["cpfCnpj"];
    $nomeCompleto = $_POST["nome_completo"];
    $email = $_POST["email"];
    $cep = $_POST["cep"];
    $logradouro = $_POST["logradouro"];
    $complemento = $_POST["complemento"];
    $numero = $_POST["numero"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $telefone = $_POST["telefone"];
    $celular = $_POST["celular"];
    // Adicione outros campos conforme necessário

    $sql = "INSERT INTO clientes (cpfCnpj, nomeCompleto, email, cep, logradouro, complemento, numero, bairro, cidade, estado, telefone, celular) VALUES ('$cpfCnpj', '$nomeCompleto', '$email', '$cep', '$logradouro', '$complemento', $numero, '$bairro', '$cidade', '$estado', '$telefone', '$celular')";

    if ($conexao->query($sql) === TRUE) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir dados: " . $conexao->error;
    }
}

$conexao->close();
?>


?>