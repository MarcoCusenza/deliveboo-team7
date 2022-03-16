<template>
    <header>
        <nav class="container-fluid container-header">
            <div class="row d-flex align-items-center justify-content-between">
                <div class="col-header col-lg-2 col-6 text-center">
                    <img src="https://i.postimg.cc/4N3pvRP2/deliveroo-logo-4.png" alt="deliveroo logo" class="logo" />
                </div>
                <div class="col-header col-lg-2 col-6 text-center">
                    <!-- PROVVISORIE  DA METTERE CON FONT-AWESOME -->
                   <a class="button-link" href="/admin/home"><img src="https://i.postimg.cc/13GMNwmH/user.png" alt="user logo" class="icon-header"></a>
                   <a class="button-link" href="#"><img src="https://i.postimg.cc/rwXQmQks/shopping-cart.png" alt="user logo" class="icon-header"></a>
                   
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
        width: 90%;
        height: 60px;

        .row {
            height: 100%;


            .logo {
                width: 100px;
            }

            .icon-header {
                width: 20px;
                
            }
        }
    }
</style>