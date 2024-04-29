document.getElementById('btn-produto-adicionar').addEventListener('click', ()=>{
    // document.getElementById('section-adicionar-produto').style.display = 'flex'
    document.getElementById('section-adicionar-produto').style.opacity = '1';
    document.getElementById('section-adicionar-produto').style.zIndex = '1';
    document.getElementById('body').style.overflow = 'hidden';
});
if(document.getElementsByClassName('btn-produto-editar')[0] != null){
    for(let i = 0; i<document.getElementsByClassName('btn-produto-editar').length;i++){
        document.getElementsByClassName('btn-produto-editar')[i].addEventListener('click', (a)=>{
            // document.getElementById('section-adicionar-produto').style.display = 'flex'
            document.getElementById('section-editar-produto').style.opacity = '1';
            document.getElementById('section-editar-produto').style.zIndex = '1';
            document.getElementById('body').style.overflow = 'hidden';

            idProd =  a.target.getAttribute('data-id');
            var novoEstado = { idProd: idProd };
            // Adiciona o novo estado à história do navegador
            window.history.pushState(novoEstado, '', '?idProd=' + idProd);
            
            var produtoEncontrado = produtos.find(function(produto) {
                return produto.id_Produto == idProd;
            });
            
            // Verificar se o produto foi encontrado
            if (produtoEncontrado) {
                // Obter o valor do campo 'modelo'
                document.getElementsByName('modelo')[1].value = produtoEncontrado.modelo;
                document.getElementsByName('categoria')[1].value = produtoEncontrado.categoria;
                document.getElementsByName('sub-categoria')[1].value = produtoEncontrado.subcategoria;
                document.getElementsByName('descricao')[1].value = produtoEncontrado.descricao;
                document.getElementsByName('comprimento')[1].value = produtoEncontrado.comprimento;
                document.getElementsByName('altura')[1].value = produtoEncontrado.altura;
                document.getElementsByName('largura')[1].value = produtoEncontrado.largura;
                document.getElementsByName('peso')[1].value = produtoEncontrado.peso;
                document.getElementsByName('garantia')[1].value = produtoEncontrado.garantia;
            } else {
                console.error('Produto não encontrado para o ID:', idProd);
            }
            document.getElementById('form-produto-editar').action = '../bd/admEditeProd.php?id='+ idProd;
        });
    }
}
document.getElementById('btn-adicionar-banner').addEventListener('click', ()=>{
    // document.getElementById('section-adicionar-produto').style.display = 'flex'
    document.getElementById('adicionar-banner').style.opacity = '1';
    document.getElementById('adicionar-banner').style.zIndex = '1';
    document.getElementById('body').style.overflow = 'hidden';
});

// document.getElementById('exit-produtos-section').addEventListener('click', ()=>{
//     // document.getElementById('section-adicionar-produto').style.display = 'none'
//     document.getElementById('section-adicionar-produto').style.opacity = '0'
//     document.getElementById('section-adicionar-produto').style.zIndex = '-1'
//     document.getElementById('body').style.overflow = 'auto'
// })

function fecharTudo(){
    document.getElementById('section-adicionar-produto').style.opacity = '0';
    document.getElementById('section-adicionar-produto').style.zIndex = '-1';
    document.getElementById('section-editar-produto').style.opacity = '0';
    document.getElementById('section-editar-produto').style.zIndex = '-1';
    document.getElementById('section-adicionar-usuario').style.opacity = '0';
    document.getElementById('section-adicionar-usuario').style.zIndex = '-1';
    document.getElementById('section-editar-usuario').style.opacity = '0';
    document.getElementById('section-editar-usuario').style.zIndex = '-1';
    document.getElementById('adicionar-banner').style.opacity = '0';
    document.getElementById('adicionar-banner').style.zIndex = '-1';
    document.getElementById('body').style.overflow = 'auto';
}
function fecharAvisos(){
        // document.getElementById('area-aviso').style.display = 'none';
        document.getElementById('area-aviso-produto').style.display = 'none';
        document.getElementById('area-aviso-banner').style.display = 'none';
        document.getElementById('area-aviso-usuario').style.display = 'none';
        document.getElementById('area-aviso-excluir-banner').style.display = 'none';
        document.getElementById('area-aviso-excluir-usuario').style.display = 'none';
        document.getElementById('area-aviso-excluir-produto').style.display = 'none';
}

