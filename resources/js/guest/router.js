import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from "./pages/Home";
import Restaurant from "./pages/Restaurant";
import PageNotFound from "./pages/PageNotFound";

const router = new VueRouter({
    mode: "history",
    routes: [
      //HOMEPAGE
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/home",
            name: "home",
            component: Home
        },

        //
        {
            path: "/restaurant/:slug",
            name: "restaurant",
            component: Restaurant
        },

        //Pagina 404 Not Found
        {
            path: "*",
            name: "page-404",
            component: PageNotFound
        },

    ]
});

export default router