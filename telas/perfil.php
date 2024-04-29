<?php session_start();
include_once("../bd/conexaobd.php");

if(!$_SESSION['Logado']){
    header("Location: ../");
    exit();
}

$conn = Conectar();
    
    // Verifica se a sessão está configurada e se o usuário está autenticado
    if (!isset($_SESSION['User']['id_usuario'])) {
        // Redireciona para a página de login ou realiza alguma outra ação
        header("Location: ../");
        exit();
    }

    $id = $_SESSION['User']['id_usuario'];

    $queryUsuario = $conn->prepare("SELECT * FROM t_usuario WHERE id_usuario = ? LIMIT 1");
    $queryUsuario->bind_param("i", $id);    
    $queryUsuario->execute();
    $usuario = $queryUsuario->get_result()->fetch_assoc();
    $_SESSION['User'] = $usuario;

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../imgs/logo/Favicon.svg" type="image/x-icon">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap" rel="stylesheet">

    <title>Perfil | 
        <?php     
            echo $usuario['nome']." ".$usuario['sobrenome'];
        ?>
    </title>


    <!-- <link rel="stylesheet" href="./css/icons.css"> -->
    <link rel="stylesheet" href="../css/loading.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/carrinho.css">
    <link rel="stylesheet" href="../css/pesquisa.css">
    <link rel="stylesheet" href="../css/login-cadastro.css">
    <link rel="stylesheet" href="../css/main-perfil.css">
    <link rel="stylesheet" href="../css/footer.css">

    <!-- Media Queries -->
    <link rel="stylesheet" href="../css/media-query/footer-media.css">
    <link rel="stylesheet" href="../css/media-query/header-media.css">
    <link rel="stylesheet" href="../css/media-query/pesquisa-media.css">
    <link rel="stylesheet" href="../css/media-query/carrinho-media.css">
    <link rel="stylesheet" href="../css/media-query/login-cadastro-media.css">
    <link rel="stylesheet" href="../css/media-query/main-perfil.css">
    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body id="body" onload="preLoading()">
    
    <div class="tela-load">
        <i class="load-icon" title="Carregando">
            <svg version="1.1" viewBox="0 0 514.16 314.73" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="matrix(3.3284 0 0 3.3284 -14854 -1506.8)" stroke-linecap="round" stroke-linejoin="round" stroke-width="3.6053">
                <path transform="translate(976.43,-7.7164)" d="m3540.4 553.19-33.732-0.0426-18.533-23.68 0.03-24.933 39.806 0.0204-14.475 15.52-0.2235 0.22443 10.251 13.077 23.143-26.962-16.234-18.4-18.802-0.025-23.451-25.721 53.76-0.0312 21.638 24.421 21.624-24.421 53.76 0.0312-23.451 25.721-18.802 0.025-16.234 18.4 23.143 26.962 10.251-13.077-0.2236-0.22443-14.475-15.52 39.806-0.0204 0.03 24.933-18.533 23.68-33.732 0.0426-23.158-26.958z" stroke-linecap="round" stroke-linejoin="round" stroke-width="3.6053"/></g></svg>                
        </i>
    </div>

    <div id="topo"></div>

                                                            <!-- Login || Cadastro -->
    <section class="section-login-cadastro container" id="section-login-cadastro">
        <iframe id="iframe-login" src="../iframe/login.php" frameborder="0"></iframe>
        <iframe id="iframe-cadastro" src="../iframe/cadastro.php" frameborder="0"></iframe>
    </section>

                                                            <!-- Barra de pesquisa -->
    <section id="pesquisa-section-iframe" class="container">
    <iframe  src="../iframe/barra-pesquisa.php" frameborder="0">aa</iframe>
    </section>

                                                                <!-- Carrinho -->
<section id="carrinho-section" class="section-carrinho">

<section class="x-title">
    <i id="exit-carrinho-section" class="btn-sair" alt="Botão de fechar carrinho" title="Sair">
    <svg version="1.1" viewBox="0 0 510.82 510.82" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="translate(6254.9 1860.8)">
        <g transform="translate(37.2 -34.339)" stroke-linecap="round" stroke-linejoin="round">
        <path id="path1" d="m-6116.2-1809.4h158.93c88.05 0 158.93 70.885 158.93 158.93v158.93c0 88.05-70.885 158.93-158.93 158.93h-158.93c-88.05 0-158.93-70.885-158.93-158.93v-158.93c0-88.05 70.885-158.93 158.93-158.93z"/><path id="path2" d="m-5924.7-1640c12.114-12.262 11.615-31.661-1.1201-43.33-6.1133-5.6039-14.287-8.6395-22.724-8.4381-8.4375 0.201-16.445 3.623-22.263 9.5122l-64.776 65.814-67.069-65.814c-5.8179-5.8885-13.825-9.3097-22.261-9.5122-8.4375-0.2011-16.613 2.8339-22.726 8.4381-12.73 11.669-13.23 31.068-1.1201 43.33l67.833 68.628-67.833 69.224c-12.114 12.262-11.615 31.662 1.1201 43.331 12.73 11.67 32.873 11.188 44.988-1.074l65.916-66.461 65.928 66.461c12.114 12.262 32.256 12.743 44.986 1.074 12.732-11.669 13.231-31.069 1.1201-43.331l-67.754-68.416z"/></g></g>
    </svg>

    </i>

    <p>PEDIDO PARA ORÇAMENTO</p>
</section>

