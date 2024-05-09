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
                <div v-if="cOne" class="reservation-form__data__stage-one">
                    <h3>Rezervasyon Bilgileri</h3>
                    <div class="reservation-form__element">
                        <label>Transfer Tipi</label><br>
                        <input type="radio" id="shared" v-model="transferType" name="transferType" value="Paylaşımlı">
                        <label for="shared">Paylaşımlı</label><br>
                        <input type="radio" id="special" v-model="transferType" name="transferType" value="Özel">
                        <label for="special">Özel</label><br>
                    </div>
                    <div class="reservation-form__element">
                        <label>Yön Tercihi</label><br>
                        <input type="radio" id="airportToArea" v-model="direction" name="direction" value="airportToArea">
                        <label for="airportToArea">Havaalanından Bölgeye</label><br>
                        <input type="radio" id="areaToAirport" v-model="direction" name="direction" value="areaToAirport">
                        <label for="areaToAirport">Bölgeden Havaalanına</label><br>
                    </div>
                    <div class="reservation-form__element">
                        <label for="date">Tarih</label>
                        <input type="datetime-local" name="date" id="date" :min="minDateTime"
                        v-model="reservationData.selectedDateTime" />
                    </div>
                    <div class="reservation-form__element">
                        <label for="departure">Kalkış Noktası</label>
                        <select name="departure" id="departure" v-model="reservationData.departurePoint">
                            <option value="0">Lütfen Seçiniz...</option>
                            <option v-for="item in departure" :key="item" :value="item">{{ item }}</option>
                        </select>
                    </div>
                    <div class="reservation-form__element">
                        <label for="arrival">Varış Noktası</label>
                        <select name="arrival" id="arrival" v-model="reservationData.arrivalPoint">
                            <option value="0">Lütfen Seçiniz...</option>
                            <option v-for="item in arrival" :key="item" :value="item">{{ item }}</option>
                        </select>
                    </div>
                    <div class="reservation-form__element">
                        <label for="count">Kişi Sayısı</label>
                        <input type="number" id="count" name="count" v-model="count" min="1" max="10">
                    </div>
                    <span class="c-button" @click="cOneClick">Devam Et</span>
                </div>
                <div v-if="cTwo" class="reservation-form__data__stage-two">
                    <h3>Transfer Seçimi</h3>
                    <div class="reservation-form__element__vehicleType" v-for="item in vehicleType" :key="item.vehicleTypeID">
                        <input type="radio" :id="item.vehicleTypeID" name="vehicle" v-model="reservationData.vehicle" :value="item.type">
                        <label :for="item.vehicleTypeID" class="vehicle-type__name">
                            <div class="vehicle-type__image">Foto</div>
                            {{ item.type }}
                            <span class="vehicle-type__price">{{ price * count }}</span>
                        </label>
                    </div>
                    <span class="c-button" @click="cTwoClick">Devam Et</span>
                </div>
                <div v-if="cThree" class="reservation-form__data__stage-three">
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
                    <span class="c-button" @click="cThreeClick">Devam Et</span>
                </div>
                <div v-if="cFour" class="reservation-form__data__stage-four">
                    <h3>Transfer Bilgileri</h3>
                    <div class="reservation-form__element">
                        <label for="airlineCompany">Havayolu Şirketi</label>
                        <select name="aircraftCompany" id="aircraftCompany" v-model="reservationData.aircraftCompany">
                            <option value="0">Lütfen Seçiniz</option>
                            <option v-for="item in aircraftCompanies" :key="item" :value="item">{{ item }}</option>
                        </select>
                    </div>
                    <div class="reservation-form__element">
                        <label for="flightNumber">Uçuş Numarası</label>
                        <input type="text" name="flightNumber" id="flightNumber" v-model="reservationData.flightNumber">
                    </div>
                    <div class="reservation-form__element">
                        <label for="flightTime">Uçuş Saati</label>
                        <input type="time" name="flightTime" id="flightTime" v-model="reservationData.flightTime">
                    </div>
                    <span class="c-button" @click="cFourClick">Devam Et</span>
                </div>
                <div v-if="cFive" class="reservation-form__data__stage-five">
                    <h3>Rezervasyon Onayı</h3>
                    <div class="reservation-form__element">
                        <label for="confirmation">Lütfen +90 (5***) *** *1 11 telefona gelen onay kodunu giriniz:
                        </label>
                        <input type="number" name="confirmation" id="confirmation">
                    </div>
                    <span class="c-button" @click="cFiveClick">Onayla</span>
                </div>
            </div>
            <div class="reservation-form__preview"></div>
        </form>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            reservationData:{
                departurePoint: 0,
                arrivalPoint: 0,
                selectedDateTime: '',
                vehicle: 1,
                aircraftCompany: 0,
                flightNumber: '',
                flightTime: '',
                travellers: null,
                reservConfirm : true,
                price: 0
            },
            direction: null,
            transferType: null,
            count: 1,
            travellers: [{ nameSurname: '', email: '', tel: '', age: '', address: '' }],
            minDateTime: '',
            areas: null,
            vehicleType: [],
            n: 1,
            price: null,
            departure: ["Dalaman Havalimanı"],
            arrival: null,
            aircraftCompanies: null,
            cOne: true,
            cTwo: false,
            cThree: false,
            cFour: false,
            cFive: false,
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
            }));
        },
        transferType(){
            axios.get('http://127.0.0.1:8000/api/vehicle-type/service-type/' + this.transferType)
              .then(res => {
                this.vehicleType = res.data.service_type;
              });
        },
        direction(){
            if(this.direction == 'airportToArea'){
                this.departure = ['Dalaman Havalimanı'];
                this.arrival = this.areas;
            }else if(this.direction == 'areaToAirport'){
                this.departure = this.areas;
                this.arrival = ['Dalaman Havalimanı'];
            }
        }
    },

    mounted() {
        this.setMinDateTime();
        axios.get('http://127.0.0.1:8000/api/start-airport')
              .then(res => {
                this.areas = res.data.startAirport;
                this.arrival = this.areas;
        })
        axios.get('http://127.0.0.1:8000/api/aircraft-company')
              .then(res => {
                this.aircraftCompanies = res.data;
        });
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
        cOneClick(){
            this.cOne = false;
            this.cTwo = true;
            this.cThree = false;
            this.cFour = false;
            this.cFive = false;
            const points = {
                startingPoint: this.reservationData.departurePoint,
                arrivalPoint: this.reservationData.arrivalPoint
            }
            axios.post('http://127.0.0.1:8000/api/point-price', points)
              .then(res => {
                this.price = res.data.price;
            });
            console.log(this.transferType);
        },
        cTwoClick(){
            this.cOne = false;
            this.cTwo = false;
            this.cThree = true;
            this.cFour = false;
            this.cFive = false;
        },
        cThreeClick(){
            this.cOne = false;
            this.cTwo = false;
            this.cThree = false;
            this.cFour = true;
            this.cFive = false;
        },
        cFourClick(){
            this.cOne = false;
            this.cTwo = false;
            this.cThree = false;
            this.cFour = false;
            this.cFive = true;
            this.reservationData.price = this.price * this.count;
            this.reservationData.travellers = this.travellers;
            console.log(this.reservationData);
        },
        cFiveClick(){
            this.cOne = true;
            this.cTwo = false;
            this.cThree = false;
            this.cFour = false;
            this.cFive = false;
        }
    },
}
</script>