<template>
    <div class="reservation-form-container">
        <div class="reservation-form-nav">
<<<<<<< HEAD
            <div class="reservation-form-nav__stage-one"></div>
            <div class="reservation-form-nav__stage-two"></div>
            <div class="reservation-form-nav__stage-three"></div>
            <div class="reservation-form-nav__stage-four"></div>
            <div class="reservation-form-nav__stage-five"></div>
        </div>
        <form class="reservation-form" @submit.prevent="cFourClick">
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
=======
            <div class="reservation-form-nav__stage" :class="{ 'active': cOne }" @click="switchToStep(1)">
                <i class="fa-solid fa-arrow-right-arrow-left"></i>
                <span>Rezervasyon Bilgileri</span>
            </div>
            <div class="reservation-form-nav__stage" :class="{ 'active': cTwo }" @click="switchToStep(2)">
                <i class="fa-solid fa-car"></i>
                <span>Transfer Seçimi</span>
            </div>
            <div class="reservation-form-nav__stage" :class="{ 'active': cThree }" @click="switchToStep(3)">
                <i class="fa-solid fa-user"></i>
                <span>Yolcu Bilgileri</span>
            </div>
            <div class="reservation-form-nav__stage" :class="{ 'active': cFour }" @click="switchToStep(4)">
                <i class="fa-solid fa-plane"></i>
                <span>Uçuş Bilgileri</span>
            </div>
            <div class="reservation-form-nav__stage" :class="{ 'active': cFive }" @click="switchToStep(5)">
                <i class="fa-solid fa-check-double"></i>
                <span>Rezervasyon Onayı</span>
            </div>
        </div>
        <form class="reservation-form">
            <div class="reservation-form__data">
                <div v-if="cOne" class="reservation-form__data__stage">
                    <h3>Rezervasyon Bilgileri</h3>
                    <div class="reservation-form__data__error" v-if="error">
                        <span><i class="fa-solid fa-circle-exclamation"></i> Lütfen tüm alanları doldurunuz.</span>
                    </div>
                    <div class="reservation-form__element">
                        <label>Transfer Tipi</label>
                        <div>
                            <input type="radio" id="shared" v-model="transferType" name="transferType" value="Paylaşımlı">
                            <label for="shared">Paylaşımlı</label><br>
                        </div>
                        <div>
                            <input type="radio" id="special" v-model="transferType" name="transferType" value="Özel">
                            <label for="special">Özel</label><br>
                        </div>
                    </div>
                    <div class="reservation-form__element">
                        <label>Yön Tercihi</label>
                        <div>
                            <input type="radio" id="airportToArea" v-model="direction" name="direction" value="airportToArea">
                            <label for="airportToArea">Havaalanından Bölgeye</label><br>
                        </div>
                        <div>
                            <input type="radio" id="areaToAirport" v-model="direction" name="direction" value="areaToAirport">
                            <label for="areaToAirport">Bölgeden Havaalanına</label><br>
                        </div>
                    </div>
                    <div class="reservation-form__element">
                        <label for="date">Tarih</label>
                        <input type="datetime-local" name="date" id="date" :min="minDateTime" v-model="reservationData.selectedDateTime" />
>>>>>>> hasangoksel
                    </div>
                    <div class="reservation-form__element">
                        <label for="departure">Kalkış Noktası</label>
                        <select name="departure" id="departure" v-model="reservationData.departurePoint">
<<<<<<< HEAD
                            <option value="0">Lütfen Seçiniz...</option>
=======
                            <option value="Lütfen Seçiniz">Lütfen Seçiniz...</option>
>>>>>>> hasangoksel
                            <option v-for="item in departure" :key="item" :value="item">{{ item }}</option>
                        </select>
                    </div>
                    <div class="reservation-form__element">
                        <label for="arrival">Varış Noktası</label>
                        <select name="arrival" id="arrival" v-model="reservationData.arrivalPoint">
<<<<<<< HEAD
                            <option value="0">Lütfen Seçiniz...</option>
=======
                            <option value="Lütfen Seçiniz">Lütfen Seçiniz...</option>
>>>>>>> hasangoksel
                            <option v-for="item in arrival" :key="item" :value="item">{{ item }}</option>
                        </select>
                    </div>
                    <div class="reservation-form__element">
                        <label for="count">Kişi Sayısı</label>
                        <input type="number" id="count" name="count" v-model="count" min="1" max="10">
                    </div>
