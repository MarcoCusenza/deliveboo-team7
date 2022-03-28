<template>
    <section>
        <section class="antipasti container-fluid" v-if="antipasti.length > 0">
            <h2>Antipasti</h2>
            <div class="card-grid col-lg-12 mt-5">
                <div v-for="dish in antipasti" :key="dish.id" class="card-rest shadow-sm bg-white">
                    <img v-if="dish.image && isFirstLetterH(dish.image)" :src="dish.image" :alt="dish.name" />
                    <img v-else :src="'../storage/' + dish.image" :alt="dish.name" />

                    <div class="card-body">
                        <h5 class="card-title">{{ dish.name }}</h5>
                        <p class="card-text ingredients">{{ dish.ingredients }}</p>
                        <p class="card-text font-weight-bold">{{ dish.price }} &euro;</p>
                        <button class="btn btn-home" @click="$emit('isTheSameRestaurant', dish)">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section class="piattiUnici container-fluid" v-if="piattiUnici.length > 0">
            <h2>Piatti Unici</h2>
            <div class="card-grid col-lg-12 mt-5">
                <div v-for="dish in piattiUnici" :key="dish.id" class="card-rest shadow-sm bg-white">
                    <img v-if="dish.image && isFirstLetterH(dish.image)" :src="dish.image" :alt="dish.name" />
                    <img v-else :src="'../storage/' + dish.image" :alt="dish.name" />

                    <div class="card-body">
                        <h5 class="card-title">{{ dish.name }}</h5>
                        <p class="card-text ingredients">{{ dish.ingredients }}</p>
                        <p class="card-text font-weight-bold">{{ dish.price }} &euro;</p>
                        <button class="btn btn-home" @click="$emit('isTheSameRestaurant', dish)">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section class="primi container-fluid" v-if="primi.length > 0">
            <h2>Primi</h2>
            <div class="card-grid col-lg-12 mt-5">
                <div v-for="dish in primi" :key="dish.id" class="card-rest shadow-sm bg-white">
                    <img v-if="dish.image && isFirstLetterH(dish.image)" :src="dish.image" :alt="dish.name" />
                    <img v-else :src="'../storage/' + dish.image" :alt="dish.name" />

                    <div class="card-body">
                        <h5 class="card-title">{{ dish.name }}</h5>
                        <p class="card-text ingredients">{{ dish.ingredients }}</p>
                        <p class="card-text font-weight-bold">{{ dish.price }} &euro;</p>
                        <button class="btn btn-home" @click="$emit('isTheSameRestaurant', dish)">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section class="secondi container-fluid" v-if="secondi.length > 0">
            <h2>Secondi</h2>
            <div class="card-grid col-lg-12 mt-5">
                <div v-for="dish in secondi" :key="dish.id" class="card-rest shadow-sm bg-white">
                    <img v-if="dish.image && isFirstLetterH(dish.image)" :src="dish.image" :alt="dish.name" />
                    <img v-else :src="'../storage/' + dish.image" :alt="dish.name" />

                    <div class="card-body">
                        <h5 class="card-title">{{ dish.name }}</h5>
                        <p class="card-text ingredients">{{ dish.ingredients }}</p>
                        <p class="card-text font-weight-bold">{{ dish.price }} &euro;</p>
                        <button class="btn btn-home" @click="$emit('isTheSameRestaurant', dish)">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <section class="contorni container-fluid" v-if="contorni.length > 0">
            <h2>Contorni</h2>
            <div class="card-grid col-lg-12 mt-5">
                <div v-for="dish in contorni" :key="dish.id" class="card-rest shadow-sm bg-white">
                    <img v-if="dish.image && isFirstLetterH(dish.image)" :src="dish.image" :alt="dish.name" />
                    <img v-else :src="'../storage/' + dish.image" :alt="dish.name" />

                    <div class="card-body">
                        <h5 class="card-title">{{ dish.name }}</h5>
                        <p class="card-text ingredients">{{ dish.ingredients }}</p>
                        <p class="card-text font-weight-bold">{{ dish.price }} &euro;</p>
                        <button class="btn btn-home" @click="$emit('isTheSameRestaurant', dish)">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </section>


        <section class="dessert container-fluid" v-if="dessert.length > 0">
            <h2>Dessert</h2>
            <div class="card-grid col-lg-12 mt-5">
                <div v-for="dish in dessert" :key="dish.id" class="card-rest shadow-sm bg-white">
                    <img v-if="dish.image && isFirstLetterH(dish.image)" :src="dish.image" :alt="dish.name" />
                    <img v-else :src="'../storage/' + dish.image" :alt="dish.name" />

                    <div class="card-body">
                        <h5 class="card-title">{{ dish.name }}</h5>
                        <p class="card-text ingredients">{{ dish.ingredients }}</p>
                        <p class="card-text font-weight-bold">{{ dish.price }} &euro;</p>
                        <button class="btn btn-home" @click="$emit('isTheSameRestaurant', dish)">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section class="drink container-fluid" v-if="drink.length > 0">
            <h2>Drink</h2>
            <div class="card-grid col-lg-12 mt-5">
                <div v-for="dish in drink" :key="dish.id" class="card-rest shadow-sm bg-white">
                    <img v-if="dish.image && isFirstLetterH(dish.image)" :src="dish.image" :alt="dish.name" />
                    <img v-else :src="'../storage/' + dish.image" :alt="dish.name" />

                    <div class="card-body">
                        <h5 class="card-title">{{ dish.name }}</h5>
                        <p class="card-text ingredients">{{ dish.ingredients }}</p>
                        <p class="card-text font-weight-bold">{{ dish.price }} &euro;</p>
                        <button class="btn btn-home" @click="$emit('isTheSameRestaurant', dish)">
                            <i class="fa-solid fa-plus icon-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </section>
