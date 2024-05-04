<template>
    <div class="contact-container">
        <div class="contact-form-title">
            <h2>Bize Ulaşın</h2>
        </div>
        <form class="contact-form" @submit.prevent="messageSubmit">
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
            <textarea v-model="message" name="message" id="message" cols="30" rows="10"></textarea>
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
            nameSurname: "deneme",
            email: "deneme@gmail.com",
            subjects: ["Yorum", "Şikayet", "Öneri", "İstek"],
            subject: "Yorum",
            message: "deenemeddeneme",
            result: null
        }
    },
    methods: {
        messageSubmit() {
            const messageData = {
                nameSurname : this.nameSurname,
                email       : this.email,
                subject     : this.subject,
                message     : this.message
            }
            axios.post('http://127.0.0.1:8000/api/message', messageData)
                .then(res => {
                    console.log(res.data);
            });
        }
    },
};
</script>

<style scoped>
    .contact-container{
        margin-top: 3%;
        padding: 3% 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .contact-form{
        width: 50%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
    }
    .contact-form-title{
        margin-bottom: 2%;
        width: 50%;
        display: flex;
        justify-content: flex-start;
    }
    .contact-form-title h2{
        font-weight: 500;
        font-size: 2.1rem;
    }
    .contact-form-element{
        width: 100%;
        margin-bottom: 2%;
        display: flex;
        flex-direction: column;
    }
    .contact-form-element label{
        margin-bottom: 1%;
        font-size: 1.2rem;
        opacity: .7;
    }
    .contact-form-element input{
        height: 2.4rem;
        font-size: 1rem;
        padding: 2%;
        border: 1px solid gray;
        border-radius: 5px;
    }
    .contact-form-element > input:focus,
    .contact-form-element > select:focus,
    .contact-form-element > textarea:focus
    {
        border: .1rem solid black;
        outline: none;
    }
    .contact-form-element select{
        font-family: "Poppins", sans-serif;
        font-size: 1rem;
        padding: 1% 2%;
        border: 1px solid gray;
        border-radius: 5px;
    }
    .contact-form-element textarea{
        resize: none;
        font-family: "Poppins", sans-serif;
        font-size: 1rem;
        padding: 2%;
        border: 1px solid gray;
        border-radius: 5px;
    }
    .contact-form-button{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .contact-form-button button{
        cursor: pointer;
        width: 30%;
        background: #000;
        color: #fff;
        border: 1.5px solid #000;
        border-radius: 5px;
        font-size: 1rem;
        padding: 1.4% 0;
        transition: all .4s ease;
    }
    .contact-form-button button:hover{
        background: #fff;
        color: #000;
    }
</style>