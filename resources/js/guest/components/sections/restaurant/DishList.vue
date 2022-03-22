<template>
    <div class="container">
        <div class="row">

            <!-- CARRELLO -->
            <section class="mb-5 cart-box col-lg-12">
                <h3>Carrello</h3>
                <table class="cart table table-borderless" v-if="cart.length > 0">
                    <thead>
                        <tr>
                            <th scope="col">Nome piatto</th>
                            <th scope="col">Prezzo</th>
                            <th scope="col">Quantità</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(dish, i) in cart" :key="i">
                            <td class="dish-name">{{ dish[0].name }}</td>
                            <td class="dish-price">{{ dish[0].price }}€</td>
                            <td class="dish-quantity">
                                <div class="counter">
                                    <div class="value-button" id="decrease" @click="decreaseQuantity(dish)"
                                        value="Decrease Value">
                                        -
                                    </div>
                                    <input type="number" id="number" :value="dish[1]" />
                                    <div class="value-button" id="increase" @click="increaseQuantity(dish)"
                                        value="Increase Value">
                                        +
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-home" @click="removeDish(dish)">
                                    <i class="fa-solid fa-trash-can delete"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div v-else>
                    <div
                        class="empty-cart py-2 text-center d-flex flex-column align-items-center justify-content-center">
                        <i class="fa-solid fa-basket-shopping py-2"></i>
                        <p>Il tuo carrello è vuoto</p>
                    </div>
                </div>
                <div class="cart-bottom">
                    <div class="final-price">
                        <p>Totale = {{ finalPrice() }}€</p>
                    </div>
                    <a class="button-link mx-2 icon-header" href="/checkout">
                        Vai al checkout
                    </a>
                </div>
            </section>

            <div class="mb-5" v-if="this.haveToShowModal">
                <transition name="modal">
                    <div class="modal-mask">
                        <div class="modal-wrapper">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true" @click="showModal = false">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Modal body text goes here.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            @click="closeModal()">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </transition>
            </div>

            <!-- LISTA PIATTI -->
            <!-- !!! AGGIUNGERE LA PORTATA (COURSES) !!!-->
            <!-- <div class="card-grid col-lg-12 mt-5">
                <div v-for="dish in dishes" :key="dish.id" class="card-rest shadow-sm bg-white">
                    <img :src="dish.image" :alt="'Immagine che rappresenta ' + dish.name" v-if="dish.image" />
                    <div class="card-body">
                        <h5 class="card-title">{{ dish.name }}</h5>
                        <p class="card-text ingredients">{{ dish.ingredients }}</p>
                        <p class="card-text font-weight-bold">{{ dish.price }} &euro;</p>
                        <p class="card-text font-weight-bold">{{ dish.course.name }}</p>
                        <button class="btn btn-home" @click="sameRestaurant(dish) ? addDish(dish) : alertRest()">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div> -->

            <section class="antipasti" v-if="antipasti.length > 0">
                <h2>Antipasti</h2>
                <div class="card-grid col-lg-12 mt-5">
                    <div v-for="dish in antipasti" :key="dish.id" class="card-rest shadow-sm bg-white">
                        <img :src="dish.image" :alt="'Immagine che rappresenta ' + dish.name" v-if="dish.image" />

                        <div class="card-body">
                            <h5 class="card-title">{{ dish.name }}</h5>
                            <p class="card-text ingredients">{{ dish.ingredients }}</p>
                            <p class="card-text font-weight-bold">{{ dish.price }} &euro;</p>
                            <p class="card-text font-weight-bold">{{ dish.course.name }}</p>
                            <button class="btn btn-home" @click="sameRestaurant(dish) ? addDish(dish) : alertRest()">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </section>

            <section class="primi" v-if="primi.length > 0">
                <h2>Primi</h2>
                <div class="card-grid col-lg-12 mt-5">
                    <div v-for="dish in primi" :key="dish.id" class="card-rest shadow-sm bg-white">
                        <img :src="dish.image" :alt="'Immagine che rappresenta ' + dish.name" v-if="dish.image" />

                        <div class="card-body">
                            <h5 class="card-title">{{ dish.name }}</h5>
                            <p class="card-text ingredients">{{ dish.ingredients }}</p>
                            <p class="card-text font-weight-bold">{{ dish.price }} &euro;</p>
                            <p class="card-text font-weight-bold">{{ dish.course.name }}</p>
                            <button class="btn btn-home" @click="sameRestaurant(dish) ? addDish(dish) : alertRest()">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </section>

            <section class="secondi" v-if="secondi.length > 0">
                <h2>Secondi</h2>
                <div class="card-grid col-lg-12 mt-5">
                    <div v-for="dish in secondi" :key="dish.id" class="card-rest shadow-sm bg-white">
                        <img :src="dish.image" :alt="'Immagine che rappresenta ' + dish.name" v-if="dish.image" />

                        <div class="card-body">
                            <h5 class="card-title">{{ dish.name }}</h5>
                            <p class="card-text ingredients">{{ dish.ingredients }}</p>
                            <p class="card-text font-weight-bold">{{ dish.price }} &euro;</p>
                            <p class="card-text font-weight-bold">{{ dish.course.name }}</p>
                            <button class="btn btn-home" @click="sameRestaurant(dish) ? addDish(dish) : alertRest()">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </section>

            <section class="contorni" v-if="contorni.length > 0">
                <h2>Contorni</h2>
                <div class="card-grid col-lg-12 mt-5">
                    <div v-for="dish in contorni" :key="dish.id" class="card-rest shadow-sm bg-white">
                        <img :src="dish.image" :alt="'Immagine che rappresenta ' + dish.name" v-if="dish.image" />

                        <div class="card-body">
                            <h5 class="card-title">{{ dish.name }}</h5>
                            <p class="card-text ingredients">{{ dish.ingredients }}</p>
                            <p class="card-text font-weight-bold">{{ dish.price }} &euro;</p>
                            <p class="card-text font-weight-bold">{{ dish.course.name }}</p>
                            <button class="btn btn-home" @click="sameRestaurant(dish) ? addDish(dish) : alertRest()">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </section>

            <section class="dessert" v-if="contorni.length > 0">
                <h2>Dessert</h2>
                <div class="card-grid col-lg-12 mt-5">
                    <div v-for="dish in dessert" :key="dish.id" class="card-rest shadow-sm bg-white">
                        <img :src="dish.image" :alt="'Immagine che rappresenta ' + dish.name" v-if="dish.image" />

                        <div class="card-body">
                            <h5 class="card-title">{{ dish.name }}</h5>
                            <p class="card-text ingredients">{{ dish.ingredients }}</p>
                            <p class="card-text font-weight-bold">{{ dish.price }} &euro;</p>
                            <p class="card-text font-weight-bold">{{ dish.course.name }}</p>
                            <button class="btn btn-home" @click="sameRestaurant(dish) ? addDish(dish) : alertRest()">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </section>

            <section class="drink" v-if="contorni.length > 0">
                <h2>Drink</h2>
                <div class="card-grid col-lg-12 mt-5">
                    <div v-for="dish in drink" :key="dish.id" class="card-rest shadow-sm bg-white">
                        <img :src="dish.image" :alt="'Immagine che rappresenta ' + dish.name" v-if="dish.image" />

                        <div class="card-body">
                            <h5 class="card-title">{{ dish.name }}</h5>
                            <p class="card-text ingredients">{{ dish.ingredients }}</p>
                            <p class="card-text font-weight-bold">{{ dish.price }} &euro;</p>
                            <p class="card-text font-weight-bold">{{ dish.course.name }}</p>
                            <button class="btn btn-home" @click="sameRestaurant(dish) ? addDish(dish) : alertRest()">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </section>

            <section class="piattiUnici" v-if="piattiUnici.length > 0">
                <h2>Piatti Unici</h2>
                <div class="card-grid col-lg-12 mt-5">
                    <div v-for="dish in piattiUnici" :key="dish.id" class="card-rest shadow-sm bg-white">
                        <img :src="dish.image" :alt="'Immagine che rappresenta ' + dish.name" v-if="dish.image" />

                        <div class="card-body">
                            <h5 class="card-title">{{ dish.name }}</h5>
                            <p class="card-text ingredients">{{ dish.ingredients }}</p>
                            <p class="card-text font-weight-bold">{{ dish.price }} &euro;</p>
                            <p class="card-text font-weight-bold">{{ dish.course.name }}</p>
                            <button class="btn btn-home" @click="sameRestaurant(dish) ? addDish(dish) : alertRest()">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</template>


