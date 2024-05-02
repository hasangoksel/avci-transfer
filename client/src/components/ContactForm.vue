<template>
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
            <input v-model="subject" type="text" name="subject" id="subject">
        </div>
        <div class="contact-form-element">
            <label for="message">Mesaj</label>
            <textarea v-model="message" name="message" id="message" cols="30" rows="10"></textarea>
        </div>
        <div class="contact-form-element">
            <button type="submit">Gönder</button>
        </div>
    </form>
</template>
<script>
import axios from 'axios';

export default {
    data() {
        return {
            nameSurname: "deneme",
            email: "deneme@gmail.com",
            subject: "deneme",
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