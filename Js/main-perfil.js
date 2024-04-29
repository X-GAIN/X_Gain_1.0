document.getElementById('title-conta-perfil').addEventListener('click', () => {
    document.getElementById('informacao-perfil-conta').style.display = 'block';
    document.getElementById('informacao-perfil-privacidade').style.display = 'none';

    document.getElementById('title-conta-perfil').classList.add ('title-selecionado');
    document.getElementById('title-privacidade-perfil').classList.remove ('title-selecionado');
});
document.getElementById('title-privacidade-perfil').addEventListener('click', () => {
    document.getElementById('informacao-perfil-conta').style.display = 'none';
    document.getElementById('informacao-perfil-privacidade').style.display = 'block';

    document.getElementById('title-conta-perfil').classList.remove ('title-selecionado');
    document.getElementById('title-privacidade-perfil').classList.add ('title-selecionado');
});

document.getElementById('exit-aviso-editor').addEventListener('click', ()=>{
    document.getElementById('area-aviso').style.display = 'none';
});

// function cep () {
//     const cep = document.querySelector("input[name=cepEditor]");

//     cep.addEventListener("blur", (e) => {
//     const value = cep.value.replace(/[^0-9]+/, "");
//     const url = `https://viacep.com.br/ws/${value}/json/`;

//     fetch(url)
//         .then((response) => response.json())
//         .then((json) => {
//         if (json.logradouro) {
//             document.querySelector("input[name=cidade]").value = json.localidade;
//             document.querySelector("input[name=estado]").value = json.uf;
//         }
//     });
// });
// };
// cep()


function mostrarSenhaEditar(a){
    const inputSenha = document.getElementById('input-senha-editar');
    if(a.id === 'icon-mostrar-senha-editar'){
        if(inputSenha.type == 'password'){
            inputSenha.type = 'text';
            inputSenha.placeholder = 'a1a1a1a1'
        }
        else{
            inputSenha.type = "password";
            inputSenha.placeholder="xxxxxxxxx"
        }
    }
}
const btnAtualizar = document.getElementById('btn-atualizar-perfil');
btnAtualizar.addEventListener('click', (e)=>{
    e.preventDefault();
    habilitarEdicao();
})
function habilitarEdicao(){
    
    // btnAtualizar.type = 'submit';
    let inputs = document.querySelectorAll('.input-edicao')
    const inputFoco = document.getElementById('informacao-perfil-nome');
    if(btnAtualizar.innerText === 'Editar informações'){
        btnAtualizar.innerText = 'Atualizar informações';
        inputs.forEach((input) => {
            input.removeAttribute("disabled");
        });
        inputFoco.focus();
    document.getElementById('icon-mostrar-senha-editar').style.visibility = 'visible';
    
    btnAtualizar.addEventListener('click', verificarFormsEditor)
        }
}

function verificarFormsEditor(){
    const todosInputs = document.querySelectorAll('.input-edicao');
        const areaAviso = document.getElementById('area-aviso');
        const aviso = document.getElementById('aviso');
        let todosPreenchidos = true;
        const email = document.querySelector('input[name=emailEditor]');
        const telefone = document.querySelector('input[name=telefoneEditor]');
        let telefoneValue = telefone.value;
        telefoneValue = telefoneValue.replace(/[^\d]/g, '');
        // const cep = document.querySelector('input[name=cepEditor]');
        // let cepValue = cep.value;
        // cepValue = cepValue.replace(/[^\d]/g, '');

        todosInputs.forEach(input => {
            if (input.value.trim() === '') {
                todosPreenchidos = false;
            }
        });

        if (!todosPreenchidos) {
            areaAviso.style.display = 'flex';
            aviso.innerHTML = 'Preencha todos os campos';
            areaAviso.scrollIntoView({
                behavior: 'smooth'
            });
        }
        else if(!email.value.match(/^[A-Za-z\._\-0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/)){
            areaAviso.style.display = 'flex';
            aviso.innerHTML = 'Email incorreto';
            areaAviso.scrollIntoView({
                behavior: 'smooth'
            });
        }

        else if(telefoneValue === ''){
            areaAviso.style.display = 'flex';
            aviso.innerHTML = 'Telefone inválido';
            areaAviso.scrollIntoView({
                behavior: 'smooth'
            });
        }
        else if(!(telefoneValue.length >= 10 && telefoneValue.length <= 11)){
            areaAviso.style.display = 'flex';
            aviso.innerHTML = 'Telefone inválido';
            areaAviso.scrollIntoView({
                behavior: 'smooth'
            });
        }
        // else if(cepValue === ''){
        //     areaAviso.style.display = 'flex';
        //     aviso.innerHTML = 'CEP inválido';
        // }
        // else if(!(cepValue.length === 8)){
        //     areaAviso.style.display = 'flex';
        //     aviso.innerHTML = 'CEP inválido';
        // }
        else{
            const formulario = document.querySelector('form');
            formulario.submit();
            // location.reload();
            formulario.action = '../bd/EditeUser.php';
        }
}