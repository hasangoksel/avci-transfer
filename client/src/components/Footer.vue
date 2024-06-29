<template>
    <div class="footer">
        <footer>
            <div class="footer__info">
                <div class="footer__info__logo">
                    <img src="../assets/avci-transfer.svg" alt="Avcı Transfer Logosu">
                </div>
                <div class="footer__info__content">
                    <a href="mailto:info@avcitransfer.com"><i class="fa-solid fa-envelope"></i> info@avcitransfer.com</a>
                    <a href="#"><i class="fa-solid fa-location-dot"></i> Merkez Mahallesi Sanayi Caddesi No:40 Dalaman/Muğla</a>
                    <a href="tel: +905431384848"><i class="fa-solid fa-phone"></i> (+90) 543 138 48 48</a>
                </div>
            </div>
            <div class="footer__about">
                <h4>Hakkımızda</h4>
                <p>Avcı Transfer olarak, Muğla Dalaman Havaalanı’ndan bölgelere lüks ve konforlu ulaşım sağlıyoruz. Profesyonel ekibimiz ve deneyimli şoförlerimizle, misafirlerimize güvenli ve keyifli bir seyahat deneyimi sunuyoruz.
                    <br> Havaalanından otelinize, tatil beldenize ya da özel destinasyonlarınıza rahatça ulaşmanızı sağlamak için buradayız. Misafir memnuniyeti önceliğimizdir ve her detayda kaliteyi gözetiyoruz. Avcı Transfer olarak, her zaman yanınızdayız
                    ve en iyi hizmeti sunmak için çalışıyoruz.</p>
            </div>
            <div class="footer__social">
                <h4>Sosyal Medya</h4>
                <div class="footer__social__links">
                    <a href="https://www.youtube.com/"><i class="fa-brands fa-youtube"></i> Youtube</a>
                    <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i>  Instagram</a>
                    <a href="https://x.com/home"><i class="fa-brands fa-x-twitter"></i> Twitter</a>
                </div>
            </div>
        </footer>
        <div class="copyright">
            <p>© 2024 Avcı Transfer | Designed by</p>
            <a href="https://www.hematitagency.com.tr"><img src="../assets/logo-hematit.svg" alt="Hematit Agency Logo"></a>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style scoped>
.footer {
    background: #000;
}

.copyright {
    padding-bottom: 2%;
    height: 75px;
    color: #FFF;
    text-align: center;
    font-size: .9rem;
    display: flex;
    justify-content: center;
    align-items: center;
}

.copyright a {
    margin-left: 1%;
}

.copyright img {
    width: 100px;
    height: 75px;
    zoom: 1.2;
}

footer {
    background: #000;
    padding: 3.5% 5%;
    display: flex;
    justify-content: space-around;
    align-items: start;
    color: #FFF;
}

.footer__info {
    margin-top: -3%;
    flex-basis: 30%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
}

.footer__info__logo img {
    width: 100%;
    height: 222px;
}

.footer__info__content {
    margin-top: -10%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
}

.footer__info__content a {
    margin-bottom: 5px;
    color: white;
    opacity: .7;
    text-decoration: none;
    font-size: 1.1rem;
    transition: opacity .2s ease-in-out;
}

.footer__info__content a:hover {
    opacity: 1;
}

.footer__about {
    flex-basis: 30%;
}

.footer__about h4 {
    font-size: 1.6rem;
    font-weight: 500;
    margin-bottom: 4%;
}

.footer__about p {
    font-size: .9rem;
    opacity: .9;
}

.footer__social h4 {
    font-size: 1.6rem;
    font-weight: 500;
    margin-bottom: 9%;
}

.footer__social__links {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
}

.footer__social__links a {
    text-decoration: none;
    font-size: 1.2rem;
    color: #FFF;
    opacity: .8;
    margin-bottom: 5%;
    transition: all .3s ease-in-out;
}

.footer__social__links a:hover {
    opacity: 1;
    color: #ddbc04;
}

.footer__social__links a i {
    font-size: 1.5rem;
    margin-right: 10px;
}

@media only screen and (max-width: 768px) {
    footer {
        flex-direction: column;
    }
    .footer__info__logo img {
        width: 100%;
        height: 222px;
    }
    .footer__info__content a {
        margin-bottom: 5px;
        font-size: .9rem;
    }
    .footer__about h4 {
        margin-top: 5%;
        font-size: 1.4rem;
        margin-bottom: 1%;
    }
    .footer__about p {
        font-size: .8rem;
        opacity: .8;
    }
    .footer__social__links a {
        font-size: 1rem;
    }
    .footer__social__links a i {
        font-size: 1.2rem;
        margin-right: 10px;
    }
    .footer__social h4 {
        margin-top: 15%;
        font-size: 1.4rem;
        font-weight: 500;
        margin-bottom: 4%;
    }
    .copyright {
        height: 50px;
        font-size: .7rem;
    }
    .copyright a {
        margin-left: 1%;
    }
    .copyright img {
        width: 75px;
        height: 50px;
    }
}
</style>