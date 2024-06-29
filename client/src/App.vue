<template>
  <div>
    <avci-navbar></avci-navbar>
    <avci-header></avci-header>
    <about-us></about-us>
    <reservation-form></reservation-form>
    <update-number></update-number>
    <contact-form></contact-form>
    <avci-footer></avci-footer> 
  </div>
</template>
<script>
import ContactForm from '@/components/ContactForm.vue';
import ReservationForm from './components/ReservationForm.vue';
import Footer from './components/Footer.vue';
import UpdateReservationVue from './components/Update-Reservation.vue';
import AboutUs from './components/About-Us.vue';
import Navbar from './components/Navbar.vue';
import HeaderVue from './components/Header.vue';

export default {
  components: {
    "contact-form"     : ContactForm,
    "reservation-form" : ReservationForm,
    "update-number"    : UpdateReservationVue,
    'avci-footer'      : Footer,
    'about-us'         : AboutUs,
    'avci-navbar'      : Navbar,
    'avci-header'      : HeaderVue
  },
};
</script>
<style scoped>

</style>
