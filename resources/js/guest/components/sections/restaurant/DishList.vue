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
                <button class="btn btn-home delete" @click="removeDish(dish)">
                  <i class="fa-solid fa-trash-can"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
        <div v-else>
          <div
            class="
              empty-cart
              py-2
              text-center
              d-flex
              flex-column
              align-items-center
              justify-content-center
            "
          >
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
                    <img
                      src="https://i.postimg.cc/908J98s0/Pngtree-angry-burrito-kawaii-7266107.png"
                      height="80px"
                    />
                    <button
                      type="button"
                      class="close"
                      data-dismiss="modal"
                      aria-label="Close"
                    >
                      <span aria-hidden="true" @click="showModal = false"
                        >&times;</span
                      >
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>
                      Nel carrello sono presenti dei piatti del locale
                      <strong>{{ rightRestaurant.restaurant_name }}</strong
                      >.<br />Non puoi aggiungere dei piatti da locali diversi
                    </p>
                  </div>
                  <div class="modal-footer">
                    <button
                      type="button"
                      class="btn btn-secondary"
                      @click="closeModal()"
                    >
                      Chiudi
                    </button>
                    <a
                      :href="'/restaurant/' + rightRestaurant.slug"
                      class="btn btn-primary"
                      >Torna da {{ rightRestaurant.restaurant_name }}</a
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
        </transition>
      </div>

      <!-- LISTA PIATTI -->
      <DishCourses
        @isTheSameRestaurant="checkSameRestaurant"
        :antipasti="antipasti"
        :piattiUnici="piattiUnici"
        :primi="primi"
        :secondi="secondi"
        :contorni="contorni"
        :dessert="dessert"
        :drink="drink"
      />
    </div>
  </div>
</template>


<script>
import DishCourses from "./DishCourses.vue";
export default {
  name: "DishList",
  components: {
    DishCourses,
  },
  data() {
    return {
      dishes: [],
      rightRestaurant: null,
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
            case "antipasti":
              this.antipasti.push(this.dishes[i]);
              break;
            case "primi":
              this.primi.push(this.dishes[i]);
              break;
            case "secondi":
              this.secondi.push(this.dishes[i]);
              break;
            case "contorni":
              this.contorni.push(this.dishes[i]);
              break;
            case "dessert":
              this.dessert.push(this.dishes[i]);
              break;
            case "drink":
              this.drink.push(this.dishes[i]);
              break;
            case "piatti-unici":
              this.piattiUnici.push(this.dishes[i]);
              break;
          }
        }
      })
      .catch((error) => {
        this.$router.push({
          name: "page-404",
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
    checkSameRestaurant(dish) {
      this.sameRestaurant(dish) ? this.addDish(dish) : this.showModal();
    },

    addDish(dish) {
      //Oldschool: un'entità piatto è considerata un array [{dish}, quantity]
      const newDish = [dish, 1];
      const actualCartArray = this.getActualCartArray();
      // console.log("dish", dish);
      let ind = -1;
      let temp = false;
      if (actualCartArray != null) {
        actualCartArray.forEach((oldDish, index) => {
          if (dish.id == oldDish[0].id) {
            newDish[1] = oldDish[1] + 1;
            ind = index;
            temp = true;
            this.cart.splice(ind, 1, newDish);
          }
        });
      }
      if (temp == false) {
        newDish[1] = 1;//setta la quantità a 1
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
    showModal() {
      this.haveToShowModal = true;

      axios
        .get(`/api/restaurantid/${this.cart[0][0].restaurant_id}`)
        .then((response) => {
          this.rightRestaurant = response.data;
        })
        .catch((error) => {
          console.log("Nessun ristorante trovato?", error);
          // this.$router.push({
          //     name: "page-404"
          // });
        });
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
  background-color: rgba(0, 0, 0, 0.5);
  display: table;
  transition: opacity 0.3s ease;
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
      transition: background-color 0.2s ease-in-out;
    }

    .value-button:hover {
      cursor: pointer;
      background-color: #00ccbc;
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
    transition: background 0.2 ease-in-out;
    &:hover {
      background-color: #d10000;
    }
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
</style>