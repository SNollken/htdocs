<?php
// config.php
$host = "localhost"; // ou o host do seu banco de dados
$username = "root";  // seu usuário do MySQL
$password = "senac";      // sua senha do MySQL
$dbname = "cadastro"; // nome do banco de dados

try {
    // Conexão com o banco de dados usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Configuração para tratar erros de PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo"teste ok";
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>
