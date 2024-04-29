// function inicializarCarrinho(){
    const urlIdProd = new URLSearchParams(window.location.search);
    const idProd = urlIdProd.get('idProd');
    
    // const btnAddProd = ;
    const prodNome = document.getElementById('nomeProduto');
    const qtdProdAdd = document.getElementById('numero-produto');
    const itemProdCarrinho = document.getElementsByClassName('item-produto-carrinho');
    const sectionTableProdCarrinho = document.getElementById('tabela-produtos-carrinho');
    function addProdInCarrinho(){
        // console.log('Botão clicado');
        if (!idProd) {
            console.log('Tela sem produto válido');
            return;
        } else {
            if (produtoJaNoCarrinho(idProd)) {
                var qtdProdText = qtdProdAdd ? qtdProdAdd.textContent : '0';
                var qtdProd = parseInt(qtdProdText);
                atualizarQuantidadeProduto(idProd, qtdProd);
            } else {
                addProdLocalStorage();
                atualizarCarrinho();
                // document.getElementById('carrinho-section').style.right = '0';
                popupAtualizacaoCarrinho();
            }
        }
        atualizarTotal();
    }
    // document.addEventListener('DOMContentLoaded', function () {
    
    const iconCarrinho = document.getElementById('icon-carrinho');
    
    iconCarrinho.addEventListener('click', abrirCarrinho);
    
    function verificarLarguraDaJanela(){
        const larguraTela = window.innerWidth
        
        if(larguraTela < 769){
            document.getElementById('body').style.overflowY = 'hidden';
        }
    }
    
    function abrirCarrinho(){
        document.getElementById('carrinho-section').style.right = '0';
        verificarLarguraDaJanela();
    }
    document.getElementById('exit-carrinho-section').addEventListener('click', fecharCarrinho);
    document.getElementById('voltar-carrinho').addEventListener('click', fecharCarrinho);
    
    function fecharCarrinho(){
        document.getElementById('carrinho-section').style.right = '-770px';
        document.getElementById('body').style.overflowY = 'auto';
    }
    
    // document.getElementById('btnAdicionarProd').addEventListener('click', () => {
    //     // console.log('Botão clicado');
    //     if (!idProd) {
    //         console.log('Tela sem produto válido');
    //         return;
    //     } else {
    //         if (produtoJaNoCarrinho(idProd)) {
    //             var qtdProdText = qtdProdAdd ? qtdProdAdd.textContent : '0';
    //             var qtdProd = parseInt(qtdProdText);
    //             atualizarQuantidadeProduto(idProd, qtdProd);
    //         } else {
    //             addProdLocalStorage();
    //             atualizarCarrinho();
    //             // document.getElementById('carrinho-section').style.right = '0';
    //             popupAtualizacaoCarrinho();
    //         }
    //     }
    //     atualizarTotal();
    // });
    
    function addProdLocalStorage(){
        var nome = prodNome.textContent;
        var qtdProdText = qtdProdAdd ? qtdProdAdd.textContent : '0';
        var qtdProd = parseInt(qtdProdText);
    
        const prodLocalStorage = JSON.parse(localStorage.getItem('Produtos')) || [];
    
        const prodExiste = prodLocalStorage.find(p => p.id === idProd);
            if(prodExiste){
                prodExiste.Quantidade += qtdProd;
            }else{
        prodLocalStorage.push({
            id: idProd,
            Nome: nome,
            Quantidade: qtdProd
        });
    }
    
        localStorage.setItem('Produtos', JSON.stringify(prodLocalStorage));
    }
    
    function atualizarCarrinho() {
        const prodLocalStorage = JSON.parse(localStorage.getItem('Produtos')) || [];
    
        prodLocalStorage.forEach((produto) => {
            const { id, Nome, Quantidade } = produto;
    
            // Verifica se o elemento já existe no carrinho
            const elementoExistente = document.querySelector(`.item-produto-carrinho[data-id="${id}"]`);
    
            if (elementoExistente) {
                // Se o elemento já existe, atualiza apenas a quantidade
                const qtdElemento = elementoExistente.querySelector('.numero-qtn');
                if (qtdElemento) {
                    qtdElemento.textContent = Quantidade;
                }
            } else {
                // Se o elemento não existe, cria um novo elemento
                const divItemProd = document.createElement('div');
                divItemProd.classList.add('item-produto-carrinho');
                divItemProd.setAttribute('data-id', id);
                divItemProd.innerHTML = `
                <div class="card-produto-carrinho">
                <div class="qtn-produto">
                    <i class="menos-mais iconMenos" id="" title="Retirar">
                        <svg version="1.1" viewBox="0 0 530 530" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="translate(8692.3 1870.3)">
                            <path id="path1" d="m-8504-1572.8v-64.908h153.49v64.908z"/>
                            <circle id="path2" cx="-8427.3" cy="-1605.3" r="240" stroke-width="40"/></g></svg>                              
                    </i>
    
                    <p class="numero-qtn" id="">${Quantidade}</p>
    
                    <i class="menos-mais iconMais" id="" title="Adicionar">
                        <svg version="1.1" viewBox="0 0 530 530" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="translate(8143 1850.4)">
                            <path id="path1" d="m-7906.6-1469.9v-88.426h-85.898v-55.5h85.898v-86.075h58.203v86.075h85.898v55.5h-85.898v88.426z" stroke-linecap="round" stroke-linejoin="round"/>
                            <circle id="path2" cx="-7878" cy="-1585.4" r="240" stroke-width="40"/></g>
                        </svg>
                    </i>
                </div>
                <p class="nome-produto" id="">${Nome}</p>
                <p class="idProd" style="display: none;">${id}</p>
                
                <i class="excluir-produto" id="" title="Remover">
                    <svg version="1.1" viewBox="0 0 512 677.59" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g transform="translate(9240.8 1935.8)"><g transform="matrix(18.669 0 0 18.669 171132 19407)" fill-rule="evenodd">
                        <path d="m-9660.4-1140.3h8.19s-0.069-0.5733 0.7254-1.7455c0.3913-0.5772 1.6163-0.8668 3.766-0.8584 2.3321 0.01 3.5016 0.2771 3.8437 0.8738 0.6266 1.0927 0.6402 1.7301 0.6402 1.7301h7.9518s0.98 0.063 1.0236 1.4156c0.043 1.3528-1.0236 1.6334-1.0236 1.6334h-25.117s-0.7854-0.5652-0.7854-1.645c0-1.0799 0.7854-1.404 0.7854-1.404zm2.745 4.8785c-1.385 0-2.6186 1.1201-2.5 2.5l2.0039 23.312c0.1186 1.3799 1.3884 2.5 2.7734 2.5h15.84c1.385 0 2.5548-1.1178 2.6426-2.5l1.4824-23.312c0.088-1.3822-1.115-2.5-2.5-2.5zm4.9726 6.8535c0.596 0 1.0762 0.4801 1.0762 1.0762v12.453c0 0.596-0.4802 1.0762-1.0762 1.0762s-1.0762-0.4802-1.0762-1.0762v-12.453c0-0.5961 0.4802-1.0762 1.0762-1.0762zm4.8965 0c0.596 0 1.0762 0.4801 1.0762 1.0762v12.453c0 0.596-0.4802 1.0762-1.0762 1.0762s-1.0762-0.4802-1.0762-1.0762v-12.453c0-0.5961 0.4802-1.0762 1.0762-1.0762zm4.8965 0c0.596 0 1.0762 0.4801 1.0762 1.0762v12.453c0 0.596-0.4802 1.0762-1.0762 1.0762s-1.0742-0.4802-1.0742-1.0762v-12.453c0-0.5961 0.4782-1.0762 1.0742-1.0762z"/><path d="m-9647.7-1143.2c-1.0863 0-1.9452 0.064-2.5997 0.2148-0.6544 0.1505-1.1204 0.3793-1.373 0.752-0.4097 0.6045-0.6049 1.0653-0.6953 1.3847-0.031 0.1078-0.036 0.1765-0.047 0.252h-7.9668a0.24947 0.24947 0 0 0-0.096 0.02s-0.2513 0.1051-0.4824 0.3594c-0.2312 0.2543-0.457 0.673-0.457 1.2734 0 1.2008 0.8886 1.8477 0.8886 1.8477a0.24947 0.24947 0 0 0 0.1465 0.047h25.117a0.24947 0.24947 0 0 0 0.062-0.01s0.3271-0.085 0.6328-0.3652c0.3057-0.2799 0.5998-0.7752 0.5762-1.5176-0.024-0.7363-0.3214-1.1793-0.6289-1.4062-0.3076-0.227-0.627-0.25-0.627-0.25a0.24947 0.24947 0 0 0-0.016 0h-7.748c-0.012-0.09 0-0.105-0.049-0.2715-0.087-0.3164-0.2567-0.7702-0.5801-1.334-0.224-0.3908-0.6773-0.6255-1.3359-0.7754s-1.5473-0.2176-2.7226-0.2226zm0 0.498c1.1567 0 2.0186 0.076 2.6133 0.2109 0.5947 0.1354 0.8976 0.3313 1.0156 0.5372 0.3033 0.5288 0.4552 0.9432 0.5313 1.2187 0.076 0.2755 0.076 0.3926 0.076 0.3926a0.24947 0.24947 0 0 0 0.2481 0.2441h7.9375s0.1699 0.01 0.3633 0.1524c0.1933 0.1427 0.4059 0.4071 0.4257 1.0234 0.019 0.6086-0.1975 0.9326-0.414 1.1309-0.2099 0.1922-0.3976 0.2407-0.4102 0.2441h-24.967c-0.078-0.059-0.6367-0.5004-0.6367-1.3965 0-0.4795 0.1666-0.7597 0.3281-0.9375 0.1493-0.1642 0.262-0.2085 0.2813-0.2168h8.1172a0.24947 0.24947 0 0 0 0.248-0.2793v-0.057c0-0.055 0.018-0.1472 0.055-0.2774 0.074-0.2603 0.2422-0.6725 0.6269-1.2402 0.1387-0.2046 0.4809-0.4104 1.0742-0.5469 0.5934-0.1364 1.4209-0.2072 2.4844-0.2031zm-9.9355 6.9844c-1.5195 0-2.8803 1.2311-2.7481 2.7695l2.0039 23.312c0.1306 1.5198 1.502 2.7285 3.0215 2.7285h15.84c1.5193 0 2.7965-1.2188 2.8926-2.7324l1.4824-23.312c0.098-1.5346-1.2307-2.7656-2.75-2.7656zm0 0.498h19.742c1.2508 0 2.3303 1.0046 2.252 2.2344l-1.4824 23.312c-0.079 1.2508-1.1438 2.2676-2.3946 2.2676h-15.84c-1.2505 0-2.4188-1.0315-2.5254-2.2715l-2.0039-23.312c-0.105-1.2214 1.0014-2.2305 2.252-2.2305zm4.9726 6.3555c-0.73 0-1.3262 0.5942-1.3262 1.3242v12.453c0 0.73 0.5962 1.3262 1.3262 1.3262s1.3262-0.5962 1.3262-1.3262v-12.453c0-0.73-0.5962-1.3242-1.3262-1.3242zm4.8965 0c-0.73 0-1.3262 0.5942-1.3262 1.3242v12.453c0 0.73 0.5962 1.3262 1.3262 1.3262s1.3262-0.5962 1.3262-1.3262v-12.453c0-0.73-0.5962-1.3242-1.3262-1.3242zm4.8965 0c-0.73 0-1.3223 0.5947-1.3223 1.3242v12.453c0 0.7295 0.5923 1.3262 1.3223 1.3262s1.3262-0.5962 1.3261-1.3262v-12.453c0-0.73-0.5962-1.3242-1.3261-1.3242zm-9.793 0.498c0.462 0 0.8262 0.3641 0.8262 0.8262v12.453c0 0.4621-0.3642 0.8282-0.8262 0.8282s-0.8262-0.3661-0.8262-0.8282v-12.453c0-0.4621 0.3642-0.8261 0.8262-0.8262zm4.8965 0c0.462 0 0.8281 0.3641 0.8281 0.8262v12.453c0 0.4621-0.3661 0.8282-0.8281 0.8282s-0.8262-0.3661-0.8262-0.8282v-12.453c0-0.4621 0.3642-0.8262 0.8262-0.8262zm4.8965 0c0.462 0 0.8281 0.3641 0.8281 0.8262v12.453c0 0.4621-0.3661 0.8282-0.8281 0.8282s-0.8242-0.3656-0.8242-0.8282v-12.453c0-0.4627 0.3621-0.8261 0.8242-0.8262z" 
                        /></g></g></svg>
                </i>
            </div>
                `;
                
                sectionTableProdCarrinho.append(divItemProd);
                divItemProd.getElementsByClassName('excluir-produto')[0].addEventListener('click', removerProd);
                divItemProd.getElementsByClassName('iconMenos')[0].addEventListener('click', decrementarQtdProd);
                divItemProd.getElementsByClassName('iconMais')[0].addEventListener('click', incrementarQtdProd);
            }
        });
    }
    atualizarCarrinho();
    
    function produtoJaNoCarrinho(id) {
        const prodLocalStorage = JSON.parse(localStorage.getItem('Produtos')) || [];
        return prodLocalStorage.some(produto => produto.id === id);
    }
    function atualizarQuantidadeProduto(id, quantidade) {
        const prodLocalStorage = JSON.parse(localStorage.getItem('Produtos')) || [];
        const produtoExistente = prodLocalStorage.find(p => p.id === id);
        if (produtoExistente) {
            produtoExistente.Quantidade += quantidade;
            localStorage.setItem('Produtos', JSON.stringify(prodLocalStorage));
            atualizarCarrinho();
        }
    }
    const btnZerarCarrinho = document.getElementById('btn-limpar-lista');
    
    
    btnZerarCarrinho.addEventListener('click', zerarCarrinho)
    function zerarCarrinho(){
        localStorage.removeItem('Produtos');
        sectionTableProdCarrinho.innerHTML = '';
        atualizarTotal();
    }
    
    const removeQtdProd = document.getElementsByClassName('iconMenos');
    const addQtdProd = document.getElementsByClassName('iconMais');
    const valueQtdProdCarrinho = document.getElementsByClassName('numero-qtn');
    const removerProdCarrinho = document.getElementsByClassName('excluir-produto')
    
    for(var i = 0; i < removerProdCarrinho.length; i++){
        removerProdCarrinho[i].addEventListener("click", removerProd)}
    
    
    
    
        function removerProd(e) {
            var idDoProduto = obterIdDoProduto(e.target);
        
            if (idDoProduto) {
                let prodLocalStorage = JSON.parse(localStorage.getItem('Produtos')) || [];
        
                prodLocalStorage = prodLocalStorage.filter((produto) => {
                    return produto.id !== idDoProduto;
                });
                localStorage.setItem('Produtos', JSON.stringify(prodLocalStorage));
                
                // console.log('Produto removido. Atualizando carrinho...');
                atualizarCarrinho();
                e.target.closest('.item-produto-carrinho').remove();
                atualizarTotal();
                // console.log(e.target.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement)
            }
        }
        
        function obterIdDoProduto(e) {
            var elementoProduto = e.closest('.item-produto-carrinho');
        
            if (elementoProduto) {
                var idDoProduto = elementoProduto.getAttribute('data-id');
                return idDoProduto;
            }
            return null;
        }
    
    
    for(var i = 0; i < removeQtdProd.length; i++){
        removeQtdProd[i].addEventListener("click", decrementarQtdProd)
    }
    function decrementarQtdProd(e) {
        let idDoProduto = obterIdDoProduto(e.target);
        if (idDoProduto) {
            let prodLocalStorage = JSON.parse(localStorage.getItem('Produtos')) || [];
    
            let produto = prodLocalStorage.find(p => p.id === idDoProduto);
    
            if (produto && produto.Quantidade > 1) {
                produto.Quantidade -= 1;
    
                // Atualizar o localStorage
                localStorage.setItem('Produtos', JSON.stringify(prodLocalStorage));
    
                // Atualizar o carrinho e o total
                atualizarCarrinho();
                atualizarTotal();
            }
            else{    
                if (idDoProduto) {
                    let prodLocalStorage = JSON.parse(localStorage.getItem('Produtos')) || [];
            
                    prodLocalStorage = prodLocalStorage.filter((produto) => {
                        return produto.id !== idDoProduto;
                    });
                    localStorage.setItem('Produtos', JSON.stringify(prodLocalStorage));
                    
                    // console.log('Produto removido. Atualizando carrinho...');
                    atualizarCarrinho();
                    e.target.closest('.item-produto-carrinho').remove();
                    atualizarTotal();
                    // console.log(e.target.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement)
                }
            }
        }
    }
    
    for(var i = 0; i < addQtdProd.length; i++){
        addQtdProd[i].addEventListener("click", incrementarQtdProd)
    }
    function incrementarQtdProd(e) {
        let idDoProduto = obterIdDoProduto(e.target);
        if (idDoProduto) {
            let prodLocalStorage = JSON.parse(localStorage.getItem('Produtos')) || [];
    
            let produto = prodLocalStorage.find(p => p.id === idDoProduto);
    
            if (produto) {
                produto.Quantidade += 1;
    
                // Atualizar o localStorage
                localStorage.setItem('Produtos', JSON.stringify(prodLocalStorage));
    
                // Atualizar o carrinho e o total
                atualizarCarrinho();
                atualizarTotal();
            }
        }
    }
    
    
    // function atualizarLocalStorage(){
    
    // }
    
    function atualizarTotal() {
        const total = document.getElementById('totalQtnProdutos');
        var totalValue = 0;
        
        for (var i = 0; i < itemProdCarrinho.length; i++) {
            const quantidadeProd = parseInt(valueQtdProdCarrinho[i].textContent);
    
            totalValue += quantidadeProd;
        }
        total.textContent = "TOTAL - " + totalValue;
        // console.log(total.textContent);
        const valorIconCarrinho = document.getElementById('qtd-carrinho');
        valorIconCarrinho.innerText = '';
        valorIconCarrinho.innerText = totalValue;
    
        if(totalValue == 0){
            document.getElementById('qtd-carrinho').parentElement.style.display = 'none';
            document.getElementById('finalizar-orcamento').style.display = 'none';
        }
        else{
            document.getElementById('qtd-carrinho').parentElement.style.display = 'flex';
            document.getElementById('finalizar-orcamento').style.display = 'block';
        }
        // popupAtualizacaoCarrinho()
    }
    atualizarTotal();
    
    document.getElementById('finalizar-orcamento').addEventListener('click', ()=>{
        window.location.href = '';
        window.location.href = 'http://localhost/BackEnd-Xgain-main/telas/fechar-orcamento.php';
        
    })
    
    function popupAtualizacaoCarrinho(){
        const popup = document.createElement('span');
        popup.setAttribute("id", "popupCarrinho");
        popup.innerHTML = '<p>O carrinho foi atualizado!</p>';
        popup.classList.add('popupDoCarrinho');
        document.body.appendChild(popup);
    
        popup.style.bottom = '40px';
        setTimeout(()=>{
            popup.style.bottom = '-100px'
        }, 2500);
    }
    // document.getElementById('popupCarrinho').addEventListener('click', ()=>{
    //     document.getElementById('popupCarrinho').style.bottom = '-100px';
    //     console.log('jonas')
    // })
    // popupAtualizacaoCarrinho();
    // }
    // inicializarCarrinho();
    // });