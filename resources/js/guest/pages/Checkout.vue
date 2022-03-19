<template>
  <div class="container-bg">
    <div class="container my-5">
      <h2 class="my-5">Checkout</h2>
      <div class="row">
        <div class="col-12 col-checkout p-5">
          <table class="table table-borderless">
            <thead>
              <tr>
                <th scope="col">Nome piatto</th>
                <th scope="col">Prezzo</th>
                <th scope="col">Quantità</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Pizza Margherita</td>
                <td>10</td>
                <td>
                  <div class="counter">
                    <div
                      class="value-button"
                      id="decrease"
                      @click="decreaseValue()"
                      value="Decrease Value"
                    >
                      -
                    </div>
                    <input type="number" id="number" value="0" />
                    <div
                      class="value-button"
                      id="increase"
                      @click="increaseValue()"
                      value="Increase Value"
                    >
                      +
                    </div>
                  </div>
                </td>
                <td><i class="fa-solid fa-trash-can delete"></i></td>
              </tr>
              <tr>
                <td>Pizza Capricciosa</td>
                <td>12</td>
                <td>
                  <div class="counter">
                    <div
                      class="value-button"
                      id="decrease"
                      @click="decreaseValue()"
                      value="Decrease Value"
                    >
                      -
                    </div>
                    <input type="number" id="number" value="0" />
                    <div
                      class="value-button"
                      id="increase"
                      @click="increaseValue()"
                      value="Increase Value"
                    >
                      +
                    </div>
                  </div>
                </td>
                <td><i class="fa-solid fa-trash-can delete"></i></td>
              </tr>
              <tr>
                <td>Pizza bianca</td>
                <td>8</td>
                <td>
                  <div class="counter">
                    <div
                      class="value-button"
                      id="decrease"
                      @click="decreaseValue()"
                      value="Decrease Value"
                    >
                      -
                    </div>
                    <input type="number" id="number" value="0" />
                    <div
                      class="value-button"
                      id="increase"
                      @click="increaseValue()"
                      value="Increase Value"
                    >
                      +
                    </div>
                  </div>
                </td>
                <td><i class="fa-solid fa-trash-can delete"></i></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-sm-12 col-lg-5 col-checkout p-5 mt-5">
          qui ci va il pagamento
        </div>
        <div class="col-sm-12 col-lg-5 col-checkout ml-auto p-5 mt-5">
          qui ci va il rider
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Checkout",

  data() {
    return {};
  },

  methods: {
    increaseValue() {
      var value = parseInt(document.getElementById("number").value, 10);
      value = isNaN(value) ? 0 : value;
      value++;
      document.getElementById("number").value = value;
    },

    decreaseValue() {
      var value = parseInt(document.getElementById("number").value, 10);
      value = isNaN(value) ? 0 : value;
      value < 1 ? (value = 1) : "";
      value--;
      document.getElementById("number").value = value;
    },
  },
};
</script>

<style lang="scss" scoped>
.container-bg {
  width: 100%;
  height: 100%;
  background-image: url("https://i.postimg.cc/L5ttR4pj/Deliver-Boo-7-2x.png");
  background-size: 350px;
  background-repeat: no-repeat;
  background-position: 85% 30%;

  .col-checkout {
    background: white;
    border-radius: 30px;
    box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px;

    .counter {
      margin: auto;
      display: flex;

      .value-button {
        display: inline-block;
        border: 1px solid #ddd;
        margin: 0px;
        width: 40px;
        height: 30px;
        text-align: center;
        background: #eee;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        font-weight: bold;
        font-size: 18px;
      }

      .value-button:hover {
        cursor: pointer;
      }

      #decrease {
        border-radius: 8px 0 0 8px;
      }

      #increase {
        border-radius: 0 8px 8px 0;
      }

      input#number {
        text-align: center;
        border: none;
        border-top: 1px solid #ddd;
        border-bottom: 1px solid #ddd;
        margin: 0px;
        width: 40px;
        height: 30px;
      }

      input::-webkit-outer-spin-button,
      input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
      }

      /* Firefox */
      input[type="number"] {
        -moz-appearance: textfield;
      }
    }

    .delete {
      cursor: pointer;
    }
  }
}

@media screen and (min-width: 600px) {
  .col-checkout {
    border-radius: 57px;
  }
}
</style>