document.getElementById('btn-usuario-adicionar').addEventListener('click', ()=>{
    // document.getElementById('section-adicionar-produto').style.display = 'flex';
    // document.getElementById('section-adicionar-produto').style.display = '';

    document.getElementById('section-adicionar-usuario').style.opacity = '1';
    document.getElementById('section-adicionar-usuario').style.zIndex = '1';
    document.getElementById('body').style.overflow = 'hidden';
})
document.getElementById('abrirCadastro').addEventListener('click', ()=>{
    // document.getElementById('section-adicionar-produto').style.display = 'flex'
    document.getElementById('section-adicionar-usuario').style.opacity = '1';
    document.getElementById('section-adicionar-usuario').style.zIndex = '1';
    document.getElementById('body').style.overflow = 'hidden';
})
if(document.getElementsByClassName('btn-usuario-editar')[0] != null){
    for(let i = 0; i<document.getElementsByClassName('btn-usuario-editar').length;i++){
        document.getElementsByClassName('btn-usuario-editar')[i].addEventListener('click', (a)=>{
            // document.getElementById('section-adicionar-produto').style.display = 'flex'
            document.getElementById('section-editar-usuario').style.opacity = '1';
            document.getElementById('section-editar-usuario').style.zIndex = '1';
            document.getElementById('body').style.overflow = 'hidden';

            idUser =  a.target.getAttribute('data-id');
            var novoEstado = { idUser: idUser };
            // Adiciona o novo estado à história do navegador
            window.history.pushState(novoEstado, '', '?idUser=' + idUser);
            
            var usuarioEncontrado = usuarios.find(function(usuario) {
                return usuario.id_usuario == idUser;
            });
            
            // Verificar se o produto foi encontrado
            if (usuarioEncontrado) {
                // Obter o valor do campo 'modelo'
                document.getElementsByName('nome')[1].value = usuarioEncontrado.nome;
                document.getElementsByName('sobrenome')[1].value = usuarioEncontrado.sobrenome;
                document.getElementsByName('email')[1].value = usuarioEncontrado.email;
                document.getElementsByName('senha')[1].value = usuarioEncontrado.senha;
                document.getElementsByName('telefone')[1].value = usuarioEncontrado.telefone;
                document.getElementsByName('cargo')[1].value = usuarioEncontrado.nivel_Usuario;
            } else {
                console.error('Usuarios não encontrado para o ID:', idUser);
            }
            document.getElementById('form-usuario-editar').action = '../bd/admEditeUser.php?id='+ idUser;
        });
    }
}
// document.getElementById('exit-aviso').addEventListener('click', ()=>{
//     document.getElementById('area-aviso').style.display = 'none';
// })
// document.getElementById('exit-aviso-produto').addEventListener('click', ()=>{
//     document.getElementById('area-aviso-produto').style.display = 'none';
// })
// document.getElementById('exit-aviso-banner').addEventListener('click', ()=>{
//     document.getElementById('area-aviso-banner').style.display = 'none';
// })
// document.getElementById('exit-aviso-excluir-banner').addEventListener('click', ()=>{
//     document.getElementById('area-aviso-excluir-banner').style.display = 'none';
// })
function mostrarSenhaUsuario(a){
    const inputSenha = document.getElementById('input-senha-usuario');
    const inputSenha2 = document.getElementById('input-senha-usuario2');
    if(a.id === 'icon-mostrar-senha'){
        if(inputSenha.type === 'password'){
            inputSenha.type = 'text';
            inputSenha.placeholder = 'a1a1a1a1';
        }
        else{
            inputSenha.type = "password";
            inputSenha.placeholder="xxxxxxxxx";
        }
    }
    else if(a.id === 'icon-mostrar-senha2'){
        if(inputSenha2.type === 'password'){
            inputSenha2.type = 'text';
            inputSenha2.placeholder = 'a1a1a1a1';
        }
        else{
            inputSenha2.type = "password";
            inputSenha2.placeholder="xxxxxxxxx";
        }
    }
}

