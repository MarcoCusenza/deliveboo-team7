<template>
  <div class="container">
    <!-- LISTA PIATTI -->
    <div class="card-grid">
      <div
        v-for="dish in dishes"
        :key="dish.id"
        class="card-rest shadow-sm bg-white"
      >
        <!-- <div class="image" :style="{ 'background-image': url(dish.image) }"></div>  -->
        <div class="image">
          <img
            :src="dish.image"
            :alt="'Immagine che rappresenta ' + dish.name"
          />
        </div>
        <div class="card-body">
          <h5 class="card-title">{{ dish.name }}</h5>
          <p class="card-text">Prezzo: {{ dish.price }} &euro;</p>
          <p class="card-text">Ingredienti: {{ dish.ingredients }}</p>
          <p class="card-text">
            Ingredienti: Descrizione: {{ dish.description }}
          </p>
          <button
            class="btn btn-home"
            @click="sameRestaurant(dish) ? addDish(dish) : alertRest()"
          >
            Aggiungi
          </button>
        </div>
      </div>
    </div>

    <!-- CARRELLO -->
    <section class="cart-box">
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
                <div
                  class="value-button"
                  id="decrease"
                  @click="decreaseQuantity(dish)"
                  value="Decrease Value"
                >
                  -
                </div>
                <input type="number" id="number" :value="dish[1]" />
                <div
                  class="value-button"
                  id="increase"
                  @click="increaseQuantity(dish)"
                  value="Increase Value"
                >
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
      <div v-else>Il tuo carrello è vuoto</div>
      <div class="cart-bottom">
        <div class="final-price">
          <h4>Totale = {{ finalPrice() }}€</h4>
        </div>
        <a class="button-link mx-2 icon-header" href="/checkout">
          Vai al checkout
        </a>
      </div>
    </section>
  </div>
</template>


<script>
export default {
  name: "DishList",
  data() {
    return {
      dishes: {},
      cart: [],
    };
  },
  created() {
    axios
      .get(`/api/dishes/${this.$route.params.slug}`)
      .then((response) => {
        this.dishes = response.data;
      })
      .catch((error) => {
        this.$router.push({ name: "page-404" });
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
      alert("Puoi ordinare da un solo ristorante alla volta!");
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

      return finalPrice;
    },
  },
};
</script>


<style lang="scss" scoped>
.btn-home {
  background-color: #00ccbc;
  color: white;
  font-weight: bold;
}

.image {
  height: 300px;
  min-width: 300px;
  color: grey;
  text-align: center;

  img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 2em 2em 0 0;
  }
}

.card-grid {
  display: grid;
  grid-template: repeat(1, 1fr) / repeat(1, 1fr);
  justify-content: center;
  gap: 20px;
  margin-bottom: 3em;

  .card-rest {
    border-radius: 2em;
  }
}

.cart-box {
  background: white;
  border-radius: 30px;
  box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px;
  padding: 40px;

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
      padding: 10px 20px;
      width: 160px;
      border-radius: 10px;
      background-color: rgb(240, 240, 240);
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
    }
  }
}

@media screen and (min-width: 992px) {
  .container {
    .card-grid {
      display: grid;
      grid-template: repeat(1, 1fr) / repeat(3, 1fr);
    }
  }
}

@media screen and (min-width: 1500px) {
  .container {
    .card-grid {
      display: grid;
      grid-template: repeat(1, 1fr) / repeat(4, 1fr);
    }
  }
}

@media screen and (min-width: 2000px) {
  .container {
    .card-grid {
      display: grid;
      grid-template: repeat(1, 1fr) / repeat(5, 1fr);
    }
  }
}
</style>