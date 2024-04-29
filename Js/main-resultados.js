//função base de receber os parametros, !categoria = o parametro busca para colocar no titulo, 
//else = if cat = else if subcat = altera o titulo e adiciona os estilos no filtro
//estilo do filtro feito dentro de uma função que vereficar qual var está true e adiciona o estilo de cada filtro
//

function abrirEFecharFiltros(){
    document.getElementById('abrir-itens-filtro-categoria-cardio').addEventListener('click', ()=>{

        if(document.getElementById('itens-filtro-categoria-cardio').style.display === 'block'){
            document.getElementById('itens-filtro-categoria-cardio').style.display = 'none'
            document.getElementById('abrir-itens-filtro-categoria-cardio').style.transform = 'rotate(-90deg)'
        }
        else{
        document.getElementById('itens-filtro-categoria-cardio').style.display = 'block';
        document.getElementById('abrir-itens-filtro-categoria-cardio').style.transform = 'rotate(0deg)'
        }
    })
    document.getElementById('abrir-itens-filtro-categoria-musculacao').addEventListener('click', ()=>{
    
        if(document.getElementById('itens-filtro-categoria-musculação').style.display === 'block'){
            document.getElementById('itens-filtro-categoria-musculação').style.display = 'none'
            document.getElementById('abrir-itens-filtro-categoria-musculacao').style.transform = 'rotate(-90deg)'
        }
        else{
        document.getElementById('itens-filtro-categoria-musculação').style.display = 'block';
        document.getElementById('abrir-itens-filtro-categoria-musculacao').style.transform = 'rotate(0deg)'
        }
    })
    document.getElementById('abrir-itens-filtro-categoria-acessorios').addEventListener('click', ()=>{144
    
        if(document.getElementById('itens-filtro-categoria-acessorios').style.display === 'block'){
            document.getElementById('itens-filtro-categoria-acessorios').style.display = 'none'
            document.getElementById('abrir-itens-filtro-categoria-acessorios').style.transform = 'rotate(-90deg)'
        }
        else{
        document.getElementById('itens-filtro-categoria-acessorios').style.display = 'block';
        document.getElementById('abrir-itens-filtro-categoria-acessorios').style.transform = 'rotate(0deg)'
        }
    })
}
function filtrosMobile(){
    window.addEventListener('resize', ()=>{
        if(window.innerWidth < 769){
            document.getElementById('itens-filtro-categoria-cardio').style.display = 'none';
            document.getElementById('abrir-itens-filtro-categoria-cardio').style.transform = 'rotate(-90deg)';
            document.getElementById('itens-filtro-categoria-musculação').style.display = 'none';
            document.getElementById('abrir-itens-filtro-categoria-musculacao').style.transform = 'rotate(-90deg)';
            document.getElementById('itens-filtro-categoria-acessorios').style.display = 'none';
            document.getElementById('abrir-itens-filtro-categoria-acessorios').style.transform = 'rotate(-90deg)';
        }
        else{
            document.getElementById('itens-filtro-categoria-cardio').style.display = 'block';
            document.getElementById('abrir-itens-filtro-categoria-cardio').style.transform = 'rotate(0deg)';
            document.getElementById('itens-filtro-categoria-musculação').style.display = 'block';
            document.getElementById('abrir-itens-filtro-categoria-musculacao').style.transform = 'rotate(0deg)';
            document.getElementById('itens-filtro-categoria-acessorios').style.display = 'block';
            document.getElementById('abrir-itens-filtro-categoria-acessorios').style.transform = 'rotate(0deg)';
        }
    })
    
    if(window.innerWidth < 769){
        document.getElementById('itens-filtro-categoria-cardio').style.display = 'none';
        document.getElementById('abrir-itens-filtro-categoria-cardio').style.transform = 'rotate(-90deg)';
        document.getElementById('itens-filtro-categoria-musculação').style.display = 'none';
        document.getElementById('abrir-itens-filtro-categoria-musculacao').style.transform = 'rotate(-90deg)';
        document.getElementById('itens-filtro-categoria-acessorios').style.display = 'none';
        document.getElementById('abrir-itens-filtro-categoria-acessorios').style.transform = 'rotate(-90deg)';
    }
    else{
        document.getElementById('itens-filtro-categoria-cardio').style.display = 'block';
        document.getElementById('abrir-itens-filtro-categoria-cardio').style.transform = 'rotate(0deg)';
        document.getElementById('itens-filtro-categoria-musculação').style.display = 'block';
        document.getElementById('abrir-itens-filtro-categoria-musculacao').style.transform = 'rotate(0deg)';
        document.getElementById('itens-filtro-categoria-acessorios').style.display = 'block';
        document.getElementById('abrir-itens-filtro-categoria-acessorios').style.transform = 'rotate(0deg)';
    };
}
abrirEFecharFiltros();
filtrosMobile();

