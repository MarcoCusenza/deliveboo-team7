<template>
  <div class="container-bg">
    <div class="container my-5">
      <h2 class="my-5">Checkout</h2>
      <div class="row">
        <div class="col-12 col-checkout p-5 mb-3">
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
              <h4>Totale = {{ finalPrice().toFixed(2) }}€</h4>
            </div>
          </table>

          <div v-else>Il tuo carrello è vuoto</div>
        </div>

        <!-- FORM CLIENTE -->
        <div class="col-12 col-checkout p-5">
          <div class="cart table table-borderless">
            <form id="payment-form">
              <div class="form-group">
                <label for="client_name">Nome *</label>
                <input
                  type="text"
                  maxlength="150"
                  class="form-control"
                  id="client_name"
                  v-model="formData.client_name"
                  placeholder="Inserisci il tuo nome"
                  required
                />
              </div>

              <div class="form-group">
                <label for="client_surname">Cognome *</label>
                <input
                  type="text"
                  maxlength="150"
                  class="form-control"
                  id="client_surname"
                  v-model="formData.client_surname"
                  placeholder="Inserisci il tuo cognome"
                  required
                />
              </div>

              <div class="form-group">
                <label for="client_address">Indirizzo di fatturazione *</label>
                <input
                  type="text"
                  maxlength="150"
                  class="form-control"
                  id="client_address"
                  v-model="formData.client_address"
                  placeholder="Inserisci il tuo indirizzo di fatturazione"
                  required
                />
              </div>

              <div class="form-group">
                <label for="client_delivAddress"
                  >Indirizzo di spedizione *</label
                >
                <input
                  type="text"
                  maxlength="150"
                  class="form-control"
                  id="client_delivAddress"
                  v-model="formData.delivery_address"
                  placeholder="Inserisci il tuo indirizzo di spedizione"
                  required
                />
              </div>

              <div class="form-group">
                <label for="client_email">Email *</label>
                <input
                  type="email"
                  maxlength="150"
                  class="form-control"
                  id="client_email"
                  v-model="formData.client_email"
                  placeholder="Inserisci la tua email"
                  required
                />
              </div>

              <div class="form-group">
                <label for="client_phone">Telefono *</label>
                <input
                  minlength="8"
                  maxlength="15"
                  type="tel"
                  pattern="[0-9]{8,15}"
                  class="form-control"
                  id="client_phone"
                  v-model="formData.client_phone"
                  placeholder="Inserisci il tuo numero di telefono"
                  required
                />
              </div>

              <div class="form-group">
                <label for="note">Aggiungi una nota per il ristorante</label>
                <textarea
                  class="form-control"
                  id="note"
                  v-model="formData.note"
                  placeholder="Inserisci una nota per il ristorante"
                />
              </div>

              <!-- BRAINTREE -->
              <div class="totale">
                Totale da pagare: {{ finalPrice().toFixed(2) }}€
              </div>
              <!-- <input type="hidden" :value="window.token" name="_token" /> -->
              <section>
                <div class="bt-drop-in-wrapper">
                  <div id="bt-dropin"></div>
                </div>
              </section>

              <input id="nonce" type="hidden" />

              <button class="btn btn-home" type="submit" ref="submit">
                <span>Paga</span>
              </button>
            </form>
            <!-- BRAINTREE -->
          </div>
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
      formData: {
        client_name: "Luna",
        client_surname: "Lovegood",
        client_address: "via luna 1",
        delivery_address: "via luna 1",
        client_email: "luna@gmail.com",
        client_phone: "3496668594",
        note: "",
        price_tot: 0,
        restaurant_id: "",
      },
    };
  },
  mounted() {
    //LocalStorage Carrello
    if (localStorage.cart) {
      this.cart = JSON.parse(localStorage.cart);
    }

    // //prezzo totale
    // this.formData.price_tot = this.finalPrice();

    // <!-- BRAINTREE -->
    //Ajax chiama la rotta che restituisce il token di autorizzazione nella risposta
    axios.get("/payment/checkout").then((response) => {
      var form = document.querySelector("#payment-form");

      //Si crea il dropin con il token
      braintree.dropin.create(
        {
          authorization: response.data,
          selector: "#bt-dropin",
          // paypal: {
          //   flow: "vault",
          // },
        },
        (createErr, instance) => {
          if (createErr) {
            console.log("Create Error", createErr);
          } else {
            form.addEventListener("submit", (event) => {
              event.preventDefault();

              instance.requestPaymentMethod((err, payload) => {
                if (err) {
                  console.log("Request Payment Method Error", err);
                  return;
                }

                // Add the nonce to the form and submit
                document.getElementById("nonce").value = payload.nonce;

                let tot = this.finalPrice();

                let data = {
                  amount: tot,
                  payment_method_nonce: payload.nonce,
                  name: this.formData.client_name,
                  surname: this.formData.client_surname,
                  email: this.formData.client_email,
                };
                axios
                  .post("/payment/checkout", data)
                  .then((response) => {
                    console.log("SUCCESSO /payment/checkout", response);
                    //Funzione con CHIAMATA AXIOS CHE AGGIUNGE NUOVO ORDINE NEL DB
                    this.addOrder();
                    window.location.href = "/transaction";
                  })
                  .catch((error) => {
                    console.log("ERRORE /payment/checkout", error.data);
                  });
              });
            });
          }
        }
      );
    });
    // <!-- BRAINTREE -->
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
    //calcola il prezzo finale del carrello
    finalPrice() {
      let finalPrice = 0;

      this.cart.forEach((item) => {
        finalPrice += item[0].price * item[1];
      });

      return finalPrice;
    },
    //Aggiunge un ordine al DB
    addOrder() {
      // /api/orders
      this.formData.price_tot = this.finalPrice();
      this.formData.restaurant_id = this.cart[0][0].restaurant_id;

      axios
        .post("/api/order/create", {
          formData: this.formData,
          cart: this.cart,
        })
        .then((response) => {
          console.log("Successo Creazione Ordine", response);
          this.cart = [];
        })
        .catch((error) => {
          console.log("ERRORE Creazione Ordine", error.data);
        });
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