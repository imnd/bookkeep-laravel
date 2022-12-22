require("./bootstrap");

/*import runtime from "serviceworker-webpack-plugin/lib/runtime"
if ("serviceWorker" in navigator) {
    runtime.register()
}*/

// axios
import { createApp } from "vue"
import App from "./components/App.vue";
import store from "./components/store/index.ts";
import router from "./components/router/index.ts";
import VueAxios from "vue-axios";
import axios from "axios";

axios.defaults.headers.common = {
    "X-Requested-With": "XMLHttpRequest",
    "X-CSRF-TOKEN": window.Laravel.csrfToken ?? null,
    "Authorization": "Bearer " + window.Laravel.apiToken ?? null,
};

// connect all common components
const app = createApp(App)
import components from "./components/ui/index.ts";
components.forEach(component => {
    app.component(component.name, component);
})

app
    .use(store)
    .use(VueAxios, axios)
    .use(router)
    .mount("#app");
