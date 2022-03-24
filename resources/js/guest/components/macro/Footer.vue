<template>
    <footer>
        <div class="footer-top container text-white">
            <div class="row mt-5 py-3 d-flex justify-content-around">
                <div class="col-footer col-5 col-lg-2 p-4">
                    <ul>
                        <h4>Scopri Deliveboo</h4>
                        <li>Chi siamo</li>
                        <li>Dicono di noi</li>
                        <li>Takeaway</li>
                        <li>Altro</li>
                        <li>News</li>
                        <li>Food Blog</li>
                        <li>Engineering blog</li>
                        <li>Carte regalo</li>
                        <li>Diventa un rider</li>
                        <li>Diventa un ristoratore</li>
                        <li>Unisciti a noi</li>
                    </ul>
                    <!-- <div class="image-container">
                        <img src="https://i.postimg.cc/43rpZ7Xr/logo-footer.png" alt="deliveroo-logo-footer" />
                    </div> -->
                </div>
                <div class="col-footer col-5 col-lg-2 p-4">
                    <ul>
                        <h4>Nozioni legali</h4>
                        <li>Termini e condizioni</li>
                        <li>Privacy</li>
                        <li>Cookies</li>
                        <li>Altro</li>
                    </ul>
                </div>
                <div class="col-footer  col-5 col-lg-2 p-4">
                    <ul>
                        <h4>Aiuti</h4>
                        <li>Contatti</li>
                        <li>FAQs</li>
                        <li>Partner</li>
                        <li>Brands</li>
                    </ul>
                </div>
                <div class="col-footer col-5 col-lg-2 p-4">
                    <ul>
                        <h4>Porta Deliveboo con te!</h4>
                        <img src="https://i.postimg.cc/Z5L7Z6y8/Tavola-da-disegno-4.png" alt="download android">
                        <img src="https://i.postimg.cc/RZmsjgqC/Tavola-da-disegno-5.png" alt="download ios">
                    </ul>
                </div>
            </div>
            <div class="footer-top-icon d-flex justify-content-between align-items-center mb-3">
                <div class="container-social d-flex justify-content-around">
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-twitter"></i>
                </div>
                <div class="container-copyright">
                    <span style="color: #b9b3b3">©Team-7 - Boolean</span>
                </div>
            </div>
        </div>

        <div class="footer-bottom d-flex align-items-center justify-content-center text-white">
            <p class="py-3 text-center">
                Made with <span style="color: red"><i class="fa-solid fa-heart"></i></span> by Marco Cusenza, Francesca
                De Luca, Andrei Gabriel Andrescu, Roberto D'Ambrosio
            </p>
        </div>
    </footer>
</template>

<script>
    export default {
        name: "Footer",
    };
</script>

<style lang="scss" scoped>
    footer {
        background-color: #2E3333;
        width: 100%;

        .footer-top {

            .col-footer {
                background: #434848;
                min-width: 200px;
                border-radius: 3px;
                margin-top: 20px;

                img {
                    width: 135px;
                    margin: 3px 0;
                    border-radius: 7px;
                    border: 1px solid white;
                }

                ul {
                    list-style: none;

                    li {
                        line-height: 30px;
                        cursor: pointer;

                        &:hover {
                            color: #00CCBC
                        }
                    }
                }

            }
        }

        .container-social {
            width: 100px;
            font-size: 20px;
            color: #757a7a;
        }

        .footer-bottom {
            border-top: 1px solid #00CCBC;

            p {
                margin: 0
            }
        }
    }

    @media screen and (min-width: 600px) {
        footer {
            .footer-top {
                .col-footer {
                    min-width: 200px;
                }
            }
        }
    }

    @media screen and (min-width: 900px) {
        footer {
            .footer-top {
                .col-footer {
                    min-width: 230px;
                }
            }
        }
    }

    @media screen and (min-width: 1200px) {
        footer {
            .footer-top {
                .col-footer {
                    min-width: 270px;
                }
            }
        }
    }
</style>
</style>