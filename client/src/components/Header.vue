<template>
    <div class="container">
        <img src="../assets/avci-transfer-yellow-2.svg" alt="">
        <span>Hemen Rezervasyon Yap</span>
    </div>
</template>

<script>
    export default {
        
    }
</script>

<style scoped>
.container {
    width: 99.2vw;
    height: 80vh;
    background: url('../assets/avci-header.svg') no-repeat center center;
    background-size: cover;
    display: flex;
    flex-direction: column;
    justify-content: end;
    align-items: center;
    padding-bottom: 5%;
}
h1{
    margin-left: 5%;
    margin-bottom: .6%;
    font-size: 2.4rem;
    font-weight: 600;
    color: #ddbc04;
}
img{
    width: 150px;
    height: 150px;
    margin-left: 5%;
    margin-bottom: -1%;
}
span{
    border: 2px solid #ddbc04;
    border-radius: 5px;
    background: #ddbc04;
    padding: .5% 3%;
    margin-left: 5%;
}
@media only screen and (max-width: 768px) {
    .container {
    width: 100vw;
    height: 100vh;
    background: url('../assets/responsive-bg.svg') no-repeat center center;
    background-size: cover;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-bottom: 10%;
}
img{
    margin-top: 0%;
    width: 150px;
    height: 150px;
    margin-left: 5%;
    margin-bottom: -1%;
}
span{
    border: 2px solid #ddbc04;
    border-radius: 5px;
    background: #ddbc04;
    padding: 2% 5%;
    margin-left: 5%;
    font-size: .9rem;
}
}
</style>
