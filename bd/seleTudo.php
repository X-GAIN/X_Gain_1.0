<?php
session_start();

if ($_SESSION['User']['id_usuario'] == 1) {
    include_once('./conexaobd.php');

    function obterDados()
    {
        $conn = Conectar();

        // Consulta para produtos
        $queryProdutos = $conn->prepare("SELECT * FROM t_produto");
        $queryProdutos->execute();
        $resultProdutos = $queryProdutos->get_result();
        $_SESSION['Produtos'] = $resultProdutos->fetch_all(MYSQLI_ASSOC);

        // Consulta para usuários
        $queryUsuarios = $conn->prepare("SELECT * FROM t_usuario");
        $queryUsuarios->execute();
        $resultUsuarios = $queryUsuarios->get_result();
        $_SESSION['Usuarios'] = $resultUsuarios->fetch_all(MYSQLI_ASSOC);

        $conn->close();
        $queryProdutos->close();
        $queryUsuarios->close();
        header("Location:../telas/adm.php");
    }

    obterDados();
} else {
    header("Location:../");
    exit(); // Importante: garantir que o script pare após redirecionar
}
?>
