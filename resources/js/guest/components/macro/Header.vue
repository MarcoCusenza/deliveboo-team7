<template>
    <header>
        <nav class="container-fluid container-header">
            <div class="row d-flex align-items-center justify-content-between">
                <div class="col-header col-lg-2 col-6 text-center">
                    <a href="/"><img src="https://i.postimg.cc/4N3pvRP2/deliveroo-logo-4.png" alt="deliveroo logo" class="logo" /></a>
                </div>
                <div class="col-header col-lg-2 col-6 text-center">
                    <a class="button-link mx-2 icon-header" href="/admin/home"><i
                            class="fa-solid fa-user fa-lg"></i></a>
                    <a class="button-link mx-2 icon-header" href="/cart"><i class="fa-solid fa-cart-shopping fa-lg"></i></a>
                </div>
            </div>
        </nav>
    </header>
</template>

<script>
    export default {
        name: 'Header'
    }
</script>

<style lang="scss" scoped>
    .container-header {
        height: 60px;

        .row {
            height: 100%;


            .logo {
                width: 100px;
            }

            .icon-header {
                color: #292929;
                transition: all .2s ease-in-out;

                &:hover {
                    color: #00CCBC;
                    transition: all .2s ease-in-out;
                }
            }
        }
    }
</style>