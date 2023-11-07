<?php

// Inicia a sessão se ainda não estiver iniciada
if (!isset($_SESSION)) {
    session_start();
}

// Destrói a sessão
session_destroy();

// Redireciona para a página de login
header("Location: login.php");
exit();