<<<<<<< HEAD
                    <span class="c-button" @click="cOneClick">Devam Et</span>
                </div>
                <div v-if="cTwo" class="reservation-form__data__stage-two">
                    <h3>Transfer Seçimi</h3>
=======
                    <div class="reservation-form__button">
                        <span @click="cOneClick">Devam Et</span>
                    </div>
                </div>
                <div v-if="cTwo" class="reservation-form__data__stage">
                    <h3>Transfer Seçimi</h3>
                    <div class="reservation-form__data__error" v-if="error">
                        <span><i class="fa-solid fa-circle-exclamation"></i> Lütfen araç tipini belirleyiniz.</span>
                    </div>
>>>>>>> hasangoksel
                    <div class="reservation-form__element__vehicleType" v-for="item in vehicleType" :key="item.vehicleTypeID">
                        <input type="radio" :id="item.vehicleTypeID" name="vehicle" v-model="reservationData.vehicle" :value="item.type">
                        <label :for="item.vehicleTypeID" class="vehicle-type__name">
                            <div class="vehicle-type__image">Foto</div>
                            {{ item.type }}
                            <span class="vehicle-type__price">{{ price * count }}</span>
                        </label>
                    </div>
<<<<<<< HEAD
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
=======
                    <div class="reservation-form__button">
                        <span class="c-button" @click="cTwoClick">Devam Et</span>
                    </div>
                </div>
                <div v-if="cThree" class="reservation-form__data__stage">
                    <h3>Yolcu Bilgileri</h3>
                    <div class="reservation-form__data__error" v-if="error">
                        <span><i class="fa-solid fa-circle-exclamation"></i> Lütfen tüm alanları doldurunuz.</span>
                    </div>
                    <div class="travellerData" v-for="(traveller, index) in travellers" :key="index">
                        <h4>Yolcu - {{ index + 1 }}</h4>
                        <div class="reservation-form__element">
                            <label :for="'nameSurname-' + index">Ad Soyad</label>
                            <input type="text" :id="'nameSurname-' + index" v-model="traveller.nameSurname" />
                        </div>
                        <div class="reservation-form__element">
                            <label :for="'email-' + index">E-posta</label>
                            <input type="email" :id="'email-' + index" v-model="traveller.email" />
                        </div>
                        <div class="reservation-form__element">
                            <label :for="'tel-' + index">Telefon</label>
                            <input type="tel" :id="'tel-' + index" v-model="traveller.tel" />
                        </div>
                        <div class="reservation-form__element">
                            <label :for="'age-' + index">Yaş Kategorisi</label>
>>>>>>> hasangoksel
                            <select :id="'age-' + index" v-model="traveller.age">
                                <option value="">Lütfen seçiniz...</option>
                                <option value="adult">Yetişkin</option>
                                <option value="child">Çocuk</option>
                            </select>
                        </div>
                        <div class="reservation-form__element" v-if="index === 0">
<<<<<<< HEAD
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
=======
                            <label :for="'address-' + index">Alınacak Adres</label>
                            <input type="text" :id="'address-' + index" v-model="traveller.address" />
                        </div>
                    </div>
                    <div class="reservation-form__button">
                        <span class="c-button" @click="cThreeClick">Devam Et</span>
                    </div>
                </div>
                <div v-if="cFour" class="reservation-form__data__stage">
                    <h3>Uçuş Bilgileri</h3>
                    <div class="reservation-form__data__error" v-if="error">
                        <span><i class="fa-solid fa-circle-exclamation"></i> Lütfen tüm alanları doldurunuz.</span>
                    </div>
                    <div class="reservation-form__element">
                        <label for="aircraftCompany">Havayolu Şirketi</label>
>>>>>>> hasangoksel
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
<<<<<<< HEAD
                    <button type="submit" class="c-button" >Devam Et</button>
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