<section id="" class="tabela-carrinho">
    <section id="tabela-produtos-carrinho" class="tabela-produtos-carrinho">


        <!-- <div id="" class="item-produto-carrinho">
            <div class="card-produto-carrinho">
                <div class="qtn-produto">
                    <i class="menos-mais iconMenos" id="" title="Retirar">
                        <svg version="1.1" viewBox="0 0 530 530" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="translate(8692.3 1870.3)">
                            <path id="path1" d="m-8504-1572.8v-64.908h153.49v64.908z"/>
                            <circle id="path2" cx="-8427.3" cy="-1605.3" r="240" stroke-width="40"/></g></svg>                              
                    </i>

                    <p class="numero-qtn" id="">1</p>

                    <i class="menos-mais iconMais" id="" title="Adicionar">
                        <svg version="1.1" viewBox="0 0 530 530" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="translate(8143 1850.4)">
                            <path id="path1" d="m-7906.6-1469.9v-88.426h-85.898v-55.5h85.898v-86.075h58.203v86.075h85.898v55.5h-85.898v88.426z" stroke-linecap="round" stroke-linejoin="round"/>
                            <circle id="path2" cx="-7878" cy="-1585.4" r="240" stroke-width="40"/></g>
                        </svg>
                    </i>
                </div>
                <p class="nome-produto" id="">Leg Press</p>
                <i class="excluir-produto" id="" title="Remover">
                    <svg version="1.1" viewBox="0 0 512 677.59" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="translate(9240.8 1935.8)"><g transform="matrix(18.669 0 0 18.669 171132 19407)" fill-rule="evenodd">
                        <path d="m-9660.4-1140.3h8.19s-0.069-0.5733 0.7254-1.7455c0.3913-0.5772 1.6163-0.8668 3.766-0.8584 2.3321 0.01 3.5016 0.2771 3.8437 0.8738 0.6266 1.0927 0.6402 1.7301 0.6402 1.7301h7.9518s0.98 0.063 1.0236 1.4156c0.043 1.3528-1.0236 1.6334-1.0236 1.6334h-25.117s-0.7854-0.5652-0.7854-1.645c0-1.0799 0.7854-1.404 0.7854-1.404zm2.745 4.8785c-1.385 0-2.6186 1.1201-2.5 2.5l2.0039 23.312c0.1186 1.3799 1.3884 2.5 2.7734 2.5h15.84c1.385 0 2.5548-1.1178 2.6426-2.5l1.4824-23.312c0.088-1.3822-1.115-2.5-2.5-2.5zm4.9726 6.8535c0.596 0 1.0762 0.4801 1.0762 1.0762v12.453c0 0.596-0.4802 1.0762-1.0762 1.0762s-1.0762-0.4802-1.0762-1.0762v-12.453c0-0.5961 0.4802-1.0762 1.0762-1.0762zm4.8965 0c0.596 0 1.0762 0.4801 1.0762 1.0762v12.453c0 0.596-0.4802 1.0762-1.0762 1.0762s-1.0762-0.4802-1.0762-1.0762v-12.453c0-0.5961 0.4802-1.0762 1.0762-1.0762zm4.8965 0c0.596 0 1.0762 0.4801 1.0762 1.0762v12.453c0 0.596-0.4802 1.0762-1.0762 1.0762s-1.0742-0.4802-1.0742-1.0762v-12.453c0-0.5961 0.4782-1.0762 1.0742-1.0762z"/><path d="m-9647.7-1143.2c-1.0863 0-1.9452 0.064-2.5997 0.2148-0.6544 0.1505-1.1204 0.3793-1.373 0.752-0.4097 0.6045-0.6049 1.0653-0.6953 1.3847-0.031 0.1078-0.036 0.1765-0.047 0.252h-7.9668a0.24947 0.24947 0 0 0-0.096 0.02s-0.2513 0.1051-0.4824 0.3594c-0.2312 0.2543-0.457 0.673-0.457 1.2734 0 1.2008 0.8886 1.8477 0.8886 1.8477a0.24947 0.24947 0 0 0 0.1465 0.047h25.117a0.24947 0.24947 0 0 0 0.062-0.01s0.3271-0.085 0.6328-0.3652c0.3057-0.2799 0.5998-0.7752 0.5762-1.5176-0.024-0.7363-0.3214-1.1793-0.6289-1.4062-0.3076-0.227-0.627-0.25-0.627-0.25a0.24947 0.24947 0 0 0-0.016 0h-7.748c-0.012-0.09 0-0.105-0.049-0.2715-0.087-0.3164-0.2567-0.7702-0.5801-1.334-0.224-0.3908-0.6773-0.6255-1.3359-0.7754s-1.5473-0.2176-2.7226-0.2226zm0 0.498c1.1567 0 2.0186 0.076 2.6133 0.2109 0.5947 0.1354 0.8976 0.3313 1.0156 0.5372 0.3033 0.5288 0.4552 0.9432 0.5313 1.2187 0.076 0.2755 0.076 0.3926 0.076 0.3926a0.24947 0.24947 0 0 0 0.2481 0.2441h7.9375s0.1699 0.01 0.3633 0.1524c0.1933 0.1427 0.4059 0.4071 0.4257 1.0234 0.019 0.6086-0.1975 0.9326-0.414 1.1309-0.2099 0.1922-0.3976 0.2407-0.4102 0.2441h-24.967c-0.078-0.059-0.6367-0.5004-0.6367-1.3965 0-0.4795 0.1666-0.7597 0.3281-0.9375 0.1493-0.1642 0.262-0.2085 0.2813-0.2168h8.1172a0.24947 0.24947 0 0 0 0.248-0.2793v-0.057c0-0.055 0.018-0.1472 0.055-0.2774 0.074-0.2603 0.2422-0.6725 0.6269-1.2402 0.1387-0.2046 0.4809-0.4104 1.0742-0.5469 0.5934-0.1364 1.4209-0.2072 2.4844-0.2031zm-9.9355 6.9844c-1.5195 0-2.8803 1.2311-2.7481 2.7695l2.0039 23.312c0.1306 1.5198 1.502 2.7285 3.0215 2.7285h15.84c1.5193 0 2.7965-1.2188 2.8926-2.7324l1.4824-23.312c0.098-1.5346-1.2307-2.7656-2.75-2.7656zm0 0.498h19.742c1.2508 0 2.3303 1.0046 2.252 2.2344l-1.4824 23.312c-0.079 1.2508-1.1438 2.2676-2.3946 2.2676h-15.84c-1.2505 0-2.4188-1.0315-2.5254-2.2715l-2.0039-23.312c-0.105-1.2214 1.0014-2.2305 2.252-2.2305zm4.9726 6.3555c-0.73 0-1.3262 0.5942-1.3262 1.3242v12.453c0 0.73 0.5962 1.3262 1.3262 1.3262s1.3262-0.5962 1.3262-1.3262v-12.453c0-0.73-0.5962-1.3242-1.3262-1.3242zm4.8965 0c-0.73 0-1.3262 0.5942-1.3262 1.3242v12.453c0 0.73 0.5962 1.3262 1.3262 1.3262s1.3262-0.5962 1.3262-1.3262v-12.453c0-0.73-0.5962-1.3242-1.3262-1.3242zm4.8965 0c-0.73 0-1.3223 0.5947-1.3223 1.3242v12.453c0 0.7295 0.5923 1.3262 1.3223 1.3262s1.3262-0.5962 1.3261-1.3262v-12.453c0-0.73-0.5962-1.3242-1.3261-1.3242zm-9.793 0.498c0.462 0 0.8262 0.3641 0.8262 0.8262v12.453c0 0.4621-0.3642 0.8282-0.8262 0.8282s-0.8262-0.3661-0.8262-0.8282v-12.453c0-0.4621 0.3642-0.8261 0.8262-0.8262zm4.8965 0c0.462 0 0.8281 0.3641 0.8281 0.8262v12.453c0 0.4621-0.3661 0.8282-0.8281 0.8282s-0.8262-0.3661-0.8262-0.8282v-12.453c0-0.4621 0.3642-0.8262 0.8262-0.8262zm4.8965 0c0.462 0 0.8281 0.3641 0.8281 0.8262v12.453c0 0.4621-0.3661 0.8282-0.8281 0.8282s-0.8242-0.3656-0.8242-0.8282v-12.453c0-0.4627 0.3621-0.8261 0.8242-0.8262z" 
                        /></g></g></svg>
                </i>
            </div>
        </div> -->


    </section>

    <div id="total-produtos" class="total-produtos">
        <p id="totalQtnProdutos">TOTAL - 0</p>
    </div>
    <div class="limpar-lista"><button id="btn-limpar-lista" class="btn-limpar-lista">ZERAR LISTA</button></div>
</section>

<section id="" class="btns-carrinho">
    <button id="finalizar-orcamento" class="btn-carrinho">
        FINALIZAR ORÇAMENTO
    </button>
    <button id="voltar-carrinho" class="btn-carrinho">
        VOLTAR
    </button>
</section>

