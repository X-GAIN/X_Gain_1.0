/* document.getElementById('entrar').addEventListener('click', () => {
    document.getElementById('section-entrar').style.display='flex';
    document.getElementById('section-cadastrar').style.display='none';
    document.getElementById('section-login-cadastro').style.display='flex';
})
document.getElementById('cadastrar-se').addEventListener('click', () => {
    document.getElementById('section-cadastrar').style.display='flex';
    document.getElementById('section-entrar').style.display='none';
    document.getElementById('section-login-cadastro').style.display='flex';
}) */
if(document.getElementById('exit-login-section') != null){
    document.getElementById('exit-login-section').addEventListener('click', () => {
        document.getElementById('body').style.overflowY='auto';
        document.getElementById('section-login-cadastro').style.display='none';
        document.getElementById('my-header').style.zIndex='70';
        document.getElementById('iframe-login-cadastro').style.display='none';
    });
}

function fecharTudo(){
    document.getElementById('body').style.overflowY='auto';
    document.getElementById('section-login-cadastro').style.display='none';
    document.getElementById('my-header').style.zIndex='70';
    document.getElementById('iframe-login').style.display='none';
    document.getElementById('iframe-cadastro').style.display='none';
};

function abrirSectionCadastro(){
    document.getElementById('body').style.overflowY='hidden';
    document.getElementById('section-login-cadastro').style.display='block';
    document.getElementById('iframe-cadastro').style.display='block';
    document.getElementById('body').style.overflowY='hidden';
    document.getElementById('iframe-login').style.display='none';
};
function abrirSectionLogin(){
    document.getElementById('body').style.overflowY='hidden';
    document.getElementById('section-login-cadastro').style.display='block';
    document.getElementById('iframe-login').style.display='block';
    document.getElementById('body').style.overflowY='hidden';
    document.getElementById('iframe-cadastro').style.display='none';
};

if(document.getElementById('exit-aviso-section') != null)
    document.getElementById('exit-aviso-section').addEventListener('click', fecharAviso)
function fecharAviso(){
    document.getElementById('area-aviso').style.display = 'none';
};


// function mostrarSenha1(){
//     const inputSenha1 = document.getElementById('input-senha-1');
//     const inputSenha2 = document.getElementById('input-senha-2');
//     document.getElementById('icon-mostrar-senha-1').addEventListener('click', () => {
//         if(inputSenha1.type == 'password'){
//             inputSenha1.type = 'text';
//         }
//         else{
//             inputSenha1.type = "password";
//         }
//     })
//     document.getElementById('icon-mostrar-senha-2').addEventListener('click', () => {
//         if(inputSenha2.type === 'password'){
//             inputSenha2.type = 'text';
//         }
//         else{
//             inputSenha2.type = "password";
//         }
//     })
// }

//     const inputSenha3 = document.getElementById('input-senha-login')
//     document.getElementById('icon-mostrar-senha-login').addEventListener('click', () => {
//         if(inputSenha3.type == 'password'){
//             inputSenha3.type = 'text';
//         }
//         else{
//             inputSenha3.type = "password";
//         }
//     })

// mostrarSenha1();

function mostrarSenha(a){
    const inputSenha1 = document.getElementById('input-senha-1');
    const inputSenha2 = document.getElementById('input-senha-2');
    const inputSenha3 = document.getElementById('input-senha-login');
    if(a.id === 'icon-mostrar-senha-login'){
        if(inputSenha3.type == 'password'){
            inputSenha3.type = 'text';
            inputSenha3.placeholder = 'a1a1a1a1'
        }
        else{
            inputSenha3.type = "password";
            inputSenha3.placeholder="xxxxxxxxx"
        }
    }
    else if(a.id === 'icon-mostrar-senha-1'){
        if(inputSenha1.type == 'password'){
            inputSenha1.type = 'text';
            inputSenha1.placeholder = 'a1a1a1a1'
        }
        else{
            inputSenha1.type = "password";
            inputSenha1.placeholder="xxxxxxxxx"
        }
    }
    else if(a.id === 'icon-mostrar-senha-2'){
        if(inputSenha2.type == 'password'){
            inputSenha2.type = 'text';
            inputSenha2.placeholder = 'a1a1a1a1'
        }
        else{
            inputSenha2.type = "password";
            inputSenha2.placeholder="xxxxxxxxx"
        }
    }
}

function verificarFormsCadastro(){
    const todosInputs = document.querySelectorAll('input');
    const areaAviso = document.getElementById('area-aviso');
    const aviso = document.getElementById('aviso');
    let todosPreenchidos = true;
    const email = document.querySelector('input[name=email]');
    const senha = document.getElementById('input-senha-1').value;
    const confirmarSenha = document.getElementById('input-senha-2').value;
    const telefone = document.querySelector('input[name=telefone]');
    let telefoneValue = telefone.value;
    telefoneValue = telefoneValue.replace(/[^\d]/g, '');

    todosInputs.forEach(input => {
        if (input.value.trim() === '') {
            todosPreenchidos = false;
        }
    });

    if (!todosPreenchidos) {
        areaAviso.style.display = 'flex';
        aviso.innerHTML = 'Preencha todos os campos';
    }
    else if(!email.value.match(/^[A-Za-z\._\-0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/)){
        areaAviso.style.display = 'flex';
        aviso.innerHTML = 'Email incorreto';
    }
    else if(senha !== confirmarSenha){
        areaAviso.style.display = 'flex';
        aviso.innerHTML = 'As senhas não são iguais';
    }
    else if(telefoneValue === ''){
        areaAviso.style.display = 'flex';
        aviso.innerHTML = 'Telefone inválido';
    }
    else if(!(telefoneValue.length >= 10 && telefoneValue.length <= 11)){
        areaAviso.style.display = 'flex';
        aviso.innerHTML = 'Telefone inválido';
    }
    else{
        const formulario = document.querySelector('form');
        formulario.submit();
    }
    
    // console.log(telefoneValue)

}

function verificarFormsLogin(){
    const todosInputs = document.querySelectorAll('input');
    const areaAviso = document.getElementById('area-aviso');
    const aviso = document.getElementById('aviso');
    let todosPreenchidos = true;
    const email = document.querySelector('input[name=email]');
    
    todosInputs.forEach(input => {
        if (input.value.trim() === '') {
            todosPreenchidos = false;
        }
    });

    if (!todosPreenchidos) {
        areaAviso.style.display = 'flex';
        aviso.innerHTML = 'Preencha todos os campos';
    }
    else if(!email.value.match(/^[A-Za-z\._\-0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/)){
        areaAviso.style.display = 'flex';
        aviso.innerHTML = 'Email incorreto';
    }
    else{
        const formulario = document.querySelector('form');
        formulario.submit();
    }
}