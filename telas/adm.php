<?php session_start();
include_once('../bd/conexaobd.php');
if(!isset($_SESSION['User']) || $_SESSION['User']['nivel_Usuario'] == 0){
    header("Location: ../");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../imgs/logo/Favicon-Adm.svg" type="image/x-icon">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap" rel="stylesheet">

    <title>ADM - X GAIN</title>

    <link rel="stylesheet" href="../css/loading.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/adm.css">

    <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>     -->

</head>
<body id="body">
    <!-- <?php
        echo $_SESSION['User']['nivel_Usuario'];
    ?> -->
    <!-- <div class="tela-load" id="tela-load">
        <i class="load-icon" title="Carregamento">
            <svg version="1.1" viewBox="0 0 514.16 314.73" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="matrix(3.3284 0 0 3.3284 -14854 -1506.8)" stroke-linecap="round" stroke-linejoin="round" stroke-width="3.6053">
                <path transform="translate(976.43,-7.7164)" d="m3540.4 553.19-33.732-0.0426-18.533-23.68 0.03-24.933 39.806 0.0204-14.475 15.52-0.2235 0.22443 10.251 13.077 23.143-26.962-16.234-18.4-18.802-0.025-23.451-25.721 53.76-0.0312 21.638 24.421 21.624-24.421 53.76 0.0312-23.451 25.721-18.802 0.025-16.234 18.4 23.143 26.962 10.251-13.077-0.2236-0.22443-14.475-15.52 39.806-0.0204 0.03 24.933-18.533 23.68-33.732 0.0426-23.158-26.958z" stroke-linecap="round" stroke-linejoin="round" stroke-width="3.6053"/></g></svg>                
        </i>
    </div> -->
    <header>
        
        <a href="../">
            <i title="Logo">
            <svg version="1.1" viewBox="0 0 514.16 314.73" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="matrix(3.3284 0 0 3.3284 -14854 -1506.8)" stroke-linecap="round" stroke-linejoin="round" stroke-width="3.6053" style="paint-order:normal">
                <path alt="Logo do site, clique para voltar na pagina inicial" transform="translate(976.43,-7.7164)" d="m3540.4 553.19-33.732-0.0426-18.533-23.68 0.03-24.933 39.806 0.0204-14.475 15.52-0.2235 0.22443 10.251 13.077 23.143-26.962-16.234-18.4-18.802-0.025-23.451-25.721 53.76-0.0312 21.638 24.421 21.624-24.421 53.76 0.0312-23.451 25.721-18.802 0.025-16.234 18.4 23.143 26.962 10.251-13.077-0.2236-0.22443-14.475-15.52 39.806-0.0204 0.03 24.933-18.533 23.68-33.732 0.0426-23.158-26.958z" 
                stroke-linecap="round" stroke-linejoin="round" stroke-width="3.6053"/></g>
            </svg>
            </i>
        </a>
        
        <a href="../">Home</a>
        <a href="#section-produtos">Produtos</a>
        <a href="#section-usuarios">Usuários</a>
        <a href="#section-banner">Banner</a>
        <a id="abrirCadastro">Cadastro</a>

    </header>

    <main class="container">

        <section id="section-produtos" class="section-geral">
            <div class="area-aviso" id="area-aviso-excluir-produto">
                <i id="exit-aviso-excluir-produto" class="btn-sair" title="Sair" onclick="fecharAvisos()">
                    <svg version="1.1" viewBox="0 0 510.82 510.82" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="translate(6254.9 1860.8)">
                    <g transform="translate(37.2 -34.339)" stroke-linecap="round" stroke-linejoin="round">
                    <path alt="Botão de sair da area de login/cadastro" id="path1" d="m-6116.1-1809.4h158.93c88.05 0 158.93 70.885 158.93 158.93v158.93c0 88.05-70.885 158.93-158.93 158.93h-158.93c-88.05 0-158.93-70.885-158.93-158.93v-158.93c0-88.05 70.885-158.93 158.93-158.93z" stop-color="#000000"/><path id="path2" d="m-5904.5-1652.4c14.297-14.471 13.708-37.365-1.3219-51.136-7.2147-6.6135-16.861-10.196-26.818-9.9583-9.9576 0.2372-19.408 4.2758-26.274 11.226l-76.446 77.671-79.152-77.671c-6.8661-6.9494-16.316-10.987-26.272-11.226-9.9576-0.2373-19.606 3.3445-26.82 9.9583-15.023 13.771-15.613 36.665-1.3219 51.136l80.054 80.992-80.054 81.695c-14.297 14.471-13.708 37.366 1.3219 51.138 15.024 13.772 38.796 13.204 53.093-1.2674l77.792-78.435 77.806 78.435c14.297 14.471 38.067 15.039 53.091 1.2674 15.026-13.771 15.615-36.666 1.3219-51.138l-79.961-80.742z" 
                    /></g></g></svg>
                </i>
                <p class="erro">--AVISO--</p>
                <p class="aviso">Certeza que deseja excluir esse produto</p>
                <form action="../bd/funcao.php" method="post">
                    <input type="hidden" name="idProd" value="" id="idDoProduto">
                    <input type="submit" name="btnExcluirProd" value='Excluir' id="excluir-produto">
                </form>
            </div>
            <div class="menu-sections">
                <h2>Produtos</h2>
                <!-- <button >Ver mais</button> -->
                <button id="btn-produto-adicionar">Adicionar</button>
            </div>
            <div class="lista lista-produtos">
                <!-- ****Item Produto**** -->
                
                <?php
                include_once('../bd/conexaobd.php');
                    $conn = Conectar();

                    $queryProdutos = $conn->prepare("SELECT * FROM t_produto");
                    $queryProdutos->execute();
                    $produtos = $queryProdutos->get_result()->fetch_all(MYSQLI_ASSOC);
                
                    $queryUsuarios = $conn->prepare("SELECT * FROM t_usuario");
                    $queryUsuarios->execute();
                    $usuarios = $queryUsuarios->get_result()->fetch_all(MYSQLI_ASSOC);
                
                    $conn->close();
                
                    $_SESSION['Produtos'] = $produtos;
                    $_SESSION['Usuarios'] = $usuarios;

                    $quant = count($_SESSION['Produtos']);
                    if ($quant > 0) {
                        echo "<script>let produtos = ".json_encode($_SESSION['Produtos']).";</script>";
                        echo "<script>let usuarios = ".json_encode($_SESSION['Usuarios']).";</script>";
                        for ($i = 0; $i < $quant; $i++) {
                            $produtoAtual = $_SESSION['Produtos'][$i];

                            $conn = Conectar();
                            // Utilizando uma declaração preparada
                            $sql = "SELECT img FROM t_imgprod WHERE id_produto = ? LIMIT 1";
                            $jonas = $conn->prepare($sql);
                            $jonas->bind_param('i', $produtoAtual['id_Produto']);
                            $jonas->execute();

                            // Vinculando o resultado da consulta a uma variável
                            $jonas->bind_result($caminhoimg);

                            // Obtendo o primeiro resultado
                            $jonas->fetch();

                            $jonas->close();
                            $conn->close();

                            // Fechando a declaração prepar

                            echo "<div class='item-produto'>
                                    <img class='produto-img' src='" . $caminhoimg . "' alt='Produto-1'>
                                    <p class=''><b> Id: </b>" . htmlspecialchars($produtoAtual['id_Produto']) . "</p>
                                    <p class=''><b> Modelo: </b>" . htmlspecialchars($produtoAtual['modelo']) . "</p>
                                    <div>
                                        <button data-id='".$produtoAtual['id_Produto']."' id='btn-produto-editar' class='btn-produto-editar'>Editar</button>
                                        <button data-id='" . $produtoAtual['id_Produto'] ."' id='btn-produto-excluir' onclick='alertaExcluir(this)'>Excluir</button>
                                    </div>
                                </div>";
                        }
                    }else {
                        echo "<h3>Não há produtos disponíveis,</h3>
                            <h3>Adicione mais Produtos</h3>";
                    }
                ?>
            </div>
        </section>
            <section id="section-adicionar-produto" class="section-adicionar-produto">
                <div class="area-adicionar-produto">
                    <i id="exit-produtos-section" class="btn-sair" title="Sair" onclick="fecharTudo()">
                        <svg version="1.1" viewBox="0 0 510.82 510.82" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="translate(6254.9 1860.8)">
                        <g transform="translate(37.2 -34.339)" stroke-linecap="round" stroke-linejoin="round">
                        <path id="path1" d="m-6116.1-1809.4h158.93c88.05 0 158.93 70.885 158.93 158.93v158.93c0 88.05-70.885 158.93-158.93 158.93h-158.93c-88.05 0-158.93-70.885-158.93-158.93v-158.93c0-88.05 70.885-158.93 158.93-158.93z" stop-color="#000000"/><path id="path2" d="m-5904.5-1652.4c14.297-14.471 13.708-37.365-1.3219-51.136-7.2147-6.6135-16.861-10.196-26.818-9.9583-9.9576 0.2372-19.408 4.2758-26.274 11.226l-76.446 77.671-79.152-77.671c-6.8661-6.9494-16.316-10.987-26.272-11.226-9.9576-0.2373-19.606 3.3445-26.82 9.9583-15.023 13.771-15.613 36.665-1.3219 51.136l80.054 80.992-80.054 81.695c-14.297 14.471-13.708 37.366 1.3219 51.138 15.024 13.772 38.796 13.204 53.093-1.2674l77.792-78.435 77.806 78.435c14.297 14.471 38.067 15.039 53.091 1.2674 15.026-13.771 15.615-36.666 1.3219-51.138l-79.961-80.742z" 
                        /></g></g></svg>
                    </i>

                    <div class="area-aviso" id="area-aviso-produto">
                        <i id="exit-aviso-produto" class="btn-sair" title="Sair" onclick="fecharAvisos()">
                            <svg version="1.1" viewBox="0 0 510.82 510.82" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="translate(6254.9 1860.8)">
                            <g transform="translate(37.2 -34.339)" stroke-linecap="round" stroke-linejoin="round">
                            <path alt="Botão de sair da area de login/cadastro" id="path1" d="m-6116.1-1809.4h158.93c88.05 0 158.93 70.885 158.93 158.93v158.93c0 88.05-70.885 158.93-158.93 158.93h-158.93c-88.05 0-158.93-70.885-158.93-158.93v-158.93c0-88.05 70.885-158.93 158.93-158.93z" stop-color="#000000"/><path id="path2" d="m-5904.5-1652.4c14.297-14.471 13.708-37.365-1.3219-51.136-7.2147-6.6135-16.861-10.196-26.818-9.9583-9.9576 0.2372-19.408 4.2758-26.274 11.226l-76.446 77.671-79.152-77.671c-6.8661-6.9494-16.316-10.987-26.272-11.226-9.9576-0.2373-19.606 3.3445-26.82 9.9583-15.023 13.771-15.613 36.665-1.3219 51.136l80.054 80.992-80.054 81.695c-14.297 14.471-13.708 37.366 1.3219 51.138 15.024 13.772 38.796 13.204 53.093-1.2674l77.792-78.435 77.806 78.435c14.297 14.471 38.067 15.039 53.091 1.2674 15.026-13.771 15.615-36.666 1.3219-51.138l-79.961-80.742z" 
                            /></g></g></svg>
                        </i>
                        <p class="erro">--ERRO--</p>
                        <p class="aviso" id="aviso">Email ou senha incorreta | Sobrenome e telefone não inseridos</p>
                    </div>
                    <div class="area-forms">
                        <form action="../bd/admAddProd.php" enctype="multipart/form-data" method="POST" class="forms-produto" id="form-produto">
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

                            <!-- <p>Apenas imagens png, jpg e jpeg</p> -->
                            <label for="imgsFoto">Imagens do produto</label>
                            <label for="imgsFoto" class="file">Clique aqui para adicionar imagens do produto</label>
                            <input type="file" name="imgsFoto[]" id="imgsFoto" multiple class="input-produto">
                            <div id="arquivosSelecionados">Nenhum arquivo selecionado</div>

                            <label for="">Modelo 3D do produto</label>
                            <label for="obj3D" class="file" id=''>Clique aqui para adicionar o modelo 3d do produto</label>
                            <input type="file" name="obj3D" id="obj3D" class="input-produto">
                            <span id="nome3DSelecionado">Nenhum arquivo selecionado</span>
                            <!-- <label for=""></label>
                            <input type="text" name="" placeholder=""> -->
                            <input type="submit" value="Adicionar">
                            <!-- <input type="submit" id="btn-adicionar" onclick="verificarFormsProduto()" value="Adicionar"> -->
                            <!-- <button type="submit" value="" id='btn-adicionar'>Adicionar</button> -->

                        </form>
                    </div>
                </div>
            </section>
            <!-- Adicionar produto acima 🔼 editar produto abaixo 🔽 -->
            <section id="section-editar-produto" class="section-adicionar-produto">
                <div class="area-adicionar-produto">
                    <i id="exit-produtos-section" class="btn-sair" title="Sair" onclick="fecharTudo()">
                        <svg version="1.1" viewBox="0 0 510.82 510.82" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="translate(6254.9 1860.8)">
                        <g transform="translate(37.2 -34.339)" stroke-linecap="round" stroke-linejoin="round">
                        <path id="path1" d="m-6116.1-1809.4h158.93c88.05 0 158.93 70.885 158.93 158.93v158.93c0 88.05-70.885 158.93-158.93 158.93h-158.93c-88.05 0-158.93-70.885-158.93-158.93v-158.93c0-88.05 70.885-158.93 158.93-158.93z" stop-color="#000000"/><path id="path2" d="m-5904.5-1652.4c14.297-14.471 13.708-37.365-1.3219-51.136-7.2147-6.6135-16.861-10.196-26.818-9.9583-9.9576 0.2372-19.408 4.2758-26.274 11.226l-76.446 77.671-79.152-77.671c-6.8661-6.9494-16.316-10.987-26.272-11.226-9.9576-0.2373-19.606 3.3445-26.82 9.9583-15.023 13.771-15.613 36.665-1.3219 51.136l80.054 80.992-80.054 81.695c-14.297 14.471-13.708 37.366 1.3219 51.138 15.024 13.772 38.796 13.204 53.093-1.2674l77.792-78.435 77.806 78.435c14.297 14.471 38.067 15.039 53.091 1.2674 15.026-13.771 15.615-36.666 1.3219-51.138l-79.961-80.742z" 
                        /></g></g></svg>
                    </i>

                    <div class="area-aviso" id="area-aviso-produto">
                        <i id="exit-aviso-produto" class="btn-sair" title="Sair" onclick="fecharAvisos()">
                            <svg version="1.1" viewBox="0 0 510.82 510.82" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="translate(6254.9 1860.8)">
                            <g transform="translate(37.2 -34.339)" stroke-linecap="round" stroke-linejoin="round">
                            <path alt="Botão de sair da area de login/cadastro" id="path1" d="m-6116.1-1809.4h158.93c88.05 0 158.93 70.885 158.93 158.93v158.93c0 88.05-70.885 158.93-158.93 158.93h-158.93c-88.05 0-158.93-70.885-158.93-158.93v-158.93c0-88.05 70.885-158.93 158.93-158.93z" stop-color="#000000"/><path id="path2" d="m-5904.5-1652.4c14.297-14.471 13.708-37.365-1.3219-51.136-7.2147-6.6135-16.861-10.196-26.818-9.9583-9.9576 0.2372-19.408 4.2758-26.274 11.226l-76.446 77.671-79.152-77.671c-6.8661-6.9494-16.316-10.987-26.272-11.226-9.9576-0.2373-19.606 3.3445-26.82 9.9583-15.023 13.771-15.613 36.665-1.3219 51.136l80.054 80.992-80.054 81.695c-14.297 14.471-13.708 37.366 1.3219 51.138 15.024 13.772 38.796 13.204 53.093-1.2674l77.792-78.435 77.806 78.435c14.297 14.471 38.067 15.039 53.091 1.2674 15.026-13.771 15.615-36.666 1.3219-51.138l-79.961-80.742z" 
                            /></g></g></svg>
                        </i>
                        <p class="erro">--ERRO--</p>
                        <p class="aviso" id="aviso">Email ou senha incorreta | Sobrenome e telefone não inseridos</p>
                    </div>
                    <div class="area-forms">
                        <form action="../bd/admEditarProd.php?" enctype="multipart/form-data" method="POST" class="forms-produto" id="form-produto-editar">
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

                            <!-- <p>Apenas imagens png, jpg e jpeg</p> -->
                            <!-- <label for="imgsFoto">Imagens do produto</label>
                            <label for="imgsFoto" class="file">Clique aqui para adicionar imagens do produto</label>
                            <input type="file" name="imgsFoto[]" id="imgsFotoEditar" multiple class="input-produto">
                            <div id="arquivosSelecionadosEditar">Nenhum arquivo selecionado</div> -->

                            <!-- <label for=""></label>
                            <input type="text" name="" placeholder=""> -->
                            <input type="submit" id="btn-editar" onclick="verificarFormsProduto()" value="Editar">
                            <!-- <button type="submit" value="" id='btn-adicionar'>Adicionar</button> -->

                        </form>
                    </div>
                </div>
            </section>

        <section id="section-usuarios" class="section-geral section-usuarios">
            <div class="area-aviso" id="area-aviso-excluir-usuario">
                <i id="exit-aviso-excluir-usuario" class="btn-sair" title="Sair" onclick="fecharAvisos()">
                    <svg version="1.1" viewBox="0 0 510.82 510.82" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="translate(6254.9 1860.8)">
                    <g transform="translate(37.2 -34.339)" stroke-linecap="round" stroke-linejoin="round">
                    <path alt="Botão de sair da area de login/cadastro" id="path1" d="m-6116.1-1809.4h158.93c88.05 0 158.93 70.885 158.93 158.93v158.93c0 88.05-70.885 158.93-158.93 158.93h-158.93c-88.05 0-158.93-70.885-158.93-158.93v-158.93c0-88.05 70.885-158.93 158.93-158.93z" stop-color="#000000"/><path id="path2" d="m-5904.5-1652.4c14.297-14.471 13.708-37.365-1.3219-51.136-7.2147-6.6135-16.861-10.196-26.818-9.9583-9.9576 0.2372-19.408 4.2758-26.274 11.226l-76.446 77.671-79.152-77.671c-6.8661-6.9494-16.316-10.987-26.272-11.226-9.9576-0.2373-19.606 3.3445-26.82 9.9583-15.023 13.771-15.613 36.665-1.3219 51.136l80.054 80.992-80.054 81.695c-14.297 14.471-13.708 37.366 1.3219 51.138 15.024 13.772 38.796 13.204 53.093-1.2674l77.792-78.435 77.806 78.435c14.297 14.471 38.067 15.039 53.091 1.2674 15.026-13.771 15.615-36.666 1.3219-51.138l-79.961-80.742z" 
                    /></g></g></svg>
                </i>
                <p class="erro">--AVISO--</p>
                <p class="aviso">Certeza que deseja excluir esse usuário</p>
                <form action="../bd/funcao.php" method="post">
                    <input type="hidden" name="idUser" value="" id="idDoUsuario">
                    <input type="submit" name="btnExcluirUser" value='Excluir' id="excluir-usuario">
                </form>
            </div>
            <div class="menu-sections">
                <h2>Usuários</h2>
                <!-- <button >Ver mais</button> -->
                <button id="btn-usuario-adicionar">Adicionar</button>
            </div>
            <div class="lista lista-produtos">
                <!-- ****Item Usuarios**** -->
                <?php
                    $quant = count($_SESSION['Usuarios']);
                    if($quant > 0){
                        for ($i = 0; $i < $quant; $i++) {
                            $usuarioAtual = $_SESSION['Usuarios'][$i];
                            echo "<div  class='item-produto'>
                                    <p  class=''> <b>Id: </b>".$usuarioAtual['id_usuario']."</p>
                                    <p  class=''> <b>Nome: </b>".$usuarioAtual['nome']." ".$usuarioAtual['sobrenome']."</p>
                                    <p> <b>Email: </b>".$usuarioAtual['email']."</p>
                                    <div>
                                        <button data-id='".$usuarioAtual['id_usuario']."' class='btn-usuario-editar'>Editar</button>
                                        <button data-id='" . htmlspecialchars($usuarioAtual['id_usuario']) ."' id='btn-usuario-excluir' onclick='alertaExcluir(this)'>Excluir</button>
                                    </div>
                                </div>";
                        }
                    }else{
                        echo "<h3>Não há Usuarios disponiveis,</h3>
                            <h3>Adicione mais Usuarios</h3>";
                    }
                ?>
                
            </div>
        </section>
            <section id="section-adicionar-usuario" class="section-adicionar-usuario">
                <div class="area-adicionar-usuario">
                    <i id="exit-usuario-section" class="btn-sair" title="Sair" onclick="fecharTudo()">
                        <svg version="1.1" viewBox="0 0 510.82 510.82" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="translate(6254.9 1860.8)">
                        <g transform="translate(37.2 -34.339)" stroke-linecap="round" stroke-linejoin="round">
                        <path id="path1" d="m-6116.1-1809.4h158.93c88.05 0 158.93 70.885 158.93 158.93v158.93c0 88.05-70.885 158.93-158.93 158.93h-158.93c-88.05 0-158.93-70.885-158.93-158.93v-158.93c0-88.05 70.885-158.93 158.93-158.93z" stop-color="#000000"/><path id="path2" d="m-5904.5-1652.4c14.297-14.471 13.708-37.365-1.3219-51.136-7.2147-6.6135-16.861-10.196-26.818-9.9583-9.9576 0.2372-19.408 4.2758-26.274 11.226l-76.446 77.671-79.152-77.671c-6.8661-6.9494-16.316-10.987-26.272-11.226-9.9576-0.2373-19.606 3.3445-26.82 9.9583-15.023 13.771-15.613 36.665-1.3219 51.136l80.054 80.992-80.054 81.695c-14.297 14.471-13.708 37.366 1.3219 51.138 15.024 13.772 38.796 13.204 53.093-1.2674l77.792-78.435 77.806 78.435c14.297 14.471 38.067 15.039 53.091 1.2674 15.026-13.771 15.615-36.666 1.3219-51.138l-79.961-80.742z" 
                        /></g></g></svg>
                    </i>

                    <div class="area-aviso" id="area-aviso-usuario">
                        <i id="exit-aviso-usuario" class="btn-sair" title="Sair" onclick="fecharAvisos()">
                            <svg version="1.1" viewBox="0 0 510.82 510.82" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="translate(6254.9 1860.8)">
                            <g transform="translate(37.2 -34.339)" stroke-linecap="round" stroke-linejoin="round">
                            <path alt="Botão de sair da area de login/cadastro" id="path1" d="m-6116.1-1809.4h158.93c88.05 0 158.93 70.885 158.93 158.93v158.93c0 88.05-70.885 158.93-158.93 158.93h-158.93c-88.05 0-158.93-70.885-158.93-158.93v-158.93c0-88.05 70.885-158.93 158.93-158.93z" stop-color="#000000"/><path id="path2" d="m-5904.5-1652.4c14.297-14.471 13.708-37.365-1.3219-51.136-7.2147-6.6135-16.861-10.196-26.818-9.9583-9.9576 0.2372-19.408 4.2758-26.274 11.226l-76.446 77.671-79.152-77.671c-6.8661-6.9494-16.316-10.987-26.272-11.226-9.9576-0.2373-19.606 3.3445-26.82 9.9583-15.023 13.771-15.613 36.665-1.3219 51.136l80.054 80.992-80.054 81.695c-14.297 14.471-13.708 37.366 1.3219 51.138 15.024 13.772 38.796 13.204 53.093-1.2674l77.792-78.435 77.806 78.435c14.297 14.471 38.067 15.039 53.091 1.2674 15.026-13.771 15.615-36.666 1.3219-51.138l-79.961-80.742z" 
                            /></g></g></svg>
                        </i>
                        <p class="erro">--ERRO--</p>
                        <p class="aviso" id="aviso-usuario">Email ou senha incorreta | Sobrenome e telefone não inseridos</p>
                    </div>

                    <div class="area-forms">
                        <form action="../bd/admAddUser.php" method="POST" class="forms-usuario">
                            <label for="usuario-nome">Nome</label>

                            <input type="text" name="nome" id="usuario-nome" class="input-usuario" placeholder="Nome">
                        <label for="usuario-sobrenome">Sobrenome</label>

                            <input type="text" name="sobrenome" id="usuario-sobrenome" class="input-usuario" placeholder="Sobrenome">

                        <label for="usuario-email">E-mail</label>

                            <input type="email" name="email" id="usuario-email" class="input-usuario" placeholder="nome.sobrenome@email.com">

                        <label for="input-senha-usuario">Senha</label>
                        <div class="senha-usuario">
                            <input name="senha" class="input-senha-usuario input-usuario" id="input-senha-usuario" type="password" placeholder="xxxxxxxxx">
                            <i class="icon-mostrar-senha" id="icon-mostrar-senha" onclick="mostrarSenhaUsuario(this)"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg></i>
                        </div>
                        <label for="usuario-numero">Telefone</label>

                            <input type="tel" name="telefone" id="usuario-numero" class="input-usuario" placeholder="(xx)xxxx-xxxx">

                        <label for="usuario-cargo">Cargo</label>

                            <select name="cargo" id="usuario-cargo">
                                <option value="0" selected>Usuário</option>
                                <option value="1">ADM</option>
                            </select>

                        <!-- <input type="submit" onclick="verificarFormsEditor()" value="Adicionar"> -->
                        <button type="submit" class=""  onclick="verificarFormsEditor()">Adicionar</button>

                        </form>
                    </div>
                </div>
            </section>
            <!-- Adicionar usuario acima 🔼 editar usuario abaixo 🔽 -->
            <section id="section-editar-usuario" class="section-adicionar-usuario">
                <div class="area-adicionar-usuario">
                    <i id="exit-usuario-section" class="btn-sair" title="Sair" onclick="fecharTudo()">
                        <svg version="1.1" viewBox="0 0 510.82 510.82" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="translate(6254.9 1860.8)">
                        <g transform="translate(37.2 -34.339)" stroke-linecap="round" stroke-linejoin="round">
                        <path id="path1" d="m-6116.1-1809.4h158.93c88.05 0 158.93 70.885 158.93 158.93v158.93c0 88.05-70.885 158.93-158.93 158.93h-158.93c-88.05 0-158.93-70.885-158.93-158.93v-158.93c0-88.05 70.885-158.93 158.93-158.93z" stop-color="#000000"/><path id="path2" d="m-5904.5-1652.4c14.297-14.471 13.708-37.365-1.3219-51.136-7.2147-6.6135-16.861-10.196-26.818-9.9583-9.9576 0.2372-19.408 4.2758-26.274 11.226l-76.446 77.671-79.152-77.671c-6.8661-6.9494-16.316-10.987-26.272-11.226-9.9576-0.2373-19.606 3.3445-26.82 9.9583-15.023 13.771-15.613 36.665-1.3219 51.136l80.054 80.992-80.054 81.695c-14.297 14.471-13.708 37.366 1.3219 51.138 15.024 13.772 38.796 13.204 53.093-1.2674l77.792-78.435 77.806 78.435c14.297 14.471 38.067 15.039 53.091 1.2674 15.026-13.771 15.615-36.666 1.3219-51.138l-79.961-80.742z" 
                        /></g></g></svg>
                    </i>

                    <div class="area-aviso" id="area-aviso-usuario">
                        <i id="exit-aviso-usuario" class="btn-sair" title="Sair" onclick="fecharAvisos()">
                            <svg version="1.1" viewBox="0 0 510.82 510.82" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="translate(6254.9 1860.8)">
                            <g transform="translate(37.2 -34.339)" stroke-linecap="round" stroke-linejoin="round">
                            <path alt="Botão de sair da area de login/cadastro" id="path1" d="m-6116.1-1809.4h158.93c88.05 0 158.93 70.885 158.93 158.93v158.93c0 88.05-70.885 158.93-158.93 158.93h-158.93c-88.05 0-158.93-70.885-158.93-158.93v-158.93c0-88.05 70.885-158.93 158.93-158.93z" stop-color="#000000"/><path id="path2" d="m-5904.5-1652.4c14.297-14.471 13.708-37.365-1.3219-51.136-7.2147-6.6135-16.861-10.196-26.818-9.9583-9.9576 0.2372-19.408 4.2758-26.274 11.226l-76.446 77.671-79.152-77.671c-6.8661-6.9494-16.316-10.987-26.272-11.226-9.9576-0.2373-19.606 3.3445-26.82 9.9583-15.023 13.771-15.613 36.665-1.3219 51.136l80.054 80.992-80.054 81.695c-14.297 14.471-13.708 37.366 1.3219 51.138 15.024 13.772 38.796 13.204 53.093-1.2674l77.792-78.435 77.806 78.435c14.297 14.471 38.067 15.039 53.091 1.2674 15.026-13.771 15.615-36.666 1.3219-51.138l-79.961-80.742z" 
                            /></g></g></svg>
                        </i>
                        <p class="erro">--ERRO--</p>
                        <p class="aviso" id="aviso-usuario">Email ou senha incorreta | Sobrenome e telefone não inseridos</p>
                    </div>

                    <div class="area-forms">
                        <form id="form-usuario-editar" action="../bd/admEditeUser.php" method="POST" class="forms-usuario">
                            <label for="usuario-nome">Nome</label>

                            <input type="text" name="nome"  class="input-usuario" placeholder="Nome">
                        <label for="usuario-sobrenome">Sobrenome</label>

                            <input type="text" name="sobrenome" class="input-usuario" placeholder="Sobrenome">

                        <label for="usuario-email">E-mail</label>

                            <input type="email" name="email" class="input-usuario" placeholder="nome.sobrenome@email.com">

                        <label for="input-senha-usuario">Senha</label>
                        <div class="senha-usuario">
                            <input name="senha" class="input-senha-usuario input-usuario" id="input-senha-usuario2"  type="password" placeholder="xxxxxxxxx">
                            <i class="icon-mostrar-senha" id="icon-mostrar-senha2" onclick="mostrarSenhaUsuario(this)"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg></i>
                        </div>
                        <label for="usuario-numero">Telefone</label>

                            <input type="tel" name="telefone"  class="input-usuario" placeholder="(xx)xxxx-xxxx">

                        <label for="usuario-cargo">Cargo</label>

                            <select name="cargo">
                                <option value="0" selected>Usuário</option>
                                <option value="1">ADM</option>
                            </select>

                        <!-- <input type="submit" onclick="verificarFormsEditor()" value="Adicionar"> -->
                        <button type="submit" class=""  onclick="verificarFormsEditor()">Editar</button>

                        </form>
                    </div>
                </div>
            </section>

        <section id="section-banner" class="section-geral section-banner">

            <div class="menu-sections">
                <h2>Banner</h2>
                <!-- <button >Ver mais</button> -->
                
            </div>
            <div class="area-mostrar-banner">
                <div class="area-aviso" id="area-aviso-excluir-banner">
                    <i id="exit-aviso-excluir-banner" class="btn-sair" title="Sair" onclick="fecharAvisos()">
                        <svg version="1.1" viewBox="0 0 510.82 510.82" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="translate(6254.9 1860.8)">
                        <g transform="translate(37.2 -34.339)" stroke-linecap="round" stroke-linejoin="round">
                        <path alt="Botão de sair da area de login/cadastro" id="path1" d="m-6116.1-1809.4h158.93c88.05 0 158.93 70.885 158.93 158.93v158.93c0 88.05-70.885 158.93-158.93 158.93h-158.93c-88.05 0-158.93-70.885-158.93-158.93v-158.93c0-88.05 70.885-158.93 158.93-158.93z" stop-color="#000000"/><path id="path2" d="m-5904.5-1652.4c14.297-14.471 13.708-37.365-1.3219-51.136-7.2147-6.6135-16.861-10.196-26.818-9.9583-9.9576 0.2372-19.408 4.2758-26.274 11.226l-76.446 77.671-79.152-77.671c-6.8661-6.9494-16.316-10.987-26.272-11.226-9.9576-0.2373-19.606 3.3445-26.82 9.9583-15.023 13.771-15.613 36.665-1.3219 51.136l80.054 80.992-80.054 81.695c-14.297 14.471-13.708 37.366 1.3219 51.138 15.024 13.772 38.796 13.204 53.093-1.2674l77.792-78.435 77.806 78.435c14.297 14.471 38.067 15.039 53.091 1.2674 15.026-13.771 15.615-36.666 1.3219-51.138l-79.961-80.742z" 
                        /></g></g></svg>
                    </i>
                    <p class="erro">--AVISO--</p>
                    <p class="aviso">Certeza que deseja excluir esse banner</p>
                    <button type="button" id="excluir-banner">Excluir</button>
                </div>
                <div class="area-imgsBanner">
                    <div class="imgsBanner">
                        <img class="banner-img banner-img-foco" src="../imgs/banner-home-img-1.jpg" alt="Banner 1">
                        <img class="banner-img" src="../imgs/banner-home-img-2.jpg" alt="Banner 2">
                        <img class="banner-img" src="../imgs/banner-home-img-3.jpg" alt="Banner 3">
                        <img class="banner-img" src="../imgs/banner-home-img-4.jpg" alt="Banner 4">
                        <img class="banner-img" src="../imgs/banner-home-img-5.jpg" alt="Banner 5">
                    </div>
                    <div class="area-btns-bolinhas-banner">
                        <!-- <i id="btn-bolinha-banner" class="btn-bolinha-banner banner-foco"></i>
                        <i id="btn-bolinha-banner" class="btn-bolinha-banner"></i>
                        <i id="btn-bolinha-banner" class="btn-bolinha-banner"></i>
                        <i id="btn-bolinha-banner" class="btn-bolinha-banner"></i> -->
                    </div>

                </div>

                <div>
                    <button class="passar-e-voltar btn-banner-anterior" id="btn-banner-anterior">Anterior</button>
                    <!-- <button id="btn-banner-editar">Editar</button> -->
                    <button id="btn-banner-excluir">Excluir</button>
                    <button id="btn-adicionar-banner">Adicionar</button>
                    <button class="passar-e-voltar btn-banner-proximo" id="btn-banner-proximo">Próximo</button>
                </div>
            </div>
        </section>
            <section class="adicionar-banner" id="adicionar-banner">
                <div class="area-aviso" id="area-aviso-banner">
                    <i id="exit-aviso-banner" class="btn-sair" title="Sair" onclick="fecharAvisos()">
                        <svg version="1.1" viewBox="0 0 510.82 510.82" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="translate(6254.9 1860.8)">
                        <g transform="translate(37.2 -34.339)" stroke-linecap="round" stroke-linejoin="round">
                        <path alt="Botão de sair da area de login/cadastro" id="path1" d="m-6116.1-1809.4h158.93c88.05 0 158.93 70.885 158.93 158.93v158.93c0 88.05-70.885 158.93-158.93 158.93h-158.93c-88.05 0-158.93-70.885-158.93-158.93v-158.93c0-88.05 70.885-158.93 158.93-158.93z" stop-color="#000000"/><path id="path2" d="m-5904.5-1652.4c14.297-14.471 13.708-37.365-1.3219-51.136-7.2147-6.6135-16.861-10.196-26.818-9.9583-9.9576 0.2372-19.408 4.2758-26.274 11.226l-76.446 77.671-79.152-77.671c-6.8661-6.9494-16.316-10.987-26.272-11.226-9.9576-0.2373-19.606 3.3445-26.82 9.9583-15.023 13.771-15.613 36.665-1.3219 51.136l80.054 80.992-80.054 81.695c-14.297 14.471-13.708 37.366 1.3219 51.138 15.024 13.772 38.796 13.204 53.093-1.2674l77.792-78.435 77.806 78.435c14.297 14.471 38.067 15.039 53.091 1.2674 15.026-13.771 15.615-36.666 1.3219-51.138l-79.961-80.742z" 
                        /></g></g></svg>
                    </i>
                    <p class="erro">--ERRO--</p>
                    <p class="aviso" id="aviso-banner">Email ou senha incorreta | Sobrenome e telefone não inseridos</p>
                </div>
                <i id="exit-banner-section" class="btn-sair" title="Sair" onclick="fecharTudo()">
                    <svg version="1.1" viewBox="0 0 510.82 510.82" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="translate(6254.9 1860.8)">
                    <g transform="translate(37.2 -34.339)" stroke-linecap="round" stroke-linejoin="round">
                    <path id="path1" d="m-6116.1-1809.4h158.93c88.05 0 158.93 70.885 158.93 158.93v158.93c0 88.05-70.885 158.93-158.93 158.93h-158.93c-88.05 0-158.93-70.885-158.93-158.93v-158.93c0-88.05 70.885-158.93 158.93-158.93z" stop-color="#000000"/><path id="path2" d="m-5904.5-1652.4c14.297-14.471 13.708-37.365-1.3219-51.136-7.2147-6.6135-16.861-10.196-26.818-9.9583-9.9576 0.2372-19.408 4.2758-26.274 11.226l-76.446 77.671-79.152-77.671c-6.8661-6.9494-16.316-10.987-26.272-11.226-9.9576-0.2373-19.606 3.3445-26.82 9.9583-15.023 13.771-15.613 36.665-1.3219 51.136l80.054 80.992-80.054 81.695c-14.297 14.471-13.708 37.366 1.3219 51.138 15.024 13.772 38.796 13.204 53.093-1.2674l77.792-78.435 77.806 78.435c14.297 14.471 38.067 15.039 53.091 1.2674 15.026-13.771 15.615-36.666 1.3219-51.138l-79.961-80.742z" 
                    /></g></g></svg>
                </i>
                <form action="" method="POST">
                    <label for="bannerImg" id="adicionarBannerLabel">Clique para adicionar</label>
                    <input type="file" name="bannerImg" id="bannerImg" class="input-banner" multiple>
                    <span id="bannerAdicionado">Nenhum arquivo selecionado</span>
                    <button type="button" onclick="verificarBanner()">Adicionar</button>
                </form>
            </section>
    </main>

    <footer>
        <a href="../"><i id="icon-logo-footer" title="Logo, clique para subir para o topo da pagina"><svg version="1.1" viewBox="0 0 514.16 314.73" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="matrix(3.3284 0 0 3.3284 -14854 -1506.8)">
            <path alt="logo do site, clique para subir até o topo da página" transform="translate(976.43,-7.7164)" d="m3540.4 553.19-33.732-0.0426-18.533-23.68 0.03-24.933 39.806 0.0204-14.475 15.52-0.2235 0.22443 10.251 13.077 23.143-26.962-16.234-18.4-18.802-0.025-23.451-25.721 53.76-0.0312 21.638 24.421 21.624-24.421 53.76 0.0312-23.451 25.721-18.802 0.025-16.234 18.4 23.143 26.962 10.251-13.077-0.2236-0.22443-14.475-15.52 39.806-0.0204 0.03 24.933-18.533 23.68-33.732 0.0426-23.158-26.958z" stroke-linecap="round" stroke-linejoin="round" stroke-width="3.6053" style="font-variation-settings:'wght' 400;paint-order:normal"/></g></svg>
        </i></a>
        <p>© 2023 X GAIN | CNPJ - 01. 010. 101/0101-01</p>
        <p>X Gain empresa fictícia criada em um projeto de TCC</p>
    </footer>

    <!-- <script src="../Js/loading.js" defer></script> -->
    <script src="../Js/adm.js" defer></script>
    <!-- <script>
        function chamarFuncaoPHP(param1) {
            $.ajax({
                type: 'POST',
                url: '../bd/admJonas.php',
                data: {
                    acao: 'excluir',
                    parametro1: param1
                },
                success: function(response) {
                    // Tratar a resposta, se necessário
                    location.reload();
                },
                error: function(xhr, status, error) {
                    // Lidar com erros, se necessário
                    console.error(error);
                    console.log(param1);
                }
            });
        }
    </script> -->
</body>
</html>