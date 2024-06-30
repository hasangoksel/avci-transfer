<template>
    <div class="reservation-form-container">
        <div class="reservation-form-nav">
            <div class="reservation-form-nav__stage" :class="{ 'active': cOne }">
                <i class="fa-solid fa-arrow-right-arrow-left"></i>
                <span>Rezervasyon Bilgileri</span>
            </div>
            <div class="reservation-form-nav__stage" :class="{ 'active': cTwo }">
                <i class="fa-solid fa-car"></i>
                <span>Transfer Seçimi</span>
            </div>
            <div class="reservation-form-nav__stage" :class="{ 'active': cThree }">
                <i class="fa-solid fa-user"></i>
                <span>Yolcu Bilgileri</span>
            </div>
            <div class="reservation-form-nav__stage" :class="{ 'active': cFour }">
                <i class="fa-solid fa-plane"></i>
                <span>Uçuş Bilgileri</span>
            </div>
            <div class="reservation-form-nav__stage" :class="{ 'active': cFive }">
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
                            <input type="radio" id="shared" v-model="transferType" name="transferType" value="Shared">
                            <label for="shared">Paylaşımlı</label><br>
                        </div>
                        <div>
                            <input type="radio" id="special" v-model="transferType" name="transferType" value="Special">
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
                    </div>
                    <div class="reservation-form__element">
                        <label for="departure">Kalkış Noktası</label>
                        <select name="departure" id="departure" v-model="reservationData.departurePoint">
                                                <option value="Lütfen Seçiniz">Lütfen Seçiniz...</option>
                                                <option v-for="item in departure" :key="item" :value="item">{{ item }}</option>
                                            </select>
                    </div>
                    <div class="reservation-form__element">
                        <label for="arrival">Varış Noktası</label>
                        <select name="arrival" id="arrival" v-model="reservationData.arrivalPoint">
                                                <option value="Lütfen Seçiniz">Lütfen Seçiniz...</option>
                                                <option v-for="item in arrival" :key="item" :value="item">{{ item }}</option>
                                            </select>
                    </div>
                    <div class="reservation-form__element">
                        <label for="count">Kişi Sayısı</label>
                        <input type="number" id="count" name="count" v-model="count" min="1" max="10">
                    </div>
                    <div class="reservation-form__button">
                        <span @click="cOneClick">Devam Et</span>
                    </div>
                </div>
                <div v-if="cTwo" class="reservation-form__data__stage">
                    <h3>Transfer Seçimi</h3>
                    <div class="reservation-form__data__error" v-if="error">
                        <span><i class="fa-solid fa-circle-exclamation"></i> Lütfen araç tipini belirleyiniz.</span>
                    </div>
                    <div class="reservation-form__element__vehicleType" v-for="item in vehicleType" :key="item.vehicleTypeID">
                        <input type="radio" :id="item.vehicleTypeID" name="vehicle" v-model="reservationData.vehicle" :value="item.type">
                        <label :for="item.vehicleTypeID" class="vehicle-type__name">
                    <div class="vehicle-type__image"><img :src="getImageUrl(item.type)" :alt="item.type"></div>
                    {{ item.type }}
                    <span class="vehicle-type__price" v-if="item.price !== '0.00'">+{{ item.price }}₺ <br> <strong>(Kişi Başı)</strong></span>
                </label>
                    </div>
                    <div class="reservation-form__button">
                        <span @click="switchToStep(1)">Geri Dön</span>
                        <span class="c-button" @click="cTwoClick">Devam Et</span>
                    </div>
                </div>
                <div v-if="cThree" class="reservation-form__data__stage">
                    <h3>Yolcu Bilgileri</h3>
                    <div class="reservation-form__data__error" v-if="error">
                        <span><i class="fa-solid fa-circle-exclamation"></i> Lütfen tüm alanları doldurunuz.</span>
                    </div>
                    <div class="travellerData" v-for="(traveller, index) in travellerData" :key="index">
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
                            <select :id="'age-' + index" v-model="traveller.age">
                                                    <option value="">Lütfen seçiniz...</option>
                                                    <option value="adult">Yetişkin</option>
                                                    <option value="child">Çocuk</option>
                                                </select>
                        </div>
                        <div class="reservation-form__element" v-if="index === 0">
                            <label :for="'address-' + index">Alınacak Adres</label>
                            <input type="text" :id="'address-' + index" v-model="traveller.address" />
                        </div>
                    </div>
                    <div class="reservation-form__button">
                        <span @click="switchToStep(2)">Geri Dön</span>
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
                    <div class="reservation-form__button">
                        <span @click="switchToStep(3)">Geri Dön</span>
                        <span class="c-button" @click="cFourClick">Devam Et</span>
                    </div>
                </div>
                <div v-if="cFive" class="reservation-form__data__stage">
                    <h3>Rezervasyon Onayı</h3>
                    <div class="reservation-form__data__error" v-if="error">
                        <span><i class="fa-solid fa-circle-exclamation"></i> Lütfen kodu kontrol ediniz.</span>
                    </div>
                    <div class="reservation-form__element">
                        <label for="confirmation">Lütfen {{ travellerData[0].tel }} telefona gelen onay kodunu giriniz:
                                                    </label>
                        <input type="number" name="confirmation" id="confirmation" v-model="userConfirmationCode">
                    </div>
                    <div class="reservation-form__button">
                        <span class="c-button" @click="confirmReservation">Onayla</span>
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

