<template>
    <section>
        <div class="container multi-select">
            <h2>Seleziona le tue categorie preferite</h2>
            <div class="dropdown-checkbox form-group">
                <label class="label-title">Seleziona le tue categorie</label>
                <ul>
                    <!-- Salvo i dati delle categorest selezionate nella variabile checkedCategories -->
                    <li v-for="(categorest, index) in categorests" :key="index">
                        <label><input type="checkbox" :value="categorest" v-model="checkedCategories" :name="categorest.name">{{categorest.name}}</label>
                    </li>
                </ul>
            </div>

            <button type="button" class="btn btn-primary ml-2" @click="showCat = !showCat">Cerca per categorie</button>
            <div v-show="showCat">
                <ul>
                    <!-- Bisogna stampare i ristoranti delle checkedCategories -->
                    <li v-for="(checkedCategory, id) in checkedCategories" :key="id" :load="log(checkedCategory)">
                    <!-- <li v-for="checkedCategory in checkedCategories" :key="checkedCategory.id" :load="log(checkedCategory)"> -->
                        <!-- <span style="color: green">{{checkedCategory}}</span> -->
                        <ul>
                            <li v-for="(restaurants, id) in checkedCategory" :key="id" :load="logg(restaurants)">
                                <!-- <span style="color: red;">{{restaurants}}</span> -->
                                <ul>
                                    <li v-for="(restaurant, id) in restaurants" :key="id" :load="loggg(restaurant)">
                                        <!-- <span>{{restaurant}}</span> -->
                                        <ul>
                                            <li v-for="(rest, id) in restaurant" :key="id">
                                                <span style="color: orange">{{rest}}</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- <li v-for="(restaurant, id) in restaurants[6]" :key="id">
                                        <span>{{restaurant}}</span>
                                    </li> -->
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: "Categories",
        data() {
            return {
                showCat: false,
                categorests: {},
                checkedCategories: [],
            };
        },
        // Salviamo i dati delle api nella variabile categorest
        created() {
            axios.get(`/api/categorest`)
            .then((response) => {
                this.categorests = response.data;
                console.log(this.categorests)
            })
            .catch((error) => {
                this.$router.push({
                    name: "page-404"
                });
            });
        },
        methods: {
            log(item) {
                console.log("checkedCategory: ", item)
            },
            logg(item) {
                console.log("restaurants: ", item)
            },
            loggg(item) {
                console.log("XXXXXXXXXXXXXXXX: ", item)
            },

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