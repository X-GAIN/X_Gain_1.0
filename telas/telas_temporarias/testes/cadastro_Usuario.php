<?php include_once("../../bd/conexaobd.php");?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Usuario</title>
</head>
<body>
    <form action="../../bd/funcoes.php" method="POST">
        <label for="">Nome</label>
        <input type="text" name="nome" id=""placeholder="Digite seu Nome:">
        <br><label for="">Sobrenome</label>
        <input type="text" name="sobrenome" id=""placeholder="Digite seu Sobrenome:">
        <br><label for="">Senha</label>
        <input type="password" name="senha" id="txt_senha">
        <br><label for="">Telefone</label>
        <input type="text" name="telefone" id="txt_fone">
        <br><label for="">Email</label>
        <input type="email" name="email" id="">
        <br><label for="">Imagem perfil</label>
        <input type="file" name="image" src="" alt="">
        <br><input type="submit" name="cadastrarUsuario" id="cadastrar" value="Cadastrar-se">
    </form>
</body>
</html>