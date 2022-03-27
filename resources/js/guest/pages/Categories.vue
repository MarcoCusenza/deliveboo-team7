<template>
  <section>
    <div class="container multi-select">
      <h2>Seleziona le tue categorie preferite</h2>
      <div class="row mt-4">
        <div class="col-sm-12 col-lg-3">
          <div class="form-group">
            <div
              class="
                d-block d-lg-none
                list-group-item
                d-flex
                align-items-center
                justify-content-between
              "
              @click="showDropdown()"
            >
              <span>Seleziona una categoria</span>
              <i class="fa-solid fa-chevron-down ml-auto"></i>
            </div>
            <ul class="list-group d-lg-block d-none" id="dropdown">
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
        <!-- <div class="col-sm-12 col-lg-3">
                    <div class="form-group">
                        <ul class="list-group">
                            <li class="list-group-item" v-for="(category, index) in allCategories" :key="index">
                                <label>
                                    <input type="checkbox" :value="category" v-model="selectedCategories"
                                        :name="category.name" />
                                    {{ category.name }}
                                </label>
                            </li>
                        </ul>
                    </div>
                </div> -->
        <div
          class="restaurants-container col-sm-12 col-lg-9"
          v-if="restaurants.data"
        >
          <div class="card-grid">
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
              <div
                class="
                  restaurant-info
                  p-3
                  d-flex
                  flex-column
                  justify-content-between
                "
              >
                <div class="restaurant-info-text">
                  <h3>{{ restaurant.restaurant_name }}</h3>
                  <p>
                    <i class="fa-solid fa-location-dot mr-2"></i>
                    {{ restaurant.address }}
                  </p>
                  <p>
                    <i class="fa-solid fa-phone mr-2"></i>
                    {{ restaurant.phone }}
                  </p>
                  <p>
                    <i class="fa-solid fa-utensils mr-2"></i
                    ><span
                      class="restaurant-categories"
                      v-for="(cat, i) in restaurant.categories"
                      :key="i"
                    >
                      {{ cat.name
                      }}<span v-if="i < restaurant.categories.length - 1"
                        >,
                      </span>
                    </span>
                  </p>
                </div>
                <a
                  :href="'/restaurant/' + restaurant.slug"
                  class="btn btn-home mt-2"
                >
                  Visualizza menù</a
                >
              </div>
            </div>
          </div>
          <div class="paginate-container">
            <div class="paginate-box">
              <span class="prev" @click="prevPage()"></span>
              <span class="num-page"
                >Pagina {{ restaurants.current_page }} di
                {{ restaurants.last_page }}</span
              >
              <span class="next" @click="nextPage()"></span>
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
    //metodo per verificare se la prima lettera è una H
    isFirstLetterH(item) {
      return item[0] == "h";
    },

    //chiamata all'api restaucat
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
            console.log("this.restaurants", this.restaurants);
          })
          .catch((error) => {
            this.$router.push({
              name: "page-404",
            });
          });
      } else {
        this.restaurants = [];
      }
    },

    prevPage() {
      if (this.restaurants.prev_page_url != null) {
        let url_param = "";
        JSON.parse(localStorage.selectedCategories).forEach((item) => {
          url_param += item.slug + ",";
        });

        axios
          .get(
            `/api/restaucat/` +
              url_param +
              "?page=" +
              (this.restaurants.current_page - 1)
          )
          .then((response) => {
            this.restaurants = response.data;
            console.log("this.restaurants.data", this.restaurants.data);
          })
          .catch((error) => {
            this.$router.push({
              name: "page-404",
            });
          });
      }
    },

    nextPage() {
      if (this.restaurants.next_page_url != null) {
        let url_param = "";
        JSON.parse(localStorage.selectedCategories).forEach((item) => {
          url_param += item.slug + ",";
        });

        axios
          .get(
            `/api/restaucat/` +
              url_param +
              "?page=" +
              (this.restaurants.current_page + 1)
          )
          .then((response) => {
            this.restaurants = response.data;
            console.log("this.restaurants3", this.restaurants);
          })
          .catch((error) => {
            this.$router.push({
              name: "page-404",
            });
          });
      }
    },

    showDropdown() {
      const dropdown = document.getElementById("dropdown");
      console.log(dropdown);
      if (dropdown.classList.contains("d-none")) {
        dropdown.classList.add("d-block");
        dropdown.classList.remove("d-none");
      } else {
        dropdown.classList.add("d-none");
        dropdown.classList.remove("d-block");
      }
      //dropdown.classList.remove('d-none');
      // dropdown.classList.add('d-block');
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
section {
  background-image: url("https://i.postimg.cc/4NKQFsNj/Deliver-Boo-2-2x.png");
  background-color: #f8fafc;
  background-repeat: no-repeat;

  label,
  input {
    cursor: pointer;
  }

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
        height: calc(100% - 150px);

        p {
          margin: 5px;
        }

        .restaurant-categories {
          color: grey;
          font-style: italic;
        }

        .btn-home {
          background-color: #00ccbc;
          color: white;
          font-weight: bold;
          vertical-align: bottom;
          max-width: 50%;

          &:hover {
            background: #007067;
          }
        }
      }
    }
  }

  .paginate-container {
    width: 100%;
    display: flex;
    justify-content: center;
    font-size: 20px;

    .paginate-box {
      .prev {
        cursor: pointer;
        font-weight: bold;
        margin-right: 10px;

        &::before {
          content: "<";
        }
      }

      .next {
        cursor: pointer;
        font-weight: bold;
        margin-left: 10px;

        &::before {
          content: ">";
        }
      }
    }
  }
}

@media screen and (min-width: 610px) {
  .container {
    .card-grid {
      display: grid;
      grid-template: repeat(1, 1fr) / repeat(2, 1fr);

      .card-rest {
        .restaurant-info {
          .btn-home {
            max-width: 100%;
          }
        }
      }
    }
  }
}

@media screen and (min-width: 910px) {
  .container {
    .card-grid {
      display: grid;
      grid-template: repeat(1, 1fr) / repeat(3, 1fr);

      .card-rest {
        .restaurant-info {
          .btn-home {
            max-width: 100%;
          }
        }
      }
    }
  }
}
</style>