</template>

<script>
    export default {
        name: "DishCourses",
        props: {
            antipasti: Array,
            piattiUnici: Array,
            primi: Array,
            secondi: Array,
            contorni: Array,
            dessert: Array,
            drink: Array,
        },

        methods: {
            isFirstLetterH(item) {
                return item[0] == "h";
            },
        }
    }
</script>

<style lang="scss" scoped>
    .card-grid {
        display: grid;
        //grid-template: repeat(1, 1fr) / repeat(1, 1fr);
        justify-content: center;
        gap: 20px;
        margin-bottom: 3em;

        .card-rest {
            border-radius: 2em;
            display: flex;
            overflow: hidden;
            min-height: 100px;
            max-height: 150px;

            img {
                min-width: 35%;
                max-width: 35%;
                min-height: 100%;
                max-height: 100%;
                object-fit: cover;
            }

            .card-body {
                position: relative;
                padding-bottom: 40px;



                .btn {
                    position: absolute;
                    bottom: 0;
                    right: 0;
                    border-radius: 10px 0 0 0;
                    padding: 10px 20px;
                    background-color: #00ccbc;
                    color: white;
                    font-weight: bold;
                    transition: background-color 0.2s ease-out;

                    &:hover {
                        background-color: #0081cc;
                    }

                    &:active {
                        background-color: #a300cc;
                    }
                }

                .card-text {

                    &.description {
                        font-style: italic;
                        color: grey;
                        // text-align: center;
                    }
                }

                .ingredients {
                    font-size: 12px;
                }

                p {
                    margin: 2px 0;

                    &:last-child {
                        position: absolute;
                        bottom: 0;
                        left: 0;
                    }
                }
            }
        }
    }



    .cart-box {
        background: white;
        border-radius: 30px;
        box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px;
        padding: 40px;
        background: none;

        .empty-cart {
            font-size: 20px;
            color: grey;
        }

        .counter {
            margin: auto;
            display: flex;

            .value-button {
                display: inline-block;
                border: 1px solid #ddd;
                margin: 0px;
                width: 40px;
                height: 30px;
                text-align: center;
                background: #eee;
                -webkit-touch-callout: none;
                -webkit-user-select: none;
                -khtml-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                font-weight: bold;
                font-size: 18px;
            }

            .value-button:hover {
                cursor: pointer;
            }

            #decrease {
                border-radius: 8px 0 0 8px;
            }

            #increase {
                border-radius: 0 8px 8px 0;
            }

            input#number {
                text-align: center;
                border: none;
                border-top: 1px solid #ddd;
                border-bottom: 1px solid #ddd;
                margin: 0px;
                width: 40px;
                height: 30px;
            }

            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

            /* Firefox */
            input[type="number"] {
                -moz-appearance: textfield;
            }
        }

        .delete {
            cursor: pointer;
        }

        .cart-bottom {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;

            .final-price {
                border-top: 1px solid #00ac9d;
                padding: 10px;
                width: 180px;
                text-align: center;
                font-size: 20px;
            }

            a {
                background-color: #00ccbc;
                padding: 10px 20px;
                border-radius: 5px;
                color: white;
                text-decoration: none;

                &:hover {
                    background-color: #00ac9d;
                    font-style: none;
                    transition: 0.3s;
                    text-decoration: none;
                }
            }
        }
    }

    @media screen and (min-width: 768px) {
        .container {
            .card-grid {
                display: grid;
                grid-template: repeat(1, 1fr) / repeat(2, 1fr);

                .card-rest {
                    min-height: 150px;
                    max-height: 200px;
                }
            }
        }
    }

    @media screen and (min-width: 992px) {
        .card-grid {
            .card-rest {
                height: 250px !important;
            }
        }

        .cart-box {
            background-image: url('https://i.postimg.cc/bNSGqbSJ/Deliver-Boo-8-2x.png');
            background-position: top right;
            background-size: 350px;
            background-repeat: no-repeat;
        }

    }



    @media screen and (min-width: 1200px) {
        .container {
            .card-grid {
                display: grid;
                grid-template: repeat(1, 1fr) / repeat(3, 1fr);
            }
        }
    }
</style>