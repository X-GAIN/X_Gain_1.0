<?php
include_once("funcoes.php");

if (isset($_POST['enviarProduto'])) {
    $conn = Conectar();

    // Obtém os dados do formulário
    $dadosProduto = array(
        'linha' => $_POST['linha'],
        'modelo' => $_POST['modelo'],
        'descricao' => $_POST['descricao'],
        'categoria' => $_POST['categoria'],
        'subcategoria' => $_POST['subcategoria'],
        'comprimento' => $_POST['comprimento'],
        'largura' => $_POST['largura'],
        'altura' => $_POST['altura'],
        'garantia' => $_POST['garantia'],
        'obj3d' => $_FILES['obj3d']['name'],  // Certifique-se de lidar com o upload de arquivos corretamente
        'peso' => $_POST['peso']
    );

    // Chama a função para inserir o produto
    $resultado = InserirProduto($conn, $dadosProduto);

    if ($resultado === true) {
        echo "Produto inserido com sucesso!";
    } else {
        echo "Erro: " . $resultado;
    }

    Desconectar($conn);
}
?>