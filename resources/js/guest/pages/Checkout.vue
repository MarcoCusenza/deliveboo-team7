<template>
  <div class="container-bg">
    <div class="container my-5">
      <h2 class="my-5">Checkout</h2>
      <div class="row">
        <div class="col-12 col-checkout p-5">
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
            <div class="final-price">
              <h4>Totale = {{ finalPrice() }}€</h4>
            </div>
          </table>

          <div v-else>Il tuo carrello è vuoto</div>
        </div>
        <div class="col-sm-12 col-lg-5 col-checkout p-5 mt-5">
          qui ci va il pagamento
        </div>
        <div class="col-sm-12 col-lg-5 col-checkout ml-auto p-5 mt-5">
          qui ci va il rider
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Checkout",
  data() {
    return {
      cart: [],
    };
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
.container-bg {
  width: 100%;
  height: 100%;
  background-image: url("https://i.postimg.cc/L5ttR4pj/Deliver-Boo-7-2x.png");
  background-size: 350px;
  background-repeat: no-repeat;
  background-position: 85% 30%;

  .col-checkout {
    background: white;
    border-radius: 30px;
    box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px;

    .table {
      .final-price {
        margin: 20px 0 0 10px;
        padding: 10px;
        width: 180px;
        text-align: center;
        border-radius: 10px;
        background-color: rgb(240, 240, 240);
      }
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
    .btn-home {
      background-color: #00ccbc;
      color: white;
      font-weight: bold;
    }
  }
}

@media screen and (min-width: 600px) {
  .col-checkout {
    border-radius: 57px;
  }
}
</style>