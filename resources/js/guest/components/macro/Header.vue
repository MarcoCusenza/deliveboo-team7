<template>
    <header>
        <nav class="container-fluid container-header">
            <div class="container-fluid container-xl m-auto d-flex align-items-center justify-content-between p-0 m-0">
                <div class="col-header col-lg-2 col-6 text-lg-left p-0 m-0">
                    <a href="/"><img src="https://i.postimg.cc/s2WnCRpD/logo.png" alt="deliveroo logo"
                            class="logo" /></a>
                </div>
                <div class="col-header col-icon col-lg-2 col-6 p-0 m-0">
                    <div class="icons text-lg-right p-0 m-0">
                        <a class="button-link mx-2 icon-header" href="/admin/home"><i
                                class="fa-solid fa-user fa-lg"></i></a>
                        <a class="button-link mx-2 icon-header" href="/checkout"><i
                                class="fa-solid fa-cart-shopping fa-lg"></i></a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</template>

<script>
    export default {
        name: "Header",
    };
</script>

<style lang="scss" scoped>
    header {
        position: sticky;
        top: 0;
        background-color: #f0f3f5;
        z-index: 10000;
        box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px;

        .container-header {
            height: 60px;

            .container-xl {
                height: 100%;

                .logo {
                    width: 120px;
                    transition: transform 0.3s;


                    &:hover {
                        transform: scale(1.2);
                    }
                }

                .col-icon {
                    .icons {
                        text-align: right;
                    }

                    .icon-header {
                        color: #292929;
                        transition: all 0.2s ease-in-out;

                        &:hover {
                            color: #00ccbc;
                        }
                    }
                }
            }
        }
    }

    @media screen and(min-width: 990px) {
        // header {
        //     .container-header {
        //         .row {
        //             .col-icon {
        //                 .icons {
        //                     text-align: right;
        //                 }
        //             }
        //         }
        //     }
        // }
    }

    // @media (min-width: 1200px) {
    //     header {
    //         .container-header {
    //             .row {
    //                 .col-icon {
    //                     .icons {
    //                         text-align: right;
    //                     }

    //                     // text-align: center;
    //                 }
    //             }
    //         }
    //     }
    // }
</style>