<template>
    <footer>
        <div class="footer-top container-fluid text-white ">
            <div class="row mt-5 py-2">
                <div class="col-sm-12 col-lg-4 d-flex align-items-center justify-content-center">
                    <img src="https://i.postimg.cc/mgJ2VbP8/Deliveroo-Logo-PNG1.png" alt="deliveroo-logo-footer" />
                </div>
                <div class="col-sm-6 col-lg-2 d-flex align-items-center py-sm-5">
                    <ul>
                        <li>Link1</li>
                        <li>Link2</li>
                        <li>Link3</li>
                        <li>Link4</li>
                    </ul>
                </div>
                <div class="col-sm-6 col-lg-2 d-flex align-items-center py-sm-5">
                    <ul>
                        <li>Link1</li>
                        <li>Link2</li>
                        <li>Link3</li>
                        <li>Link4</li>
                    </ul>
                </div>
                <div class="col-sm-12 col-lg-4 d-flex justify-content-center align-items-sm-center flex-column">

                    <form>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">
                                <h3> Inserisci qui la tua mail per maggiori novità!</h3>
                            </label>
                            <input type="email" class="form-control" id="exampleFormControlInput1"
                                placeholder="Inserisci qui la tua mail" />
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
            border-bottom: 1px solid #00CCBC;

            img {
                width: 200px;
            }

            form {
                width: 50%;


                .btn-home {
                    padding: 5px 20px;
                    background-color: #00ccbc;
                    color: white;
                    font-weight: bold;
                    border-radius: 57px;
                    border: none;
                    font-size: 15px;
                }
            }
        }

        .footer-bottom {

            p {
                margin: 0
            }
        }
    }
</style>