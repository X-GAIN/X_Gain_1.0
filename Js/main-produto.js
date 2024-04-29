
function fechar3D(){
    document.getElementById('section-img3d').style.display = "none";
    document.querySelector('#body').style.overflow = 'auto';
    document.getElementById('iframe-section-img3d').src = '';
};

document.querySelector('body').addEventListener('keydown', (e)=>{
    if(e.key === 'Escape'){
        parent.document.querySelector('#body').style.overflow = 'auto';
        parent.document.getElementById('section-img3d').style.display = "none";
        parent.document.getElementById('iframe-section-img3d').src = '';
    }
});
document.addEventListener('click', function(event) {
    var img3d = document.getElementById('img3d');
    var isClickInsideImg3D = img3d.contains(event.target);

    if (!isClickInsideImg3D) {
        parent.document.querySelector('#body').style.overflow = 'auto';
        parent.document.getElementById('section-img3d').style.display = 'none';
        parent.document.getElementById('iframe-section-img3d').src = '';
    }
});

function abrir3D(){
    // document.getElementById('iframe-section-img3d').style.display = "flex";
    document.getElementById('section-img3d').style.display = "flex";
    document.getElementById('body').style.overflow = 'hidden';
    document.getElementById('iframe-section-img3d').src = '../iframe/section-img3d.php'
};


// function trocarImagemPrincipal(a){
//     document.getElementById('img-principal').src = a.src;
// }
function maisOuMenos(valor){
    const numero = document.getElementById('numero-produto');
    let contador = parseInt(numero.textContent);

    contador = Math.max(1, contador + valor);
    
    numero.textContent = contador;
};

// document.getElementById('titleProduto').innerHTML = document.getElementById('nomeProduto').innerHTML + ' | XGAIN';