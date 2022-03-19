<template>
  <section class="cart">
    <h1>QUESTO CARRELLO E' DEPRECATO</h1>
    <!-- <h3>Carrello</h3>
    <ul>
      <li v-for="(dish, i) in cart" :key="i">
        {{ dish.name }}
      </li>
    </ul> -->
  </section>
</template>

<script>
export default {
  name: "Cart",
  data() {
    return {
      cart: [],
    };
  },
  created() {
    console.log("CART CART:");
    console.log(this.cart);
  },
  mounted() {
    if (localStorage.cart) {
      this.cart = JSON.parse(localStorage.cart);
    }
  },
  watch: {
    cart: {
      handler(newDish) {
        localStorage.cart = JSON.stringify(newDish);
      },
      deep: true,
    },
  },
  methods: {
    addDish(dish) {
      this.cart.push(dish);
    },
    removeDish(dish) {
      const index = this.cart.indexOf(dish);
      if (index > -1) {
        this.cart.splice(index, 1);
      }
    },
  },
};
</script>

<style>
</style>