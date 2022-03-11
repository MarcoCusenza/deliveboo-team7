import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

// import Home from "./pages/Home";
// import PageNotFound from "./pages/PageNotFound";

const router = new VueRouter({
  mode: "history",
  // routes: [
  //   {
  //     path: "/",
  //     name: "home",
  //     component: Home
  //   },

  //   //Pagina 404 Not Found
  //   {
  //     path: "*",
  //     name: "page-404",
  //     component: PageNotFound
  //   }
  // ]
});

export default router