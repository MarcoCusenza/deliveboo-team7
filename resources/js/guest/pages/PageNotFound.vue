<template>
    <div class="container-fluid mt-5 py-5">
        <div class="container-fluid container-main d-flex align-items-center justify-content-center flex-column py-5">

            <div class="text-area-container text-center">
                <h2 class="maintitle">404</h2>
                <h6 class="subtitle mt-3">Qui non c'è nulla da mangiare..</h6>
            </div>
            <a href="/"><button class="btn-404 mt-5">Torna alla home</button></a>
        </div>
    </div>
</template>

<script>
    export default {
        name: "PageNotFound",
    };
</script>

<style lang="scss" scoped>
    .container-fluid {
        padding: 0;

        .container-main {
            width: 350px;
            padding: 0;
            background-image: url('https://i.postimg.cc/908J98s0/Pngtree-angry-burrito-kawaii-7266107.png');
            background-size: 110px;
            background-repeat: no-repeat;
            background-position: 100% 20%;

            .text-area-container {

                .maintitle {
                    font-size: 90px;
                    font-weight: bold;
                    z-index: 312;
                    text-shadow: 5px 5px 10px rgba(0, 0, 0, 0.233);
                }

                h6 {
                    font-size: 28px;
                    font-weight: bold;
                    text-shadow: 5px 5px 10px rgba(0, 0, 0, 0.233);
                    width: 80%;
                    margin: 0 auto;
                }
            }
        }

        .btn-404 {
            padding: 10px 50px;
            background-color: #00ccbc;
            color: white;
            font-weight: bold;
            border-radius: 57px;
            border: none;
            font-size: 15px;
        }
    }



    @media screen and (min-width: 600px) {

        .container-fluid {
          
            .container-main {
                width: 600px;
                background-size: 200px;

                .text-area-container {
                    .maintitle {
                        font-size: 180px;
                    }
                }
            }
        }
    }
        @media screen and (min-width: 900px) {

        .container-fluid {
            .container-main {
              width: 900px;
                background-size: 300px;

                .text-area-container {
                    .maintitle {
                        font-size: 200px;
                    }
                }
            }
        }
    }
</style>