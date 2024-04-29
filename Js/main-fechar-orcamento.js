const lista = document.getElementById('area-lista-itens');
const btnAbrirFechar = document.getElementById('lista-itens-titulo');
const iconAbrirFechar = document.getElementById('icone-lista-itens-titulo');

if(window.innerWidth < 769){
    lista.classList.add('area-lista-itens-sumir');
    iconAbrirFechar.style.transform = 'rotate(0deg)';
}
else{
    lista.classList.remove('area-lista-itens-sumir');
    iconAbrirFechar.style.transform = 'rotate(90deg)';
}
btnAbrirFechar.addEventListener('click', () => {
    if (lista.classList.contains('area-lista-itens-sumir')) {
        lista.classList.remove('area-lista-itens-sumir');
        iconAbrirFechar.style.transform = 'rotate(90deg)';
    } else {
        lista.classList.add('area-lista-itens-sumir');
        iconAbrirFechar.style.transform = 'rotate(0deg)';
    }
})

document.getElementById('exit-aviso-section-orcamento').addEventListener('click', () => {
    document.getElementById('area-aviso-orcamento').style.display = "none";
});

(function () {
    const cep = document.querySelector("input[name=cepOrcamento]");

    cep.addEventListener("blur", (e) => {
    const value = cep.value.replace(/[^0-9]+/, "");
    const url = `https://viacep.com.br/ws/${value}/json/`;

    fetch(url)
        .then((response) => response.json())
        .then((json) => {
        if (json.logradouro) {
            document.querySelector("input[name=cidade]").value = json.localidade;
            document.querySelector("input[name=estado]").value = json.uf;
        }
    });
});
})();

document.getElementById('enviarFecharOrcamento').addEventListener('click', (e)=>{
    e.preventDefault();
    
    verificarFormsOrcamento();
})

var envio = false;
function verificarFormsOrcamento(){
    const todosInputs = document.querySelectorAll('.inputs-orcamento');
        const areaAviso = document.getElementById('area-aviso-orcamento');
        const aviso = document.getElementById('aviso');
        const motivo = document.getElementById('motivo');
        motivo.innerHTML = '--ERRO--' 
        let todosPreenchidos = true;
        const email = document.querySelector('input[name=emailOrcamento]');
        const telefone = document.querySelector('input[name=telefoneOrcamento]');
        let telefoneValue = telefone.value;
        telefoneValue = telefoneValue.replace(/[^\d]/g, '');
        const cep = document.querySelector('input[name=cepOrcamento]');
        let cepValue = cep.value;
        cepValue = cepValue.replace(/[^\d]/g, '');


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

        else if(telefoneValue === ''){
            areaAviso.style.display = 'flex';
            aviso.innerHTML = 'Telefone inválido';
        }
        else if(!(telefoneValue.length >= 10 && telefoneValue.length <= 11)){
            areaAviso.style.display = 'flex';
            aviso.innerHTML = 'Telefone inválido';
        }
        // else if(cepValue !== ''){
        //     if(!(cepValue.length === 8)){
        //     areaAviso.style.display = 'flex';
        //     aviso.innerHTML = 'CEP inválido';
        //     }
        // }
        else if(total == 0){
            areaAviso.style.display = 'flex';
            aviso.innerHTML = 'A lista de itens está vazia.';
        }
        else{
            copyInformacoes();
            const formulario = document.getElementById('form-fecharOrcamento-copy');
            formulario.submit();
            envio = true;
            // window.location.href = `fechar-orcamento.html?envio=${envio}`;
            formulario.action = 'https://api.staticforms.xyz/submit';
        }
}
const urlParams = new URLSearchParams(window.location.search);
envio = urlParams.get('envio');
// console.log(envio);

if(envio){
    const areaAviso = document.getElementById('area-aviso-orcamento');
    areaAviso.style.display = 'flex';
    envio = null;
    localStorage.removeItem('Produtos');
    // console.log(envio);
}
let total = 0;
function carregarLista() {
    const prodLocalStorage = JSON.parse(localStorage.getItem('Produtos')) || [];
    const tabelaProdutosSelecionados = document.getElementById('lista-itens');

    for (var i = 0; i < prodLocalStorage.length; i++) {
        const divListProdSelecionados = document.createElement('div');
        divListProdSelecionados.classList.add('item-lista');
        divListProdSelecionados.innerHTML = `
                <p class="nome-produto" id="">${prodLocalStorage[i].Nome}</p>
                <p class="numero-qtn" id="">${prodLocalStorage[i].Quantidade}</p>
        `;
        tabelaProdutosSelecionados.appendChild(divListProdSelecionados);
        // console.log(prodLocalStorage[i]);

        total += prodLocalStorage[i].Quantidade;
    }

    const totalLista = document.getElementById('totalListaProd');
    totalLista.innerText = "Total - " + total;
    return total;
}

carregarLista();

function copyInformacoes(){
    const nome = document.getElementById('nomeOrcamento').value;
    const sobrenome = document.getElementById('sobrenomOrcamento').value;
    const email = document.getElementById('emailOrcamento').value;
    const telefone = document.getElementById('telefoneOrcamento').value;
    const cep = document.getElementById('cepOrcamento').value;
    const estado = document.getElementById('estadoOrcamento').value;
    const cidade = document.getElementById('cidadeOrcamento').value;
    const copynome = document.getElementById('copyNome');
    const copyemail = document.getElementById('copyEmail');
    const copytelefone = document.getElementById('copyTelefone');
    const copycep = document.getElementById('copyCep');
    const copyestado = document.getElementById('copyEstado');
    const copycidade = document.getElementById('copyCidade');
    const copyProdutos = document.getElementById('copyProdutos');

    
    const prodLocalStorage = JSON.parse(localStorage.getItem('Produtos')) || [];
    let total = 0;
    let prodsSelect = '';

    for (var i = 0; i < prodLocalStorage.length; i++) {
        prodsSelect += `
Id: ${prodLocalStorage[i].id}, Nome: ${prodLocalStorage[i].Nome}, Quantidade: ${prodLocalStorage[i].Quantidade};
--------------------------------------------------
        `;

        total += prodLocalStorage[i].Quantidade;
    }

    const totalLista = document.getElementById('totalListaProd');
    totalLista.innerText = "Total - " + total;

    

    

    copynome.value = nome + ' ' + sobrenome;
    copyemail.value = email;
    copytelefone.value = telefone;
    copycep.value = cep;
    copyestado.value = estado;
    copycidade.value = cidade;

    copyProdutos.value = prodsSelect + `
${totalLista.innerText}`;
}