<script>
import axios from 'axios';

export default {
    data() {
        return {
            reservationData: {
                departurePoint: 'Lütfen Seçiniz',
                arrivalPoint: 'Lütfen Seçiniz',
                selectedDateTime: '',
                vehicle: '',
                aircraftCompany: '',
                flightNumber: '',
                flightTime: '',
                travellers: [],
                reservConfirm: false,
                price: 0
            },
            direction: null,
            confirmationCode: '',
            userConfirmationCode: '',
            transferType: null,
            count: 1,
            travellerData: [{ nameSurname: '', email: '', tel: '', age: '', address: '' }],
            price: null,
            selectedPrice: null,
            selectedVehiclePrice: null,
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
            error: false,
        };
    },
    watch: {
        count(newCount) {
            // `count` değeri değiştiğinde `travellerData` dizisini güncelle
            this.travellerData = Array(newCount).fill().map(() => ({
                nameSurname: '',
                email: '',
                tel: '',
                age: '',
                address: ''
            }));
            this.priceAction();

        },
        'reservationData.arrivalPoint' (newArrivalPoint) {
            const points = {
                startingPoint: this.reservationData.departurePoint,
                arrivalPoint: newArrivalPoint
            };
            axios.post('http://127.0.0.1:8000/api/point-price', points)
                .then(res => {
                    this.price = res.data.price;
                    this.reservationData.price = this.price[0];
                    this.selectedPrice = res.data.price;
                });
        },
        'reservationData.vehicle' (newVehicle) {
            const selectedVehicle = this.vehicleType.find(vehicle => vehicle.type === this.reservationData.vehicle);
            const vehiclePrice = parseFloat(selectedVehicle.price);
            this.selectedVehiclePrice = vehiclePrice;
            this.priceAction();
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
        getImageUrl(image) {
            return new URL(`../assets/${image}.svg`,
                import.meta.url).href;
        },
        priceAction() {
            if (this.reservationData.vehicle !== '') {
                const vehiclePrice = parseFloat(this.selectedVehiclePrice);
                const selectPrice = parseFloat(this.selectedPrice);
                const currentCount = parseFloat(this.count);
                // Toplama işleminden sonra sonucu iki ondalık basamağa yuvarlıyoruz
                this.reservationData.price = (currentCount * (selectPrice + vehiclePrice)).toFixed(2);

            } else {
                const count = parseFloat(this.count);
                const price = parseFloat(this.selectedPrice * count).toFixed(2);
                this.reservationData.price = price;
            }
        },
        switchToStep(step) {
            this.cOne = step === 1;
            this.cTwo = step === 2;
            this.cThree = step === 3;
            this.cFour = step === 4;
            this.cFive = step === 5;
        },
        setMinDateTime() {
            const now = new Date();
            const year = now.getFullYear();
            const month = String(now.getMonth() + 1).padStart(2, '0');
            const day = String(now.getDate()).padStart(2, '0');
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            this.minDateTime = `${year}-${month}-${day}T${hours}:${minutes}`;
        },
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
            for (let traveller of this.travellerData) {
                if (
                    traveller.nameSurname === '' ||
                    traveller.email === '' ||
                    traveller.tel === '' ||
                    traveller.age === '') {
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
                axios.get('http://127.0.0.1:8000/api/generate-code')
                    .then(res => {
                        console.log(res.data.code);
                        this.confirmationCode = res.data.code;
                    });
                this.switchToStep(5);
            }
        },
        confirmReservation() {
            if (this.userConfirmationCode != this.confirmationCode) {
                this.error = true;
            } else {
                this.error = false;
                this.reservationData.reservConfirm = true;
                this.reservationData.travellers = this.travellerData;
                axios
                    .post('http://127.0.0.1:8000/api/reservation', this.reservationData)
                    .then(res => {
                        if (res.data.success) {
                            Swal.fire({
                                title: "Rezervasyon Oluşturuldu!",
                                text: "Rezervasyon No: " + res.data.reservationNo,
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
                        console.log('Reservation Completed:', res.data);
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
    height: 4rem;
    display: flex;
    align-items: center;
}

.active {
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

.reservation-form__element div {
    display: flex;
    justify-content: start;
    align-items: center;
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
    justify-content: space-around;
}

.reservation-form__button :nth-child(2) {
    padding: 1.8% 5%;
    border-radius: 5px;
    background: #ddbc04;
    color: #000;
    transition: background .2s ease;
}

.reservation-form__button :nth-child(2):hover {
    cursor: pointer;
    background: #000;
    color: #ddbc04;
    border-color: #000;
}

.reservation-form__button :nth-child(1) {
    border: 1px solid #000;
    padding: 1.8% 5%;
    border-radius: 5px;
    background: #000;
    color: #ddbc04;
    transition: background .2s ease;
}

.reservation-form__button :nth-child(1):hover {
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

.reservation-form__data__error {
    margin: 2% 0;
    background: #ddbc04;
    border-radius: 10px;
    width: 50%;
    padding: 2% 5%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.reservation-form__data__error span {
    font-size: .9rem;
    display: flex;
    justify-content: center;
    align-items: center;
}

.reservation-form__data__error span i {
    font-size: 1.2rem;
    margin-right: 10px;
}

.reservation-form__element__vehicleType {
    width: 100%;
    padding: 2% 0;
    display: flex;
    justify-content: start;
    align-items: center;
}

.reservation-form__element__vehicleType label {
    margin-left: 5%;
    width: 90%;
    font-weight: 600;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.reservation-form__element__vehicleType span {
    margin-right: 5%;
    font-weight: 400;
}

.reservation-form__element__vehicleType span strong {
    font-weight: 400;
    font-size: .8rem;
}

.vehicle-type__image img {
    width: 250px;
    height: 250px;
}

@media only screen and (max-width: 1024px) {
    .reservation-form-container {
        width: 90%;
        margin: 3% 5%;
    }
    .reservation-form-nav {
        width: 100%;
        margin: 0 0%;
        font-size: .9rem;
    }
    .reservation-form-nav__stage i {
        font-size: 1.1rem;
        margin-right: 12px;
        color: #ddbc04;
    }
    .reservation-form {
        width: 90%;
        margin: 3% 5%;
        display: flex;
        justify-content: space-around;
    }
    .reservation-form__data {
        width: 80%;
        margin-left: 0;
    }
    .reservation-form__element {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        margin-top: 1%;
    }
    .reservation-form__element label {
        font-size: .8rem;
    }
    .reservation-form__element input {
        width: 70%;
        height: 1.8rem;
        font-size: .9rem;
        accent-color: #ddbc04;
    }
    .reservation-form__element select {
        width: 70%;
        height: 1.8rem;
        font-size: .9rem;
    }
    .reservation-form__element div input {
        width: 20px;
        margin-right: .28rem;
        height: 1rem;
        font-size: .9rem;
    }
    .reservation-form__button {
        width: 70%;
        font-size: .9rem;
    }
    .reservation-form__preview {
        width: 40%;
        height: 220px;
        margin-right: 0;
    }
    .reservation-form__preview h2 {
        font-size: 1.2rem;
        font-weight: 600;
    }
    .reservation-form__preview tr :nth-child(1) {
        font-weight: 500;
        font-size: .8rem;
    }
    .reservation-form__preview tr :nth-child(2) {
        font-weight: 400;
        font-size: .9rem;
    }
    .reservation-form__preview table :nth-child(4) {
        text-align: right;
        font-size: 1rem;
    }
    .reservation-form__data__error {
        width: 70%;
    }
    .reservation-form__data__error span {
        font-size: .9rem;
    }
    .reservation-form__element__vehicleType label {
        margin-left: 0%;
        width: 90%;
    }
    .vehicle-type__image img {
        width: 150px;
        height: 150px;
    }
}
@media only screen and (max-width: 768px) {
    .reservation-form-nav {
        width: 100%;
        margin: 0 0%;
        font-size: .85rem;
    }
    .reservation-form {
        width: 90%;
        margin: 3% 5%;
        display: flex;
        justify-content: space-around;
    }
    .reservation-form__element {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        margin-top: 1%;
    }
    .reservation-form__element label {
        font-size: .8rem;
    }
    .reservation-form__element input {
        width: 80%;
        height: 1.8rem;
        font-size: .9rem;
        accent-color: #ddbc04;
    }
    .reservation-form__element select {
        width: 80%;
        height: 1.8rem;
        font-size: .9rem;
    }
    .reservation-form__element div input {
        width: 20px;
        margin-right: .28rem;
        height: 1rem;
        font-size: .9rem;
    }
    .reservation-form__button {
        width: 80%;
        font-size: .8rem;
    }
    .reservation-form__preview {
        width: 45%;
        height: 200px;
        margin-right: 0;
    }
    .reservation-form__preview h2 {
        font-size: 1.1rem;
        font-weight: 600;
    }
    .reservation-form__preview tr :nth-child(1) {
        font-weight: 500;
        font-size: .75rem;
    }
    .reservation-form__preview tr :nth-child(2) {
        font-weight: 400;
        font-size: .85rem;
    }
    .reservation-form__preview table :nth-child(4) {
        text-align: right;
        font-size: 1rem;
    }
    .reservation-form__data__error {
        width: 80%;
    }
    .reservation-form__data__error span {
        font-size: .9rem;
    }
    .reservation-form__element__vehicleType label {
        margin-left: 0%;
        width: 90%;
        font-size: .9rem;
    }
    .vehicle-type__image img {
        width: 125px;
        height: 125px;
    }
}
@media only screen and (max-width: 650px) {
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
    flex-direction: column;
    justify-content: space-between;
    align-items: start;
}

.reservation-form-nav__stage {
    height: 4rem;
    display: none;
    align-items: center;
    margin-bottom: -5%;
}

.active {
    color: #ddbc04;
    display: flex;
}

.reservation-form-nav__stage i {
    font-size: 1.3rem;
    margin-right: 12px;
    color: #ddbc04;
}

.reservation-form {
    width: 90%;
    margin: 3% 5%;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
}

.reservation-form__data {
    width: 100%;
    margin-left: 5%;
}
.reservation-form__data__stage{
    margin-bottom: 5%;
}
.reservation-form__data__stage h3{
    display: none;
}
.reservation-form__element {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    margin-top: 1%;
}

.reservation-form__element input {
    width: 80%;
    height: 1.6rem;
    font-size: .8rem;
}

.reservation-form__element select {
    width: 80%;
    height: 1.6rem;
    font-size: .8rem;
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
    width: 80%;
    font-size: .8rem;
}


.reservation-form__preview {
    width: 80%;
    height: 185px;
    margin-left: 5%;
    margin-right: 5%;
    padding: 3% 4%;
    background: #ddbc04;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
}

.reservation-form__preview h2 {
    font-size: 1.5rem;
    font-weight: 600;
}

.reservation-form__preview table {
    width: 100%;
    margin-top: 5%;
}

.reservation-form__preview tr :nth-child(1) {
    font-weight: 500;
    font-size: .8rem;
}
.reservation-form__preview tr :nth-child(2) {
    font-weight: 400;
    font-size: 1rem;
}

.reservation-form__preview table :nth-child(4) {
    text-align: right;
    font-size: 1rem;
}

.reservation-form__data__error {
    margin: 2% 0;
    background: #ddbc04;
    border-radius: 10px;
    width: 80%;
    padding: 2% 5%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.reservation-form__data__error span {
    font-size: .8rem;
    display: flex;
    justify-content: center;
    align-items: center;
}

.reservation-form__data__error span i {
    font-size: 1rem;
    margin-right: 10px;
}

.reservation-form__element__vehicleType {
    width: 100%;
    padding: 2% 0;
    display: flex;
    justify-content: start;
    align-items: center;
}

.reservation-form__element__vehicleType label {
    margin-left: 0%;
    width: 90%;
    font-weight: 600;
    font-size: .8rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.reservation-form__element__vehicleType span {
    margin-right: 5%;
    font-weight: 400;
    font-size: .8rem;
}

.reservation-form__element__vehicleType span strong {
    font-weight: 400;
    font-size: .6rem;
}

.vehicle-type__image img {
    width: 120px;
    height: 120px;
}
}
@media only screen and (max-width: 414px) {
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
    flex-direction: column;
    justify-content: space-between;
    align-items: start;
}

.reservation-form-nav__stage {
    height: 4rem;
    display: none;
    align-items: center;
    margin-bottom: -5%;
}

.active {
    color: #ddbc04;
    display: flex;
}

.reservation-form-nav__stage i {
    font-size: 1.3rem;
    margin-right: 12px;
    color: #ddbc04;
}

.reservation-form {
    width: 90%;
    margin: 3% 5%;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
}

.reservation-form__data {
    width: 100%;
    margin-left: 5%;
}
.reservation-form__data__stage{
    margin-bottom: 5%;
}
.reservation-form__data__stage h3{
    display: none;
}
.reservation-form__element {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    margin-top: 1%;
}

.reservation-form__element input {
    width: 80%;
    height: 1.6rem;
    font-size: .8rem;
}

.reservation-form__element select {
    width: 80%;
    height: 1.6rem;
    font-size: .8rem;
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
    width: 80%;
    font-size: .8rem;
}


.reservation-form__preview {
    width: 90%;
    height: 170px;
    margin-left: 5%;
    margin-right: 5%;
    padding: 3% 4%;
    background: #ddbc04;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
}

.reservation-form__preview h2 {
    font-size: 1.3rem;
    font-weight: 600;
}

.reservation-form__preview table {
    width: 100%;
    margin-top: 5%;
}

.reservation-form__preview tr :nth-child(1) {
    font-weight: 500;
    font-size: .8rem;
}
.reservation-form__preview tr :nth-child(2) {
    font-weight: 400;
    font-size: .9rem;
}

.reservation-form__preview table :nth-child(4) :nth-child(2) {
    text-align: right;
    font-size: 1.2rem;
}

.reservation-form__data__error {
    margin: 2% 0;
    background: #ddbc04;
    border-radius: 10px;
    width: 80%;
    padding: 2% 5%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.reservation-form__data__error span {
    font-size: .8rem;
    display: flex;
    justify-content: center;
    align-items: center;
}

.reservation-form__data__error span i {
    font-size: 1rem;
    margin-right: 10px;
}

.reservation-form__element__vehicleType {
    width: 100%;
    padding: 2% 0;
    display: flex;
    justify-content: start;
    align-items: center;
}

.reservation-form__element__vehicleType label {
    margin-left: 0%;
    width: 90%;
    font-weight: 600;
    font-size: .8rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.reservation-form__element__vehicleType span {
    margin-right: 5%;
    font-weight: 400;
    font-size: .8rem;
}

.reservation-form__element__vehicleType span strong {
    font-weight: 400;
    font-size: .6rem;
}

.vehicle-type__image img {
    width: 110px;
    height: 110px;
}
}
@media only screen and (max-width: 375px) {


.reservation-form__preview {
    width: 90%;
    height: 150px;
    margin-left: 5%;
    margin-right: 5%;
    padding: 3% 4%;
    background: #ddbc04;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
}

.reservation-form__preview h2 {
    font-size: 1.1rem;
    font-weight: 600;
}

.reservation-form__preview table {
    width: 100%;
    margin-top: 5%;
}

.reservation-form__preview tr :nth-child(1) {
    font-weight: 500;
    font-size: .7rem;
}
.reservation-form__preview tr :nth-child(2) {
    font-weight: 400;
    font-size: .8rem;
}

.reservation-form__preview table :nth-child(4) :nth-child(2) {
    text-align: right;
    font-size: 1rem;
}

}
</style>