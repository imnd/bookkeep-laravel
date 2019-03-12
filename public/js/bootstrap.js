import Vue from "vue";
import axios from "axios";

window.Vue = Vue;

axios.defaults.headers.common = {
    'X-CSRF-TOKEN': Laravel.csrfToken,
    'X-Requested-With': 'XMLHttpRequest',
    'Authorization': 'Bearer ' + Laravel.apiToken,
};

window.Vue.prototype.$http = axios;
