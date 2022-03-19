<template>
  <section>
    <div class="container multi-select">
      <h2>Seleziona le tue categorie preferite disponibili</h2>
      <div class="dropdown-checkbox form-group">
        <label class="label-title">Seleziona le tue categorie</label>
        <ul>
          <!-- Salvo i dati delle categorest selezionate nella variabile checkedCategories -->
          <li v-for="(category, index) in indexrests" :key="index">
            <!-- aggiungere una categoria a localStorage NON FUNZIONA -->
            <label :name="category.name" @click="addCat(category)">
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

      <div v-if="checkedCategories.length > 0">
        <!-- Bisogna stampare i ristoranti delle checkedCategories -->
        <div v-for="(checkedCategory, id) in checkedCategories" :key="id">
          <h3>{{ checkedCategory.name }}</h3>
          <div
            v-for="(restaurant, id) in checkedCategory.restaurants"
            :key="id"
          >
            <span>{{ restaurant.restaurant_name }}</span>
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
      selectedCategory: [],
    };
  },
  methods: {
    //aggiungere una categoria a localStorage NON FUNZIONA + controllare se c'è già
    addCat(category) {
      this.selectedCategory.push(category);
      console.log(this.selectedCategory);
    },
  },
  mounted() {
    console.log(JSON.parse(localStorage.selectedCategory).length);
    if (JSON.parse(localStorage.selectedCategory).length > 0) {
      this.selectedCategory = JSON.parse(localStorage.selectedCategory);
      this.checkedCategories[0] = this.selectedCategory[0];
    }
  },
  watch: {
    selectedCategory: {
      handler(newSC) {
        localStorage.selectedCategory = JSON.stringify(newSC);
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
.dropdown-checkbox {
  position: relative;
  display: inline-block;
}

.dropdown-checkbox .label-title {
  font-size: 13px;
}

.dropdown-checkbox ul {
  position: absolute;
  background: #f8fafc;
  list-style: none;
  min-width: 180px;
  margin: 0px;
  padding: 0px;
  left: 0px;
  display: none;
  z-index: 1;
  border: 1px solid #9c9c9c;
}

.dropdown-checkbox ul li {
  font-size: 15px;
  padding: 10px;
  border-bottom: 1px solid #a5a5a5;
  margin: 0px;

  label {
    width: 100%;
    cursor: pointer;
  }
}

.dropdown-checkbox ul li input {
  margin-right: 10px;
}

.dropdown-checkbox:hover ul {
  display: block;
}
</style>