<template>
  <div class="app">
    <Header/>
    <Main/>
<Footer/> 
  </div>
</template>

<script>
import Header from './components/Header.vue';
import Main from './components/Main.vue';
import Footer from './components/Footer.vue';

export default {
  name: "App",
  components: {
    Header,
    Main,
    Footer,
  }
};
</script>

<style lang="scss">

// .main-bg {
//   background-image: url('https://i.postimg.cc/4NKQFsNj/Deliver-Boo-2-2x.png');
//   background-repeat: no-repeat;
//   background-position-y: -50%;
//   background-size: 110%;
// }

</style>