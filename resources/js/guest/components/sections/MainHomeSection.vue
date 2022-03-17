<template>
    <div class="container-mainhome mb-5">
        <div class="text-area-container text-center">
            <h1 class="font-weight-bold">
                Cibo da ristorante, da asporto e generi alimentari.<span style="color: #00ccbc">
                    A casa tua.</span>
            </h1>
            <button class="btn-home mt-5">Vai alle categorie</button>
        </div>
        <div class="hamburger-container ml-auto">
            <img src="https://i.postimg.cc/WbXBtLH1/Raggruppa-12.png" alt="hamburger-home" />
        </div>
    </div>
</template>

<script>
    export default {
        name: "MainHomeSection",
    };
</script>

<style lang="scss" scoped>
    .container-mainhome {
        width: 100%;
        position: relative;
        top: 0;
        background-image: url('https://i.postimg.cc/9XxYhtp4/Deliver-Boo-5-2x.png');
        background-repeat: no-repeat;
        background-size: contain;

        .text-area-container {
            width: 40%;
            z-index: 999;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);

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

        .hamburger-container {
          width: 38%;
          position: relative;

          img {
            width: 500px;
          }
        }
    }
</style>