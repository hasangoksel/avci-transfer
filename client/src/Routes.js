import { createRouter, createWebHistory } from "vue-router";

// User Pages
import Home              from "./pages/Home.vue"
import UpdateReservation from "./pages/UpdateReservation.vue";


const Router = createRouter({
    history: createWebHistory(),
    routes:[
        // Kullanıcı Arayüzü Linkleri
        { path: '/'                  ,  component: Home },
        { path: '/update-reservation/:reservationNo',  component: UpdateReservation },
    ]
});

export default Router