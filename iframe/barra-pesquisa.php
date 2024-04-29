<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="../imgs/logo/Favicon.svg" type="image/x-icon">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap" rel="stylesheet">

    <title>Barra de pesquisa</title>

    <!-- <link rel="stylesheet" href="./css/icons.css"> -->
    <link rel="stylesheet" href="../css/loading.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/pesquisa.css">

    <!-- Media Queries -->
    <link rel="stylesheet" href="../css/media-query/pesquisa-media.css">    
    
</head>
<body id="body" style="background-color: transparent;">

    <section id="" class="section-pesquisa container">

    <div class="area-pesquisa">
        <i id="exit-pesquisa-section" class="btn-sair" title="Sair" onclick="parent.fecharBarraDePesquisa()">
            <svg version="1.1" viewBox="0 0 510.82 510.82" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="translate(6254.9 1860.8)">
            <g transform="translate(37.2 -34.339)" stroke-linecap="round" stroke-linejoin="round">
            <path id="path1" d="m-6116.1-1809.4h158.93c88.05 0 158.93 70.885 158.93 158.93v158.93c0 88.05-70.885 158.93-158.93 158.93h-158.93c-88.05 0-158.93-70.885-158.93-158.93v-158.93c0-88.05 70.885-158.93 158.93-158.93z" stop-color="#000000"/><path id="path2" d="m-5904.5-1652.4c14.297-14.471 13.708-37.365-1.3219-51.136-7.2147-6.6135-16.861-10.196-26.818-9.9583-9.9576 0.2372-19.408 4.2758-26.274 11.226l-76.446 77.671-79.152-77.671c-6.8661-6.9494-16.316-10.987-26.272-11.226-9.9576-0.2373-19.606 3.3445-26.82 9.9583-15.023 13.771-15.613 36.665-1.3219 51.136l80.054 80.992-80.054 81.695c-14.297 14.471-13.708 37.366 1.3219 51.138 15.024 13.772 38.796 13.204 53.093-1.2674l77.792-78.435 77.806 78.435c14.297 14.471 38.067 15.039 53.091 1.2674 15.026-13.771 15.615-36.666 1.3219-51.138l-79.961-80.742z" 
            /></g></g></svg>
        </i>
        <div class="barra-pesquisa" title="">
            <form action="">
                <input type="search" placeholder="Pesquise..." id="searchbar" oninput="itemPesquisado()">
                <button type="submit" onclick="pesquisar()"><!-- botao onde será execultado a pesquisa e enviado o usuario até a pagina de resultados da pesquisa -->
                    <i title="Pesquisar">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
                    </i>
                </button>
            </form>
        </div>

        <section id="resultado-pesquisa" class="resultado-pesquisa">
            <!-- Dentro de espaço apararecera o resultado da pesquisa -->
            <!-- <div class="item-resultado" id="item-resultado" onclick="pesquisarItem()">
                <p id="resultadoItem">Exemplo de produto pesquisado</p>
            </div> -->
        </section>

    </div>
    <!-- <div class="fundo"></div> -->

    </section>

    <script src="../Js/header/barra-pesquisa.js"></script>
    <!-- <script src="../Js/loading.js" defer></script> -->
    <script src="../Js/main.js" defer></script>
</body>
</html>