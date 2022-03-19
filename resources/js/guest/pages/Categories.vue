<template>
    <section>
        <div class="container multi-select">
            <h2>Seleziona le tue categorie preferite disponibili</h2>
            <div class="dropdown-checkbox form-group">
                <label class="label-title">Seleziona le tue categorie</label>
                <ul>
                    <!-- Salvo i dati delle categorest selezionate nella variabile checkedCategories -->
                    <li v-for="(indexrest, index) in indexrests" :key="index">
                        <label><input type="checkbox" :value="indexrest" v-model="checkedCategories"
                                :name="indexrest.name">{{indexrest.name}}</label>
                    </li>
                </ul>
            </div>

            <button type="button" class="btn btn-primary ml-2" @click="showRest = !showRest">Cerca per
                categorie</button>

            <div v-if="showRest">
                <!-- Bisogna stampare i ristoranti delle checkedCategories -->
                <div v-for="(checkedCategory, id) in checkedCategories" :key="id">
                    <div v-for="(restaurants, id) in checkedCategory.restaurants" :key="id" :value="duplicato(restaurants.id)">
                        <span>{{restaurants.restaurant_name}}</span>
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
                showRest: true,
                indexrests: {},
                checkedCategories: [],
                selectedCategory: [],
                duplicati: [],
            };
        },
        mounted() {
            if (localStorage.selectedCategory) {
                this.selectedCategory = JSON.parse(localStorage.selectedCategory);
                this.checkedCategories[0] = this.selectedCategory[0];

            }
            // console.log(this.selectedCategory)
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
            axios.get(`/api/indexrest`)
                .then((response) => {
                    this.indexrests = response.data;
                })
                .catch((error) => {
                    this.$router.push({
                        name: "page-404"
                    });
                });
        },
        methods: {
            duplicato(item) {
                this.duplicati.push(item)
                console.log(this.duplicati);
            }
        }
    }
</script>

<style lang="scss" scoped>
    .dropdown-checkbox {
        position: relative;
        display: inline-block
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
        }
    }

    .dropdown-checkbox ul li input {
        margin-right: 10px;
    }

    .dropdown-checkbox:hover ul {
        display: block
    }
</style>