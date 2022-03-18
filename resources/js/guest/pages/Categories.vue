<template>
    <section>
        <div class="container multi-select">
            <h2>Seleziona le tue categorie preferite</h2>
            <div class="dropdown-checkbox form-group">
                <label class="label-title">Seleziona le tue categorie</label>
                <ul>
                    <li v-for="(category, index) in categories" :key="index">
                        <label><input type="checkbox" :value="category.slug" v-model="checkedCategories" :name="category.name">{{category.name}}</label>
                    </li>
                </ul>
            </div>

            <button type="button" class="btn btn-primary ml-2" @click="showCat = !showCat">Cerca per categorie</button>
            <div v-show="showCat">
                <ul>
                    <li v-for="(checkedCategory, index) in checkedCategories" :key="index">
                        <span>{{checkedCategory}}</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- ${this.$route.params.slug} -->
</template>

<script>
    export default {
        name: "Categories",
        data() {
            return {
                showCat: false,
                categories: {},
                checkedCategories: [],
            };
        },
        created() {
            axios
                .get(`/api/categorest`)
                .then((response) => {
                    this.categories = response.data;
                })
                .catch((error) => {
                    this.$router.push({
                        name: "page-404"
                    });
                });
        },
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