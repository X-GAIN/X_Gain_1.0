<?php
session_start();
include_once("./conexaobd.php");

    $quant = $_POST['valorVezes'];
    $produto = $_POST['idProd'];
    $usuario = $_POST['idUsuario'];

    if ($_SESSION['Logado']) {
        $conn = Conectar();

        // Verificar se o produto já está no carrinho
        $sqlCheck = $conn->prepare("SELECT * FROM t_carrinho WHERE id_Usuario = ? AND id_Produto = ?");
        $sqlCheck->bind_param('ii', $usuario, $produto);
        $sqlCheck->execute();
        $resultCheck = $sqlCheck->get_result();

        // Verificar se há algum resultado
        if ($resultCheck->num_rows > 0) {
            // Produto já está no carrinho, então atualize a quantidade
            $sqlUpdate = $conn->prepare("UPDATE t_carrinho SET quantidade = quantidade + ? WHERE id_Usuario = ? AND id_Produto = ?");
            $sqlUpdate->bind_param('iii', $quant, $usuario, $produto);
            $sqlUpdate->execute();
            $sqlUpdate->close();
        } else {
            // Produto não está no carrinho, então insira um novo registro
            $sqlInsert = $conn->prepare("INSERT INTO t_carrinho (quantidade, id_Produto, id_Usuario) VALUES (?, ?, ?)");
            $sqlInsert->bind_param('iii', $quant, $produto, $usuario);
            $sqlInsert->execute();
            $sqlInsert->close();
        }

        $sqlCheck->close();

        // Selecionar o carrinho atualizado
        $sqlSelect = $conn->prepare("SELECT * FROM t_carrinho WHERE id_Usuario = ?");
        $sqlSelect->bind_param('i', $usuario);
        $sqlSelect->execute();
        $result = $sqlSelect->get_result();

        // Verificar se há algum resultado
        if ($result) {
            $carrinho = $result->fetch_all(MYSQLI_ASSOC);
            $_SESSION['Carrinho'] = $carrinho;
        }

        $sqlSelect->close();
        $conn->close();

        $a = json_encode(['success' => true, 'carrinho' => $carrinho]);
        echo "<script>localStorage.setItem('produtos', $a);</script>";
        header("Location:../telas/produto.php?idProd=".$produto);
        exit();
    } else {
        // Usuário não está logado, então adicione ao Local Storage
        $carrinho = $_SESSION['Carrinho'] ?? [];
        $produtoNoCarrinho = array_search($produto, array_column($carrinho, 'id_Produto'));

        if ($produtoNoCarrinho !== false) {
            // Produto já está no carrinho, então atualize a quantidade
            $carrinho[$produtoNoCarrinho]['quantidade'] += $quant;
        } else {
            // Produto não está no carrinho, então adicione um novo registro
            $carrinho[] = ['id_Produto' => $produto, 'quantidade' => $quant];
        }

        $_SESSION['Carrinho'] = $carrinho;
        
        $a = json_encode(['success' => true, 'carrinho' => $carrinho]);
        echo "<script>localStorage.setItem('produtos', $a);</script>";
        header("Location:../telas/produto.php?idProd=".$produto);
        exit();
    }
?>
