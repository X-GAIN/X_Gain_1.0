<?php
session_start();
$_SESSION['erro'] = "nenhum";
include_once("./conexaobd.php");
$conn = Conectar();

    $modelo = $_POST['modelo'];
    $cate = $_POST['categoria'];
    $subCate = $_POST['sub-categoria'];
    $desc = $_POST['descricao'];
    $comp = $_POST['comprimento'];
    $alt = $_POST['altura'];
    $larg = $_POST['largura'];
    $peso = $_POST['peso'];
    $garan = $_POST['garantia'];
    // $imgs = $_POST['imgsFoto'];

    $sql = "INSERT INTO t_produto (modelo, descricao, categoria, subcategoria, comprimento, largura, altura, garantia, peso)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Preparar a declaração
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssiiiiiii', $modelo, $desc, $cate, $subCate , $comp, $larg, $alt, $garan, $peso);
    
    if($stmt->execute()){
        header("Location: ../telas/adm.php");
        exit();
    }else echo "Merda";

    // echo $conn->error();
    // echo $stmt->error();

    
// Fechar a declaração e a conexão
$stmt->close();
$conn->close();
?>