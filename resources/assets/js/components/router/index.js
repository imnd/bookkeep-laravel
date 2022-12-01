import { createRouter, createWebHistory } from "vue-router";

import store from "../store";
const routes = store.state.menuItems;

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    if (to.meta.title !== undefined) {
        document.title = to.meta.title;
    }
    next();
});

export default router;