=======
                    <div class="reservation-form__button">
                        <span class="c-button" @click="cFourClick">Devam Et</span>
                    </div>
                </div>
                <div v-if="cFive" class="reservation-form__data__stage">
                    <h3>Rezervasyon Onayı</h3>
                    <div class="reservation-form__data__error" v-if="error">
                        <span><i class="fa-solid fa-circle-exclamation"></i> Lütfen kodu kontrol ediniz.</span>
                    </div>
                    <div class="reservation-form__element">
                        <label for="confirmation">Lütfen {{ travellers[0].tel }} telefona gelen onay kodunu giriniz:
                                </label>
                        <input type="number" name="confirmation" id="confirmation">
                    </div>
                    <div class="reservation-form__button">
                        <span class="c-button" @click="cFiveClick">Onayla</span>
                    </div>
                </div>
            </div>
            <div class="reservation-form__preview">
                <h2>Önizleme</h2>
                <table>
                    <tr>
                        <td>Kalkış Noktası:</td>
                        <td>{{ reservationData.departurePoint }}</td>
                    </tr>
                    <tr>
                        <td>Varış Noktası:</td>
                        <td>{{ reservationData.arrivalPoint }}</td>
                    </tr>
                    <tr>
                        <td>Kişi Sayısı:</td>
                        <td>{{ count }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>{{ reservationData.price }}₺</td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
</template>
>>>>>>> hasangoksel
<script>
import axios from 'axios';

export default {
    data() {
<<<<<<< HEAD
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
=======
    return {
        reservationData: {
            departurePoint: 'Lütfen Seçiniz',
            arrivalPoint: 'Lütfen Seçiniz',
            selectedDateTime: '',
            vehicle: '',
            aircraftCompany: '',
            flightNumber: '',
            flightTime: '',
            confirmationCode: '',
            price: 0
        },
        direction: null,
        transferType: null,
        count: 1,
        travellers: [{ nameSurname: '', email: '', tel: '', age: '', address: '' }],
        price: null,
        minDateTime: '',
        areas: null,
        vehicleType: [],
        departure: ["Dalaman Havalimanı"],
        arrival: null,
        aircraftCompanies: null,
        cOne: true,
        cTwo: false,
        cThree: false,
        cFour: false,
        cFive: false,
        error: false
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
            address: ''
        }));
    },
    'reservationData.arrivalPoint'(newArrivalPoint) {
        const points = {
            startingPoint: this.reservationData.departurePoint,
            arrivalPoint: newArrivalPoint
        };
        axios.post('http://127.0.0.1:8000/api/point-price', points)
            .then(res => {
                this.price = res.data.price;
                this.reservationData.price = this.price[0];
            });
    },
    transferType(newTransferType) {
        axios.get('http://127.0.0.1:8000/api/vehicle-type/service-type/' + newTransferType)
            .then(res => {
                this.vehicleType = res.data.service_type;
            });
    },
    direction(newDirection) {
        if (newDirection === 'airportToArea') {
            this.departure = ['Dalaman Havalimanı'];
            this.arrival = this.areas;
        } else if (newDirection === 'areaToAirport') {
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
            });
        axios.get('http://127.0.0.1:8000/api/aircraft-company')
            .then(res => {
                this.aircraftCompanies = res.data;
            });
    },
    methods: {
        switchToStep(step) {
            this.cOne = step === 1;
            this.cTwo = step === 2;
            this.cThree = step === 3;
            this.cFour = step === 4;
            this.cFive = step === 5;
        },
>>>>>>> hasangoksel
        setMinDateTime() {
            const now = new Date();
            const year = now.getFullYear();
            const month = String(now.getMonth() + 1).padStart(2, '0');
            const day = String(now.getDate()).padStart(2, '0');
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            this.minDateTime = `${year}-${month}-${day}T${hours}:${minutes}`;
        },
<<<<<<< HEAD
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
            axios.post('http://127.0.0.1:8000/api/reservation', this.reservationData)
              .then(res => {
                console.log(res.data);
            });
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
=======
        validateStepOne() {
            if (
                this.transferType === '' ||
                this.direction === '' ||
                this.reservationData.selectedDateTime === '' ||
                this.reservationData.departurePoint === '' ||
                this.reservationData.arrivalPoint === '' ||
                this.count <= 0
            ) {
                this.error = true;
                return false;
            }
            this.error = false;
            return true;
        },
        validateStepTwo() {
            if (this.reservationData.vehicle === '') {
                this.error = true;
                return false;
            }
            this.error = false;
            return true;
        },
        validateStepThree() {
            for (let traveller of this.travellers) {
                if (
                    traveller.nameSurname === '' ||
                    traveller.email === '' ||
                    traveller.tel === '' ||
                    traveller.age === '' ||
                    traveller.address === ''
                ) {
                    this.error = true;
                    return false;
                }
            }
            this.error = false;
            return true;
        },
        validateStepFour() {
            if (
                this.reservationData.aircraftCompany === '' ||
                this.reservationData.flightNumber === '' ||
                this.reservationData.flightTime === ''
            ) {
                this.error = true;
                return false;
            }
            this.error = false;
            return true;
        },
        cOneClick() {
            if (this.validateStepOne()) {
                this.switchToStep(2);
            }
        },
        cTwoClick() {
            if (this.validateStepTwo()) {
                this.switchToStep(3);
            }
        },
        cThreeClick() {
            if (this.validateStepThree()) {
                this.switchToStep(4);
            }
        },
        cFourClick() {
            if (this.validateStepFour()) {
                this.switchToStep(5);
            }
        },
        confirmReservation() {
            if (this.reservationData.confirmationCode === '') {
                this.error = true;
            } else {
                this.error = false;
                axios
                    .post('API_ENDPOINT', this.reservationData)
                    .then(response => {
                        console.log('Reservation Completed:', response.data);
                    })
                    .catch(error => {
                        console.error('Error completing reservation:', error);
                    });
            }
        }
    }
};
</script>
<style scoped>
.reservation-form-container {
    width: 90%;
    margin: 3% 5%;
    padding: 2%;
    border-radius: 20px;
}

