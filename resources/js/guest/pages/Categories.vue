<template>
  <section>
    <div class="container multi-select">
      <h2>Seleziona le tue categorie preferite disponibili</h2>
      <div class="row">
        <div class="col-sm-12 col-lg-3">
          <div class="form-group">
            <label class="label-title">Seleziona le tue categorie</label>
            <ul class="list-group">
              <!-- Problema SELECTEDCATEGORIES! -->
              <li
                class="list-group-item"
                v-for="(category, index) in allCategories"
                :key="index"
              >
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

        <div
          class="restaurants-container col-sm-12 col-lg-9 card-grid"
          v-if="restaurants.data"
        >
          <!-- Stampare tutti i ristoranti dati dalla ricerca-->
          <div
            class="card-rest shadow-sm bg-white"
            v-for="(restaurant, index) in restaurants.data"
            :key="index"
          >
            <div class="cover-rest">
              <img
                v-if="restaurant.image && isFirstLetterH(restaurant.image)"
                :src="restaurant.image"
                :alt="restaurant.name"
              />
              <img
                v-else
                :src="'../storage/' + restaurant.image"
                :alt="restaurant.name"
              />
            </div>
            <div class="restaurant-info p-3 center">
              <h4>{{ restaurant.restaurant_name }}</h4>
              <p>{{ restaurant.address }}</p>
              <p>{{ restaurant.phone }}</p>
              <p>
                <span
                  class="restaurant-categories"
                  v-for="(cat, i) in restaurant.categories"
                  :key="i"
                >
                  {{ cat.name
                  }}<span v-if="i < restaurant.categories.length - 1">, </span>
                </span>
              </p>
              <a :href="'/restaurant/' + restaurant.slug" class="btn btn-home"
                >Menù</a
              >
            </div>
          </div>
        </div>
        <div v-else>Non hai selezionato nessuna categoria</div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: "Categories",
  data() {
    return {
      allCategories: [],
      selectedCategories: [],
      restaurants: [],
    };
  },
  methods: {
    isFirstLetterH(item) {
      return item[0] == "h";
    },
    callRest() {
      let url_param = "";
      JSON.parse(localStorage.selectedCategories).forEach((item) => {
        url_param += item.slug + ",";
      });

      console.log("url_param", url_param);
      console.log(
        "localStorage.selectedCategories",
        JSON.parse(localStorage.selectedCategories)
      );

      if (url_param != "") {
        axios
          .get(`/api/restaucat/` + url_param)
          .then((response) => {
            this.restaurants = response.data;
            console.log("this.restaurants.data", this.restaurants.data);
            // console.log(
            //   "this.restaurants1.isEmpty?",
            //   this.restaurants == null
            // );
          })
          .catch((error) => {
            this.$router.push({
              name: "page-404",
            });
          });
      }

      // console.log("this.restaurants2", this.restaurants);
      // console.log("this.restaurants2.length???", this.restaurants.length);
    },
  },
  watch: {
    selectedCategories: {
      handler(newSC) {
        localStorage.selectedCategories = JSON.stringify(newSC);
        this.callRest();
      },
      deep: true,
    },
  },
  // Salviamo i dati delle api nella variabile categorest
  mounted() {
    if (localStorage.selectedCategories) {
      this.selectedCategories = JSON.parse(localStorage.selectedCategories);
    }

    axios
      .get(`/api/categories`)
      .then((response) => {
        this.allCategories = response.data;
      })
      .catch((error) => {
        this.$router.push({
          name: "page-404",
        });
      });

    // this.callRest();
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

  .card-rest {
    border-radius: 10px;
    overflow: hidden;
    .cover-rest {
      max-width: 100%;
      height: 150px;

      img {
        width: 100%;
        height: 100%;
        object-fit: cover;
      }
    }

    .restaurant-info {
      .restaurant-categories {
        color: grey;
        font-style: italic;
      }
    }
  }
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