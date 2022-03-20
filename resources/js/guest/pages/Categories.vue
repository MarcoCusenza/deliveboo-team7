<template>
  <section>
    <div class="container multi-select">
      <h2>Seleziona le tue categorie preferite disponibili</h2>
      <div class="row">
        <div class="col-sm-12 col-lg-3">
          <div class="form-group">
            <label class="label-title">Seleziona le tue categorie</label>
            <ul class="list-group">
              <!-- Salvo i dati delle categorest selezionate nella variabile selectedCategories -->
              <li
                class="list-group-item"
                v-for="(category, index) in indexrests"
                :key="index"
              >
                <!-- una categoria a localStorage NON FUNZIONA provare a dare al figlio -->
                <label>
                  <input
                    type="checkbox"
                    :value="category"
                    v-model="selectedCategories"
                    :name="category.name"
                  />
                  {{ category.name }}
                </label>
              </li>
            </ul>
          </div>
        </div>

        <div class="col-sm-12 col-lg-9" v-if="selectedCategories.length > 0">
          <!-- Bisogna stampare i ristoranti delle selectedCategories -->
          <div v-for="(selCat, id) in selectedCategories" :key="id">
            <h2>{{ selCat.name }}</h2>
            <div class="card-grid">
              <div
                class="card-rest shadow-sm bg-white"
                v-for="(restaurant, id) in selCat.restaurants"
                :key="id"
              >
                <div class="p-3 center">
                  <h4>{{ restaurant.restaurant_name }}</h4>
                  <p>{{ restaurant.address }}</p>
                  <p>{{ restaurant.phone }}</p>
                  <a
                    :href="'/restaurant/' + restaurant.slug"
                    class="btn btn-home"
                    >Menù</a
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: "Categories",
  data() {
    return {
      indexrests: {},
      selectedCategories: [],
    };
  },
  mounted() {
    if (localStorage.selectedCategories) {
      console.log(
        "MOUNTED localStorage SELCAT",
        JSON.parse(localStorage.selectedCategories)
      );
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
  // Salviamo i dati delle api nella variabile categorest
  created() {
    axios
      .get(`/api/indexrest`)
      .then((response) => {
        this.indexrests = response.data;
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
.card-grid {
  display: grid;
  grid-template: repeat(1, 1fr) / repeat(1, 1fr);
  justify-content: center;
  gap: 20px;
  margin-bottom: 2em;
}

.btn-home {
  background-color: #00ccbc;
  color: white;
  font-weight: bold;
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
      grid-template: repeat(1, 1fr) / repeat(3, 1fr);
    }
  }
}
</style>