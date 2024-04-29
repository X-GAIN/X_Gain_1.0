<?php
include_once("./conexaobd.php");

session_start();

// Remova a linha desnecessária
$conn = Conectar();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $url = $_POST['urlPagina'];

    // Evita a injeção de SQL utilizando prepared statements
    $query = $conn->prepare("SELECT * FROM t_usuario WHERE email = ? LIMIT 1");

    if (!$query) {
        die("Preparação da consulta falhou: " . $conn->error);
    }

    $query->bind_param('s', $email);
    $query->execute();
    $result = $query->get_result();

    if (!$result) {
        die("Erro na execução da consulta: " . $query->error);
    }

    if ($result->num_rows > 0) {
        // Se o usuário existe, verifica a senha
        $user = $result->fetch_assoc();
        if ($senha == $user['senha']) {
            $_SESSION['Logado'] = true;
            $_SESSION['User'] = $user;
            header("Location: $url");
            exit();
            // O usuário está logado
        } else {
            $_SESSION['Logado'] = false;
            header("Location:../");
            exit();
            // Senha incorreta
        }
    } else {
        $_SESSION['Logado'] = false;
        header("Location:../");
        exit();
        // Usuário não encontrado
    }

    $query->close();
}

$conn->close();
?>
