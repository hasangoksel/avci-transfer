<template>
    <div class="reservation-form-container">
        <div class="reservation-form-nav">
            <div class="reservation-form-nav__stage-one"></div>
            <div class="reservation-form-nav__stage-two"></div>
            <div class="reservation-form-nav__stage-three"></div>
            <div class="reservation-form-nav__stage-four"></div>
            <div class="reservation-form-nav__stage-five"></div>
        </div>
        <form class="reservation-form">
            <div class="reservation-form__data">
                <div class="reservation-form__data__stage-one">
                    <h3>Rezervasyon Bilgileri</h3>
                    <div class="reservation-form__element">
                        <label>Transfer Tipi</label><br>
                        <input type="radio" id="shared" name="transferType" value="Shared">
                        <label for="shared">Paylaşımlı</label><br>
                        <input type="radio" id="special" name="transferType" value="Special">
                        <label for="special">Özel</label><br>
                    </div>
                    <div class="reservation-form__element">
                        <label>Yön Tercihi</label><br>
                        <input type="radio" id="airportToArea" name="direction" value="airportToArea">
                        <label for="airportToArea">Havaalanından Bölgeye</label><br>
                        <input type="radio" id="areaToAirport" name="direction" value="areaToAirport">
                        <label for="areaToAirport">Bölgeden Havaalanına</label><br>
                    </div>
                    <div class="reservation-form__element">
                        <label for="date">Tarih</label>
                        <input type="datetime-local" name="date" id="date" :min="minDateTime"
                            v-model="selectedDateTime" />
                    </div>
                    <div class="reservation-form__element">
                        <label for="departure">Kalkış Noktası</label>
                        <select name="departure" id="departure">
                            <option v-for="item in departure" :key="item" :value="item">{{ item }}</option>
                        </select>
                    </div>
                    <div class="reservation-form__element">
                        <label for="arrival">Varış Noktası</label>
                        <select name="arrival" id="arrival">
                            <option v-for="item in arrival" :key="item" :value="item">{{ item }}</option>
                        </select>
                    </div>
                    <div class="reservation-form__element">
                        <label for="count">Kişi Sayısı</label>
                        <input type="number" id="count" name="count" v-model="count" min="1" max="10">
                    </div>
                    <span class="c-one">Devam Et</span>
                </div>
                <div class="reservation-form__data__stage-two">
                    <h3>Transfer Seçimi</h3>
                    <span class="c-two">Devam Et</span>
                </div>
                <div class="reservation-form__data__stage-three">
                    <h3>Yolcu Bilgileri</h3>
                    <div class="travellerData" v-for="(traveller, index) in travellers" :key="index">
                        <h4>Yolcu - {{ index + 1 }}</h4>
                        <div class="reservation-form__element">
                            <label for="nameSurname-{{ index }}">Ad Soyad</label>
                            <input type="text" :id="'nameSurname-' + index" v-model="traveller.nameSurname" />
                        </div>
                        <div class="reservation-form__element">
                            <label for="email-{{ index }}">E-posta</label>
                            <input type="email" :id="'email-' + index" v-model="traveller.email" />
                        </div>
                        <div class="reservation-form__element">
                            <label for="tel-{{ index }}">Telefon</label>
                            <input type="tel" :id="'tel-' + index" v-model="traveller.tel" />
                        </div>
                        <div class="reservation-form__element">
                            <label for="age-{{ index }}">Yaş Kategorisi</label>
                            <select :id="'age-' + index" v-model="traveller.age">
                                <option value="">Lütfen seçiniz...</option>
                                <option value="adult">Yetişkin</option>
                                <option value="child">Çocuk</option>
                            </select>
                        </div>
                        <div class="reservation-form__element" v-if="index === 0">
                            <label for="address-{{ index }}">Alınacak Adres</label>
                            <input type="text" :id="'address-' + index" v-model="traveller.address" />
                        </div>
                    </div>
                    <span class="c-three" @click="yolcuBilgi">Devam Et</span>
                </div>
                <div class="reservation-form__data__stage-four">
                    <h3>Transfer Bilgileri</h3>
                    <div class="reservation-form__element">
                        <label for="airlineCompany">Havayolu Şirketi</label>
                        <input type="text" name="airlineCompany" id="airlineCompany">
                    </div>
                    <div class="reservation-form__element">
                        <label for="flightNumber">Uçuş Numarası</label>
                        <input type="text" name="flightNumber" id="flightNumber">
                    </div>
                    <div class="reservation-form__element">
                        <label for="flightTime">Uçuş Saati</label>
                        <input type="time" name="flightTime" id="flightTime">
                    </div>
                    <span class="c-four">Devam Et</span>
                </div>
                <div class="reservation-form__data__stage-five">
                    <h3>Rezervasyon Onayı</h3>
                    <div class="reservation-form__element">
                        <label for="confirmation">Lütfen +90 (5***) *** *1 11 telefona gelen onay kodunu giriniz:
                        </label>
                        <input type="number" name="confirmation" id="confirmation">
                    </div>
                    <span class="c-five">Onayla</span>
                </div>
            </div>
            <div class="reservation-form__preview"></div>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            minDateTime: '',
            selectedDateTime: '',
            n: 1,
            count: 1,
            travellers: [{ nameSurname: '', email: '', tel: '', age: '', address: '' }],
            departure: ["Dalaman Havaalanı", "Datça", "Göycek"],
            arrival: ["Datça", "Göycek"],
        };
    },
    watch: {
        count(newCount) {
            // `count` değeri değiştiğinde `travellers` dizisini güncelle
            this.travellers = Array(newCount).fill().map(() => ({
                nameSurname: '',
                email: '',
                tel: '',
                age: '',
<<<<<<< HEAD
            }));
=======
                }));
>>>>>>> main
        },
    },

    mounted() {
        this.setMinDateTime();
    },
    methods: {
        setMinDateTime() {
            const now = new Date();
            const year = now.getFullYear();
            const month = String(now.getMonth() + 1).padStart(2, '0');
            const day = String(now.getDate()).padStart(2, '0');
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            this.minDateTime = `${year}-${month}-${day}T${hours}:${minutes}`;
        },
        yolcuBilgi(){
            console.log(this.travellers);
        }
    },
}
</script>