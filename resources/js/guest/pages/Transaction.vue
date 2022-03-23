<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-checkout p-5 mt-5">
                <div class="container-confirm text-center">
                    <i class="fa-solid fa-check"></i>
                    <p>La tua transazione è avvenuta con successo!</p>
                </div>
            </div>
            <div class="col-lg-12 col-checkout ml-auto p-5 mt-5">
                <div class="container-rider">
                    <div class="container-text mb-5">
                        <img src="https://i.postimg.cc/xTbVCPVg/download.png" alt="deliveroo-rider">
                        <p>Il tuo rider è:</p>
                        <h3 class="font-weight-bold">Adrien Rabiot</h3>
                    </div>
                    <div class="container-map mt-5 text-center">
                        <!-- <img src="https://i.postimg.cc/tTyhcbFw/Immagine-2022-03-23-153059.png" alt="mappa-deliveroo"> -->
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2798.2243194503003!2d9.18781551579328!3d45.465284979101035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4786c6add7e1da89%3A0xf11fc0ae58ecc2a8!2sRistorante%20Cracco!5e0!3m2!1sit!2sit!4v1648046472039!5m2!1sit!2sit"
                            style="border:0;" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Transaction'
    };
</script>

<style lang="scss" scoped>
    .col-checkout {
        background: white;
        border-radius: 30px;
        box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px;

        .container-confirm {
            font-size: 30px;
            color: green;

            i {
                border: 1px solid green;
                border-radius: 50%;
            }
        }

        .container-rider {

            .container-text {

                img {
                    width: 70px;
                    float: left;
                    margin-right: 20px;
                }

                p {
                    margin: 0;
                    font-size: 15px;
                }
            }

            .container-map {
                iframe {
                    min-height: 300px;
                    min-width: 95%;
                    object-fit: cover;
                    border-radius: 57px;
                }
            }
        }
    }

    @media screen and (min-width: 910px) {
        .col-checkout:first-child {
            background-image: url('https://i.postimg.cc/PJsJ5Nv6/Pngtree-burrito-gift-cute-7266110.png');
            background-size: 150px;
            background-repeat: no-repeat;
            background-position: 100% 100%;
        }
    }
</style>