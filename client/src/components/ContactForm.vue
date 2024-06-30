<template>
    <div class="contact-container">
        <div class="contact-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.633024535736!2d29.080555576284144!3d37.77520211213476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14c73f6a4006ae53%3A0xe9ffc9f289ccacc9!2sHematit%20Agency!5e0!3m2!1str!2str!4v1718820442583!5m2!1str!2str" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <form class="contact-form" @submit.prevent="messageSubmit">
            <div class="contact-form-title">
                <h2>Bize Ulaşın</h2>
            </div>
            <div class="contact-form__error" v-if="error">
                <span><i class="fa-solid fa-circle-exclamation"></i> Lütfen tüm alanları doldurunuz.</span>
            </div>
            <div class="contact-form-element">
                <label for="nameSurname">Ad Soyad</label>
                <input v-model="nameSurname" type="text" name="nameSurname" id="nameSurname">
            </div>
            <div class="contact-form-element">
                <label for="email">E-posta</label>
                <input v-model="email" type="email" name="email" id="email">
            </div>
            <div class="contact-form-element">
                <label for="subject">Konu</label>
                <select v-model="subject" name="subject" id="subject">
                    <option v-for="item in subjects" :key="item" :value="item">
                        {{ item }}
                    </option>
                </select>
            </div>
            <div class="contact-form-element">
                <label for="message">Mesaj</label>
                <textarea v-model="message" name="message" id="message" cols="30" rows="7"></textarea>
            </div>
            <div class="contact-form-element contact-form-button">
                <button type="submit">Gönder</button>
            </div>
        </form>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            nameSurname: "",
            email: "",
            subjects: ["Yorum", "Şikayet", "Öneri", "İstek"],
            subject: "",
            message: "",
            result: null,
            error: false
        }
    },
    methods: {
        validateMessageData() {
            if (
                this.nameSurname === '' ||
                this.email === '' ||
                this.subject === '' ||
                this.message === '' 
            ) {
                this.error = true;
                return false;
            }
            this.error = false;
            return true;
        },
        messageSubmit() {
            if(this.validateMessageData()){
                const messageData = {
                nameSurname: this.nameSurname,
                email: this.email,
                subject: this.subject,
                message: this.message
            }
            axios.post('http://127.0.0.1:8000/api/message', messageData)
                .then(res => {
                    if (res.data.success) {
                            Swal.fire({
                                title: "Mesajınız Gönderildi!",
                                icon: "success",
                                confirmButtonText: 'Tamam',
                                confirmButtonColor: '#000'
                            }).then(() => {
                                // Swal'dan Tamam'a tıkladıktan sonra sayfayı yenile
                                location.reload();
                            });
                            this.switchToStep(1);
                        } else {
                            Swal.fire({
                                title: "Bir Hata Oluştu.",
                                text: "Lütfen tekrar deneyiniz.",
                                icon: "error",
                                confirmButtonText: 'Tamam',
                                confirmButtonColor: '#000'
                            });
                        }
                });
            }
          
        }
    },
};
</script>

<style scoped>

