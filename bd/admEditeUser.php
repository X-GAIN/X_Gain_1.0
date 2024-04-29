<?php
include_once("./conexaobd.php");
$conn = Conectar();

$idUser = $_GET['id'];
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$senha = $_POST['senha'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$cargo = $_POST['cargo'];

$sql = $conn->prepare("UPDATE t_usuario SET nome=?, sobrenome=?, senha=?, telefone=?, email=?, nivel_Usuario=? WHERE id_usuario=$idUser");
$sql->bind_param('sssssi', $nome, $sobrenome, $senha, $telefone, $email, $cargo);

// Verificar se a execução da declaração preparada foi bem-sucedida
if ($sql->execute()) {
    echo "Registro inserido com sucesso.";
    header("Location:../telas/adm.php");
    exit();
} else {
    echo "Erro na inserção: " . $sql->error;
}

$sql->close();
$conn->close();
?>
