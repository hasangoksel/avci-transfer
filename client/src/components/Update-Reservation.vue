<template>
    <div class="reservation-update-container">
        <div class="logo">
            <img src="../assets/avci-transfer-black.svg" alt="Avcı Transfer Logosu">
        </div>
        <form @submit.prevent="checkReservation">
            <h3>Rezervasyon Bilgilerini Güncelle</h3>
            <span v-if="error" style="margin: 1% 0;"><i class="fa-solid fa-circle-exclamation"></i> Rezervasyonunuz bulunamadı.</span>
            <span v-if="errorTwo" style="margin: 1% 0;"><i class="fa-solid fa-circle-exclamation"></i> Lütfen rezervasyon numaranızı giriniz!</span>
            <input type="text" v-model="reservationNumber" placeholder="Rezervasyon Numaranızı Giriniz">
            <button type="submit">Sorgula</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            reservationNumber: null,
            error: false,
            errorTwo: false,
        }
    },
    methods: {
        checkReservation() {
            if (!this.reservationNumber) {
                this.errorTwo = true;
                return;
            }

            axios.get(`http://127.0.0.1:8000/api/getByReservation/${this.reservationNumber}`)
            .then(response => {
                // Başarılı yanıt durumunda yapılacak işlemler
                if (response.data.success) {
                    this.error = false;
                    this.errorTwo = false;
                    // Rezervasyon varsa yönlendir
                    this.$router.push(`/update-reservation/${this.reservationNumber}`);
                } else if(!response.data.success){
                    alert('Belirtilen rezervasyon numarası bulunamadı.');
                }
            }).catch(error => {
                // Hata durumunda yapılacak işlemler
                this.error = true;
            });;
        }
    }
}
</script>

<style scoped>
.logo {
    width: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.logo img {
    width: 40%;
    height: 250px;
}

.reservation-update-container {
    width: 100%;
    padding: 0 5%;
    background: #ddbc04;
    padding: 3% 0;
    display: flex;
    justify-content: center;
    align-items: center;
}

.reservation-update-container form {
    width: 60%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.reservation-update-container form h3 {
    font-size: 1.8rem;
    font-weight: 600;
    margin-bottom: 1%;
}

.reservation-update-container form input {
    height: 30px;
    width: 30%;
    font-size: 1rem;
    padding: 0.5% 0.5%;
    border: 1px solid gray;
    border-radius: 5px;
    margin-bottom: 1%;
}

.reservation-update-container form input:focus {
    outline: none;
}

.reservation-update-container form button {
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

.reservation-update-container form button:hover {
    border: 1.5px solid #000;
    background: #000;
    color: #ddbc04;
}


@media only screen and (max-width: 768px) {
    .reservation-update-container {
        flex-direction: column;
    }
    .logo {
        width: 100%;
    }
    .logo img {
        width: 35%;
        height: 100px;
    }
    .reservation-update-container form {
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding-bottom: 3%;
    }
    .reservation-update-container form h3 {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 1%;
    }
    .reservation-update-container form input {
        width: 55%;
        font-size: .8rem;
        padding: 1% 1%;
    }
    .reservation-update-container form button {
        width: 30%;
    }
}
@media only screen and (max-width: 414px) {
    .reservation-update-container {
        flex-direction: column;
    }
    .logo {
        width: 100%;
    }
    .logo img {
        width: 35%;
        height: 100px;
    }
    .reservation-update-container form {
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding-bottom: 3%;
    }
    .reservation-update-container form h3 {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 1%;
    }
    .reservation-update-container form input {
        width: 55%;
        font-size: .8rem;
        padding: 1% 1%;
    }
    .reservation-update-container form button {
        width: 30%;
    }
}

@media only screen and (max-width: 375px) {
    .reservation-update-container {
        flex-direction: column;
    }
    .logo {
        width: 100%;
    }
    .logo img {
        width: 50%;
        height: 100px;
    }
    .reservation-update-container form {
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding-bottom: 3%;
    }
    .reservation-update-container form h3 {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 1%;
    }
    .reservation-update-container form input {
        width: 55%;
        font-size: .8rem;
        padding: 1% 1%;
    }
    .reservation-update-container form button {
        width: 30%;
    }
}

</style>