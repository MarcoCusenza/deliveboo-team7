<template>
    <div class="container-fluid">
        <div class="hamburger-container ml-auto">
            <img src="https://i.postimg.cc/WbXBtLH1/Raggruppa-12.png" alt="hamburger-home" />
        </div>
        <div class="container mb-5">
            <div class="text-area-container">
                <h1 class="font-weight-bold">
                    Cibo da ristorante, da asporto e generi alimentari.<span style="color: #00ccbc">
                        A casa tua.</span>
                </h1>
                <a href="/categories"><button class="btn-home mt-5">Vai alle categorie</button></a>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: "MainHomeSection",
    };
</script>

<style lang="scss" scoped>
    .container-fluid {
        position: relative;

        .hamburger-container {
            width: 38%;
            position: relative;
            overflow: hidden;

            img {
                width: 500px;

            }
        }

        .container {

            .text-area-container {
                width: 60%;
                text-align: left;
                transform: translate(-75%, -50%);
                position: absolute;
                top: 50%;
                left: 50%;
                z-index: 999;

                .btn-home {
                    padding: 10px 50px;
                    background-color: #00ccbc;
                    color: white;
                    font-weight: bold;
                    border-radius: 57px;
                    border: none;
                    font-size: 20px;
                }
            }


        }
    }

    @media screen and (min-width: 600px) {
        .container-fluid {

            .text-area-container {

                .btn-home {
                    padding: 8px 40px;
                    font-size: 15px;
                }
            }

            .hamburger-container {
                width: 45%;
            }
        }
    }

    @media screen and (min-width: 992px) {
        .container-fluid {
            background-image: url('https://i.postimg.cc/9XxYhtp4/Deliver-Boo-5-2x.png');
            background-repeat: no-repeat;
            background-size: contain;

            .container {

                .text-area-container {
                    text-align: center;
                    width: 40%;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                }
            }

            .hamburger-container {
                width: 38%;
            }
        }
    }
</style>