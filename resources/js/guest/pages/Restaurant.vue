<template>
    <div class="container">
        <div class="cover-rest cover mb-5">
            <img v-if="restaurant.image && isFirstLetterH(restaurant.image)" :src="restaurant.image"
                :alt="restaurant.name" />
            <img v-else :src="'../storage/' + restaurant.image" :alt="restaurant.name" />
            <div class="overlay-text">
                <h1 class="restaurant-name">{{ restaurant.restaurant_name }}</h1>
            </div>
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
                return item[0] == "h";
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
                        name: "page-404",
                    });
                });
        },
    };
</script>

<style lang="scss" scoped>
    .cover-rest {
        border-radius: 2em;
        position: relative;

        img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 2em;
            filter: brightness(50%);

        }

        .overlay-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);

            h1 {
                color: white;
                margin: 1em;
                font-weight: bold;
                text-transform: uppercase;
                text-align: center;
                font-size: 50px
            }
        }
    }
</style>