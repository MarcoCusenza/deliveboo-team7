<template>
    <div class="container-banner my-5 d-flex align-items-top justify-content-center">
        <h2 class="banner-text text-center text-white pt-4 mx-auto font-weight-bold">FINO AL 10 APRILE LA SPEDIZIONE É A
            SOLO 1 €</h2>
    </div>
</template>

<script>
    export default {
        name: 'Banner'
    }
</script>

<style lang="scss" scoped>
    .container-banner {
        height: 200px;
        background-color: #00CCBC;
        background-image: url('https://i.postimg.cc/gJkdQ4wN/Deliver-Boo-6.png');
        background-size: 500px;
        background-position: bottom;
        background-repeat: repeat-x;


        h2 {
            font-size: 30px;
            width: 75%;
        }
    }

    @media screen and (min-width: 610px) {
        .container-banner {
            h2 {
                font-size: 40px;
                width: 600px;
            }
        }
    }

    @media screen and (min-width: 910px) {
        .container-banner {

            h2 {
                font-size: 40px;
                width: 800px;
            }
        }
    }
</style>
