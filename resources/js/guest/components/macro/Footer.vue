<template>
    <footer>
        <div class="footer-top container-fluid text-white">
            <div class="row mt-5 py-2 d-flex justify-content-center">
                <div class="col-sm-12 col-lg-3 d-flex align-items-center justify-content-center">
                    <img src="https://i.postimg.cc/mgJ2VbP8/Deliveroo-Logo-PNG1.png" alt="deliveroo-logo-footer" />
                </div>
                <div class="col-sm-6 col-lg-2 d-flex align-items-center justify-content-center py-sm-5">
                    <ul>
                        <li>Link1</li>
                        <li>Link2</li>
                        <li>Link3</li>
                        <li>Link4</li>
                    </ul>
                </div>
                <div class="col-sm-6 col-lg-2 d-flex align-items-center justify-content-center py-sm-5">
                    <ul>
                        <li>Link1</li>
                        <li>Link2</li>
                        <li>Link3</li>
                        <li>Link4</li>
                    </ul>
                </div>
                <div class="col-sm-12 col-lg-3 d-flex justify-content-center align-items-sm-center flex-column">

                    <form>
                        <div class="form-group">
                            <label>
                                <h3> Inserisci qui la tua mail per maggiori novità!</h3>
                            </label>
                            <input type="email" class="form-control" placeholder="Inserisci qui la tua mail" />
                            <button class="btn-home mt-3 float-right" type="submit">Invia</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="footer-bottom d-flex align-items-center justify-content-center text-white">
            <p class="py-3 text-center">
                Made with <i class="fa-solid fa-heart"></i> by Marco Cusenza, Francesca
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
        background-color: #1d1d1d;
        width: 100%;

        .footer-top {


            img {
                width: 200px;

                &:hover {
                    animation: shake 0.5s;
                    animation-iteration-count: infinite;
                }

                @keyframes shake {
                    0% {
                        transform: translate(0px, 0px) rotate(-10deg);
                    }

                    25% {
                        transform: translate(0px, 0px) rotate(10deg);
                    }

                    50% {
                        transform: translate(0px, 0px) rotate(-10deg);
                    }

                    75% {
                        transform: translate(0px, 0px) rotate(10deg);
                    }

                    100% {
                        transform: translate(0px, 0px) rotate(-10deg);
                    }
                }
            }

            ul {
                list-style: none;

                li {
                    line-height: 30px;
                }
            }

            form {
                width: 70%;

                .form-control {
                    transition: opacity 0.3s;

                    &:hover {
                        opacity: 0.8;
                    }
                }

                .btn-home {
                    padding: 5px 20px;
                    background-color: #00ccbc;
                    color: white;
                    font-weight: bold;
                    border-radius: 57px;
                    border: none;
                    font-size: 15px;
                    transition: background 0.3s;

                    &:hover {
                        background: #007067;
                    }
                }
            }
        }

        .footer-bottom {
            border-top: 1px solid #00CCBC;

            p {
                margin: 0
            }
        }
    }
</style>