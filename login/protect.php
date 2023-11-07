<?php
// Inicia a sessão se ainda não estiver iniciada
if (!isset($_SESSION)) {
    session_start();
}

// Verifica se o usuário está autenticado
if (!isset($_SESSION['cpf'])) {
    // Redireciona para a página de login
    header("Location: login.php");
    exit(); // Certifica-se de que o script é encerrado após o redirecionamento
}
