<template>
    <div class="reservation-update-container">
        <div class="logo">
            <img src="../assets/avci-transfer-black.svg" alt="Avcı Transfer Logosu">
        </div>
        <form>
            <h3>Rezervasyon Bilgilerini Güncelle</h3>
            <input type="text" v-model="reservationNumber" placeholder="Rezervasyon Numaranızı Giriniz">
            <button>Güncelle</button>
        </form>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                reservationNumber: null
            }
        }
    }
</script>

<style scoped>
.logo{
    width: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.logo img{
    width: 40%;
    height: 250px;
}
.reservation-update-container{
    width: 100%;
    padding: 0 5%;
    background: #ddbc04;
    padding: 3% 0;
    display: flex;
    justify-content: center;
    align-items: center;
}
.reservation-update-container form{
    width: 60%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.reservation-update-container form h3{
    font-size: 1.8rem;
    font-weight: 600;
    margin-bottom: 1%;
}
.reservation-update-container form input{
    height: 30px;
    width: 30%;
    font-size: 1rem;
    padding: 0.5% 0.5%;
    border: 1px solid gray;
    border-radius: 5px;
    margin-bottom: 1%;
}
.reservation-update-container form input:focus{
    outline: none;
}
.reservation-update-container form button{
    cursor: pointer;
    width: 15%;
    background: transparent;
    color: #000;
    border: 1.5px solid #000;
    border-radius: 5px;
    font-size: 1rem;
    padding: 0.5% 0;
    transition: all .3s ease;
}
.reservation-update-container form button:hover{
    border: 1.5px solid #000;
    background: #000;
    color: #ddbc04;
}
</style>