function verificarFormsEditor(){
    const todosInputs = document.querySelectorAll('.input-usuario');
        const areaAviso = document.getElementById('area-aviso-usuario');
        const aviso = document.getElementById('aviso-usuario');
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
        }
}
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


const input = document.getElementById('imgsFoto');
const arquivosSelecionados = document.getElementById('arquivosSelecionados');

input.addEventListener('change', function () {
    arquivosSelecionados.innerHTML = ''; 

    for (let i = 0; i < this.files.length; i++) {
        const file = this.files[i];
        const listItem = document.createElement('div');
        listItem.textContent = file.name;
        arquivosSelecionados.appendChild(listItem);
    }

    if (this.files.length === 0) {
        arquivosSelecionados.textContent = "Nenhum arquivo selecionado";
    }
});

const input2 = document.getElementById('obj3D');
const nome3DSelecionado = document.getElementById('nome3DSelecionado');

input2.addEventListener('change', function () {
    if (this.files.length > 0) {
        const file = this.files[0];
        nome3DSelecionado.textContent = file.name;
    } else {
        nome3DSelecionado.textContent = "Nenhum arquivo selecionado";
    }
});
// document.getElementById('btn-adicionar').addEventListener('click', (e)=>{
//     e.preventDefault();
//     // verificarFormsProduto();
// })
// document.getElementById('btn-editar').addEventListener('click', (e)=>{
//     // e.preventDefault();
//     // verificarFormsProduto2();
// })
// function verificarFormsProduto() {
//     const todosInputs = document.querySelectorAll('.input-produto');
//     const areaAviso = document.getElementById('area-aviso-produto');
//     const aviso = document.getElementById('aviso');
//     let todosPreenchidos = true;
//     const todosSelects = document.querySelectorAll('select');
//     let todosSelectsSelecionados = true;
//     const obj3DInput = document.getElementById('obj3D');
//     let bannerImg = document.getElementById('imgsFoto');

//     todosInputs.forEach(input => {
//         if (input.value.trim() === '') {
//             todosPreenchidos = false;
//         }
//     });

//     todosSelects.forEach(select => {
//         if (select.value === 'nao-selecionado') {
//             todosSelectsSelecionados = false;
//         }
//     });

//     // Verifique o tipo de arquivo para imgFoto
//     if (bannerImg.files.length > 0) {
//         bannerImg = bannerImg.files[0].type;
//         if (!bannerImg.includes('image/')) {
//             areaAviso.style.display = 'flex';
//             aviso.innerHTML = 'Só é permitido imagens do tipo "jpg", "jpeg" e "png" para o campo de imagens do produto';
//             return;
//         }
//     }

//     // Verifique o tipo de arquivo para obj3D
//     if (obj3DInput.files.length > 0) {
//         const obj3DFileName = obj3DInput.files[0].name;
//         const obj3DFileExtension = obj3DFileName.split('.').pop();
//         if (obj3DFileExtension !== 'obj') {
//             areaAviso.style.display = 'flex';
//             aviso.innerHTML = 'Só é permitido modelos 3D do tipo "obj" para o campo modelo 3D do produto';
//             return;
//         }
//     }

