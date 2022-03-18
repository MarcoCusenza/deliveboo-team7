<template>
  <main>
    <MainHomeSection />
    <Work />
  </main>
</template>

<script>
import MainHomeSection from "../components/sections/home/MainHomeSection.vue";
import Work from "../components/sections/home/Work.vue";

export default {
  name: "Main",
  components: {
    MainHomeSection,
    Work,
  },
};
</script>

<style lang="scss" scoped>
</style>