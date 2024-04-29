<?php session_start();
include_once("./conexaobd.php");
$conn = Conectar();

$idUser = $_SESSION['User']['id_usuario'];
$nome = $_POST['nomeEditor'];
$sobrenome = $_POST['sobrenomeEditor'];
$senha = $_POST['senhaEditor'];
$telefone = $_POST['telefoneEditor'];
$email = $_POST['emailEditor'];

$sql = $conn->prepare("UPDATE t_usuario SET nome=?, sobrenome=?, senha=?, telefone=?, email=? WHERE id_usuario=$idUser");
$sql->bind_param('sssss', $nome, $sobrenome, $senha, $telefone, $email);

// Verificar se a execução da declaração preparada foi bem-sucedida
if ($sql->execute()) {
    echo "Registro inserido com sucesso.";
    header("Location:../telas/perfil.php");
    exit();
} else {
    echo "Erro na inserção: " . $sql->error;
}

$sql->close();
$conn->close();
?>
