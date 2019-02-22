require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);

import App from './components/App.vue';

import ClientCreate from './components/clients/Create.vue';
import ClientsList  from './components/clients/List.vue';
import ClientEdit  from './components/clients/Edit.vue';

import ArticleCreate from './components/articles/Create.vue';
import ArticlesList from './components/articles/List.vue';
import ArticleEdit from './components/articles/Edit.vue';

const routes = [
    {
        name: 'clientCreate',
        path: '/clients/create',
        component: ClientCreate
    },
    {
        name: 'clientsList',
        path: '/clients/list',
        component: ClientsList
    },
    {
        name: 'clientEdit',
        path: '/clients/edit/:id',
        component: ClientEdit
    },
    {
        name: 'articleCreate',
        path: '/articles/create',
        component: ArticleCreate
    },
    {
        name: 'articlesList',
        path: '/articles/list',
        component: ArticlesList
    },
    {
        name: 'articleEdit',
        path: '/articles/edit/:id',
        component: ArticleEdit
    },
];

const router = new VueRouter({ mode: 'history', routes: routes});

const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');