const urlParams = new URLSearchParams(window.location.search);
var cardio = false, esteira = false, escada = false, bike = false;
var musculacao = false, abdomen = false, braco = false, costas = false, ombro = false, peito = false, perna = false;
var acessorios = false, utilitarios = false, equipamentos = false, outros = false;


function receberParams(){
    const buscar = urlParams.get('buscar');
    const cat = urlParams.get('cat');
    const subcat = urlParams.get('subcat');
    var title = document.getElementById('titlePagina');
    var titulo = document.getElementById('resultadosTitle');
    if(buscar !== 'categoria'){
        if(buscar.length > 30){
            titulo.innerHTML = buscar.slice(0, 30) + '...';
        }else {titulo.innerHTML = buscar;}
        titulo.title = buscar;
        title.innerHTML = buscar + ' | XGAIN';
        
        if(cat){
            if(cat === 'Cárdio'){
                cardio = true;
            }
            else if(cat == 'Musculação'){
                musculacao = true;
            }
            else if(cat == 'Acessórios'){
                acessorios = true;
            }
        }
        else if(subcat){
            if(subcat == 'Esteira'){
                esteira = true;
            }
            else if(subcat == 'Escada'){
                escada = true;
            }
            else if(subcat == 'Bike'){
                bike = true;
            }
            else if(subcat == 'Abdômen'){
                abdomen = true;
            }
            else if(subcat == 'Braço'){
                braco = true;
            }
            else if(subcat == 'Costas'){
                costas = true;
            }
            else if(subcat == 'Ombro'){
                ombro = true;
            }
            else if(subcat == 'Peito'){
                peito = true;
            }
            else if(subcat == 'Perna'){
                perna = true;
            }
            else if(subcat == 'Utilitários'){
                utilitarios = true;
            }
            else if(subcat == 'Equipamentos'){
                equipamentos = true;
            }
            else if(subcat == 'Outros'){
                outros = true;
            }
        }
    }
    else{
        if(cat){
            title.innerHTML = cat + ' | XGAIN';
            titulo.innerHTML = cat;
            titulo.title = cat;
            if(cat === 'Cárdio'){
                cardio = true;
            }
            else if(cat == 'Musculação'){
                musculacao = true;
            }
            else if(cat == 'Acessórios'){
                acessorios = true;
            }
        }
        else if(subcat){
            title.innerHTML = subcat + ' | XGAIN';
            titulo.innerHTML = subcat;
            titulo.title = subcat;

            if(subcat == 'Esteira'){
                esteira = true;
            }
            else if(subcat == 'Escada'){
                escada = true;
            }
            else if(subcat == 'Bike'){
                bike = true;
            }
            else if(subcat == 'Abdômen'){
                abdomen = true;
            }
            else if(subcat == 'Braço'){
                braco = true;
            }
            else if(subcat == 'Costas'){
                costas = true;
            }
            else if(subcat == 'Ombro'){
                ombro = true;
            }
            else if(subcat == 'Peito'){
                peito = true;
            }
            else if(subcat == 'Perna'){
                perna = true;
            }
            else if(subcat == 'Utilitários'){
                utilitarios = true;
            }
            else if(subcat == 'Equipamentos'){
                equipamentos = true;
            }
            else if(subcat == 'Outros'){
                outros = true;
            }
        }
    }
}

receberParams();