.reservation-form-nav {
    width: 80%;
    margin: 0 10%;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.reservation-form-nav__stage {
    cursor: pointer;
    height: 4rem;
    display: flex;
    align-items: center;
}
.active{
    color: #ddbc04;
}
.reservation-form-nav__stage i {
    font-size: 1.6rem;
    margin-right: 12px;
    color: #ddbc04;
}

.reservation-form {
    width: 80%;
    margin: 3% 10%;
    display: flex;
    justify-content: space-around;
}

.reservation-form__data {
    width: 70%;
    margin-left: 5%;
}

.reservation-form__element {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    margin-top: 1%;
}

.reservation-form__element input {
    width: 50%;
    height: 2rem;
    font-size: 1rem;
    border-radius: 5px;
    box-shadow: none;
    padding-left: 1%;
    padding-right: 1%;
    border: 1px solid gray;
}

.reservation-form__element select {
    width: 50%;
    height: 2rem;
    font-size: 1rem;
    border-radius: 5px;
    padding-left: 1%;
    padding-right: 1%;
}

.reservation-form__element div input {
    width: 20px;
    margin-right: .28rem;
    height: 1rem;
    font-size: 1rem;
}

.reservation-form__button {
    margin-top: 3%;
    width: 50%;
    display: flex;
    justify-content: end;
}

.reservation-form__button span {
    border: 1px solid #000;
    padding: 1.8% 5%;
    border-radius: 5px;
    background: #000;
    color: #ddbc04;
    transition: background .2s ease;
}

.reservation-form__button span:hover {
    cursor: pointer;
    background: #ddbc04;
    color: black;
    border-color: #ddbc04;
}

.reservation-form__preview {
    width: 31%;
    height: 250px;
    margin-right: 5%;
    padding: 3% 2%;
    background: #ddbc04;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
}

.reservation-form__preview h2 {
    font-size: 1.6rem;
    font-weight: 600;
}

.reservation-form__preview table {
    width: 100%;
    margin-top: 5%;
}

.reservation-form__preview tr :nth-child(1) {
    font-weight: 500;
    font-size: .9rem;
}

.reservation-form__preview table :nth-child(4) {
    text-align: right;
    font-size: 1.4rem;
}

.reservation-form__data__error{
    margin: 2% 0;
    background: #ddbc04;
    border-radius: 10px;
    width: 50%;
    padding: 2% 5%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.reservation-form__data__error span{
    font-size: .9rem;
    display: flex;
    justify-content: center;
    align-items: center;
}
.reservation-form__data__error span i{
    font-size: 1.2rem;
    margin-right: 10px;
}
</style>
>>>>>>> hasangoksel
