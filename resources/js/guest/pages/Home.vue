<template>
  <main>
    <MainHomeSection />
    <CategoriesHome/>
    <Work/>
  </main>
</template>

<script>
import MainHomeSection from "../components/sections/home/MainHomeSection.vue";
import CategoriesHome from "../components/sections/home/CategoriesHome.vue";
import Work from "../components/sections/home/Work.vue";

export default {
  name: "Main",
  components: {
    MainHomeSection,
    CategoriesHome,
    Work,
  },
};
</script>

<style lang="scss" scoped>
</style>