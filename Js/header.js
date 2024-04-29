const header = document.getElementById('myHeader');
        let isHeaderExpanded = true;

        window.addEventListener('scroll', () => {
            if (window.scrollY > 0 && isHeaderExpanded) {
                header.style.height = '50px';
                document.getElementById('icon-logo').classList.add('icon-logo-reduzido');
                document.querySelector('.icons-header').classList.add('icons-reduzidos');
                document.querySelector('.icon-perfil').classList.add('icon-perfil-reduzido');
                document.querySelector('.text-left-header').classList.add('item-header-reduzido');
                document.querySelector('.text-right-header').classList.add('item-header-reduzido');
                isHeaderExpanded = false;
                
            } else if (window.scrollY === 0 && !isHeaderExpanded) {
                header.style.height = '100px';
                document.getElementById('icon-logo').classList.remove('icon-logo-reduzido');
                document.querySelector('.icons-header').classList.remove('icons-reduzidos');
                document.querySelector('.icon-perfil').classList.remove('icon-perfil-reduzido');
                document.querySelector('.text-left-header').classList.remove('item-header-reduzido');
                document.querySelector('.text-right-header').classList.remove('item-header-reduzido');
                isHeaderExpanded = true;
            }
        });

/* header.addEventListener('mouseenter', normalHeader);

function normalHeader(){
    if(isHeaderExpanded == true){
        return
    }
    header.style.height='100px';
    document.querySelector('.icon-logo').classList.remove('icon-logo-reduzido');
    document.querySelector('.icons-header').classList.remove('icons-reduzidos');
    document.querySelector('.icon-perfil').classList.remove('icon-perfil-reduzido');
    document.querySelector('.text-left-header').classList.remove('item-header-reduzido');
    document.querySelector('.text-right-header').classList.remove('item-header-reduzido');
    
    header.addEventListener('mouseleave', semiHeader);
    function semiHeader(){
        header.style.height = '50px';
        document.querySelector('.icon-logo').classList.add('icon-logo-reduzido');
        document.querySelector('.icons-header').classList.add('icons-reduzidos');
        document.querySelector('.icon-perfil').classList.add('icon-perfil-reduzido');
        document.querySelector('.text-left-header').classList.add('item-header-reduzido');
        document.querySelector('.text-right-header').classList.add('item-header-reduzido');
    }
} */


// Header mobile

document.getElementById('icon-menu').addEventListener('click', () => {
    document.getElementById('header-mobile').style.display = "flex"
    document.getElementById('body').style.overflowY = 'hidden';
});
document.getElementById('exit-menu-mobile').addEventListener('click', () => {
    document.getElementById('header-mobile').style.display = "none"
    document.getElementById('body').style.overflowY = 'auto';
});

function maiouMenos(valor) {
    let numero = document.getElementById('');
    let contador = parseInt(numero.textContent);
    contador = Math.max(1, contador + valor);
    numero.textContent = contador;
    document.getElementById('form-Orca-numero').target.value = numero.textContent;
}

function ajustarTextoPerfil(id){
    let title = document.getElementById('header-nome-perfil')
    title.title = 'Perfil de ' + title.textContent;
    let perfil = document.getElementById(id);
    let nomePerfil = perfil.textContent;
    if(nomePerfil.length > 12){
        nomePerfil = nomePerfil.toUpperCase();
        nomePerfil = nomePerfil.slice(0, 12) + '...';

        perfil.textContent = nomePerfil;
    }
}

ajustarTextoPerfil('header-nome-perfil');
