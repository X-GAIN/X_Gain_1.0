<?php session_start();
include_once("./conexaobd.php");
$conn = Conectar();

// Variáveis do formulário
$idProdutoEditar = $_GET['id'];
$modelo = $_POST['modelo'];
$cate = $_POST['categoria'];
$subCate = $_POST['sub-categoria'];
$desc = $_POST['descricao'];
$comp = $_POST['comprimento'];
$alt = $_POST['altura'];
$larg = $_POST['largura'];
$peso = $_POST['peso'];
$garan = $_POST['garantia'];
$imagens = $_FILES['imgsFoto'];

// Atualizar dados do produto
$sqlUpdateProduto = "UPDATE t_produto SET modelo=?, descricao=?, categoria=?, subcategoria=?, comprimento=?, largura=?, altura=?, garantia=?, peso=? WHERE id_Produto=?";
$stmtUpdateProduto = $conn->prepare($sqlUpdateProduto);

if (!$stmtUpdateProduto) {
    die('Erro na preparação da declaração de atualização: ' . $conn->error);
}

$stmtUpdateProduto->bind_param('ssiiiiiiii', $modelo, $desc, $cate, $subCate, $comp, $larg, $alt, $garan, $peso, $idProdutoEditar);
$stmtUpdateProduto->execute();

$stmtUpdateProduto->close();
$conn->close();

header("Location: ../telas/adm.php");
exit();
?>