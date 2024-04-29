<?php
session_start();
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
$imagens = $_FILES['imgsFoto'];
$obj3dkk = $_FILES['obj3D'];

// Caminho onde o arquivo OBJ 3D será salvo
$diretorioDestinoObj = "../objs/";

// Verificar se o diretório existe, se não, tentar criá-lo
if (!file_exists($diretorioDestinoObj)) {
    mkdir($diretorioDestinoObj, 0777, true);
}

// Renomear o arquivo OBJ 3D para evitar conflitos
$nomeArquivoObj = uniqid() . '_' . $obj3dkk['name'];
$caminhoCompletoObj = $diretorioDestinoObj . $nomeArquivoObj;

// Mover o arquivo OBJ 3D para o diretório de destino
move_uploaded_file($obj3dkk['tmp_name'], $caminhoCompletoObj);

// Caminho onde as imagens serão salvas
$diretorioDestinoImg = "../imgs/produtos/";

// Verificar se o diretório existe, se não, tentar criá-lo
if (!file_exists($diretorioDestinoImg)) {
    mkdir($diretorioDestinoImg, 0777, true);
}

$sql = "INSERT INTO t_produto (modelo, descricao, categoria, subcategoria, comprimento, largura, altura, garantia, peso, obj3D) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die('Erro na preparação da declaração: ' . $conn->error);
}
$stmt->bind_param('ssiiiiiiis', $modelo, $desc, $cate, $subCate , $comp, $larg, $alt, $garan, $peso, $caminhoCompletoObj);
$stmt->execute();

$ultimoID = $conn->insert_id;

// Inserir os caminhos das imagens na tabela t_imgprod
$sqlImagem = "INSERT INTO t_imgprod (id_Produto, img) VALUES (?, ?)";
$stmtImagem = $conn->prepare($sqlImagem);

for ($i = 0; $i < count($imagens['name']); $i++) {
    // Renomear o arquivo de imagem para evitar conflitos
    $nomeArquivoImg = uniqid() . '_' . $imagens['name'][$i];
    $caminhoCompletoImg = $diretorioDestinoImg . $nomeArquivoImg;

    // Mover o arquivo de imagem para o diretório de destino
    move_uploaded_file($imagens['tmp_name'][$i], $caminhoCompletoImg);

    // Inserir o caminho da imagem na tabela t_imgprod
    $stmtImagem->bind_param('is', $ultimoID, $caminhoCompletoImg);
    $stmtImagem->execute();
}

$stmtImagem->close();
$stmt->close();
$conn->close();

header("Location: ../telas/adm.php");
exit();
?>
