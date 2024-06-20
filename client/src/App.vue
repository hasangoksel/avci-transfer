<template>
  <div>
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
import AboutUsVue from './components/About-Us.vue';

export default {
  components: {
    "contact-form"     : ContactForm,
    "reservation-form" : ReservationForm,
    "update-number"    : UpdateReservationVue,
    'avci-footer'      : Footer,
    'about-us'         : AboutUsVue
  },
};
</script>
<style scoped>

</style>
