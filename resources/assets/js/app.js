require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);

import App from './components/App.vue';
import Home from './components/Home.vue';

import CreateClient from './components/clients/Create.vue';
import IndexClient  from './components/clients/Index.vue';
import EditClient  from './components/clients/Edit.vue';

const routes = [
    {
        name: 'home',
        path: '/home',
        component: Home
    },
    {
        name: 'create',
        path: '/clients/create',
        component: CreateClient
    },
    {
        name: 'list',
        path: '/clients/list',
        component: IndexClient
    },
    {
        name: 'edit',
        path: '/clients/edit/:id',
        component: EditClient
    },
];

const router = new VueRouter({ mode: 'history', routes: routes});
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');
