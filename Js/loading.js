const loading = document.querySelector('.tela-load');

function preLoading(){
    
    if(logado){
        document.getElementById('logado').style.display = "block";
        document.getElementById('nao-logado').style.display = "none";
    }else{
        document.getElementById('nao-logado').style.display = "block";
        document.getElementById('logado').style.display = "none";
    }
    loading.style.opacity = '1';
    document.querySelector('#body').style.overflow = 'hidden';

    setTimeout(() => {
        loading.style.display = 'none'
        document.querySelector('#body').style.overflow = 'auto';
    }, 1500);
}
function preLoading2(){
    const load = document.querySelector('#tela-load');
    load.style.opacity = '1';
    document.querySelector('#body').style.overflow = 'hidden';

    setTimeout(() => {
        load.style.display = 'none';
        document.querySelector('#body').style.overflow = 'auto';
    }, 1500);
}

