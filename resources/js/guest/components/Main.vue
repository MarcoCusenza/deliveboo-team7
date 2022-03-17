<template>
  <main>
      <MainHomeSection/>
      <Work/>
  </main>
</template>

<script>
import MainHomeSection from './sections/MainHomeSection.vue'
import Work from './sections/Work.vue'

export default {
name: 'Main',
components: {
    MainHomeSection,
    Work
}
}
</script>

<style lang="scss" scoped>

</style>