<?php include_once("../../bd/conexaobd.php");?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Usuario</title>
</head>
<body>
   <form action="../../bd/admAddUser.php" method="POST" class="forms-usuario">
            <label for="usuario-nome">Nome</label>

            <input type="text" name="nomeEditor" id="usuario-nome" class="input-usuario" placeholder="Nome">
        <label for="usuario-sobrenome">Sobrenome</label>

            <input type="text" name="sobrenomeEditor" id="usuario-sobrenome" class="input-usuario" placeholder="Sobrenome">

        <label for="usuario-email">E-mail</label>

            <input type="email" name="emailEditor" id="usuario-email" class="input-usuario" placeholder="nome.sobrenome@email.com">

        <label for="input-senha-usuario">Senha</label>
        <div class="senha-usuario">
            <input name="senhaEditor" class="input-senha-usuario input-usuario" id="input-senha-usuario" type="password" placeholder="xxxxxxxxx">
            <i class="icon-mostrar-senha" id="icon-mostrar-senha" onclick="mostrarSenhaUsuario(this)"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg></i>
        </div>
        <label for="usuario-numero">Telefone</label>

            <input type="tel" name="telefoneEditor" id="usuario-numero" class="input-usuario" placeholder="(xx)xxxx-xxxx">

        <label for="usuario-cargo">Cargo</label>

            <select name="cargo" id="usuario-cargo">
                <option value="0" selected>Usuário</option>
                <option value="1">ADM</option>
            </select>

        <!-- <input type="submit" onclick="verificarFormsEditor()" value="Adicionar"> -->
        <button type="submit" class=""  onclick="verificarFormsEditor()">Adicionar</button>

    </form>
</body>
</html>