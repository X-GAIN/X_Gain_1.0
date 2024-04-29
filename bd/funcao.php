<?php session_start();
include_once('./conexaobd.php');
$conn = Conectar();

if (isset($_POST['acao'])) {
    if ($_POST['acao'] == 'sair') {
        Sair();
    } elseif ($_POST['acao'] == 'excluir') {
        // Verifique se o ID está presente antes de chamar a função dropProd
        $id = isset($_POST['parametro1']) ? $_POST['parametro1'] : '';
        if (!empty($id)) {
            dropProd($id);
        } else {
            echo "ID não fornecido para exclusão.";
        }
    } else {
        echo "Ação não reconhecida.";
    }
} else {
    header("Location: ./admAddUser.php");
}

function Sair() {
    // Certifique-se de que $_SESSION['Logado'] está definido
    if (isset($_SESSION['Logado'])) {
        $_SESSION['Logado'] = false;
        $_SESSION['User'] = [];
    } else {
        echo "Erro: A sessão não está inicializada.";
    }
}

if (isset($_POST['btnExcluirProd'])) {
    $a = $_POST['idProd'];
    echo $a;
    $sql = $conn->prepare("DELETE FROM `t_produto` WHERE id_Produto = ?");

    // Verifique se a preparação foi bem-sucedida antes de continuar
    if ($sql) {
        // Vincule o parâmetro e execute a consulta
        $sql->bind_param('i', $a);
        $sql->execute();

        $sqlimg = $conn->prepare("DELETE FROM `t_imgprod` WHERE id_Produto = ?");
        $sqlimg->bind_param('i', $a);

        $sqlimg_select = $conn->prepare("SELECT img FROM `t_imgprod` WHERE id_Produto = ?");
        $sqlimg_select->bind_param('i', $a);
        $sqlimg_select->execute();
        $imgs = $sqlimg_select->get_result();

        while ($row = $imgs->fetch_assoc()) {
            $v = $row['img'];

            // Verifica se o arquivo existe antes de tentar excluí-lo
            if (file_exists($v)) {
                // Tenta excluir o arquivo
                if (unlink($v)) {
                    echo 'Arquivo excluído com sucesso.';
                } else {
                    echo 'Não foi possível excluir o arquivo.';
                }
            } else {
                echo 'O arquivo não existe.';
            }
        }

        $sqlimg->execute();

        // Verifique se a execução foi bem-sucedida
        if ($sql->affected_rows > 0) {
            echo "Produto excluído com sucesso.";
            header("Location: ../telas/adm.php");
        } else {
            echo "Nenhum produto foi excluído ou o ID não existe.";
        }

        // Feche as consultas preparadas
        $sql->close();
        $sqlimg->close();
        $sqlimg_select->close();
    } else {
        echo "Erro na preparação da consulta.";
    }
}


if(isset($_POST['btnExcluirUser'])){
    $a = $_POST['idUser'];
    $sql = $conn->prepare("DELETE FROM `t_usuario` WHERE id_usuario = ?");

    // Verifique se a preparação foi bem-sucedida antes de continuar
    if ($sql) {
        // Vincule o parâmetro e execute a consulta
        $sql->bind_param('i', $a);
        $sql->execute();

        // Verifique se a execução foi bem-sucedida
        if ($sql->affected_rows > 0) {
            echo "Produto excluído com sucesso.";
            header("Location: ../telas/adm.php");
        } else {
            echo "Nenhum produto foi excluído ou o ID não existe.";
        }

        // Feche a consulta preparada
        $sql->close();
    } else {
        echo "Erro na preparação da consulta.";
    }
}
?>