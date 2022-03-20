<template>
  <section>
    <div class="container multi-select">
      <h2>Seleziona le tue categorie preferite disponibili</h2>
      <div class="row">
        <div class="col-sm-12 col-lg-3">
          <div class="form-group">
            <label class="label-title">Seleziona le tue categorie</label>
            <ul class="list-group">
              <!-- Salvo i dati delle categorest selezionate nella variabile checkedCategories -->
              <li
                class="list-group-item"
                v-for="(category, index) in indexrests"
                :key="index"
                @click="
                  isChecked(category) ? removeCat(category) : addCat(category)
                "
              >
                <!-- una categoria a localStorage NON FUNZIONA provare a dare al figlio -->
                <label :name="category.name">
                  <input
                    type="checkbox"
                    :value="category"
                    v-model="checkedCategories"
                    :name="category.name"
                  />
                  {{ category.name }}
                </label>
              </li>
            </ul>
          </div>
        </div>

        <div class="col-sm-12 col-lg-9" v-if="checkedCategories.length > 0">
          <!-- Bisogna stampare i ristoranti delle checkedCategories -->
          <div v-for="(checkedCategory, id) in checkedCategories" :key="id">
            <h2>{{ checkedCategory.name }}</h2>
            <div class="card-grid">
              <div
                class="card-rest shadow-sm bg-white"
                v-for="(restaurant, id) in checkedCategory.restaurants"
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
      checkedCategories: [],
      selectedCategories: [],
    };
  },
  methods: {
    //aggiungere una categoria a localStorage NON FUNZIONA + controllare se c'è già
    addCat(category) {
      this.selectedCategories.push(category);
      console.log(this.selectedCategories);
    },
    removeCat(category) {
      let index = this.selectedCategories.indexOf(category);
      console.log("INDEX", index);
      this.selectedCategories.splice(index, 1);
    },
    isChecked(category) {
      if (this.checkedCategories) {
        console.log("isChecked???", this.checkedCategories.includes(category));
        return this.checkedCategories.includes(category);
      } else {
        return false;
      }
    },
  },
  mounted() {
    console.log(JSON.parse(localStorage.selectedCategories).length);
    if (JSON.parse(localStorage.selectedCategories).length > 0) {
      this.selectedCategories = JSON.parse(localStorage.selectedCategories);
      this.checkedCategories = this.selectedCategories;
    }
  },
  watch: {
    selectedCategory: {
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
// .dropdown-checkbox {
//   position: relative;
//   display: inline-block;
// }

// .dropdown-checkbox .label-title {
//   font-size: 13px;
// }

// .dropdown-checkbox ul {
//   position: absolute;
//   background: #f8fafc;
//   list-style: none;
//   min-width: 180px;
//   margin: 0px;
//   padding: 0px;
//   left: 0px;
//   display: none;
//   z-index: 1;
//   border: 1px solid #9c9c9c;
// }

// .dropdown-checkbox ul li {
//   font-size: 15px;
//   padding: 10px;
//   border-bottom: 1px solid #a5a5a5;
//   margin: 0px;

//   label {
//     width: 100%;
//     cursor: pointer;
//   }
// }

// .dropdown-checkbox ul li input {
//   margin-right: 10px;
// }

// .dropdown-checkbox:hover ul {
//   display: block;
// }

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