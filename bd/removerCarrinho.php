<?php session_start();
include_once('conexaobd.php');
$conn = Conectar(); 
    $jjjj = $_POST['prodJerso'];
    $vez = $_POST['vezElem'];

    $sql = $conn->prepare("DELETE FROM t_carrinho WHERE id_Produto = ?");
    if($sql){
        $sql->bind_param('i', $jjjj);
        $sql->execute();
        $sql->close();

        $sql = $conn->prepare("SELECT * FROM t_carrinho");
        $sql->execute();
        $result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

        echo "Produto excluído com sucesso.";
        $_SESSION['Carrinho'] = $result;
        header("Location: ../telas/produto.php?idProd=$jjjj");

        // Feche a consulta preparada
        $sql->close();
    }
?>