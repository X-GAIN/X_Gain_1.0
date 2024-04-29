<?php session_start();
include_once("./conexaobd.php");
$conn = Conectar();
    
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobreNome'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    $query = $conn->prepare("SELECT * FROM t_usuario WHERE email = ? LIMIT 1");

    if (!$query) {
        die("Preparação da consulta falhou: " . $conn->error);
    }

    $query->bind_param('s', $email);
    $query->execute();
    $result = $query->get_result();
    $query->close();

    if($result->num_rows == 0){
        $sql = $conn->prepare("INSERT INTO t_usuario (nome, sobrenome, senha, telefone, email, nivel_Usuario)
                VALUES (?, ?, ?, ?, ?, 0)");
        $sql->bind_param('sssss', $nome, $sobrenome, $senha, $telefone, $email);

        if ($sql->execute()) {
            $ultimoID = $conn->insert_id;
            $query = $conn->prepare("SELECT * FROM t_usuario WHERE id_usuario = ? LIMIT 1");

            if (!$query) {
                die("Preparação da consulta falhou: " . $conn->error);
            }

            $query->bind_param('i', $ultimoID);
            $query->execute();
            $result = $query->get_result();
            $query->close();

            if($result->num_rows == 1){
                $_SESSION['User'] = $result->fetch_assoc();
                $_SESSION['Logado'] = true;
            }

            $sql->close();
            header("Location: ../");
            exit();
        }
    }else{
        header("Location: ../");
        exit();
    }

    $conn->close();
?>