//     if (!todosPreenchidos) {
//         areaAviso.style.display = 'flex';
//         aviso.innerHTML = 'Preencha todos os campos';
//     } else if (!todosSelectsSelecionados) {
//         areaAviso.style.display = 'flex';
//         aviso.innerHTML = 'Selecione uma categoria e/ou subcategoria';
//     } else {
//         const formulario = document.querySelector('form');
//         formulario.submit();
//     }
// }
// function verificarFormsProduto2() {
//     const todosInputs = document.querySelectorAll('.input-produto');
//     const areaAviso = document.getElementById('area-aviso-produto');
//     const aviso = document.getElementById('aviso');
//     let todosPreenchidos = true;
//     const todosSelects = document.querySelectorAll('select');
//     let todosSelectsSelecionados = true;
//     // const obj3DInput = document.getElementById('obj3D');
//     // let bannerImg = document.getElementById('imgsFoto');

//     todosInputs.forEach(input => {
//         if (input.value.trim() === '') {
//             todosPreenchidos = false;
//         }
//     });

//     todosSelects.forEach(select => {
//         if (select.value === 'nao-selecionado') {
//             todosSelectsSelecionados = false;
//         }
//     });

//     // Verifique o tipo de arquivo para imgFoto
//     // if (bannerImg.files.length > 0) {
//     //     bannerImg = bannerImg.files[0].type;
//     //     if (!bannerImg.includes('image/')) {
//     //         areaAviso.style.display = 'flex';
//     //         aviso.innerHTML = 'Só é permitido imagens do tipo "jpg", "jpeg" e "png" para o campo de imagens do produto';
//     //         return;
//     //     }
//     // }

//     // Verifique o tipo de arquivo para obj3D
//     // if (obj3DInput.files.length > 0) {
//     //     const obj3DFileName = obj3DInput.files[0].name;
//     //     const obj3DFileExtension = obj3DFileName.split('.').pop();
//     //     if (obj3DFileExtension !== 'obj') {
//     //         areaAviso.style.display = 'flex';
//     //         aviso.innerHTML = 'Só é permitido modelos 3D do tipo "obj" para o campo modelo 3D do produto';
//     //         return;
//     //     }
//     // }

//     if (!todosPreenchidos) {
//         areaAviso.style.display = 'flex';
//         aviso.innerHTML = 'Preencha todos os campos';
//     } else if (!todosSelectsSelecionados) {
//         areaAviso.style.display = 'flex';
//         aviso.innerHTML = 'Selecione uma categoria e/ou subcategoria';
//     } else {
//         const formulario = document.querySelector('form');
//         formulario.submit();
//     }
// }



// Bannner section


const imagens = document.querySelectorAll(".banner-img");
const qtnImgs = imagens.length
const bolinhasContainer = document.querySelector(".area-btns-bolinhas-banner");
    const passarEVoltar = document.querySelectorAll('.passar-e-voltar');
    let bannerImgFoco = 0;
    const banners = document.querySelectorAll('.banner-img');
    const maxBanners = banners.length;  

function bolinhasFuntion(imagens) {
    let primeiraIteracao = true;

    imagens.forEach((imagem, index) => {
    const bolinha = document.createElement("i");
    bolinha.classList.add("btn-bolinha-banner");

    bolinha.addEventListener("click", () => {
        const bolinhas = document.querySelectorAll(".btn-bolinha-banner");
        bolinhas.forEach((b) => {
            b.classList.remove('banner-foco');
        });
        bannerImgFoco = index;
        // console.log(bannerImgFoco)
        bolinha.classList.add('banner-foco');

        banners[bannerImgFoco].scrollIntoView({
            behavior: "smooth",
            inline: "center"
        })

        });

        bolinhasContainer.appendChild(bolinha);

        if (primeiraIteracao) {
        bolinha.classList.add('banner-foco');
        primeiraIteracao = false;
        }

    });
}

