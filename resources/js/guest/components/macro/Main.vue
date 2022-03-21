<template>
  <main>
    <router-view :key="$route.path"></router-view>
  </main>
</template>

<script>
export default {
  name: "Main",
  mounted() {
    document.title = this.$route.meta.title;
  },
};
</script>



<style lang="scss" scoped>
main {
    -ms-overflow-style: none; /* for Internet Explorer, Edge */
    scrollbar-width: none; /* for Firefox */
    overflow-y: scroll; 
}

main::-webkit-scrollbar {
    display: none; /* for Chrome, Safari, and Opera */
}
</style>