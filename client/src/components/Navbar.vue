<template>
    <div>
        <div v-if="isOpen" class="open-menu" :class="{ 'fadeOutRight': fadeOut }" @animationend="handleAnimationEnd">
            <span @click="closeMenu"><i class="fa-solid fa-xmark"></i></span>
            <ul>
                <li><a href="#" @click="closeMenu"><i class="fa-solid fa-house"></i>Anasayfa</a></li>
                <li><a href="#about" @click="closeMenu"><i class="fa-solid fa-car"></i>Hakkımızda</a></li>
                <li><a href="#our-menu" @click="closeMenu"><i class="fa-solid fa-arrow-right-arrow-left"></i>Rezervasyon</a></li>
                <li><a href="#reserve" @click="closeMenu"><i class="fa-solid fa-envelope"></i>Bize Ulaşın</a></li>
            </ul>
        </div>
        <nav>
            <div class="container">
                <div class="nav-logo">
                    <a href="#" class="logo"><img src="../assets/avci-transfer-black.svg" alt="Avcı Transfer Logosu"></a>
                </div>
                <div @click="openMenu" class="hamburger">
                    <div class="hamburger-item"></div>
                    <div class="hamburger-item"></div>
                    <div class="hamburger-item"></div>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isOpen: false,
            fadeOut: false
        };
    },
    mounted() {
        window.addEventListener("scroll", this.handleScroll);
    },
    methods: {
        openMenu() {
            this.isOpen = true;
            this.fadeOut = false;
        },
        closeMenu() {
            this.fadeOut = true;
        },
        handleAnimationEnd() {
            if (this.fadeOut) {
                this.isOpen = false;
            }
        },
        handleScroll() {
            let scrollValue = window.scrollY;
            let content = document.querySelector("nav");
            let logo = document.querySelector(".logo");

            if (scrollValue > 200) {
                logo.classList.add("scroll");
                content.classList.add("scrolled");
            } else {
                logo.classList.remove("scroll");
                content.classList.remove("scrolled");
            }
        }
    },

    beforeDestroy() {
        window.removeEventListener("scroll", this.handleScroll);
    }
};
</script>

<style scoped>
@keyframes fadeInRight {
    0% {
        opacity: 0;
        right: -300px;
    }

    100% {
        opacity: 1;
        right: 0;
    }
}

@keyframes fadeOutRight {
    0% {
        opacity: 1;
        right: 0;
    }

    100% {
        opacity: 0;
        right: -300px;
    }
}

.open-menu {
    width: 20%;
    height: 100vh;
    background-color: rgba(255, 255, 255, 0.5); /* Background color with opacity */
    backdrop-filter: blur(10px); /* Blur effect */
    position: fixed;
    top: 0;
    right: -300px;
    z-index: 99;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: center;
    animation: fadeInRight .6s ease 1;
    right: 0;
}

.fadeOutRight {
    animation: fadeOutRight 1s ease 1;
    right: -300px;
}

.open-menu span {
    width: 100%;
    text-align: right;
    padding: 7%;
    margin-top: 7%;
    cursor: pointer;
}

.open-menu span i {
    font-size: 2rem;
}

.open-menu ul {
    margin-top: 50%;
    list-style: none;
}

.open-menu ul li {
    margin-bottom: 14%;
}

.open-menu ul li a {
    text-decoration: none;
    font-size: 1.2rem;
    color: #000;
}
.open-menu ul li a i{
    margin-right: 15px;
}
nav {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100px;
    padding: 0 5%;
    z-index: 10;
    background-color: rgba(81, 81, 83, 0.5); /* Background color with opacity */
    backdrop-filter: blur(1px); /* Blur effect */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Optional shadow for better visibility */
}
nav.scrolled {
    background-color: rgba(255, 255, 255, 0.5); /* Background color with opacity */
    backdrop-filter: blur(10px); /* Blur effect */
    color: #000;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Optional shadow for better visibility */
}
.container {
    display: flex;
    justify-content: space-around;
    align-items: center;
}
.nav-logo {
    flex-basis: 97%;
    display: flex;
    justify-content: start;
    align-items: center;
}
.nav-logo a {
    color: #000;
    text-decoration: none;
    font-weight: 600;
    font-size: 2rem;
    transition: all .3s ease;
}
.nav-logo a img {
    width: 150px;
    height: 100px;
}

.hamburger {
    flex-basis: 3%;
    height: 100px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    cursor: pointer;
}
.hamburger-item {
    background-color: #000;
    margin: .12rem;
    width: 1.5rem;
    height: 2.4px;
    border: 2px solid black;
    border-radius: 2px;
    transition: transform .6s ease-in-out;
}

.hamburger:hover .hamburger-item {
    transform: rotate(360deg);
}

@media only screen and (max-width: 768px) {
    .nav-logo a img {
    width: 100px;
    height: 50px;
}
.open-menu {
    width:50%;
}
}
@media only screen and (max-width: 414px) {
    .nav-logo a img {
    width: 100px;
    height: 50px;
}
.open-menu {
    width: 100%;
}
}
@media only screen and (max-width: 375px) {
    .nav-logo a img {
    width: 100px;
    height: 50px;
}
.open-menu {
    width: 100%;
}
}
</style>