function passarEVoltarControl(){
    

    passarEVoltar.forEach((btn) => {
        btn.addEventListener('click', (e)=>{
            const voltar = e.target.classList.contains('btn-banner-anterior');
            const proximo = e.target.classList.contains('btn-banner-proximo');
            
            if(voltar){
                bannerImgFoco -= 1;
            }
            else if(proximo){
                bannerImgFoco += 1;
            }
            if(bannerImgFoco >= maxBanners){
                bannerImgFoco = 0;
            };
            if (bannerImgFoco < 0) {
                bannerImgFoco = maxBanners - 1;
            };

            banners[bannerImgFoco].scrollIntoView({
                behavior: "smooth",
                inline: "center",
            })
            // console.log(bannerImgFoco)
            const bolinhaFoco = document.querySelectorAll('.btn-bolinha-banner');
            bolinhaFoco.forEach((b) => {
                b.classList.remove('banner-foco');
            });
            bolinhaFoco[bannerImgFoco].classList.add('banner-foco');
    });
})
}
function controlFunction(){
    bolinhasFuntion(imagens);
    passarEVoltarControl();
}

controlFunction();


if(qtnImgs <= 0){
        const localImg = document.querySelector(".area-imgsBanner");

        const img = document.createElement('img')
        img.src = '../imgs/banner-home-img-reserva.jpg';
        img.classList.add('banner-img');
        img.title = 'Não existe nenhum banner no momento'

        localImg.appendChild(img);

        document.getElementById('btns-btn-banner-home').style.display = ('none');
    }
else if(qtnImgs === 1){
        document.getElementById('btns-btn-banner-home').style.display = ('none');
}

const input3 = document.getElementById('bannerImg');
const bannerAdicionado = document.getElementById('bannerAdicionado');
input3.addEventListener('change', function () {
    if (this.files.length > 0) {
        const file = this.files[0];
        bannerAdicionado.textContent = file.name;
    } else {
        bannerAdicionado.textContent = "Nenhum arquivo selecionado";
    }
});

function verificarBanner() {
    const todosInputs = document.querySelectorAll('.input-banner');
    const areaAviso = document.getElementById('area-aviso-banner');
    const aviso = document.getElementById('aviso-banner');
    let todosPreenchidos = true;
    const bannerImg = document.getElementById('bannerImg');

    todosInputs.forEach(input => {
        if (input.value.trim() === '') {
            todosPreenchidos = false;
        }
    });

    // Verifique o tipo de arquivo para imgFoto
    if (bannerImg.files.length > 0){
        const bannerImgType = bannerImg.files[0].type;
        if (!bannerImgType.includes('image/')) {
            areaAviso.style.display = 'flex';
            aviso.innerHTML = 'Só é permitido imagens do tipo "jpg", "jpeg" e "png"';
            return;
        }
    }

    if (!todosPreenchidos) {
        areaAviso.style.display = 'flex';
        aviso.innerHTML = 'Adicione a imagem do banner';
    }else {
        const formulario = document.querySelector('form');
        formulario.submit();
        setTimeout(location.reload(),5000);
    }
}

document.getElementById('btn-banner-excluir').addEventListener('click', ()=>{
    document.getElementById('area-aviso-excluir-banner').style.display = 'flex';
})
function alertaExcluir(a){
    if(a.id == "btn-usuario-excluir"){
        document.getElementById('area-aviso-excluir-usuario').style.display = 'flex';
            document.getElementById('area-aviso-excluir-usuario').scrollIntoView({
                behavior: 'smooth'
            });
    }else if(a.id == "btn-produto-excluir"){
        let iddoproduto = a.getAttribute('data-id');
        document.getElementById('area-aviso-excluir-produto').style.display = 'flex';
        document.getElementById('idDoProduto').value = iddoproduto;
        document.getElementById('area-aviso-excluir-produto').scrollIntoView({
            behavior: 'smooth'
        });
    }
}

// function showCheckboxes() {
//     var checkboxes = document.getElementById("checkboxes");
//     if (checkboxes.style.display === "none") {
//       checkboxes.style.display = "block";
//     } else {
//       checkboxes.style.display = "none";
//     }
// }