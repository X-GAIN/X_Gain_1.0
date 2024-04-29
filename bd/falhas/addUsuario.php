<?php
    include_once("conexaobd.php");
    
    if(isset($_POST['enviar'])){
        if(isset($_POST['nome']) && isset($_POST['Sobrenome']) && isset($_POST['senha']) && isset($_POST['telefone']) && isset($_POST['email']) && isset($_POST['image'])){
            $nome = $_POST['nome'];
            $sobrenome = $_POST['Sobrenome'];
            $senha = $_POST['senha'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];
            $image = $_POST['image'];

            Conectar();
            $conn = Conectar();
            $dadosUsuario = "INSERT INTO t_usuario(nome, sobrenome, senha, telefone, email, img_perfil, nivel_Usuario) VALUES ($nome, $sobrenome, $senha, $telefone, $email, $image, 0)";
            Desconectar($conn);
            
        }
    }
?>
