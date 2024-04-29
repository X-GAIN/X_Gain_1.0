<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Produto</title>
</head>
<body>
<form action="../../bd/admAddProd.php" method="POST" class="forms-produto" id="form-produto">
        <label for="">Nome/Modelo</label>
        <input type="text" name="modelo" placeholder="Nome do produto" class="input-produto">

        <label for="">Categoria</label>
        <select name="categoria" >
            <option value="nao-selecionado" selected>Não selecionado</option>
            <option value="1">Cardio</option>
            <option value="2">Musculação</option>
            <option value="3">Acessórios</option>
        </select>

        <label for="">Sub Categoria</label>
        <select name="sub-categoria" >
            <option value="nao-selecionado" selected class="">Não selecionado</option>

            <!-- ********* Cardio ******** -->
            <option value="1" class="subcategorias-cardio">Esteira</option>
            <option value="2" class="subcategorias-cardio">Escada</option>
            <option value="3" class="subcategorias-cardio">Bike</option>

            <!-- ********* Musculação ******** -->
            <option value="4" class="subcategorias-musculacao">Abdômen</option>
            <option value="5" class="subcategorias-musculacao">Braço</option>
            <option value="6" class="subcategorias-musculacao">Costas</option>
            <option value="7" class="subcategorias-musculacao">Ombro</option>
            <option value="8" class="subcategorias-musculacao">Peito</option>
            <option value="9" class="subcategorias-musculacao">Perna</option>

            <!-- ********* Acessorios ******** -->
            <option value="10" class="subcategorias-acessorios">Utilitário</option>
            <option value="11" class="subcategorias-acessorios">Equipamentos</option>
            <!-- ********* Outros ********* -->
            <option value="12" class="subcategorias-acessorios">Outros</option>
        </select>

        <label for="">Descrição</label>
        <textarea name="descricao"  placeholder="Descrição sobre o produto" class="input-produto"></textarea>

        <label for="">Comprimento</label>
        <input type="text" name="comprimento" placeholder="0m" class="input-produto">

        <label for="">Altura</label>
        <input type="text" name="altura" placeholder="0m" class="input-produto">

        <label for="">Largura</label>
        <input type="text" name="largura" placeholder="0m" class="input-produto">

        <label for="">Peso</label>
        <input type="text" name="peso" placeholder="0kg" class="input-produto">

        <label for="">Garantia</label>
        <input type="text" name="garantia" placeholder="3 anos" class="input-produto">
        <label for="">Imagens do produto</label>
                            <label for="imgsFoto" class="file">Clique aqui para adicionar imagens do produto</label>
                            <input type="file" name="imgsFoto" id="imgsFoto" multiple class="input-produto">
                            <div id="arquivosSelecionados">Nenhum arquivo selecionado</div>

                            <!-- <label for=""></label>
                            <input type="text" name="" placeholder=""> -->
                            <!-- <input type="submit" onclick="verificarFormsProduto()" value="Adicionar"> -->
                            <button type="submit" value="" id='btn-adicionar'>Adicionar</button>
    </form>
</body>
</html>
