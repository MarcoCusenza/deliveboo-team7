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
    <section class="cart">
      <div class="card border-0 shadow p-3 mb-5" style="border-radius: 2rem">
        <div class="card-body">
          <h3>Carrello</h3>
          <ul>
            <li v-for="(dish, i) in cart" :key="i">
              <span class="dish-name">{{ dish[0].name }}</span>
              <span class="dish-price">{{ dish[0].price }}€</span>
              <span class="dish-quantity">x{{ dish[1] }}</span>
            </li>
          </ul>
        </div>
      </div>
    </section>
  </div>
  <!-- ALTERNATIVA -->
  <!-- <Cart /> -->
</template>


<script>
// import Cart from "../Cart.vue";

export default {
  name: "DishList",
  // components: {
  //   Cart,
  // },
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

@media screen and (min-width: 610px) {
  .container {
    .card-grid {
      display: grid;
      grid-template: repeat(1, 1fr) / repeat(2, 1fr);
    }
  }
}

@media screen and (min-width: 910px) {
  .container {
    .card-grid {
      display: grid;
      grid-template: repeat(1, 1fr) / repeat(4, 1fr);
    }
  }
}
</style>