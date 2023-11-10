<?php
include('../data_base/conexao.php');
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

    // Verifica se o cliente já existe no banco de dados
    $sqlVerificar = "SELECT * FROM clientes WHERE cpfCnpj = '$cpfCnpj'";
    $resultadoVerificar = $conexao->query($sqlVerificar);

    if ($resultadoVerificar->num_rows > 0) {
        $mensagemErro = "Cliente já cadastrado no sistema.";
    } else {
        // Verifica se um arquivo foi enviado
        if (isset($_FILES['formFile']) && $_FILES['formFile']['error'] == UPLOAD_ERR_OK) {
            $arquivo = $_FILES['formFile'];

            // Verifica o formato do arquivo
            preg_match("/\.(png|jpg|jpeg){1}$/i", $arquivo["name"], $ext);

            if (isset($ext[1]) && in_array($ext[1], array("png", "jpg", "jpeg"))) {
                $nome_arquivo = md5(uniqid(time())) . "." . $ext[1];
                $caminho_arquivo = "./imagens/" . $nome_arquivo;
                move_uploaded_file($arquivo['tmp_name'], $caminho_arquivo);
            } else {
                $mensagemErro = "Formato de arquivo não suportado.";
            }
        } else {
            // Se nenhum arquivo foi enviado, defina o caminho do arquivo como nulo ou vazio, dependendo dos requisitos do seu banco de dados
            $caminho_arquivo = '';
        }

        // Verifica se a conexão está estabelecida antes de usar
        if ($conexao) {
            // Ajuste necessário aqui dependendo do que você deseja inserir no banco de dados
            $sql = "INSERT INTO clientes (cpfCnpj, nomeCompleto, email, cep, logradouro, complemento, numero, bairro, cidade, estado, telefone, celular, docpessoal) VALUES ('$cpfCnpj', '$nomeCompleto', '$email', '$cep', '$logradouro', '$complemento', $numero, '$bairro', '$cidade', '$estado', '$telefone', '$celular', '$caminho_arquivo')";

            if ($conexao->query($sql) === TRUE) {
                $mensagemSucesso = "Dados inseridos com sucesso!";
            } else {
                $mensagemErro = "Erro ao inserir dados: " . $conexao->error;
            }
        } else {
            $mensagemErro = "Erro na conexão com o banco de dados.";
        }
    }

    // Saída formatada para ser exibida no formclientes.php
    echo json_encode(array("mensagemSucesso" => $mensagemSucesso, "mensagemErro" => $mensagemErro));
}
