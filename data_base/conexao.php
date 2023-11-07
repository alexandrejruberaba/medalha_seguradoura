<?php
// Variáveis de ambiente ou configuração específica do ambiente
$usuario = 'root';
$senha = '';
$database = 'medalha';
$host = 'localhost';

// Conexão com o banco de dados
$mysqli = new mysqli($host, $usuario, $senha, $database);

// Tratamento de erros de conexão
if ($mysqli->connect_error) {
    die("Falha ao conectar ao banco de dados: ".$mysqli->connect_error);
    // Em produção, você pode registrar o erro em um arquivo de log.
}
