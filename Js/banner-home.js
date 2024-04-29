const imagens = document.querySelectorAll(".banner-img");
const qtnImgs = imagens.length
const bolinhasContainer = document.querySelector(".btns-bolinha-banner-home");
    const setinhas = document.querySelectorAll('.btn-setinha-banner');
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

function setinhasControl(){
    

    setinhas.forEach((setinha) => {
        setinha.addEventListener('click', (e)=>{
            const setaE = e.target.classList.contains('control-btn-setinha-E');
            const setaD = e.target.classList.contains('control-btn-setinha-D');
            
            if(setaE){
                bannerImgFoco -= 1;
            }
            else if(setaD){
                bannerImgFoco += 1;
            }
            // else{
            //     bannerImgFoco += 1;
            // };
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
    setinhasControl();
}

controlFunction();


if(qtnImgs <= 0){
        const localImg = document.querySelector(".banners-img");

        const img = document.createElement('img')
        img.src = '../imgs/banner-home-img-reserva.jpg';
        img.classList.add('banner-img');
        img.title = 'Não existe nenhum banner no momento'

        localImg.appendChild(img);

        document.getElementById('btns-setinha-banner-home').style.display = ('none');
    }
else if(qtnImgs === 1){
        document.getElementById('btns-setinha-banner-home').style.display = ('none');
}