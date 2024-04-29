<?php
include_once("funcoes.php");

if (isset($_GET['categoria'])) {
    $categoriaId = $_GET['categoria'];

    $conn = Conectar();
    $subcategorias = ObterSubcategorias($conn, $categoriaId);
    Desconectar($conn);

    echo json_encode($subcategorias);
}
?>