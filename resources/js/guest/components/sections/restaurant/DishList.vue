<template>
  <div class="dish-list">
    <div class="container">
      <ul>
        <li class="dish" v-for="dish in dishes" :key="dish.id">
          <img :src="dish.image" :alt="dish.name" />
          <div class="dish-name">{{ dish.name }}</div>
          <div class="dish-price">Prezzo: {{ dish.price }}</div>
          <div class="dish-price">Ingredienti: {{ dish.ingredients }}</div>
          <div class="dish-price">Descrizione: {{ dish.description }}</div>
        </li>
      </ul>
    </div>
  </div>
</template>


<script>
export default {
  name: "DishList",
  data() {
    return {
      dishes: {},
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
};
</script>


<style lang="scss" scoped>
img {
  max-width: 200px;
}
</style>