function filtrosEstilizacao(){
    const itensCardio = document.getElementById('itens-filtro-categoria-cardio');
    const iconeCardio = document.getElementById('abrir-itens-filtro-categoria-cardio');
    const itensMusculacao = document.getElementById('itens-filtro-categoria-musculação');
    const iconeMusculacao = document.getElementById('abrir-itens-filtro-categoria-musculacao');
    const itensAcessorios = document.getElementById('itens-filtro-categoria-acessorios');
    const iconeAcessorios = document.getElementById('abrir-itens-filtro-categoria-acessorios');

    const catCardio = document.getElementById('filtro-cardio');
    const catMusculacao = document.getElementById('filtro-musculacao');
    const catAcessorios = document.getElementById('filtro-acessorios');

    const subCatEsteira = document.getElementById('subFiltro-esteira');
    const subCatEscada = document.getElementById('subFiltro-escada');
    const subCatBike = document.getElementById('subFiltro-bike');
    const subCatAbdomen = document.getElementById('subFiltro-abdomen');
    const subCatBraco = document.getElementById('subFiltro-braco');
    const subCatCostas = document.getElementById('subFiltro-costas');
    const subCatOmbro = document.getElementById('subFiltro-ombro');
    const subCatPeito = document.getElementById('subFiltro-peito');
    const subCatPerna = document.getElementById('subFiltro-perna');
    const subCatUtilitarios = document.getElementById('subFiltro-utilitarios');
    const subCatEquipamentos = document.getElementById('subFiltro-equipamentos');
    const subCatOutros = document.getElementById('subFiltro-outros');
    
    if(cardio){
        itensCardio.style.display = 'block'; itensMusculacao.style.display = 'none'; itensAcessorios.style.display = 'none';
        iconeCardio.style.transform = 'rotate(0deg)'; iconeMusculacao.style.transform = 'rotate(-90deg)'; iconeAcessorios.style.transform = 'rotate(-90deg)';
        catCardio.style.color = '#992d2d';
    }
    else if(esteira){
        itensCardio.style.display = 'block'; itensMusculacao.style.display = 'none'; itensAcessorios.style.display = 'none';
        iconeCardio.style.transform = 'rotate(0deg)'; iconeMusculacao.style.transform = 'rotate(-90deg)'; iconeAcessorios.style.transform = 'rotate(-90deg)';
        catCardio.style.color = '#992d2d';
        subCatEsteira.style.color = '#992d2d';
        subCatEsteira.style.borderBlockEndColor = '#992d2d';
    }
    else if(escada){
        itensCardio.style.display = 'block'; itensMusculacao.style.display = 'none'; itensAcessorios.style.display = 'none';
        iconeCardio.style.transform = 'rotate(0deg)'; iconeMusculacao.style.transform = 'rotate(-90deg)'; iconeAcessorios.style.transform = 'rotate(-90deg)';
        catCardio.style.color = '#992d2d';
        subCatEscada.style.color = '#992d2d';
        subCatEscada.style.borderBlockEndColor = '#992d2d';
    }
    else if(bike){
        itensCardio.style.display = 'block'; itensMusculacao.style.display = 'none'; itensAcessorios.style.display = 'none';
        iconeCardio.style.transform = 'rotate(0deg)'; iconeMusculacao.style.transform = 'rotate(-90deg)'; iconeAcessorios.style.transform = 'rotate(-90deg)';
        catCardio.style.color = '#992d2d';
        subCatBike.style.color = '#992d2d';
        subCatBike.style.borderBlockEndColor = '#992d2d';
    }
    else if(musculacao){
        itensCardio.style.display = 'none'; itensMusculacao.style.display = 'block'; itensAcessorios.style.display = 'none';
        iconeCardio.style.transform = 'rotate(-90deg)'; iconeMusculacao.style.transform = 'rotate(0deg)'; iconeAcessorios.style.transform = 'rotate(-90deg)';
        catMusculacao.style.color = '#992d2d';
    }
    else if(abdomen){
        itensCardio.style.display = 'none'; itensMusculacao.style.display = 'block'; itensAcessorios.style.display = 'none';
        iconeCardio.style.transform = 'rotate(-90deg)'; iconeMusculacao.style.transform = 'rotate(0deg)'; iconeAcessorios.style.transform = 'rotate(-90deg)';
        catMusculacao.style.color = '#992d2d';
        subCatAbdomen.style.color = '#992d2d';
        subCatAbdomen.style.borderBlockEndColor = '#992d2d';
    }
    else if(braco){
        itensCardio.style.display = 'none'; itensMusculacao.style.display = 'block'; itensAcessorios.style.display = 'none';
        iconeCardio.style.transform = 'rotate(-90deg)'; iconeMusculacao.style.transform = 'rotate(0deg)'; iconeAcessorios.style.transform = 'rotate(-90deg)';
        catMusculacao.style.color = '#992d2d';
        subCatBraco.style.color = '#992d2d';
        subCatBraco.style.borderBlockEndColor = '#992d2d';
    }
    else if(costas){
        itensCardio.style.display = 'none'; itensMusculacao.style.display = 'block'; itensAcessorios.style.display = 'none';
        iconeCardio.style.transform = 'rotate(-90deg)'; iconeMusculacao.style.transform = 'rotate(0deg)'; iconeAcessorios.style.transform = 'rotate(-90deg)';
        catMusculacao.style.color = '#992d2d';
        subCatCostas.style.color = '#992d2d';
        subCatCostas.style.borderBlockEndColor = '#992d2d';
    }
    else if(ombro){
        itensCardio.style.display = 'none'; itensMusculacao.style.display = 'block'; itensAcessorios.style.display = 'none';
        iconeCardio.style.transform = 'rotate(-90deg)'; iconeMusculacao.style.transform = 'rotate(0deg)'; iconeAcessorios.style.transform = 'rotate(-90deg)';
        catMusculacao.style.color = '#992d2d';
        subCatOmbro.style.color = '#992d2d';
        subCatOmbro.style.borderBlockEndColor = '#992d2d';
    }
    else if(peito){
        itensCardio.style.display = 'none'; itensMusculacao.style.display = 'block'; itensAcessorios.style.display = 'none';
        iconeCardio.style.transform = 'rotate(-90deg)'; iconeMusculacao.style.transform = 'rotate(0deg)'; iconeAcessorios.style.transform = 'rotate(-90deg)';
        catMusculacao.style.color = '#992d2d';
        subCatPeito.style.color = '#992d2d';
        subCatPeito.style.borderBlockEndColor = '#992d2d';
    }
    else if(perna){
        itensCardio.style.display = 'none'; itensMusculacao.style.display = 'block'; itensAcessorios.style.display = 'none';
        iconeCardio.style.transform = 'rotate(-90deg)'; iconeMusculacao.style.transform = 'rotate(0deg)'; iconeAcessorios.style.transform = 'rotate(-90deg)';
        catMusculacao.style.color = '#992d2d';
        subCatPerna.style.color = '#992d2d';
        subCatPerna.style.borderBlockEndColor = '#992d2d';
    }
    else if(acessorios){
        itensCardio.style.display = 'none'; itensMusculacao.style.display = 'none'; itensAcessorios.style.display = 'block';
        iconeCardio.style.transform = 'rotate(-90deg)'; iconeMusculacao.style.transform = 'rotate(-90deg)'; iconeAcessorios.style.transform = 'rotate(0deg)';
        catAcessorios.style.color = '#992d2d';
    }
    else if(utilitarios){
        itensCardio.style.display = 'none'; itensMusculacao.style.display = 'none'; itensAcessorios.style.display = 'block';
        iconeCardio.style.transform = 'rotate(-90deg)'; iconeMusculacao.style.transform = 'rotate(-90deg)'; iconeAcessorios.style.transform = 'rotate(0deg)';
        catAcessorios.style.color = '#992d2d';
        subCatUtilitarios.style.color = '#992d2d';
        subCatUtilitarios.style.borderBlockEndColor = '#992d2d';
    }
    else if(equipamentos){
        itensCardio.style.display = 'none'; itensMusculacao.style.display = 'none'; itensAcessorios.style.display = 'block';
        iconeCardio.style.transform = 'rotate(-90deg)'; iconeMusculacao.style.transform = 'rotate(-90deg)'; iconeAcessorios.style.transform = 'rotate(0deg)';
        catAcessorios.style.color = '#992d2d';
        subCatEquipamentos.style.color = '#992d2d';
        subCatEquipamentos.style.borderBlockEndColor = '#992d2d';
    }
    else if(outros){
        itensCardio.style.display = 'none'; itensMusculacao.style.display = 'none'; itensAcessorios.style.display = 'block';
        iconeCardio.style.transform = 'rotate(-90deg)'; iconeMusculacao.style.transform = 'rotate(-90deg)'; iconeAcessorios.style.transform = 'rotate(0deg)';
        catAcessorios.style.color = '#992d2d';
        subCatOutros.style.color = '#992d2d';
        subCatOutros.style.borderBlockEndColor = '#992d2d';
    }
}
filtrosEstilizacao();

function categoriasFuncao(a){
    const categoria = a.classList.contains('categoriaFiltro');
    const url = window.location.href;
    if(categoria){
                if(url.includes('&')){
                    var limparUrl = url.split('&');
                    var urlLimpa = limparUrl[0];
                    var atualizarUrl = urlLimpa + `&cat=${a.innerHTML}`;
                }
                else{
                    var atualizarUrl = url + `&cat=${a.innerHTML}`;
                }
    }
    else{
                if(url.includes('&')){
                    var limparUrl = url.split('&');
                    var urlLimpa = limparUrl[0];
                    var atualizarUrl = urlLimpa + `&subcat=${a.innerHTML}`;
                }
                else{
                    var atualizarUrl = url + `&subcat=${a.innerHTML}`;
                }
    }


    window.location.href = atualizarUrl;

    
}

const urlComFiltro = window.location.href;
document.getElementById('icon-filter').title = 'Categorias';
if(urlComFiltro.includes('&')){
    document.getElementById('icon-filter').title = 'Limpar seleção';
    document.getElementById('icon-filter').addEventListener('click', () => {
        let recortarFiltro = urlComFiltro.split('&');
        let urlSemFiltro = recortarFiltro[0];
        window.location.href = urlSemFiltro;
    });
}
