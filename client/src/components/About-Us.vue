<template>
    <div class="about-us-container">
        <div class="about-us-container__image">
            <img src="../assets/vehicle-fleet.webp" alt="Araç Filosu">
        </div>
        <div class="about-us-container__content">
            <h2>Hakkımızda</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, suscipit odit! Ex totam unde, minus quo minima id porro quaerat sint non sed deserunt, ipsam laborum soluta perspiciatis laboriosam. Id vero nam ab tempora ipsa voluptas, quae ea rerum iure minima corrupti recusandae magnam libero. Vero deleniti quidem aliquid obcaecati doloremque odit praesentium corrupti minus quia dolorem iure esse maiores, quis voluptate nostrum quas corporis adipisci qui commodi eos. Officiis neque ab doloremque in magnam eligendi, molestias unde consequatur cupiditate et eum ex dolore odio deleniti provident sit eveniet. Corrupti deserunt maiores voluptas debitis? Reprehenderit ab accusamus velit vero. Expedita illo atque ab, cum quibusdam, ipsa corporis consequatur sit voluptates impedit quia numquam explicabo nam quaerat mollitia delectus. Laborum nihil sapiente impedit fuga dolorum! Provident.</p>
        </div>
    </div>
</template>

<script>
    export default {
        
    }
</script>

<style scoped>
    .about-us-container{
        width: 80%;
        margin: 5% 10% 5% 10%;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
        border-radius: 15px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .about-us-container__image{
        width: 35%;
        display: flex;
        justify-content: start;
        align-items: center;
    }
    .about-us-container__image img{
        width: 500px;
        height: auto;
        border-radius: 15px 0 0 15px;
    }
    .about-us-container__content{
        width: 65%;
        padding-right: 5%;
    }
    .about-us-container__content h2{
        font-weight: 600;
        font-size: 1.8rem;
    }
    .about-us-container__content p{
        font-size: .96rem;
        opacity: .9;
    }
</style>