.contact-container {
    width: 90%;
    margin: 0 5%;
    margin-top: 3%;
    padding: 3% 0;
    display: flex;
    justify-content: space-around;
    align-items: flex-start;
}
.contact-map{width: 50%;}
.contact-map iframe{
    width: 80%;
    height: 600px;
    border: 0;
}
.contact-form {
    width: 50%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
}
.contact-form-title {
    margin-bottom: 2%;
    width: 50%;
    display: flex;
    justify-content: flex-start;
}
.contact-form-title h2 {
    font-weight: 500;
    font-size: 1.8rem;
}
.contact-form-element {
    width: 100%;
    margin-bottom: 2%;
    display: flex;
    flex-direction: column;
}
.contact-form-element label {
    margin-bottom: 1%;
    font-size: .9rem;
    opacity: .7;
}
.contact-form-element input {
    height: 1.8rem;
    font-size: 1rem;
    padding: 2% 2%;
    border: 1px solid gray;
    border-radius: 5px;
}
.contact-form-element>input:focus,
.contact-form-element>select:focus,
.contact-form-element>textarea:focus {
    border: .1rem solid black;
    outline: none;
}
.contact-form-element select {
    font-family: "Poppins", sans-serif;
    font-size: .9rem;
    padding: 1%;
    border: 1px solid gray;
    border-radius: 5px;
}
.contact-form-element textarea {
    resize: none;
    font-family: "Poppins", sans-serif;
    font-size: 1rem;
    padding: 2%;
    border: 1px solid gray;
    border-radius: 5px;
}
.contact-form-button {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.contact-form-button button {
    cursor: pointer;
    width: 30%;
    background: #000;
    color: #ddbc04;
    border: 1.5px solid #000;
    border-radius: 5px;
    font-size: 1rem;
    padding: 1.4% 0;
    transition: all .3s ease;
}
.contact-form-button button:hover {
    border: 1.5px solid #ddbc04;
    background: #ddbc04;
    color: #000;
}

@media only screen and (max-width: 1024px) {

    .contact-map{
        width: 50%;
    }
    .contact-map iframe{
        width: 90%;
        height: 500px;
    }
    .contact-form {
        width: 50%;
    }
}
@media only screen and (max-width: 768px) {
    .contact-container{
        flex-direction: column;
        justify-content: start;
        align-items: center;
    }
    .contact-map{
        width: 90%;
    }
    .contact-map iframe{
        width: 100%;
        height: 400px;
    }
    .contact-form {
        margin-top: 8%;
        width: 80%;
    }
    .contact-form-button button {
    margin-top: 4%;
    width: 50%;
}
}
@media only screen and (max-width: 414px) {
    .contact-container{
        flex-direction: column;
        justify-content: start;
        align-items: center;
    }
    .contact-map{
        width: 90%;
    }
    .contact-map iframe{
        width: 100%;
        height: 250px;
    }
    .contact-form {
        margin-top: 8%;
        width: 90%;
    }
    .contact-form-title h2 {
    font-weight: 500;
    font-size: 1.4rem;
}
.contact-form-element label {
    margin-bottom: 1%;
    font-size: .7rem;
    opacity: .7;
}
.contact-form-element input {
    height: 1.4rem;
    font-size: .9rem;
    padding: 4% 4%;
    border: 1px solid gray;
    border-radius: 5px;
}
.contact-form-element select {
    font-family: "Poppins", sans-serif;
    font-size: .9rem;
    padding: 2% 2%;
    border: 1px solid gray;
    border-radius: 5px;
}
.contact-form-element textarea {
    resize: none;
    font-family: "Poppins", sans-serif;
    font-size: .9rem;
    padding: 2%;
    border: 1px solid gray;
    border-radius: 5px;
}
.contact-form-button button {
    margin-top: 4%;
    width: 50%;
}
}
@media only screen and (max-width: 375px) {
    .contact-container{
        flex-direction: column;
        justify-content: start;
        align-items: center;
    }
    .contact-map{
        width: 90%;
    }
    .contact-map iframe{
        width: 100%;
        height: 250px;
    }
    .contact-form {
        margin-top: 8%;
        width: 80%;
    }
    .contact-form-title h2 {
    font-weight: 500;
    font-size: 1.2rem;
}
.contact-form-element label {
    margin-bottom: 1%;
    font-size: .6rem;
    opacity: .7;
}
.contact-form-element input {
    height: 1.4rem;
    font-size: .8rem;
    padding: 4% 4%;
    border: 1px solid gray;
    border-radius: 5px;
}
.contact-form-element select {
    font-family: "Poppins", sans-serif;
    font-size: .8rem;
    padding: 2% 2%;
    border: 1px solid gray;
    border-radius: 5px;
}
.contact-form-element textarea {
    resize: none;
    font-family: "Poppins", sans-serif;
    font-size: .8rem;
    padding: 4%;
    border: 1px solid gray;
    border-radius: 5px;
}
.contact-form-button button {
    margin-top: 4%;
    width: 50%;
}
}
.contact-form__error {
    margin: 0 0 2% 0;
    background: #ddbc04;
    border-radius: 10px;
    width: 40%;
    padding: 2% 5%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.contact-form__error span {
    font-size: .9rem;
    display: flex;
    justify-content: center;
    align-items: center;
}

.contact-form__error span i {
    font-size: 1.2rem;
    margin-right: 10px;
}
</style>