<template>
  <div class="container-slider slider my-5 d-flex align-items-center">
    <div class="slide-track">
      <div class="slide">
        <img
          src="https://i.postimg.cc/7ZcD8DZB/kisspng-logo-mcdonalds-brand-corporate-identity-font-5bfa497bbfaae3-4023128615431294677851.png"
          alt="mcdonald logo"
          height="120"
          width="130"
        />
      </div>
      <div class="slide">
        <img
          src="https://i.postimg.cc/hvrgHdXx/pngegg-8.png"
          height="130"
          width="150"
          alt="pizza hut"
        />
      </div>
      <div class="slide">
        <img
          src="https://i.postimg.cc/CLhwbm24/pngegg-9.png"
          height="100"
          width="120"
          alt="dominos"
        />
      </div>
      <div class="slide">
        <img
          src="https://i.postimg.cc/V6P8vRMn/kisspng-hamburger-burger-king-logo-restaurant-burger-king-5ab6e50e6c2ce8-1386596315219356304431.png"
          height="90"
          width="100"
          alt="burger king"
        />
      </div>
      <div class="slide">
        <img
          src="https://i.postimg.cc/52k94LnS/pngegg-14.png"
          height="120"
          width="180"
          alt="subway"
        />
      </div>
      <div class="slide">
        <img
          src="https://i.postimg.cc/02VPn7R1/kisspng-hamburger-kfc-take-out-fast-food-fried-chicken-round-kfc-logo-5a70b80758dd09-944457161517336.png"
          height="120"
          width="120"
          alt="kfc"
        />
      </div>
      <div class="slide">
        <img
          src="https://i.postimg.cc/76SqncDK/pngegg-10.png"
          height="140"
          width="150"
          alt="hard rock"
        />
      </div>
      <div class="slide">
        <img
          src="https://i.postimg.cc/wMHgfVjg/pngegg-11.png"
          height="100"
          width="100"
          alt="starbucks"
        />
      </div>
      <div class="slide">
        <img
          src="https://i.postimg.cc/1znmfXdh/pngegg-12.png"
          height="80"
          width="210"
          alt="dunkin' donuts"
        />
      </div>
      <div class="slide">
        <img
          src="https://i.postimg.cc/8zsD0sNJ/pngegg-13.png"
          height="120"
          width="120"
          alt="taco bell"
        />
      </div>
      <div class="slide">
        <img
          src="https://i.ibb.co/fDL9QLz/brand-number-eleven.png"
          height="120"
          width="220"
          alt="hispanic heritage"
        />
      </div>
      <div class="slide">
        <img
          src="https://i.ibb.co/z5YCnWD/brand-number-twelve.png"
          height="120"
          width="280"
          alt="microsoft unboxed"
        />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Carousel",
};
</script>

<style lang="scss" scoped>
@keyframes scroll {
  0% {
    transform: translateX(0);
  }

  100% {
    transform: translateX(calc(-250px * 7));
  }
}

.container-slider {
  width: 100%;
}

.slider {
  background: white;
  box-shadow: 0 10px 20px -5px rgba(0, 0, 0, 0.125);
  height: 150px;
  margin: auto;
  overflow: hidden;
  position: relative;
}

.slider .slide-track {
  animation: scroll 50s linear infinite;
  display: flex;
  width: calc(250px * 12);
}

.slider .slide {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 250px;
}
</style>