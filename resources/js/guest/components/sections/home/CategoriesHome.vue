<template>
  <div class="container container-categories mb-5 pt-5" id="best-categories">
    <h2 class="text-center font-weight-bold">Le nostre migliori categorie:</h2>
    <div class="row mt-5">
      <div
        v-for="category in categories.slice(0, 8)"
        :key="category.id"
        class="col-lg-3 col-sm-6 mt-5"
      >
        <div class="card-category text-center p-4">
          <div
            class="
              img-container
              mb-3
              d-flex
              align-items-center
              justify-content-center
            "
          >
            <img :src="category.image" alt="categoria" />
          </div>
          <h3>{{ category.name }}</h3>
          <a
            href="/categories"
            :value="category"
            @click="addCat(category)"
            class="btn font-weight-bold"
            >Visualizza</a
          >
        </div>
      </div>
    </div>
    <div class="btn-container">
      <a href="/categories"
        ><button class="btn-home mt-5" @click="clearCat()">
          Guarda tutte le categorie
        </button></a
      >
    </div>
  </div>
</template>

<script>
export default {
  name: "CategoriesHome",

  data() {
    return {
      categories: [],
      selectedCategories: [],
    };
  },
  methods: {
    addCat(item) {
      this.clearCat();
      this.selectedCategories.push(item);
    },
    clearCat() {
      this.selectedCategories = [];
    },
  },
  mounted() {
    if (localStorage.selectedCategories) {
      this.selectedCategories = JSON.parse(localStorage.selectedCategories);
    }
  },

  watch: {
    selectedCategories: {
      handler(newSC) {
        localStorage.selectedCategories = JSON.stringify(newSC);
      },
      deep: true,
    },
  },

  created() {
    axios
      .get("/api/indexrest")
      .then((response) => {
        this.categories = response.data;
      })
      .catch((error) => {
        this.$router.push({
          name: "page-404",
        });
      });
  },
};
</script>

<style lang="scss" scoped>
.btn-container {
  width: 100%;
  display: flex;
  justify-content: center;

  .btn-home {
    padding: 10px 50px;
    background-color: #00ccbc;
    color: white;
    font-weight: bold;
    border-radius: 57px;
    border: none;
    font-size: 20px;
  }
}

.card-category {
  height: 350px;
  border-radius: 57px;
  box-shadow: rgba(17, 12, 46, 0.15) 10px 30px 30px 10px;

  .img-container {
    border-top-left-radius: 57px;
    border-top-right-radius: 57px;
    height: 70%;
    background-image: linear-gradient(#f3f3f3, #f8fafc);

    img {
      width: 150px;
    }
  }

  .btn {
    width: 90%;
    background: #00ccbc;
    color: white;
    border-radius: 57px;
    padding: 8px 20px;

    &:hover {
      background: #007067;
    }
  }
}
</style>
