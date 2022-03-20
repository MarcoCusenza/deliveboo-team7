<template>
    <div class="container">

        <div class="cover shadow pb-2 mb-5">
            <div class="cover-rest ">
                <img v-if="restaurant.image && isFirstLetterH(restaurant.image)" :src="restaurant.image" :alt="restaurant.name"/>
                <img v-else :src="'../storage/' + restaurant.image" :alt="restaurant.name"/>
            </div>
            <h1 class="restaurant-name ">{{ restaurant.restaurant_name }}</h1>
        </div>

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
.cover{
    border-radius: 2em;

}
    .cover-rest{
        img{
            width: 100%;
            height:200px;
            object-fit: cover;
            border-radius: 2em  2em 0 0;
        }
    }
    h1{
        // color: #00ccbc;
        margin: 1em;
        font-size: bold;
        text-transform: uppercase;
        text-align: center;
        
    }
</style>