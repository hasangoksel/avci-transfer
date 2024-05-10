<template>
  <contact-form></contact-form>
</template>
<script>
import ContactForm from '@/components/ContactForm.vue';
import ReservationForm from './components/ReservationForm.vue';

export default {
  components: {
    "contact-form"     : ContactForm,
    "reservation-form" : ReservationForm
  },
};
</script>
<style scoped>

</style>
