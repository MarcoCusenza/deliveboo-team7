import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from "./pages/Home";
import Categories from "./pages/Categories";
import Restaurant from "./pages/Restaurant";
import Checkout from "./pages/Checkout";
import PageNotFound from "./pages/PageNotFound";
import Transaction from "./pages/Transaction";

const router = new VueRouter({
  mode: "history",
  routes: [
    //HOMEPAGE
    {
      path: "/",
      name: "home",
      component: Home,
      meta: {
        title: "DeliveBoo: Home",
      }
    },

    {
      path: "/categories",
      name: "categories",
      component: Categories,
      meta: {
        title: "DeliveBoo: Categories",
      }
    },

    //
    {
      path: "/restaurant/:slug",
      name: "restaurant",
      component: Restaurant,
      meta: {
        title: "DeliveBoo: Restaurant",
      }
    },
    {
      path: "/checkout",
      name: "checkout",
      component: Checkout,
      meta: {
        title: "DeliveBoo: Checkout",
      }
    },
    {
      path: "/transaction",
      name: "transaction",
      component: Transaction,
      meta: {
        title: "DeliveBoo: Transaction",
      }
    },

    //Pagina 404 Not Found
    {
      path: "*",
      name: "page-404",
      component: PageNotFound,
      meta: {
        title: "DeliveBoo: Page Not Found",
      }
    },

  ]
});

export default router