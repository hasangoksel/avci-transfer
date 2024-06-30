<template>
    <div>
        <app-navbar/>
        <reservation-update/>
        <app-footer/>
    </div>
</template>

<script>
import FooterVue from '../components/Footer.vue'
import NavbarVue from '../components/Navbar.vue'
import ReservationUpdateFormVue from '../components/ReservationUpdateForm.vue'
    export default {
        components:{
            'app-navbar'        : NavbarVue,
            'app-footer'        : FooterVue,
            'reservation-update': ReservationUpdateFormVue
        },
    }
</script>