<template>
  <div class="container-mainhome my-5">
    <div class="bg-home">
      <img
        src="https://i.postimg.cc/CKknsVXj/Deliver-Boo-2-2x.png"
        alt="bg-home"
      />
    </div>
    <div class="text-area-container text-center">
      <h1 class="font-weight-bold">
        Cibo da ristorante, da asporto e generi alimentari.<span
          style="color: #00ccbc"
        >
          A casa tua.</span
        >
      </h1>
      <button class="btn-home mt-5">Vai alle categorie</button>
    </div>
    <div class="hamburger-container">
      <img
        src="https://i.postimg.cc/WbXBtLH1/Raggruppa-12.png"
        alt="hamburger-home"
      />
    </div>
  </div>
</template>

<script>
export default {
  name: "MainHomeSection",
};
</script>

<style lang="scss" scoped>
.container-mainhome {
  width: 100%;
  height: 100%;
  position: relative;

  .bg-home {
    position: absolute;
    // top: 90%;
    left: 0;
    z-index: -10;

    img {
      width: 600px;
    }
  }

  .text-area-container {
    width: 30%;
    z-index: 999;
    position: absolute;
    top: 400px;
    left: 50%;
    transform: translate(-50%, -50%);

    .btn-home {
      padding: 10px 50px;
      background-color: #00ccbc;
      color: white;
      font-weight: bold;
      border-radius: 57px;
      border: none;
      font-size: 20px;
    }
  }

  .hamburger-container {
    position: absolute;
    top: 0;
    left: 58%;
  }
}
</style>