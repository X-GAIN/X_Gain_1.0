<?php
include_once("conexaobd.php");

// Funções CRUD genéricas
function Select($conn, $table, $columns = '*', $conditions = '') {
    $sql = "SELECT $columns FROM $table";
    if (!empty($conditions)) {
        $sql .= " WHERE $conditions";
    }

    $result = $conn->query($sql);

    $rows = array();
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }

    return $rows;
}

function Insert($conn, $table, $data) {
    $columns = implode(', ', array_keys($data));
    $values = "'" . implode("', '", $data) . "'";

    $sql = "INSERT INTO $table ($columns) VALUES ($values)";

    return $conn->query($sql);
}

function Update($conn, $table, $data, $conditions) {
    $set = '';
    foreach ($data as $key => $value) {
        $set .= "$key = '$value', ";
    }
    $set = rtrim($set, ', ');

    $sql = "UPDATE $table SET $set WHERE $conditions";

    return $conn->query($sql);
}

function Delete($conn, $table, $conditions) {
    $sql = "DELETE FROM $table WHERE $conditions";

    return $conn->query($sql);
}

if (isset($_POST['cadastrarUsuario'])) {
    if (
        isset($_POST['nome']) &&
        isset($_POST['sobrenome']) &&
        isset($_POST['senha']) &&
        isset($_POST['telefone']) &&
        isset($_POST['email']) &&
        isset($_POST['image'])
    ) {
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $senha = $_POST['senha'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $imgPerfil = $_POST['image'];

        $conn = Conectar();

        $sql = "INSERT INTO t_usuario (nome, sobrenome, senha, telefone, email, img_perfil, nivel_Usuario) 
            VALUES ('$nome', '$sobrenome', '$senha', '$telefone', '$email', '$imgPerfil', '0')";

        if ($conn->query($sql) === TRUE) {
            echo "Usuário inserido com sucesso!";
            header("Location: ../index.html");
        } else {
            echo "Erro ao inserir usuário: " . $conn->error;
        }

        $conn->close();
    }
}


function ObterCategorias($conn) {
    $sql = "SELECT id_categoria, nome_Categoria FROM t_categorias";
    $result = $conn->query($sql);

    $categorias = array();
    while ($row = $result->fetch_assoc()) {
        $categorias[] = $row;
    }

    return $categorias;
}

function ObterSubcategorias($conn, $categoriaId) {
    $sql = "SELECT id_subCate, nome_subCate FROM t_subcate WHERE id_Categoria = $categoriaId";
    $result = $conn->query($sql);

    $subcategorias = array();
    while ($row = $result->fetch_assoc()) {
        $subcategorias[] = $row;
    }

    return $subcategorias;
}

function InserirProduto($conn, $dadosProduto) {
    $linha = $dadosProduto['linha'];
    $modelo = $dadosProduto['modelo'];
    $descricao = $dadosProduto['descricao'];
    $categoria = $dadosProduto['categoria'];
    $subcategoria = $dadosProduto['subcategoria'];
    $comprimento = $dadosProduto['comprimento'];
    $largura = $dadosProduto['largura'];
    $altura = $dadosProduto['altura'];
    $garantia = $dadosProduto['garantia'];
    $obj3d = $dadosProduto['obj3d'];
    $peso = $dadosProduto['peso'];

    $sql = "INSERT INTO t_produto (linha, modelo, descricao, categoria, subcategoria, comprimento, largura, altura, garantia, obj3d, peso) 
            VALUES ('$linha', '$modelo', '$descricao', $categoria, $subcategoria, $comprimento, $largura, $altura, $garantia, '$obj3d', $peso)";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return "Erro ao inserir produto: " . $conn->error;
    }
}
?>