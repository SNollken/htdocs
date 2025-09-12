<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['login'];
    $senha = $_POST['senha'];

    try {
        // Preparar a consulta para verificar o usuário
        $sql = "SELECT id, login, senha FROM clientes WHERE login = :login";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':login', $usuario);
        $stmt->execute();

        // Verificar se o usuário existe
        if ($stmt->rowCount() == 1) {
            // Recuperar os dados do usuário
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $id = $row['id'];
            $hashed_password = $row['senha'];

            // Verificar se a senha corresponde
            if (password_verify($senha, $hashed_password)) {
                // Senha correta, inicia a sessão
                $_SESSION['loggedin'] = true;
                $_SESSION['id'] = $id;
                $_SESSION['login'] = $login;

                // Redirecionar para a página de cadastro (ou outra página restrita)
                header("Location: cadastro.html");
                exit;
            } else {
                // Senha incorreta
                throw new Exception('Senha incorreta!');
            }
        } else {
            // Usuário não encontrado
            throw new Exception('Usuário não encontrado!');
        }
    } catch (Exception $e) {
        // Exibir erro
        echo "Erro: " . $e->getMessage();
    }
}
?>
