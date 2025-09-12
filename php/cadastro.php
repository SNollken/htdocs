<?php

session_start();
include 'auth.php'; // Verificar se o usuário está logado

// Página de cadastro
echo "<h2>Cadastro</h2>";
// Formulário de cadastro vai aqui

// Atualização de segurança: Definir cabeçalhos para evitar problemas de encoding
header('Content-Type: text/html; charset=utf-8');

// Função para sanitizar dados de entrada
function sanitize_input($data) {
    return htmlspecialchars(trim($data));
}

// Verificando se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Filtrando e sanitizando os dados recebidos
    $nome = sanitize_input($_POST['nome']);
    $email = sanitize_input($_POST['email']);
    $sexo = isset($_POST['sexo']) ? sanitize_input($_POST['sexo']) : '';
    $ddd = sanitize_input($_POST['ddd']);
    $telefone = sanitize_input($_POST['telefone']);
    $endereco = sanitize_input($_POST['endereco']);
    $cidade = sanitize_input($_POST['cidade']);
    $estado = sanitize_input($_POST['estado']);
    $bairro = sanitize_input($_POST['bairro']);
    $pais = sanitize_input($_POST['pais']);
    $login = sanitize_input($_POST['login']);
    $senha = sanitize_input($_POST['senha']);

    // Validações simples
    if (empty($nome) || empty($email) || empty($endereco) || empty($cidade) || empty($estado) || empty($bairro) || empty($pais) || empty($login) || empty($senha)) {
        echo "Por favor, preencha todos os campos obrigatórios.";
        exit();
    }

    // Conexão com o banco de dados utilizando PDO (exemplo)
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=cadastro', 'root', 'senac');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Preparar a consulta SQL para inserção no banco
        $stmt = $pdo->prepare("INSERT INTO clientes (nome, email, sexo, ddd, telefone, endereco, cidade, estado, bairro, pais, login, senha) 
        VALUES (:nome, :email, :sexo, :ddd, :telefone, :endereco, :cidade, :estado, :bairro, :pais, :login, :senha)");

        // Bind dos parâmetros
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':sexo', $sexo);
        $stmt->bindParam(':ddd', $ddd);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':endereco', $endereco);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':bairro', $bairro);
        $stmt->bindParam(':pais', $pais);
        $stmt->bindParam(':login', $login);
        
        // Gerando o hash da senha antes de passar para bindParam
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        $stmt->bindParam(':senha', $senhaHash); // Usando o hash da senha

        // Executar a consulta
        $stmt->execute();

        echo "Cadastro realizado com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao conectar com o banco de dados: " . $e->getMessage();
    }
}
?>
