require("./bootstrap");

/*import runtime from "serviceworker-webpack-plugin/lib/runtime"
if ("serviceWorker" in navigator) {
    runtime.register()
}*/

import { createApp } from "vue"
import App from "./components/App.vue";
import store from "./components/store";
import router from "./components/router";
import VueAxios from "vue-axios";
import axios from "axios";
axios.defaults.headers.common = {
    "X-CSRF-TOKEN": Laravel.csrfToken,
    "X-Requested-With": "XMLHttpRequest",
    "Authorization": "Bearer " + Laravel.apiToken,
};

const app = createApp(App)
import components from "./components/ui";
components.forEach(component => {
    app.component(component.name, component);
})

app
    .use(store)
    .use(VueAxios, axios)
    .use(router)
    .mount("#app");

window.app = app;
