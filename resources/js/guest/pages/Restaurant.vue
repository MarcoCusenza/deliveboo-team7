<template>
    <div class="container">
        <img v-if="restaurant.image && isFirstLetterH(restaurant.image)" :src="restaurant.image" :alt="restaurant.name"/>
        <img v-else :src="'../storage/' + restaurant.image" :alt="restaurant.name"/>
        <h1 class="restaurant-name">{{ restaurant.restaurant_name }}</h1>

        <!-- Lista dei piatti -->
        <DishList />
    </div>
</template>

<script>
    import DishList from "../components/sections/restaurant/DishList.vue";

    export default {
        name: "Restaurant",
        components: {
            DishList,
        },
        data() {
            return {
                restaurant: {},
            };
        },
        methods: {
            isFirstLetterH(item) {
                console.log(item)
                return item[0] == 'h'
            },
        },
        created() {
            axios
                .get(`/api/restaurant/${this.$route.params.slug}`)
                .then((response) => {
                    this.restaurant = response.data;
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
    img {
        max-width: 300px;
    }
</style>