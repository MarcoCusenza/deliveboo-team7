<template>
    <div class="container container-categories mb-5">
        <h2 class="text-center font-weight-bold">
            Dai un'occhiata alle nostre categorie disponibili!
        </h2>
        <div class="row mt-5">
            <div v-for="category in categories.slice(0, 8)" :key="category.id" class="col-lg-3 col-sm-6 mt-5">
                <div class="card-category text-center p-4">
                    <div class="
              img-container
              mb-3
              d-flex
              align-items-center
              justify-content-center
            ">
                        <img :src="category.image" alt="categoria" />
                    </div>
                    <h3>{{ category.name }}</h3>
                    <a href="/categories" :value="category" @click="saveCategory(category)" class="btn font-weight-bold">Visualizza</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CategoriesHome",

        data() {
            return {
                categories: [],
                selectedCategory: [],
            };
        },
        methods: {
            saveCategory(item) {
                this.selectedCategory.splice(0, 1, item);
            }
        },
        mounted() {
            if (localStorage.selectedCategory) {
                this.selectedCategory = JSON.parse(localStorage.selectedCategory);
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
    .card-category {
        height: 350px;
        border-radius: 57px;
        box-shadow: rgba(17, 12, 46, 0.15) 0px 25px 100px 0px;

        .img-container {
            border-top-left-radius: 57px;
            border-top-right-radius: 57px;
            height: 70%;
            background: #f3f3f3;

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
