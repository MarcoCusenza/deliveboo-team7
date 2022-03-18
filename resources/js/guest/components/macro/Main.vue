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
</style>