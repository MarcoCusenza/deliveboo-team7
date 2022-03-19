<template>
  <div class="dish-list">
    <div class="container">
      <ul>
        <li class="dish" v-for="dish in dishes" :key="dish.id">
          <img :src="dish.image" :alt="dish.name" />
          <div class="dish-name">{{ dish.name }}</div>
          <div class="dish-price">Prezzo: {{ dish.price }}</div>
          <div class="dish-ingedients">Ingredienti: {{ dish.ingredients }}</div>
          <div class="dish-description">
            Descrizione: {{ dish.description }}
          </div>
          <button @click="addDish(dish)">Aggiungi</button>
        </li>
      </ul>
    </div>

    <!-- CARRELLO -->
    <section class="cart">
      <h3>Carrello</h3>
      <ul>
        <li v-for="(dish, i) in cart" :key="i">
          <span class="dish-name">{{ dish[0].name }}</span>
          <span class="dish-price">{{ dish[0].price }}€</span>
          <span class="dish-quantity">x{{ dish[1] }}</span>
        </li>
      </ul>
    </section>

    <!-- ALTERNATIVA -->
    <!-- <Cart /> -->
  </div>
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
    renderCart() {
      this.cart = JSON.parse(localStorage.cart);
    },
    jsonToArray(jsonFile) {
      return JSON.parse([jsonFile]);
    },
  },
};
</script>


<style lang="scss" scoped>
img {
  max-width: 200px;
}
</style>