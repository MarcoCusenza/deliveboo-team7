<template>
    <div class="container-fluid">
        <h2 class="text-center font-weight-bold">Unisciti a noi!</h2>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-3 col-sm-12">
                <div class="card">
                    <img src="https://i.postimg.cc/j55LNmpb/joshua-lawrence-3-Kdzpr-XR3-Y-unsplash.jpg"
                        class="card-img-top" alt="deliveroo-rider">
                    <div class="overlay-text text-white p-4" >
                        <h3 class="card-title font-weight-bold">Rider</h3>
                        <p class="card-text">Diventa un rider: flessibilità, ottimi guadagni e un mondo di vantaggi per te.</p>
                        <a href="#" class="btn font-weight-bold">Maggiori informazioni <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-12 py-5">
                <div class="card">
                    <img src="https://i.postimg.cc/Xv2DQBzC/jason-leung-e-KZLpj7-U0-E-unsplash.jpg" class="card-img-top"
                        alt="deliveroo-chef">
                    <div class="overlay-text text-white p-4">
                        <h3 class="card-title font-weight-bold">Ristoranti</h3>
                        <p class="card-text">Diventa partner di Deliveroo e raggiungi sempre più clienti. Ci occupiamo noi della consegna.</p>
                        <a href="#" class="btn  font-weight-bold">Maggiori informazioni <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-12">
                <div class="card">
                    <img src="https://i.postimg.cc/FsRzBMzk/cherrydeck-Mt-Hi-Q8-NCIo-M-unsplash.jpg"
                        class="card-img-top" alt="deliveroo-office">
                    <div class="overlay-text text-white p-4">

                        <h3 class="card-title font-weight-bold ">Da noi</h3>
                        <p class="card-text">La nostra missione è trasformare il modo in cui le persone mangiano. </p>
                        <a href="#" class="btn  font-weight-bold">Maggiori informazioni <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Work'

    }
</script>

<style lang="scss" scoped>
.card {
border: none;
background-color: transparent;
transition: all .3s ease-out;

    img {
        height: 550px;
        object-fit: cover;
        position: relative;    
        border-radius: 35px;
        filter: brightness(50%);
//   
    }

    .overlay-text {
        position: absolute;
        bottom: 0;
        left: 0;
        border-radius: 35px;
        border: none
        }

    .btn {
        background: #00CCBC;
        color: white;
        border-radius: 57px;
        padding: 8px 20px;

        &:hover {
            background: #007067;
        }
    }
    }

    .card:hover {
        transform: translate(0, -15px);
    }
</style>