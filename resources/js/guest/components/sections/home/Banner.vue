<template>
    <div class="container-banner my-5">
        <div class="container-text">
            <h2 class="banner-text text-white font-weight-bold">Dal 10 APRILE la spedizione è a
                SOLO 1 €</h2>
            <p class="text-white">Con Deliveboo dal 10 Aprile potrai portare i tuoi ordini a casa tua a solo 1€,
                cosa stai aspettando?</p>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Banner'
    }
</script>

<style lang="scss" scoped>
    .container-banner {
        height: 250px;
        background-image: url('https://i.postimg.cc/T2skNW9r/Deliver-Boo-10-2x.png');
        background-color: #440063;
        background-position: right bottom;
        background-repeat: no-repeat;
        background-size: 700px;
        display: flex;
        align-items: center;
        justify-content: left;



        .container-text {
            padding: 30px;

            p {
                display: none;
                font-size: 20px;
            }
        }
    }

    @media screen and (min-width: 610px) {
        .container-banner {
            background-size: 900px;

            .container-text {
                h2 {
                    font-size: 35px;
                }

            }
        }
    }

    @media screen and (min-width: 910px) {
        .container-banner {
            background-size: 1200px;

            .container-text {
                width: 700px;
                h2 {
                    font-size: 40px;
                }



            }
        }
    }

    @media screen and (min-width: 1250px) {
        .container-banner {
            padding-left: 50px;
            .container-text {
                width: 100%;
                p {
                    display: inline-block;
                }
            }
        }
    }
</style>