</section>

    <section id="header-mobile" class="header-mobile">
        
        <div class="icon-logo">
            <a href="../">
                <i title="Logo">
                <svg version="1.1" viewBox="0 0 514.16 314.73" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="matrix(3.3284 0 0 3.3284 -14854 -1506.8)" stroke-linecap="round" stroke-linejoin="round" stroke-width="3.6053" style="paint-order:normal">
                    <path alt="Logo do site, clique para voltar na pagina inicial" transform="translate(976.43,-7.7164)" d="m3540.4 553.19-33.732-0.0426-18.533-23.68 0.03-24.933 39.806 0.0204-14.475 15.52-0.2235 0.22443 10.251 13.077 23.143-26.962-16.234-18.4-18.802-0.025-23.451-25.721 53.76-0.0312 21.638 24.421 21.624-24.421 53.76 0.0312-23.451 25.721-18.802 0.025-16.234 18.4 23.143 26.962 10.251-13.077-0.2236-0.22443-14.475-15.52 39.806-0.0204 0.03 24.933-18.533 23.68-33.732 0.0426-23.158-26.958z" 
                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3.6053"/></g>
                </svg>    
                </i>
            </a>
        </div>
        <i id="exit-menu-mobile" class="btn-sair" title="Sair">
            <svg version="1.1" viewBox="0 0 510.82 510.82" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="translate(6254.9 1860.8)">
            <g transform="translate(37.2 -34.339)" stroke-linecap="round" stroke-linejoin="round">
            <path id="path1" d="m-6116.1-1809.4h158.93c88.05 0 158.93 70.885 158.93 158.93v158.93c0 88.05-70.885 158.93-158.93 158.93h-158.93c-88.05 0-158.93-70.885-158.93-158.93v-158.93c0-88.05 70.885-158.93 158.93-158.93z" stop-color="#000000"/><path id="path2" d="m-5904.5-1652.4c14.297-14.471 13.708-37.365-1.3219-51.136-7.2147-6.6135-16.861-10.196-26.818-9.9583-9.9576 0.2372-19.408 4.2758-26.274 11.226l-76.446 77.671-79.152-77.671c-6.8661-6.9494-16.316-10.987-26.272-11.226-9.9576-0.2373-19.606 3.3445-26.82 9.9583-15.023 13.771-15.613 36.665-1.3219 51.136l80.054 80.992-80.054 81.695c-14.297 14.471-13.708 37.366 1.3219 51.138 15.024 13.772 38.796 13.204 53.093-1.2674l77.792-78.435 77.806 78.435c14.297 14.471 38.067 15.039 53.091 1.2674 15.026-13.771 15.615-36.666 1.3219-51.138l-79.961-80.742z" 
            /></g></g></svg>
        </i>
        <section class="item-header-mobile"><a href="./resultados.php?buscar=categoria&cat=Cárdio">CARDIO</a></section>
        <section class="item-header-mobile"><a href="./resultados.php?buscar=categoria&cat=Musculação">MUSCULAÇÃO</a></section>
        <section class="item-header-mobile"><a href="./resultados.php?buscar=categoria&cat=Acessórios">ACESSÓRIOS</a></section>
        <section class="item-header-mobile"><a href="./sobre.php">SOBRE</a></section>
        <section class="item-header-mobile"><a href="./contato.php">CONTATO</a></section>
    </section>

                                                                <!-- Header -->
    <header id="myHeader">
        <section class="left-header text-left-header">
            <div id="icon-menu" class="icon-menu" title="Menu"><i></i><i></i><i></i></div>

            <section class="item-header" id="categoria-cardio">
                <a href="./resultados.php?buscar=categoria&cat=Cárdio" >CÁRDIO</a>
                <div id="list-cardio" class="list-itens-header">
                    <ul>
                        <li><a href="./resultados.php?buscar=categoria&subcat=Esteira">ESTEIRA</a></li>
                        <li><a href="./resultados.php?buscar=categoria&subcat=Escada">ESCADA</a></li>
                        <li><a href="./resultados.php?buscar=categoria&subcat=Bike">BIKE</a></li>
                    </ul>
                </div>
            </section>

            <section class="item-header" id="categoria-musculacao">
                <a href="./resultados.php?buscar=categoria&cat=Musculação">MUSCULAÇÃO</a>
                <div id="list-musculacao" class="list-itens-header">
                    <ul>
                        <li><a href="./resultados.php?buscar=categoria&subcat=Abdômen">ABDÔMEN</a></li>
                        <li><a href="./resultados.php?buscar=categoria&subcat=Braço">BRAÇO</a></li>
                        <li><a href="./resultados.php?buscar=categoria&subcat=Costas">COSTAS</a></li>
                        <li><a href="./resultados.php?buscar=categoria&subcat=Ombro">OMBRO</a></li>
                        <li><a href="./resultados.php?buscar=categoria&subcat=Peito">PEITO</a></li>
                        <li><a href="./resultados.php?buscar=categoria&subcat=Perna">PERNA</a></li>
                    </ul>
                </div>
            </section>
            <section class="item-header" id="categoria-acessorios">
                <a href="./resultados.php?buscar=categoria&cat=Acessórios">ACESSÓRIOS</a>
                <div id="list-acessorios" class="list-itens-header">
                    <ul>
                        <li><a href="./resultados.php?buscar=categoria&subcat=Utilitários">UTILITÁRIOS</a></li>
                        <li><a href="./resultados.php?buscar=categoria&subcat=Equipamentos">EQUIPAMENTOS</a></li>
                        <li><a href="./resultados.php?buscar=categoria&subcat=Outros">OUTROS</a></li>
                    </ul>
                </div>
            </section>

        </section>

        <div class="icon-logo" id="icon-logo">
            <a href="../"><i title="Logo">
                <svg version="1.1" viewBox="0 0 514.16 314.73" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="matrix(3.3284 0 0 3.3284 -14854 -1506.8)" stroke-linecap="round" stroke-linejoin="round" stroke-width="3.6053" style="paint-order:normal">
                    <path alt="Logo do site, clique para voltar na pagina inicial" transform="translate(976.43,-7.7164)" d="m3540.4 553.19-33.732-0.0426-18.533-23.68 0.03-24.933 39.806 0.0204-14.475 15.52-0.2235 0.22443 10.251 13.077 23.143-26.962-16.234-18.4-18.802-0.025-23.451-25.721 53.76-0.0312 21.638 24.421 21.624-24.421 53.76 0.0312-23.451 25.721-18.802 0.025-16.234 18.4 23.143 26.962 10.251-13.077-0.2236-0.22443-14.475-15.52 39.806-0.0204 0.03 24.933-18.533 23.68-33.732 0.0426-23.158-26.958z" 
                    stroke-linecap="round" stroke-linejoin="round" stroke-width="3.6053"/></g>
                </svg>                  
                    
            </i></a>
        </div>

        <section class="right-header text-right-header">

            <div class="item-header"><a href="./sobre.php">SOBRE</a></div>
            <div class="item-header"><a href="./contato.php">CONTATO</a></div>

            <div class="icons-header">
                <i id="icon-pesquisa" title="Pesquisa">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><path alt="Icone de pesquisa, clique para abrir a barra de pesquisa, ao meio da pagina" d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>                
                </i>
                
                <i id="icon-carrinho" title="Carrinho">
                    <div class="qtd-carrinho">
                        <p id="qtd-carrinho">0</p>
                    </div>
                    <svg version="1.1" viewBox="0 0 492.56 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="translate(4530.3 1880)">
                        <path alt="Icone de carrinho: clique para abrir o carrinho, na direita do pagina" d="m-4283.7-1880c-41.144 0.1497-77.326 11.389-103.09 35.496-18.917 17.701-30.963 41.674-36.064 69.404-49.774 3.8482-85.993 46.425-89.912 94.908l-17.209 212.87c-4.501 55.675 43.695 99.32 97.223 99.32h297.57c53.518 0 101.27-43.642 97.238-99.119l-15.488-212.87c-3.4257-47.082-37.666-88.347-84.861-94.584-5.4251-29.768-19.334-55.043-40.434-72.734-27.307-22.896-64.114-32.84-104.97-32.691zm0.1816 50.049c32.61-0.1186 56.985 7.8757 72.631 20.994 9.9847 8.3717 17.347 19.009 21.451 33.478h-182.26c3.865-13.827 10.414-24.346 19.108-32.48 14.4-13.475 36.75-21.875 69.072-21.992zm-92.564 104.52h189.99c-0.077 4.5539-0.096 4.8075-0.1719 10.074-0.2444 16.835-0.524 33.609-0.1621 42.125a25.025 25.025 0 0 0 26.064 23.939 25.025 25.025 0 0 0 23.94-26.064c-0.1272-2.9929-0.041-22.602 0.2012-39.274 0.063-4.3458 0.078-4.4153 0.1425-8.3242 18.57 6.0527 31.048 23.496 32.729 46.594l15.488 212.87c1.7752 24.398-20.752 45.439-47.32 45.439h-297.57c-26.558 0-49.288-21.088-47.336-45.238l17.209-212.87c2.0144-24.917 15.966-43.312 36.699-48.012l-1.209 49.264a25.025 25.025 0 0 0 24.404 25.631 25.025 25.025 0 0 0 25.631-24.402z"/></g>
                    </svg>
                </i>
                <!-- <button id="login-header" class="login">LOGIN</button> -->
                <div class="header-perfil">
                    <i id="icon-perfil" class="icon-perfil">
                    <svg version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="translate(6840.4 1865.3)">
                        <path alt="Icone de perfil clique para abrir a pagina de perfil" d="m-6584.4-1865.3c-141.25 0-256 114.75-256 256 0 141.25 114.75 256 256 256 141.25 0 256-114.75 256-256 0-141.25-114.75-256-256-256zm0 65.867c105.9 0 190.13 84.23 190.13 190.13 0 105.9-84.23 190.13-190.13 190.13-105.9 0-190.13-84.228-190.13-190.13 0-105.9 84.23-190.13 190.13-190.13zm-5.2896-18.828c-123.58 0-223.07 99.486-223.07 223.06 0 123.58 99.488 223.07 223.07 223.07 123.58 0 223.07-99.488 223.07-223.07 0-123.58-99.488-223.06-223.07-223.06zm21.088 27.528c42.032 0 76.106 34.074 76.106 76.106 0 24.676-11.745 46.611-29.852 60.556 7.5379 2.0285 13.667 6.3513 20.112 10.57 10.753 7.0389 17.893 17.789 23.004 25.101 16.656 5.1082 26.207 15.982 32.226 29.417 4.312 13.023 3.4295 20.415 2.0235 34.924 2.6657 6.8536 6.5894 9.1381 7.9987 25.252 0.9222 10.543-2.6315 23.124-4.9371 31.856-4.0771 15.441-11.682 30.582-13.548 35.361-3.034 7.7691-1.5498 21.238-5.7897 23.647-5.4238 3.0822-31.887 3.9786-33.438 4.1559-2.3603 0.2697-1.7611 3.7718-2.1052 5.109-0.6875 2.6719-3.2004 8.935-8.9007 12.046-5.1687 2.8208-27.149 15.491-60.137 16.751-24.082 0.92-44.089-0.8688-57.52-7.6005-8.6549-4.3382-18.112-12.894-17.965-21.071 0.1238-6.8767 1.4297-15.022-1.4091-21.287-0.6129-1.352-6.7445 2.8969-23.806 8.9894-3.22 1.1489-4.3772 0.3582-5.6978-1.5556-3.8878-6.9014-7.8048-13.478-13.041-31.469 0 0-39.296-7.1563-55.818-25.613-3.1934-11.086-0.7688-25.264 3.9161-38.869-1.3705-12.365 0.5567-20.496 4.8094-30.69 4.865-11.661 14.418-21.447 23.909-33.032 5.3396-12.724 7.5982-26.964 20.266-36.745 12.08-9.3281 28.206-11.984 44.441-11.033 3.7326-1.5399 6.6116-4.806 10.393-6.2203 3.9203-1.4663 9.1507-1.8738 13.312-2.415-15.156-13.957-24.658-33.938-24.658-56.136 0-42.032 34.074-76.106 76.106-76.106zm106.18 192.18-19.924 5.8748-5.337 11.418-10.693-6.6798-19.915 5.8987 11.506 6.9623 6.9691-2.0491 8.0294 5.0392-5.623 12.526-5.2298-3.7236 0.059-0.1073 3.6624-7.3349-14.75 4.3516 2.7196 9.2411 9.4589 6.7445 12.504-3.6794 5.6366-12.526 11.534 7.4524 12.493-3.71 4.2751-10.805-2.7417-9.2343-14.747 4.367 7.0627 4.1645 0.1073 0.059-2.3673 5.9684-11.527-7.4559 3.9993-8.5961 6.964-2.0678z" 
                        stroke-linecap="round" stroke-linejoin="round" stroke-width=".87135"/></g>
                    </svg>
                    </i>

                    <div class="area-list-perfil">
                        <ul class="list-perfil nao-logado" id="nao-logado">
                            <li id="cadastre-se" onclick="abrirSectionCadastro()">CADASTRE-SE</li>
                            <li id="entrar" onclick="abrirSectionLogin()">ENTRAR</li>
                        </ul>
                        <ul class="list-perfil logado" id="logado">
                            <li><a href="./perfil.php" id="header-nome-perfil" title=""><?php echo $usuario['nome']." ".$usuario['sobrenome']?></a></li>
                            <li><a href="../bd/seleTudo.php" id="btnAdm">ADM</a></li>
                            <li onclick="chamarFuncaoPHP()">SAIR</li>
                        </ul>
                    </div>
                </div>
            </div>

        </section>
    </header>

                                                                <!-- Main -->
    <main class="container">

        <section class="section-titulo-main">
            <h2 class="nome-produto">Perfil</h2>
        </section>

        <section class="section-icon-nome">
            <i class="img-perfil">
                <svg width="306" height="306" viewBox="0 0 306 306" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M186.68 116.724C186.68 116.724 191.708 118.019 198.126 121.596M130.145 136.892C130.145 136.892 128.595 133.961 127.194 133.299C125.763 132.623 123.988 133.655 122.446 133.299C118.644 132.421 115.241 130.222 115.241 130.222M137.691 139.617C137.691 139.617 142.901 137.277 145.647 137.435C149.421 137.653 150.971 140.823 154.73 141.232C162.447 142.071 177.698 137.382 177.698 137.382M62.2443 191.403C62.2443 191.403 76.9676 198.843 83.8386 203.007C85.2798 203.881 86.8973 205.027 88.4811 206.226M156.256 238.134C156.256 238.134 159.138 243.495 158.058 246.023C157.556 247.197 153.703 254.574 150.233 257.743C146.468 261.182 141.937 263.808 136.949 264.867C130.77 266.179 128.583 267.9 118.02 263.977C109.705 260.888 109.278 241.242 101.941 236.823C97.1495 233.938 89.9612 234.663 84.3867 236.769C78.8123 238.875 71.1475 243.093 72.7419 246.461C72.5398 247.52 75.7907 265.385 81.8471 269.162C82.5143 271.014 113.156 259.41 113.156 259.41M122.592 115.503C122.592 115.503 121.733 115.226 119.867 115.116M72.3836 244.64L69.1399 244.39C69.1399 244.39 51.7821 239.833 43.9164 235.68C38.9846 233.076 31.3873 229.49 30.488 225.699C28.6192 217.824 33.9358 199.931 33.9358 199.931C33.9358 199.931 32.5098 187.789 37.928 176.704C40.4063 171.634 43.6085 167.205 46.609 163.676M179.623 172.669C179.623 172.669 173.678 188.188 175.855 199.766C176.452 202.938 177.326 205.878 178.347 208.556M245.246 191.783C247.938 197.418 249.996 202.052 249.675 209.72C249.282 219.12 245.108 236.864 240.316 245.68C235.869 253.861 236.839 253.442 235.44 258.512C234.041 263.582 235.09 268.854 233.002 270.958C230.936 273.039 229.27 271.713 219.401 272.755C209.531 273.796 191.533 275.484 177.185 274.294C162.837 273.105 143.946 270.531 134.147 265.559M92.0044 140.774C92.0044 140.774 84.3305 149.591 81.7517 156.834C80.358 160.748 78.4504 171.216 79.3707 180.088C79.3949 180.321 79.4227 180.557 79.4541 180.796M132.66 210.009C132.66 210.009 143.771 213.818 156.263 210.876C163.668 209.132 175.774 199.705 175.774 199.705M211.766 154.247L223.729 163.312L223.911 163.443L218.348 173.794L198.962 157.803L208.5 143.179L218.44 141.348C218.44 141.348 214.341 134.923 211.407 131.96C206.84 127.348 203.637 125.087 203.637 125.087L196.916 126.444L184.8 146.075L176.396 139.363C176.396 139.363 167.328 143.073 162.37 144.683C152.532 147.878 143.72 149.37 143.72 149.37L148.762 153.281L161.868 151.03L175.276 163.429L162.408 185.015L153.684 177.142L153.942 175.419L162.025 164.394L134.285 169.195L137.277 186.572L153.053 200.833L175.472 197.085L175.406 195.474L176.693 195.248L189.59 173.66L208.986 189.645L232.486 185.536L242.537 166.795L242.368 162.904C242.368 162.904 240.236 158.107 238.755 155.983C237.344 153.958 233.613 150.449 233.613 150.449L211.766 154.247ZM96.4584 212.793C96.4584 212.793 119.694 221.136 130.59 224.983C134.53 226.373 139.499 225.558 143.368 227.133C148.731 229.316 156.162 237.996 156.162 237.996L189.118 226.048C189.118 226.048 182.584 219.791 178.362 208.569C178.362 208.569 201.205 194.045 215.038 191.916C229.579 189.679 245.251 191.785 245.251 191.785C244.82 190.757 244.307 189.697 243.78 188.58C243.314 181.33 247.6 171.845 240.274 158.633C235.82 150.599 228.834 146.044 219.914 143.285C215.742 137.832 213.65 133.11 206.826 127.502C203.861 125.066 200.995 123.235 198.112 121.574C198.112 121.574 189.04 134.532 174.015 140.404C151.3 149.28 134.949 153.259 123.122 146.236C107.306 136.846 119.883 115.122 119.883 115.122C118.394 114.937 116.227 115.046 113.358 115.4C103.971 116.557 101.705 121.348 101.705 121.348C101.705 121.348 96.7064 119.67 93.1259 119.932C83.6317 120.627 75.8019 123.308 68.7644 129.719C63.9241 134.128 59.3507 142.279 57.4544 148.546C56.8577 150.518 55.6709 154.705 55.6709 154.705C55.6709 154.705 51.1925 157.955 46.6127 163.649C46.6127 163.649 55.7693 164.778 62.1444 168.459C68.6794 172.232 79.461 180.874 79.461 180.874C80.79 190.965 88.465 206.194 88.465 206.194C92.3745 209.236 96.4584 212.793 96.4584 212.793ZM205.964 273.969C205.964 273.969 205.692 279.193 206.146 281.772C206.675 284.783 209.593 289.144 209.523 292.188C209.523 292.188 187.519 301.954 156.944 302.659C124.321 303.412 103.798 294.48 103.798 294.48C105.148 291.077 107.907 286.405 107.907 279.798C107.907 270.213 104.601 262.623 104.601 262.623L113.052 259.335C113.052 259.335 114.364 261.218 116.652 263.473C116.975 263.466 122.975 266.182 127.335 266.371C129.646 266.472 132.183 266.128 134.231 265.59C143.512 270.278 158.028 271.991 167.757 273.338C185.412 275.937 205.964 273.969 205.964 273.969ZM210.645 71.1749C210.645 101.585 185.992 126.237 155.583 126.237C125.173 126.237 100.52 101.585 100.52 71.1749C100.52 40.765 125.173 16.1128 155.583 16.1128C185.992 16.1128 210.645 40.765 210.645 71.1749Z" 
                    stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M303 153C303 172.698 299.12 192.204 291.582 210.402C284.044 228.601 272.995 245.137 259.066 259.066C245.137 272.995 228.601 284.044 210.403 291.582C192.204 299.12 172.698 303 153 303C133.302 303 113.796 299.12 95.5975 291.582C77.3986 284.044 60.8628 272.995 46.934 259.066C33.0052 245.137 21.9563 228.601 14.4181 210.402C6.87985 192.204 3 172.698 3 153C3 133.302 6.87984 113.796 14.4181 95.5974C21.9563 77.3986 33.0052 60.8627 46.934 46.9339C60.8628 33.0052 77.3987 21.9562 95.5975 14.418C113.796 6.87982 133.302 3 153 3C192.782 3.00001 230.936 18.8035 259.066 46.9339C287.196 75.0644 303 113.217 303 153Z" 
                    stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
            </i>
            <h2 id=""><?php echo $usuario['nome'].' '.$usuario['sobrenome']?></h2>
        </section>

        <section class="main-perfil">
            <div class="menu-informacoes-perfil">
                <h2 id="title-conta-perfil" class="title-selecionado">CONTA</h2>
                <!-- <h2 id="title-carrinho-perfil">CARRINHO</h2> -->
                <h2 id="title-privacidade-perfil">PRIVACIDADE</h2>
                
            </div>
            <section class="area-informacoes-perfil">

                <div class="area-aviso" id="area-aviso">
                    <i id="exit-aviso-editor" class="btn-sair" title="Sair">
                        <svg version="1.1" viewBox="0 0 510.82 510.82" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="translate(6254.9 1860.8)">
                        <g transform="translate(37.2 -34.339)" stroke-linecap="round" stroke-linejoin="round">
                        <path alt="Botão de sair da area de login/cadastro" id="path1" d="m-6116.1-1809.4h158.93c88.05 0 158.93 70.885 158.93 158.93v158.93c0 88.05-70.885 158.93-158.93 158.93h-158.93c-88.05 0-158.93-70.885-158.93-158.93v-158.93c0-88.05 70.885-158.93 158.93-158.93z" stop-color="#000000"/><path id="path2" d="m-5904.5-1652.4c14.297-14.471 13.708-37.365-1.3219-51.136-7.2147-6.6135-16.861-10.196-26.818-9.9583-9.9576 0.2372-19.408 4.2758-26.274 11.226l-76.446 77.671-79.152-77.671c-6.8661-6.9494-16.316-10.987-26.272-11.226-9.9576-0.2373-19.606 3.3445-26.82 9.9583-15.023 13.771-15.613 36.665-1.3219 51.136l80.054 80.992-80.054 81.695c-14.297 14.471-13.708 37.366 1.3219 51.138 15.024 13.772 38.796 13.204 53.093-1.2674l77.792-78.435 77.806 78.435c14.297 14.471 38.067 15.039 53.091 1.2674 15.026-13.771 15.615-36.666 1.3219-51.138l-79.961-80.742z" 
                        /></g></g></svg>
                    </i>
                    <p class="erro">--ERRO--</p>
                    <p class="aviso" id="aviso">Email ou senha incorreta | Sobrenome e telefone não inseridos</p>
                </div>

                <div class="informacao-perfil-conta" id="informacao-perfil-conta">
                    <form action="../bd/EditeUser.php" method="POST" id="formEditor">
                        <label for="informacao-perfil-nome">Nome</label>

                            <input type="text" name="nomeEditor" id="informacao-perfil-nome" class="input-edicao" disabled placeholder="Nome" value="<?php echo $usuario['nome']?>">
                        <label for="informacao-perfil-sobrenome">Sobrenome</label>

                            <input type="text" name="sobrenomeEditor" id="informacao-perfil-sobrenome" class="input-edicao" disabled placeholder="Sobrenome" value="<?php echo $usuario['sobrenome']?>">

                        <label for="informacao-perfil-email">E-mail</label>

                            <input type="email" name="emailEditor" id="informacao-perfil-email" class="input-edicao" disabled placeholder="nome.sobrenome@email.com" value="<?php echo $usuario['email']?>">

                        <label for="input-senha-editar">Senha</label>
                        <div class="senha-editar">
                            <input name="senhaEditor" class="input-senha-editar input-edicao" id="input-senha-editar" type="password" placeholder="xxxxxxxxx" disabled value="<?php echo $usuario['senha']?>">
                            <i class="icon-mostrar-senha-editar" id="icon-mostrar-senha-editar" onclick="mostrarSenhaEditar(this)"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg></i>
                        </div>
                        <label for="informacao-perfil-numero">Telefone</label>

                            <input type="tel" name="telefoneEditor" id="informacao-perfil-numero" class="input-edicao" disabled placeholder="(xx)xxxx-xxxx" value="<?php echo $usuario['telefone']?>">

                        <button type="submit" class="btn-atualizar-perfil" id="btn-atualizar-perfil" onclick="habilitarEdicao()">Editar informações</button>
                    </form>
                </div>

                <!-- <div class="informacao-perfil-carrinho" id="informacao-perfil-carrinho">

                    <div class="area-lista-itens area-lista-itens-sumir" id="area-lista-itens">
                        <div class="lista-itens">
                            <div class="item-lista" id="item-lista">
                                    <div class="qtn-produto">
                                        <i class="menos-mais" title="Subtrair">
                                            <svg version="1.1" viewBox="0 0 530 530" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="translate(8692.3 1870.3)">
                                                <path id="path1" d="m-8504-1572.8v-64.908h153.49v64.908z"/>
                                                <circle id="path2" cx="-8427.3" cy="-1605.3" r="240" stroke-width="40"/></g></svg>                              
                                        </i>
            
                                        <p class="numero-qtn">01</p>
            
                                        <i class="menos-mais" title="Adicionar">
                                            <svg version="1.1" viewBox="0 0 530 530" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="translate(8143 1850.4)">
                                                <path id="path1" d="m-7906.6-1469.9v-88.426h-85.898v-55.5h85.898v-86.075h58.203v86.075h85.898v55.5h-85.898v88.426z" stroke-linecap="round" stroke-linejoin="round"/>
                                                <circle id="path2" cx="-7878" cy="-1585.4" r="240" stroke-width="40"/></g>
                                            </svg>
                                        </i>
                                    </div>
                                    <p class="nome-produto">Leg Press</p>
                                    <i class="excluir-produto" title="Excluir">
                                        <svg version="1.1" viewBox="0 0 512 677.59" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="translate(9240.8 1935.8)"><g transform="matrix(18.669 0 0 18.669 171132 19407)" fill-rule="evenodd">
                                            <path d="m-9660.4-1140.3h8.19s-0.069-0.5733 0.7254-1.7455c0.3913-0.5772 1.6163-0.8668 3.766-0.8584 2.3321 0.01 3.5016 0.2771 3.8437 0.8738 0.6266 1.0927 0.6402 1.7301 0.6402 1.7301h7.9518s0.98 0.063 1.0236 1.4156c0.043 1.3528-1.0236 1.6334-1.0236 1.6334h-25.117s-0.7854-0.5652-0.7854-1.645c0-1.0799 0.7854-1.404 0.7854-1.404zm2.745 4.8785c-1.385 0-2.6186 1.1201-2.5 2.5l2.0039 23.312c0.1186 1.3799 1.3884 2.5 2.7734 2.5h15.84c1.385 0 2.5548-1.1178 2.6426-2.5l1.4824-23.312c0.088-1.3822-1.115-2.5-2.5-2.5zm4.9726 6.8535c0.596 0 1.0762 0.4801 1.0762 1.0762v12.453c0 0.596-0.4802 1.0762-1.0762 1.0762s-1.0762-0.4802-1.0762-1.0762v-12.453c0-0.5961 0.4802-1.0762 1.0762-1.0762zm4.8965 0c0.596 0 1.0762 0.4801 1.0762 1.0762v12.453c0 0.596-0.4802 1.0762-1.0762 1.0762s-1.0762-0.4802-1.0762-1.0762v-12.453c0-0.5961 0.4802-1.0762 1.0762-1.0762zm4.8965 0c0.596 0 1.0762 0.4801 1.0762 1.0762v12.453c0 0.596-0.4802 1.0762-1.0762 1.0762s-1.0742-0.4802-1.0742-1.0762v-12.453c0-0.5961 0.4782-1.0762 1.0742-1.0762z"/><path d="m-9647.7-1143.2c-1.0863 0-1.9452 0.064-2.5997 0.2148-0.6544 0.1505-1.1204 0.3793-1.373 0.752-0.4097 0.6045-0.6049 1.0653-0.6953 1.3847-0.031 0.1078-0.036 0.1765-0.047 0.252h-7.9668a0.24947 0.24947 0 0 0-0.096 0.02s-0.2513 0.1051-0.4824 0.3594c-0.2312 0.2543-0.457 0.673-0.457 1.2734 0 1.2008 0.8886 1.8477 0.8886 1.8477a0.24947 0.24947 0 0 0 0.1465 0.047h25.117a0.24947 0.24947 0 0 0 0.062-0.01s0.3271-0.085 0.6328-0.3652c0.3057-0.2799 0.5998-0.7752 0.5762-1.5176-0.024-0.7363-0.3214-1.1793-0.6289-1.4062-0.3076-0.227-0.627-0.25-0.627-0.25a0.24947 0.24947 0 0 0-0.016 0h-7.748c-0.012-0.09 0-0.105-0.049-0.2715-0.087-0.3164-0.2567-0.7702-0.5801-1.334-0.224-0.3908-0.6773-0.6255-1.3359-0.7754s-1.5473-0.2176-2.7226-0.2226zm0 0.498c1.1567 0 2.0186 0.076 2.6133 0.2109 0.5947 0.1354 0.8976 0.3313 1.0156 0.5372 0.3033 0.5288 0.4552 0.9432 0.5313 1.2187 0.076 0.2755 0.076 0.3926 0.076 0.3926a0.24947 0.24947 0 0 0 0.2481 0.2441h7.9375s0.1699 0.01 0.3633 0.1524c0.1933 0.1427 0.4059 0.4071 0.4257 1.0234 0.019 0.6086-0.1975 0.9326-0.414 1.1309-0.2099 0.1922-0.3976 0.2407-0.4102 0.2441h-24.967c-0.078-0.059-0.6367-0.5004-0.6367-1.3965 0-0.4795 0.1666-0.7597 0.3281-0.9375 0.1493-0.1642 0.262-0.2085 0.2813-0.2168h8.1172a0.24947 0.24947 0 0 0 0.248-0.2793v-0.057c0-0.055 0.018-0.1472 0.055-0.2774 0.074-0.2603 0.2422-0.6725 0.6269-1.2402 0.1387-0.2046 0.4809-0.4104 1.0742-0.5469 0.5934-0.1364 1.4209-0.2072 2.4844-0.2031zm-9.9355 6.9844c-1.5195 0-2.8803 1.2311-2.7481 2.7695l2.0039 23.312c0.1306 1.5198 1.502 2.7285 3.0215 2.7285h15.84c1.5193 0 2.7965-1.2188 2.8926-2.7324l1.4824-23.312c0.098-1.5346-1.2307-2.7656-2.75-2.7656zm0 0.498h19.742c1.2508 0 2.3303 1.0046 2.252 2.2344l-1.4824 23.312c-0.079 1.2508-1.1438 2.2676-2.3946 2.2676h-15.84c-1.2505 0-2.4188-1.0315-2.5254-2.2715l-2.0039-23.312c-0.105-1.2214 1.0014-2.2305 2.252-2.2305zm4.9726 6.3555c-0.73 0-1.3262 0.5942-1.3262 1.3242v12.453c0 0.73 0.5962 1.3262 1.3262 1.3262s1.3262-0.5962 1.3262-1.3262v-12.453c0-0.73-0.5962-1.3242-1.3262-1.3242zm4.8965 0c-0.73 0-1.3262 0.5942-1.3262 1.3242v12.453c0 0.73 0.5962 1.3262 1.3262 1.3262s1.3262-0.5962 1.3262-1.3262v-12.453c0-0.73-0.5962-1.3242-1.3262-1.3242zm4.8965 0c-0.73 0-1.3223 0.5947-1.3223 1.3242v12.453c0 0.7295 0.5923 1.3262 1.3223 1.3262s1.3262-0.5962 1.3261-1.3262v-12.453c0-0.73-0.5962-1.3242-1.3261-1.3242zm-9.793 0.498c0.462 0 0.8262 0.3641 0.8262 0.8262v12.453c0 0.4621-0.3642 0.8282-0.8262 0.8282s-0.8262-0.3661-0.8262-0.8282v-12.453c0-0.4621 0.3642-0.8261 0.8262-0.8262zm4.8965 0c0.462 0 0.8281 0.3641 0.8281 0.8262v12.453c0 0.4621-0.3661 0.8282-0.8281 0.8282s-0.8262-0.3661-0.8262-0.8282v-12.453c0-0.4621 0.3642-0.8262 0.8262-0.8262zm4.8965 0c0.462 0 0.8281 0.3641 0.8281 0.8262v12.453c0 0.4621-0.3661 0.8282-0.8281 0.8282s-0.8242-0.3656-0.8242-0.8282v-12.453c0-0.4627 0.3621-0.8261 0.8242-0.8262z" 
                                            /></g></g></svg>
                                    </i>
                            </div>
                        </div>
    
                        <div id="total-produtos" class="total-produtos">
                            <p>TOTAL - 01</p>
                        </div>
    
                        <div class="limpar-lista"><button id="btn-limpar-lista" class="btn-limpar-lista">ZERAR LISTA</button></div>
    
                    </div>

                </div> -->

                <div class="informacao-perfil-privacidade" id="informacao-perfil-privacidade">
                    <h2>PRIVACIDADE</h2>
                    <p>
                        <strong>Termos de Privacidade e Condições de Uso:</strong>
                        </br>
                        </br>
                        Bem-vindo(a) à X Gain, onde a transparência e a proteção da sua privacidade são nossas prioridades. Ao utilizar nossos serviços, você concorda e aceita os seguintes termos:
                        </br>
                        </br>
                        <b>Privacidade do Usuário:</b>
                        </br>
                        </br>
                        <b>Coleta de Dados:</b>
                        </br>
                        A X Gain coleta informações estritamente necessárias para a prestação de serviços, respeitando os mais altos padrões de segurança.
                        Uso de Informações:
                        Suas informações são utilizadas exclusivamente para personalizar sua experiência, melhorar nossos serviços e garantir a segurança de suas transações.
                        Compartilhamento de Dados:
                        A X Gain não vende, aluga ou compartilha suas informações com terceiros sem seu consentimento explícito, exceto quando exigido por lei.
                        Segurança:
                        Empregamos medidas rigorosas para proteger suas informações contra acesso não autorizado, alteração, divulgação ou destruição.
                        </br>
                        </br>
                        <b>Termos da Empresa X Gain:</b>
                        </br>
                    </br>
                        <b>Responsabilidade:</b>
                    </br>
                        A X Gain não se responsabiliza por perdas financeiras ou danos resultantes de decisões baseadas em nossas análises, sendo essas de responsabilidade exclusiva do usuário.
                        Mudanças nos Serviços:
                        Reservamo-nos o direito de modificar ou encerrar qualquer serviço sem aviso prévio. Continuaremos a envidar esforços para notificar os usuários sobre alterações significativas.
                        Disponibilidade do Serviço:
                        </br>
                    </br>
                        Embora nos esforcemos para oferecer serviços ininterruptos, não garantimos que o acesso será livre de interrupções.
                        Atualizações nos Termos:
                        Os termos de privacidade e condições de uso podem ser atualizados periodicamente. Recomendamos que os usuários revejam regularmente para estar cientes de quaisquer alterações.
                        Ao continuar a utilizar os serviços da X Gain, você concorda integralmente com estes termos. Se tiver dúvidas ou preocupações, entre em contato conosco.
                    </br></br>
                        Obrigado por escolher a X Gain, onde sua privacidade e confiança são fundamentais.
                    </p>
                </div>

            </section>
        </section>

    </main>

                                                                <!-- Footer -->
    <footer>
        <section class="start-footer container">
            <section class="sobre-footer">
                <h2>SOBRE:</h2>
                <p>A X-Gain é uma empresa fictícia inovadora e autônoma, criada para fins ilustrativos, que surge no cenário comercial com a determinação de competir com grandes marcas consolidadas. Fundada por um grupo fictício de três visionários estudantes, nossa narrativa busca apresentar o propósito de fornecer equipamentos fictícios de alta qualidade com um excelente custo-benefício, ajudando nossos clientes fictícios a alcançar o sucesso em seus negócios imaginários.
                </p>
            </section>
            <section class="media-contato-footer">
                <div class="contato-footer">
                    <h2>CONTATO:</h2>
                    <div class="fone-footer" title="Telefone">
                        <i >
                            <svg version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="translate(2819.4 1892.8)">
                                <path alt="icone de telefone para contato" d="m-2649.4-1892.8c-94.224 0-170.08 75.855-170.08 170.08v171.84c0 94.224 75.854 170.08 170.08 170.08h171.84c94.224 0 170.08-75.857 170.08-170.08v-171.84c0-94.224-75.855-170.08-170.08-170.08zm88.762 96c86.659 0 157.16 69.978 157.16 155.99 0 86.005-70.5 155.98-157.16 155.97-25.99 0-51.672-6.4086-74.394-18.549l-83.033 26.387c-0.4135 0.1319-0.837 0.1953-1.2578 0.1953-1.0982 0-2.1741-0.4367-2.9668-1.2461-1.0982-1.1179-1.4716-2.7595-0.9688-4.2441l26.994-79.631c-14.104-23.834-21.549-51.066-21.549-78.887 0-86.015 70.508-155.99 157.17-155.99zm0 32.494c-68.646 0-124.49 55.401-124.49 123.5 0 26.174 8.1957 51.204 23.701 72.391 0.8 1.093 1.0163 2.5089 0.582 3.791l-13.428 39.613 41.596-13.221c0.4125-0.1309 0.837-0.1953 1.2598-0.1953 0.8 0 1.5946 0.2298 2.2793 0.6797 20.362 13.361 44.048 20.424 68.504 20.424 68.639 0 124.48-55.394 124.48-123.48 0-68.097-55.843-123.5-124.48-123.5zm-42.539 50.256c4.6244 0 7.9522 2.807 10.471 8.834 1.0472 2.4977 10.898 26.272 11.449 27.375 0.6722 1.3185 2.7517 5.3999 0.3164 10.238l-0.5234 1.0508c-0.9974 2.0218-1.8567 3.7673-3.7891 6.0156-0.6203 0.7169-1.2522 1.4788-1.8828 2.2383-1.332 1.6031-2.7079 3.2584-3.9785 4.5156-0.4343 0.4353-1.2762 1.2796-1.3672 1.6152 0 0 0.019 0.2881 0.3906 0.9219 2.6047 4.4083 21.6 30.549 46.625 41.42 1.093 0.4748 4.7034 1.9609 4.9122 1.9609 0.2328 0 0.6215-0.3877 0.9062-0.7128 2.1797-2.4634 9.2341-10.71 11.564-14.174 2.0613-3.0836 4.7072-4.6523 7.8574-4.6523 1.9283 0 3.7412 0.5934 5.4336 1.2012 4.1455 1.4919 27.474 12.978 28.098 13.277 3.0556 1.467 5.4687 2.6254 6.8692 4.9277 2.0447 3.386 1.2353 12.717-1.8379 21.256-3.9013 10.842-21.053 19.73-28.857 20.422l-1.1446 0.1074c-1.8047 0.1777-3.8503 0.3789-6.4062 0.3789v0c-6.0821 0-16.781-1.044-39.373-10.068-23.467-9.3745-46.616-29.471-65.186-56.59-0.321-0.4696-0.5415-0.798-0.6621-0.959-4.8488-6.3906-16.143-23.194-16.143-40.99 0-19.774 9.4658-31.016 15.061-34.543 5.2759-3.3257 17.207-4.8972 19.398-4.9902 1.7995-0.076 1.3717-0.076 1.8008-0.076z" 
                                stop-color="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></g></svg>
                        </i>
                        <p>(18)9838-1596</p>
                    </div>
                    <div class="email-footer" title="E-mail">
                        <a href="mailto:contato.xgain@gmail.com" target="_blank">
                            <i>
                                <svg version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="translate(3936 1869.9)">
                                    <path alt="icone de email para contato, clique para abrir seu aplicativo de emails" d="m-3765.9-1869.9c-94.224 0-170.08 75.856-170.08 170.08v171.84c0 94.224 75.855 170.08 170.08 170.08h171.84c94.224 0 170.08-75.855 170.08-170.08v-171.84c0-94.224-75.857-170.08-170.08-170.08zm-20.385 135.77h212.62c34.746 0 63.189 28.444 63.189 63.19v114.08c0 34.746-28.443 63.19-63.189 63.19h-212.62c-34.746 0-63.191-28.444-63.191-63.19v-114.08c0-34.746 28.445-63.19 63.191-63.19zm0 30.236c-12.357 0-22.778 6.5044-28.424 16.283 9.9501 6.9926 31.862 22.301 60.203 40.846 17.939 11.738 36.563 23.457 51.744 32.047 7.5905 4.2952 14.346 7.8092 19.432 10.074 2.5027 1.1147 4.8111 1.7857 6.25 2.1953 1.2459-0.3543 3.236-0.8785 5.334-1.916 4.5709-2.2606 10.84-5.7853 17.975-10.078 14.27-8.5855 32.128-20.269 49.469-31.969 27.796-18.754 49.714-34.32 59.141-41.043-5.6232-9.8652-16.086-16.44-28.508-16.44zm-32.955 49.982v97.047c0 10.211 4.4869 19.068 11.529 25.061l68.904-69.232c-10.587-6.4995-21.451-13.357-32.254-20.426-18.052-11.812-35.28-23.547-48.18-32.449zm278.52 0.3613c-12.579 8.8426-29.302 20.481-46.676 32.203-11.691 7.8877-23.284 15.448-34.406 22.523l68.006 68.289c7.9522-5.9548 13.076-15.382 13.076-26.33zm-171.14 68.301-61.045 61.338h183.04l-58.617-58.861c-3.2812 1.8378-6.9959 4.0974-9.8555 5.5117-5.849 2.8926-8.8173 5.6153-17.938 5.6153-8.1008 0-12.81-2.4632-19.352-5.377-4.9083-2.1862-10.429-5.0629-16.23-8.2265z" 
                                    stop-color="#000000"/></g></svg>
                            </i>
                            <p>contato.xgain@gmail.com</p>
                        </a>
                    </div>
                </div>
                <div class="redes-footer">
                    <h2>REDES SOCIAIS:</h2>
                    <a href="https://www.instagram.com/xgain_oficial/" target="_blank" rel="noopener noreferrer"><i title="Instagram">
                        <svg version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="translate(3381.7 1878.5)">
                            <path alt=Icone do instagram, clique para acessar nosso perfil do instagram" d="m-3211.7-1878.5c-94.224 0-170.08 75.857-170.08 170.08v171.84c0 94.224 75.857 170.08 170.08 170.08h171.84c94.224 0 170.08-75.855 170.08-170.08v-171.84c0-94.224-75.855-170.08-170.08-170.08zm85.92 96c43.454 0 48.904 0.1842 65.969 0.9629 17.031 0.7774 28.66 3.482 38.838 7.4375 10.521 4.0889 19.445 9.5602 28.34 18.455 8.895 8.8949 14.364 17.818 18.453 28.34 3.9556 10.178 6.6599 21.807 7.4375 38.838 0.7787 17.065 0.9629 22.513 0.9629 65.967 0 43.454-0.1842 48.904-0.9629 65.969-0.7776 17.031-3.4819 28.66-7.4375 38.838-4.0888 10.521-9.5581 19.445-18.453 28.34-8.8947 8.8948-17.818 14.366-28.34 18.455-10.178 3.9555-21.807 6.6602-38.838 7.4375-17.065 0.7787-22.515 0.9609-65.969 0.9609-43.454 0-48.901-0.1822-65.967-0.9609-17.031-0.7773-28.662-3.482-38.84-7.4375-10.522-4.0889-19.443-9.5603-28.338-18.455-8.8949-8.8949-14.366-17.819-18.455-28.34-3.9554-10.178-6.6601-21.807-7.4375-38.838-0.7785-17.065-0.9629-22.515-0.9629-65.969 0-43.454 0.1844-48.902 0.9629-65.967 0.7774-17.031 3.4821-28.66 7.4375-38.838 4.0889-10.521 9.5602-19.445 18.455-28.34 8.895-8.8949 17.816-14.366 28.338-18.455 10.178-3.9555 21.809-6.6601 38.84-7.4375 17.066-0.7787 22.513-0.9629 65.967-0.9629zm0 28.83c-42.722 0-47.782 0.162-64.654 0.9317-15.599 0.712-24.071 3.3192-29.709 5.5097-7.4683 2.9025-12.798 6.3702-18.396 11.969-5.5986 5.5985-9.0667 10.929-11.969 18.396-2.1911 5.6386-4.798 14.111-5.5098 29.711-0.7697 16.871-0.9316 21.93-0.9316 64.652 0 42.722 0.1619 47.782 0.9316 64.654 0.7118 15.599 3.3187 24.072 5.5098 29.711 2.902 7.4678 6.3701 12.798 11.969 18.396 5.5985 5.5986 10.928 9.0669 18.396 11.969 5.6381 2.1912 14.111 4.7978 29.711 5.5098 16.869 0.7698 21.928 0.9316 64.652 0.9316s47.786-0.1618 64.654-0.9316c15.6-0.712 24.07-3.3186 29.709-5.5098 7.4678-2.9018 12.8-6.3701 18.398-11.969 5.5986-5.5985 9.0649-10.929 11.967-18.396 2.1913-5.6386 4.7978-14.111 5.5098-29.711 0.7698-16.871 0.9336-21.932 0.9336-64.654 0-42.722-0.1639-47.78-0.9336-64.652-0.712-15.599-3.3185-24.072-5.5098-29.711-2.9019-7.4678-6.3682-12.798-11.967-18.396-5.5987-5.5986-10.931-9.0663-18.398-11.969-5.6385-2.1905-14.109-4.7977-29.709-5.5097-16.872-0.7698-21.932-0.9317-64.654-0.9317zm85.408 26.562c10.604 0 19.201 8.5952 19.201 19.199s-8.5972 19.201-19.201 19.201c-10.604 0-19.199-8.5972-19.199-19.201s8.5953-19.199 19.199-19.199zm-85.408 22.445c45.377 0 82.162 36.785 82.162 82.162 0 45.377-36.785 82.164-82.162 82.164-45.377 0-82.162-36.787-82.162-82.164 0-45.377 36.785-82.162 82.162-82.162zm0 28.83c-29.455 0-53.334 23.877-53.334 53.332 0 29.455 23.879 53.334 53.334 53.334 29.455 0 53.334-23.879 53.334-53.334 0-29.455-23.879-53.332-53.334-53.332z" 
                            stop-color="#000000"/></g></svg>
                    </i></a>

                    <a href="https://www.facebook.com" target="_blank" rel="noopener noreferrer"><i title="Facebook">
                        <svg version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="translate(1154.4 1890.9)">
                            <path alt="Icone do facebook, nem adianta clicar porque é só enfeite" d="m-984.33-1890.9c-94.224 0-170.08 75.855-170.08 170.08v171.84c0 94.224 75.854 170.08 170.08 170.08h171.84c94.224 0 170.08-75.855 170.08-170.08v-171.84c0-94.224-75.855-170.08-170.08-170.08zm122.69 106c13.722-0.039 27.425 0.6667 41.068 2.0605v47.703h-28.033c-22.183 0-26.502 10.482-26.502 25.951v34.06h53.004l-6.8906 53.494h-46.426v136.73h-54.83v-136.65h-45.994v-53.494h45.994v-39.359c0-45.622 27.895-70.494 68.609-70.494z" 
                            stop-color="#000000"/></g></svg>
                    </i></a>

                    <a href="https://www.linkedin.com" target="_blank" rel="noopener noreferrer"><i title="Linkedin">
                        <svg version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="translate(1712.9 1899)">
                            <path alt="Icone do linkedin, nem adianta clicar porque é só enfeite" d="m-1542.8-1899c-94.224 0-170.08 75.854-170.08 170.08v171.84c0 94.224 75.855 170.08 170.08 170.08h171.84c94.224 0 170.08-75.855 170.08-170.08v-171.84c0-94.224-75.855-170.08-170.08-170.08zm-31.936 111.36c19.286 0 31.393 11.463 32.143 26.463 0 15-12 27.107-32.143 27.107-19.286 0-32.143-12.108-32.143-27.107 0-15 12.857-26.463 32.143-26.463zm-32.143 85.713h64.285v203.57h-64.285zm96.428 0h64.287v27.43s20.679-27.43 62.25-27.43c42.536 0 77.035 29.25 77.035 88.5v115.07h-64.285v-107.14c0-21.429-10.714-42.857-37.5-43.285h-0.8574c-25.929 0-36.643 22.071-36.643 43.285v107.14h-64.287z" 
                            stop-color="#000000"/></g></svg>
                            
                    </i></a>
                    <a href="https://twitter.com/Xgain_oficial" target="_blank" rel="noopener noreferrer"><i title="Twitter">
                        <svg version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="translate(2276.1 1886.3)">
                            <path alt="Icone do twitter, clique para acessar nosso perfil no twitter " d="m-2106-1886.3c-94.224 0-170.08 75.855-170.08 170.08v171.84c0 94.224 75.855 170.08 170.08 170.08h171.84c94.224 0 170.08-75.855 170.08-170.08v-171.84c0-94.224-75.855-170.08-170.08-170.08zm-64.078 120.41h94.914l65.516 86.637 75.814-86.637h46.024l-100.52 114.86 118.25 156.32h-92.568l-72.557-94.785-82.92 94.785h-46.088l107.5-122.88zm53.65 26.076 166.43 217.6h25.488l-164.54-217.6z" 
                            stop-color="#000000"/></g></svg>
                    </i></a>
                </div>
            </section>
        </section>

        <section class="end-footer container">
            <a href="#topo"><i id="icon-logo-footer" title="Logo, clique para subir para o topo da pagina"><svg version="1.1" viewBox="0 0 514.16 314.73" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="matrix(3.3284 0 0 3.3284 -14854 -1506.8)">
                <path alt="logo do site, clique para subir até o topo da página" transform="translate(976.43,-7.7164)" d="m3540.4 553.19-33.732-0.0426-18.533-23.68 0.03-24.933 39.806 0.0204-14.475 15.52-0.2235 0.22443 10.251 13.077 23.143-26.962-16.234-18.4-18.802-0.025-23.451-25.721 53.76-0.0312 21.638 24.421 21.624-24.421 53.76 0.0312-23.451 25.721-18.802 0.025-16.234 18.4 23.143 26.962 10.251-13.077-0.2236-0.22443-14.475-15.52 39.806-0.0204 0.03 24.933-18.533 23.68-33.732 0.0426-23.158-26.958z" stroke-linecap="round" stroke-linejoin="round" stroke-width="3.6053" style="font-variation-settings:'wght' 400;paint-order:normal"/></g></svg>
            </i></a
            <p>© 2023 X GAIN | CNPJ - 01. 010. 101/0101-01</p>
            <p>X Gain empresa fictícia criada em um projeto de TCC</p>
        </section>
    </footer>

                                                                <!-- Scripts -->
<script src="../Js/header.js" defer></script>
<script src="../Js/header/carrinho.js" defer></script>
<script src="../Js/header/barra-pesquisa.js" defer></script>
<script src="../Js/header/login-cadastro.js" defer></script>
<script src="../Js/loading.js" defer></script>
<script src="../Js/main.js" defer></script>
<script src="../Js/main-perfil.js" defer></script>

<!-- Trosso do Adm -->
<?php include_once("../bd/admJonas.php")?>
<script>
         function chamarFuncaoPHP() {
        $.ajax({
            type: 'POST',
            url: '../bd/funcao.php',
            data: {acao: 'sair'},
            success: function(response) {
                // Tratar a resposta, se necessário
                window.location.href = '../index.php';
            },
            error: function(xhr, status, error) {
                // Lidar com erros, se necessário
                console.error(error);
            }
        });
        
    }
</script>
</body>
</html>