<script>
    export default {
        name: "DishList",
        data() {
            return {
                dishes: [], // modificato da -> dishes: {},
                cart: [],
                haveToShowModal: false,
                antipasti: [],
                primi: [],
                secondi: [],
                contorni: [],
                dessert: [],
                drink: [],
                piattiUnici: [],
            };
        },
        created() {
            axios
                .get(`/api/dishes/${this.$route.params.slug}`)
                .then((response) => {
                    this.dishes = response.data;
                    for (let i = 0; i < this.dishes.length; i++) {
                        switch (this.dishes[i].course.slug) {
                            case 'antipasti':
                                this.antipasti.push(this.dishes[i]);
                                break;
                            case 'primi':
                                this.primi.push(this.dishes[i]);
                                break;
                            case 'secondi':
                                this.secondi.push(this.dishes[i]);
                                break;
                            case 'contorni':
                                this.contorni.push(this.dishes[i]);
                                break;
                            case 'dessert':
                                this.dessert.push(this.dishes[i]);
                                break;
                            case 'drink':
                                this.drink.push(this.dishes[i]);
                                break;
                            case 'piattiUnici':
                                this.piattiUnici.push(this.dishes[i]);
                                break;
                        }
                    }
                })
                .catch((error) => {
                    this.$router.push({
                        name: "page-404"
                    });
                });


        },
        mounted() {
            if (localStorage.cart) {
                this.cart = JSON.parse(localStorage.cart);
            }
        },
        watch: {
            cart: {
                handler(newCart) {
                    localStorage.cart = JSON.stringify(newCart);
                },
                deep: true,
            },
        },
        methods: {
            addDish(dish) {
                const newDish = [dish, 1];
                const cartArrayBefore = this.getActualCartArray();
                // console.log("dish", dish);
                let ind = -1;
                let temp = false;
                if (cartArrayBefore != null) {
                    cartArrayBefore.forEach((oldDish, index) => {
                        // console.log("comparazione: thisDish", dish);
                        // console.log("comparazione: dish", oldDish);
                        if (dish.id == oldDish[0].id) {
                            newDish[1] = oldDish[1] + 1;
                            ind = index;
                            temp = true;
                            this.cart.splice(ind, 1, newDish);
                        }
                    });
                }
                if (temp == false) {
                    newDish[1] = 1;
                    this.cart.push(newDish);
                }
            },
            removeDish(dish) {
                const actualCart = this.getActualCartArray();
                let index = -1;
                actualCart.forEach((item, ind) => {
                    if (item[0].id == dish[0].id) {
                        index = ind;
                    }
                });
                if (index > -1) {
                    this.cart.splice(index, 1);
                }
            },
            getActualCartArray() {
                // console.log("actual array:", JSON.parse(localStorage.getItem("cart")));
                return JSON.parse(localStorage.getItem("cart"));
            },
            sameRestaurant(dish) {
                if (this.cart.length <= 0) {
                    console.log("Il carrello è vuoto, puoi aggiungere piatti");
                    return true;
                } else if (dish.restaurant_id == this.cart[0][0].restaurant_id) {
                    console.log("dish:", dish);
                    console.log("primo dish in cart:", this.cart[0][0]);
                    console.log(
                        "Il ristorante è lo stesso, puoi aggiungere piatti",
                        dish.restaurant_name,
                        this.cart[0].restaurant_name
                    );
                    return true;
                } else {
                    console.log(
                        "Nel carrello ci sono piatti di altri ristoranti, NON puoi aggiungere piatti"
                    );
                    return false;
                }
            },
            alertRest() {
                this.showModal();
            },
            showModal() {
                return this.haveToShowModal = true;
            },
            closeModal() {
                this.haveToShowModal = false;
            },
            // aumenta la quantità di piatti nel carrello
            increaseQuantity(dish) {
                let newDish = dish;
                newDish[1] = dish[1] + 1;
                let ind = this.cart.indexOf(dish);
                this.cart.splice(ind, 1, newDish);
            },
            // diminuisce la quantità di piatti nel carrello, se è 0 rimuove il piatto dal carrello
            decreaseQuantity(dish) {
                let newDish = dish;
                newDish[1] = dish[1] - 1;
                let ind = this.cart.indexOf(dish);
                if (newDish[1] > 0) {
                    this.cart.splice(ind, 1, newDish);
                } else {
                    this.cart.splice(ind, 1);
                }
            },
            //rimuove piatto dal carrello
            removeDish(dish) {
                // const actualCart = this.getActualCartArray();
                let index = -1;
                this.cart.forEach((item, ind) => {
                    if (item[0].id == dish[0].id) {
                        index = ind;
                    }
                });
                if (index > -1) {
                    this.cart.splice(index, 1);
                }
            },
            //restituisce il carrello in localstorage
            // getActualCartArray() {
            //   return JSON.parse(localStorage.getItem("cart"));
            // },
            //calcola il prezzo finale del carrello
            finalPrice() {
                let finalPrice = 0;

                this.cart.forEach((item) => {
                    finalPrice += item[0].price * item[1];
                });

                return finalPrice.toFixed(2);
            },
        },
    };
</script>

<style lang="scss" scoped>
    .modal-mask {
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .5);
        display: table;
        transition: opacity .3s ease;
    }

    .modal-wrapper {
        display: table-cell;
        vertical-align: middle;
    }

    .btn-home {
        background-color: #00ccbc;
        color: white;
        font-weight: bold;
    }

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