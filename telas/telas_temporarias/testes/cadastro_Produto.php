<?php
include_once("../../bd/funcoes.php");

$conn = Conectar();
$categorias = ObterCategorias($conn);
Desconectar($conn);
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Produto</title>
</head>
<body>
    <form action="../../bd/inserir_produto.php" method="POST" enctype="multipart/form-data">
        <label for="linha">Linha</label>
        <input type="text" name="linha" id="linha" placeholder="Digite a linha do produto" required>
        
        <br><label for="modelo">Modelo</label>
        <input type="text" name="modelo" id="modelo" placeholder="Digite o modelo do produto" required>
        
        <br><label for="descricao">Descrição</label>
        <input type="text" name="descricao" id="descricao" placeholder="Digite a descrição do produto" required>
        
        <br><label for="categoria">Categoria</label>
        <select name="categoria" id="categoria" required>
            <?php
            foreach ($categorias as $categoria) {
                echo "<option value='{$categoria['id_categoria']}'>{$categoria['nome_Categoria']}</option>";
            }
            ?>
        </select>
        
        <br><label for="subcategoria">Subcategoria</label>
        <select name="subcategoria" id="subcategoria" required>
            <!-- As opções de subcategoria serão carregadas dinamicamente com JavaScript -->
        </select>
        
        <br><label for="comprimento">Comprimento</label>
        <input type="number" name="comprimento" id="comprimento" required>
        
        <br><label for="largura">Largura</label>
        <input type="number" name="largura" id="largura" required>
        
        <br><label for="altura">Altura</label>
        <input type="number" name="altura" id="altura" required>
        
        <br><label for="garantia">Garantia (em meses)</label>
        <input type="number" name="garantia" id="garantia" required>
        
        <br><label for="obj3d">Objeto 3D</label>
        <input type="file" name="obj3d" id="obj3d" accept=".obj" required>
        
        <br><label for="peso">Peso (em gramas)</label>
        <input type="number" name="peso" id="peso" required>
        
        <br><input type="submit" name="enviarProduto" id="cadastrar" value="Cadastrar Produto">

        <script>
            // Script para carregar dinamicamente as subcategorias com base na categoria selecionada
            document.getElementById('categoria').addEventListener('change', function() {
                var categoriaId = this.value;
                var subcategoriaSelect = document.getElementById('subcategoria');

                // Limpa as opções existentes
                subcategoriaSelect.innerHTML = '';

                // Envia uma solicitação AJAX para obter as subcategorias
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        var subcategorias = JSON.parse(xhr.responseText);

                        // Adiciona as opções de subcategoria ao elemento select
                        subcategorias.forEach(function(subcategoria) {
                            subcategoriaSelect.innerHTML += '<option value="' + subcategoria.id_subCate + '">' + subcategoria.nome_subCate + '</option>';
                        });
                    }
                };

                xhr.open('GET', '../../bd/obter_subcategorias.php?categoria=' + categoriaId, true);
                xhr.send();
            });
        </script>
    </form>
</body>
</html>
