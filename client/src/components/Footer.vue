<template>
    <div class="footer">
        <footer>
            <div class="footer__info">
                <div class="footer__info__logo">
                    <img src="../assets/avci-transfer.png" alt="Avcı Transfer Logosu">
                </div>
                <div class="footer__info__content">
                    <a href="mailto:info@avcitransfer.com"><i class="fa-solid fa-envelope"></i> info@avcitransfer.com</a>
                    <a href="#"><i class="fa-solid fa-location-dot"></i> Plattenstrasse 26 Street Regensdorf, Switzerland</a>
                    <a href="tel: +410444211547"><i class="fa-solid fa-phone"></i> (+41) 044 421 15 47</a>
                </div>
            </div>
            <div class="footer__about">
                <h4>About Us</h4>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nam iste ratione nihil dignissimos itaque tenetur nostrum similique consequatur dolorum ipsum modi corporis deleniti repellat laboriosam, aut voluptas. Aut, reprehenderit placeat magni in repellat alias nulla?</p>
            </div>
            <div class="footer__social">
                <h4>Social Media</h4>
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
.footer{
    background: #000;
}
.copyright{
    padding-bottom: 2%;
    height: 75px;
    color: #FFF;
    text-align: center;
    font-size: .9rem;
    display: flex;
    justify-content: center;
    align-items: center;
}
.copyright a{
    margin-left: 1%;
}
.copyright img{
    width: 100px;
    height: 75px;
    zoom: 1.2   ;
}

footer{
    background: #000;
    padding: 0 5%;
    display: flex;
    justify-content: space-around;
    align-items: center;
    color: #FFF;

}


.footer__info{
    flex-basis: 30%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
}
.footer__info__logo img{
    width: 400px;
    height: 300px;
}
.footer__info__content{
    margin-top: -10%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
}
.footer__info__content a{
    margin-bottom: 5px;
    color: white;
    opacity: .7;
    text-decoration: none;
    font-size: 1.1rem;
    transition: opacity .2s ease-in-out;
}
.footer__info__content a:hover{
    opacity: 1;
}



.footer__about{
    flex-basis: 30%;
}
.footer__about h4{
    font-size: 1.6rem;
    font-weight: 500;
    margin-bottom: 4%;
}
.footer__about p{
    font-size: .9rem;
    opacity: .9;
}



.footer__social h4{
    font-size: 1.6rem;
    font-weight: 500;
    margin-bottom: 9%;
}
.footer__social__links{
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
}
.footer__social__links a{
    text-decoration: none;
    font-size: 1.2rem;
    color: #FFF;
    opacity: .8;
    margin-bottom: 5%;
    transition: all .3s ease-in-out ;
}
.footer__social__links a:hover{
    opacity: 1;
    color: #ddbc04;
}
.footer__social__links a i{
    font-size: 1.5rem;
    margin-right: 10px;
}
</style>