<?php session_start();?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../imgs/logo/Favicon.svg" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap" rel="stylesheet">

    <title>Section img3D</title>

    <link rel="stylesheet" href="../css/loading.css">
    <link rel="stylesheet" href="../css/main-produto.css">

    <!-- Media Queries -->

    <link rel="stylesheet" href="../css/media-query/main-produto.css">

    <?php
        echo "<script>let produtoSele ='".$_SESSION['ProdSele']."';</script>";
    ?>
</head>
<body style="background-color: transparent;">
    <section class="section-img3d" id='section-img3d' style='display: flex;'>
            
        <div class="area-img3d" id='area-img3d'>
            <div class="load-3d" id="load-3d">
                <i class="load-icon" title="Carregando">
                    <svg version="1.1" viewBox="0 0 514.16 314.73" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="matrix(3.3284 0 0 3.3284 -14854 -1506.8)" stroke-linecap="round" stroke-linejoin="round" stroke-width="3.6053">
                        <path transform="translate(976.43,-7.7164)" d="m3540.4 553.19-33.732-0.0426-18.533-23.68 0.03-24.933 39.806 0.0204-14.475 15.52-0.2235 0.22443 10.251 13.077 23.143-26.962-16.234-18.4-18.802-0.025-23.451-25.721 53.76-0.0312 21.638 24.421 21.624-24.421 53.76 0.0312-23.451 25.721-18.802 0.025-16.234 18.4 23.143 26.962 10.251-13.077-0.2236-0.22443-14.475-15.52 39.806-0.0204 0.03 24.933-18.533 23.68-33.732 0.0426-23.158-26.958z" stroke-linecap="round" stroke-linejoin="round" stroke-width="3.6053"/></g></svg>                
                </i>
            </div>
            <i id="exit-img3d-section" class="btn-sair-img3d" title="Sair" onclick="parent.fechar3D()">
                <svg version="1.1" viewBox="0 0 510.82 510.82" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="translate(6254.9 1860.8)">
                <g transform="translate(37.2 -34.339)" stroke-linecap="round" stroke-linejoin="round">
                <path id="path1" d="m-6116.1-1809.4h158.93c88.05 0 158.93 70.885 158.93 158.93v158.93c0 88.05-70.885 158.93-158.93 158.93h-158.93c-88.05 0-158.93-70.885-158.93-158.93v-158.93c0-88.05 70.885-158.93 158.93-158.93z" stop-color="#000000"/><path id="path2" d="m-5904.5-1652.4c14.297-14.471 13.708-37.365-1.3219-51.136-7.2147-6.6135-16.861-10.196-26.818-9.9583-9.9576 0.2372-19.408 4.2758-26.274 11.226l-76.446 77.671-79.152-77.671c-6.8661-6.9494-16.316-10.987-26.272-11.226-9.9576-0.2373-19.606 3.3445-26.82 9.9583-15.023 13.771-15.613 36.665-1.3219 51.136l80.054 80.992-80.054 81.695c-14.297 14.471-13.708 37.366 1.3219 51.138 15.024 13.772 38.796 13.204 53.093-1.2674l77.792-78.435 77.806 78.435c14.297 14.471 38.067 15.039 53.091 1.2674 15.026-13.771 15.615-36.666 1.3219-51.138l-79.961-80.742z" 
                /></g></g></svg>
            </i>
            <div class="img3d" id="img3d">
                <canvas width="1000" height="1000" id="canvas3d" class="canvas3d" ></canvas>
                <!-- <script>
                    let img3d = document.getElementById('img3d');
                    let canvas3d = document.getElementById('canvas3d');
                    canvas3d.width = window.innerWidth;
                    canvas3d.height = window.innerHeight;
                    console.log(window.innerWidth, window.innerHeight);
                    document.getElementById('body').innerWidth;
                    

                    
                    console.log(document.getElementById('body').innerWidth;)
                </script> -->

                <script type="module" src="../threejs/main.js"></script>
                
            </div>
            
        </div>
        
    </section>
    

    <!-- <script src="../Js/loading.js" defer></script> -->
    <!-- <script src="../Js/main.js" defer></script> -->
    <script src="../Js/main-produto.js" defer></script>

    <script>
    const load3D = document.getElementById('load-3d');

        // function preLoading3D(){
        //     load3D.style.opacity = '1';

        //     setTimeout(() => {
        //         load3D.style.display = 'none';
        //     }, 1500);
        // }


    //     document.getElementById('area-img3d').addEventListener('keydown', (a)=>{
    // if(a.key == 'Escape'){
    //     parent.document.getElementById('section-img3d').style.display = "none";
    //     parent.document.getElementById('body').style.overflow = 'auto';
    // }
})
    </script>
</body>
</html>