<template>
    <div class="about-us-container">
        <div class="about-us-container__image">
            <img src="../assets/airport-transfer-2.jpg" alt="Araç Filosu">
        </div>
        <div class="about-us-container__content">
            <h2>Hakkımızda</h2>
            <p>Avcı Transfer olarak, Muğla Dalaman Havaalanı’ndan bölgelere lüks ve konforlu ulaşım sağlama misyonuyla yola çıktık. Profesyonel ekibimizle, yolcularımızın tatillerine stressiz ve keyifli bir başlangıç yapmaları için üst düzey hizmet sunuyoruz.
                <br> Deneyimli şoförlerimiz ve modern araç filomuz ile güvenli, hızlı ve konforlu bir seyahat deneyimi sunmayı hedefliyoruz. Misafirlerimizin memnuniyeti bizim önceliğimizdir; bu nedenle her detayda kaliteyi ve mükemmeliyeti ön planda tutuyoruz.
                <br> Havaalanından otelinize, tatil beldenize ya da özel destinasyonlarınıza rahat ve güvenli bir şekilde ulaşmanızı sağlıyoruz. Avcı Transfer olarak, her zaman yanınızdayız ve siz değerli misafirlerimize en iyi hizmeti sunmak için çalışıyoruz.</p>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style scoped>
.about-us-container {
    width: 80%;
    margin: 3% 10%;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
    border-radius: 15px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.about-us-container__image {
    width: 40%;
    display: flex;
    justify-content: start;
    align-items: center;
}

.about-us-container__image img {
    width: 90%;
    height: 370px;
    border-radius: 15px 0 0 15px;
}

.about-us-container__content {
    width: 65%;
    padding-right: 5%;
}

.about-us-container__content h2 {
    font-weight: 600;
    font-size: 1.8rem;
}

.about-us-container__content p {
    font-size: .96rem;
    opacity: .9;
    margin-top: 2%;
}
@media only screen and (max-width: 1024px) {


.about-us-container__image {
    width: 45%;
    display: flex;
    justify-content: start;
    align-items: center;
}

.about-us-container__image img {
    width: 90%;
    height: 400px;
    border-radius: 15px 0 0 15px;
}

.about-us-container__content {
    width: 55%;
    padding-left: 1%;
}

.about-us-container__content h2 {
    font-weight: 600;
    font-size: 1.4rem;
}

.about-us-container__content p {
    font-size: .85rem;
    opacity: .9;
    margin-top: 1%;
}
}
@media only screen and (max-width: 768px) {
    .about-us-container {
        flex-direction: column;
        justify-content: start;
        align-items: start;
    }
    .about-us-container__image {
        width: 100%;
        display: flex;
        justify-content: start;
        align-items: center;
    }
    .about-us-container__image img {
        width: 100%;
        height: 370px;
        border-radius: 15px 15px 0 0;
    }
    .about-us-container__content {
        width: 100%;
        padding: 5%;
    }
    .about-us-container__content h2 {
        font-weight: 600;
        font-size: 1.4rem;
    }
    .about-us-container__content p {
        font-size: .86rem;
        opacity: .9;
    }
}
@media only screen and (max-width: 414px) {
    .about-us-container {
        flex-direction: column;
        justify-content: start;
        align-items: start;
    }
    .about-us-container__image {
        width: 100%;
        display: flex;
        justify-content: start;
        align-items: center;
    }
    .about-us-container__image img {
        width: 100%;
        height: 320px;
        border-radius: 15px 15px 0 0;
    }
    .about-us-container__content {
        width: 100%;
        padding: 10%;
    }
    .about-us-container__content h2 {
        font-weight: 600;
        font-size: 1.2rem;
    }
    .about-us-container__content p {
        font-size: .76rem;
        opacity: .9;
    }
}@media only screen and (max-width: 375px) {
    .about-us-container {
        flex-direction: column;
        justify-content: start;
        align-items: start;
    }
    .about-us-container__image {
        width: 100%;
        display: flex;
        justify-content: start;
        align-items: center;
    }
    .about-us-container__image img {
        width: 100%;
        height: 270px;
        border-radius: 15px 15px 0 0;
    }
    .about-us-container__content {
        width: 100%;
        padding: 10%;
    }
    .about-us-container__content h2 {
        font-weight: 600;
        font-size: 1.2rem;
    }
    .about-us-container__content p {
        font-size: .76rem;
        opacity: .9;
    }
}
</style>