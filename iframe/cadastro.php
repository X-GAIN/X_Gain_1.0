

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../css/login-cadastro.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/media-query/login-cadastro-media.css">
    <link rel="stylesheet" href="../css/loading.css">
</head>
<body>

    
    
    <section class="forms-login-cadastro">
        <div class="area-aviso" id="area-aviso">
            <i id="exit-aviso-section" class="btn-sair" title="Sair">
                <svg version="1.1" viewBox="0 0 510.82 510.82" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="translate(6254.9 1860.8)">
                <g transform="translate(37.2 -34.339)" stroke-linecap="round" stroke-linejoin="round">
                <path alt="Botão de sair da area de login/cadastro" id="path1" d="m-6116.1-1809.4h158.93c88.05 0 158.93 70.885 158.93 158.93v158.93c0 88.05-70.885 158.93-158.93 158.93h-158.93c-88.05 0-158.93-70.885-158.93-158.93v-158.93c0-88.05 70.885-158.93 158.93-158.93z" stop-color="#000000"/><path id="path2" d="m-5904.5-1652.4c14.297-14.471 13.708-37.365-1.3219-51.136-7.2147-6.6135-16.861-10.196-26.818-9.9583-9.9576 0.2372-19.408 4.2758-26.274 11.226l-76.446 77.671-79.152-77.671c-6.8661-6.9494-16.316-10.987-26.272-11.226-9.9576-0.2373-19.606 3.3445-26.82 9.9583-15.023 13.771-15.613 36.665-1.3219 51.136l80.054 80.992-80.054 81.695c-14.297 14.471-13.708 37.366 1.3219 51.138 15.024 13.772 38.796 13.204 53.093-1.2674l77.792-78.435 77.806 78.435c14.297 14.471 38.067 15.039 53.091 1.2674 15.026-13.771 15.615-36.666 1.3219-51.138l-79.961-80.742z" 
                /></g></g></svg>
            </i>
            <p class="erro">--ERRO--</p>
            <p class="aviso" id="aviso">Email ou senha incorreta | Sobrenome e telefone não inseridos</p>
        </div>
        <section class="section-forms"> 
            <!-- btn sair -->
            <i id="exit-login-section" class="btn-sair" title="Sair" onclick="parent.fecharTudo()">
                <svg version="1.1" viewBox="0 0 510.82 510.82" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="translate(6254.9 1860.8)">
                <g transform="translate(37.2 -34.339)" stroke-linecap="round" stroke-linejoin="round">
                <path alt="Botão de sair da area de login/cadastro" id="path1" d="m-6116.1-1809.4h158.93c88.05 0 158.93 70.885 158.93 158.93v158.93c0 88.05-70.885 158.93-158.93 158.93h-158.93c-88.05 0-158.93-70.885-158.93-158.93v-158.93c0-88.05 70.885-158.93 158.93-158.93z" stop-color="#000000"/><path id="path2" d="m-5904.5-1652.4c14.297-14.471 13.708-37.365-1.3219-51.136-7.2147-6.6135-16.861-10.196-26.818-9.9583-9.9576 0.2372-19.408 4.2758-26.274 11.226l-76.446 77.671-79.152-77.671c-6.8661-6.9494-16.316-10.987-26.272-11.226-9.9576-0.2373-19.606 3.3445-26.82 9.9583-15.023 13.771-15.613 36.665-1.3219 51.136l80.054 80.992-80.054 81.695c-14.297 14.471-13.708 37.366 1.3219 51.138 15.024 13.772 38.796 13.204 53.093-1.2674l77.792-78.435 77.806 78.435c14.297 14.471 38.067 15.039 53.091 1.2674 15.026-13.771 15.615-36.666 1.3219-51.138l-79.961-80.742z" 
                /></g></g></svg>
            </i>
            
            <i class="logo-horizontal-vertical" title="Logo">
            <svg version="1.1" viewBox="0 0 455.92 90.954" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="translate(-2277.3 -454.52)"><g transform="matrix(1.428 0 0 1.428 533.94 -220.78)" 
                stroke-linecap="round" stroke-linejoin="round" stroke-width="2.3584">
                <g aria-label="Logo"><path d="m1439.4 524.32q0 2.0532-0.521 3.6773-0.521 1.6548-1.379 2.8806-0.8581 1.2564-1.9919 2.1145-1.1339 0.88869-2.3903 1.4403-1.2258 0.5516-2.5128 0.79675-1.2565 0.2758-2.3903 0.2758h-14.372v-7.9676h14.372q1.6242 0 2.4209-0.82741 0.7968-0.8274 0.7968-2.3903v-25.159q0-1.5629-0.7968-2.3596-0.7967-0.8274-2.4209-0.8274h-14.372q-1.4709 0-2.329 0.91934-0.858 0.88869-0.858 2.2677v10.787q0 1.5629 0.8274 2.3903t2.4209 0.8274h14.311v7.9676h-14.372q-1.1338 0-2.3903-0.24516-1.2564-0.2758-2.5128-0.8274-1.2258-0.5516-2.3596-1.4096-1.1339-0.88869-1.9919-2.1145-0.8581-1.2564-1.379-2.8806-0.521-1.6548-0.521-3.708v-10.787q0-1.1338 0.2452-2.3903 0.2758-1.2564 0.8274-2.4822 0.5516-1.2564 1.4096-2.3903 0.8887-1.1338 2.1145-1.9919 1.2564-0.85804 2.8806-1.379 1.6241-0.52096 3.6773-0.52096h14.372q1.1338 0 2.3903 0.2758 1.287 0.24516 2.5128 0.79676 1.2564 0.5516 2.3903 1.4403 1.1338 0.85805 1.9919 2.1145 0.858 1.2258 1.379 2.8499t0.521 3.6773z"/><path d="m1480.9 510.16q0 1.6548-0.5822 3.5854-0.5822 1.9-1.9 3.5548-1.287 1.6242-3.4015 2.7274-2.0838 1.1032-5.087 1.1032h-14.372q-1.6548 0-3.5854-0.58225-1.9-0.58224-3.5548-1.8693-1.6241-1.3177-2.7273-3.4016-1.1032-2.1145-1.1032-5.1176 0-1.6548 0.5822-3.5854 0.5823-1.9306 1.8693-3.5548 1.3178-1.6548 3.4016-2.758 2.1145-1.1032 5.1176-1.1032h14.372v7.5998h-14.372q-1.6241 0-2.5128 1.0113-0.8887 0.98063-0.8887 2.4516 0 1.5629 1.0112 2.4516 1.042 0.85805 2.4516 0.85805h14.311q1.6242 0 2.5129-0.98063 0.8886-0.98062 0.8886-2.4516v-11.124q0-1.5629-0.9806-2.4822-0.95-0.91934-2.4209-0.91934h-17.498v-7.5692h17.498q1.6548 0 3.5548 0.58225 1.9306 0.58224 3.5547 1.9 1.6548 1.2871 2.758 3.4015 1.1032 2.0838 1.1032 5.087z"/><path d="m1495.8 481.2h-7.9676v-7.2015h7.9676zm0 39.93h-7.9676v-33.127h7.9676z"/><path d="m1540.1 521.13h-7.9676v-18.387q0-1.5629-0.5516-2.7886-0.5209-1.2564-1.4403-2.1451-0.9193-0.88869-2.1757-1.3484-1.2258-0.49031-2.6661-0.49031h-13.943v25.159h-7.9676v-29.174q0-0.82741 0.3064-1.5322 0.3065-0.73547 0.8581-1.2564 0.5516-0.5516 1.287-0.85804 0.7355-0.30645 1.5629-0.30645h17.958q1.5016 0 3.1564 0.33709 1.6854 0.33709 3.3096 1.1032 1.6548 0.73547 3.1257 1.9 1.5016 1.1338 2.6355 2.7886 1.1645 1.6242 1.8386 3.7693 0.6742 2.1451 0.6742 4.8418z"/></g><path d="m1387.2 488.19-14.311 15.629 16.119 17.498h-10.971l-10.603-11.553-10.603 11.553h-11.001l16.088-17.559-14.25-15.567h10.91l8.795 9.5917 8.8562-9.5917z"/></g><path d="m2329.5 545.48-33.732-0.0426-18.533-23.68 0.03-24.933 39.806 0.0204-14.475 15.52-0.2235 0.22443 10.251 13.077 23.143-26.962-16.234-18.4-18.802-0.025-23.451-25.721 53.76-0.0312 21.638 24.421 21.624-24.421 53.76 0.0312-23.451 25.721-18.802 0.025-16.234 18.4 23.143 26.962 10.251-13.077-0.2236-0.22443-14.475-15.52 39.806-0.0204 0.03 24.933-18.533 23.68-33.732 0.0426-23.158-26.958z" 
                style="font-variation-settings:'wght' 400"/></g>
            </svg>
            </i>

            <div class="area-form" id="area-form-cadastro">
                <h2>Criando sua conta</h2>
                <form id="form-cadastro" class="form" action="../bd/addUser.php" method="POST">
                    <section class="lado-form">
                        <label>Nome</label>
                        <input type="text" placeholder="pedro" name="nome">
                        <label>E-mail</label>
                        <input type="email" placeholder="pedro.s.s.s.pereira@gmail.com" name="email">
                        <label>Senha</label>
                        <div class="senha">
                            <input class="input-senha" id="input-senha-1" type="password" placeholder="xxxxxxxxx" name="senha">
                            <i class="icon-mostrar-senha" id="icon-mostrar-senha-1" onclick="mostrarSenha(this)"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg></i>
                        </div>
                    </section>
                    <section class="lado-form">
                        <label>Sobrenome</label>
                        <input type="text" placeholder="Santos da Silva Pereira" name="sobreNome">
                        <label>Telefone</label>
                        <input type="tel" placeholder="(xx)xxxx-xxxx" name="telefone">
                        <label>Confirmar senha</label>
                        <div class="senha">
                            <input class="input-senha" id="input-senha-2" type="password" placeholder="xxxxxxxxx" name="confirmarSenha">
                            <i class="icon-mostrar-senha" id="icon-mostrar-senha-2" onclick="mostrarSenha(this)"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg></i>
                        </div>
                    </section>

                    <div>
                        <button type="button" onclick="verificarFormsCadastro()">CADASTRAR</button>
                        <!-- <input type="submit" value="Cadastrar"> -->
                        <p onclick="parent.abrirSectionLogin()">Já possui uma conta? Faça login</p>
                    </div>
                </form>
                
            </div>
        </section>
    </section>

    <script src="../Js/header/login-cadastro.js" defer></script>
</body>
</html>