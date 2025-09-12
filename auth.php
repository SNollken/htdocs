<?php
session_start();

// Verifica se o usuário está autenticado
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.html');
    exit;
}
?>