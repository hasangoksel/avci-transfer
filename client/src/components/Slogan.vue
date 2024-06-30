<template>
    <div class="slogan-container">
        <div class="slogan-container__image">
            <img src="../assets/vehicle-fleet.svg" alt="Slogan Fotoğrafı">
        </div>
        <div class="slogan-container__content">
            <p>5 Adımda Kolay Rezervasyonun Keyfini Çıkarın!</p>
        </div>
    </div>
</template>

<style scoped>
.slogan-container{
    width: 100%;
    margin: 5% 0;
    padding: 0 15%;
    background: #ddbc04;
    display: flex;
    justify-content: space-around;
    align-items: center;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
}
.slogan-container__image{
    width: 30%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.slogan-container__image img{
    width: 100%;
    height: 300px;
}
.slogan-container__content{
    width: 60%;
    font-size: 1.6rem;
    font-style: italic;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

@media only screen and (max-width: 1024px) {
    .slogan-container{
    width: 100%;
    margin: 5% 0;
    padding: 0 5%;
    display: flex;
    justify-content: space-around;
    align-items: center;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
}
    .slogan-container__image{
    width: 40%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.slogan-container__image img{
    width: 100%;
    height: 300px;
}
.slogan-container__content{
    width: 60%;
    margin-left: 5%;
    font-size: 1.4rem;
    font-style: italic;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
}
@media only screen and (max-width: 768px) {
    .slogan-container{
    width: 100%;
    margin: 5% 0;
    padding: 0 5%;
    display: flex;
    justify-content: space-around;
    align-items: center;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
}
    .slogan-container__image{
    width: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.slogan-container__image img{
    width: 100%;
    height: 200px;
}
.slogan-container__content{
    width: 50%;
    margin-left: 5%;
    font-size: 1.2rem;
    font-style: italic;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
}
@media only screen and (max-width: 414px) {
    .slogan-container{
    width: 100%;
    margin: 5% 0;
    padding: 4% 0;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    align-items: center;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
}
    .slogan-container__image{
    width: 80%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.slogan-container__image img{
    width: 100%;
    height: 150px;
}
.slogan-container__content{
    width: 80%;
    margin-left: 1%;
    font-size: .9rem;
    font-style: italic;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
}
}
</style>