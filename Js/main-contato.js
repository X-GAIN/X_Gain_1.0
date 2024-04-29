document.getElementById('exit-aviso-section-contato').addEventListener('click', () => {
    document.getElementById('area-aviso-contato').style.display = "none";
});

var envio = false;

document.getElementById('enviarMensagemContato').addEventListener('click', (e)=>{
    e.preventDefault();

    verificarFormsContato();
})
function verificarFormsContato(){
    const todosInputs = document.querySelectorAll('.inputs-contato');
    const areaAviso = document.getElementById('area-aviso-contato');
    const aviso = document.getElementById('aviso');
    let todosPreenchidos = true;
    const email = document.querySelector('input[name=emailContato]');
    const telefone = document.querySelector('input[name=telefoneContato]');
    let telefoneValue = telefone.value;
    telefoneValue = telefoneValue.replace(/[^\d]/g, '');

    todosInputs.forEach(input => {
        if (input.value.trim() === '') {27949316
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
    else{
        const formulario = document.getElementById('form-contato-copy');
        formulario.submit();
        // location.reload();
        envio = true;
        // window.location.href = `https://formsubmit.co/xgain.oficial@gmail.com`;
        formulario.action = 'https://formsubmit.co/xgain.oficial@gmail.com';
    }
    
    // console.log(telefoneValue)

}

const urlParams = new URLSearchParams(window.location.search);
envio = urlParams.get('envio');
console.log(envio);

if(envio){
    const areaAviso = document.getElementById('area-aviso-contato');
    document.getElementById('tituloNotificacao').innerHTML = 'MENSAGEM ENVIADA!';
    document.getElementById('aviso').innerHTML = 'Entraremos em contato em até 72h, fique atento em sua caixa de e-mail';
    areaAviso.style.display = 'flex';
    envio = null;
    console.log(envio);
}

function copyInformacoes(){
    const nome = document.getElementById('nomeContato').value;
    const email = document.getElementById('emailContato').value;
    const telefone = document.getElementById('telefoneContato').value;
    const mensagem = document.getElementById('mensagemContato').value;
    const copynome = document.getElementById('copyNomeContato');
    const copyemail = document.getElementById('copyEmailContato');
    const fullmensagem = document.getElementById('copyMensagemContato');

    copynome.value = nome;
    copyemail.value = email;

    fullmensagem.value = `Telefone: ${telefone}
-----------------------------------------------
Mensagem: ${mensagem}`;
}
