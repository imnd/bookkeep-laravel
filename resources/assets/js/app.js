require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);

import App from './components/App.vue';

import ArticlesList from './components/articles/List.vue';
import ArticleCreate from './components/articles/Create.vue';
import ArticleEdit from './components/articles/Edit.vue';

import ClientsList  from './components/clients/List.vue';
import ClientCreate from './components/clients/Create.vue';
import ClientEdit  from './components/clients/Edit.vue';

import InvoicesList from './components/invoices/List.vue';
import InvoiceCreate from './components/invoices/Create.vue';
import InvoiceEdit from './components/invoices/Edit.vue';

import PurchasesList from './components/purchases/List.vue';
import PurchaseCreate from './components/purchases/Create.vue';
import PurchaseEdit from './components/purchases/Edit.vue';

import BillsList from './components/bills/List.vue';
import BillCreate from './components/bills/Create.vue';
import BillEdit from './components/bills/Edit.vue';

Vue.component('grid', {
    props: {
        heading: {
            type: String,
            required: true,
        },
        entity: {
            type: String,
            required: true,
        },
        pageSize: {
            type: String,
            required: false,
            default: 50,
            validator: function(value){
                return value >= 0;
            }
        },
    },
    template: `<div>
        <router-link :to="'/api/' + entity + '/create'" class="button primary top">Создать</router-link>
        <h1>{{ this.heading }}</h1>
        <table>
            <grid-head></grid-head>
            <grid-body :editUrl="'/api/' + entity + '/edit'" :listData="paginatedData"></grid-body>
        </table>
        <div>
            <button class="button nav" @click="prevPage"><</button>
            <button class="button nav" @click="nextPage">></button>
        </div>
    </div>`,
    data: function () {
        return {
            listData: [],
            paginatedData: [],
            pageNumber: 0,
        }
    },
    created() {
        this.axios.get('/api/' + this.entity + '/list').then(response => {
            this.listData = response.data.data;
            this.paginatedData = this.getPaginatedData();
        });
    },
    computed: {
        pageCount() {
            return Math.ceil(this.listData.length / this.pageSize);
        },
    },
    methods: {
        deleteItem(id, index) {
            this.axios.delete('/api/' + this.entity + `/delete/${id}`).then(response => {
                this.listData.splice(index, 1);
            });
        },
        getPaginatedData() {
            const start = this.pageNumber * this.pageSize,
                  end = start + parseInt(this.pageSize);

            return this.listData.slice(start, end);
        },
        nextPage() {
            this.pageNumber++;
            this.paginatedData = this.getPaginatedData();
        },
        prevPage() {
            this.pageNumber--;
            this.paginatedData = this.getPaginatedData();
        },
    }
});

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            name: 'articlesList',
            path: '/articles/list',
            component: ArticlesList
        },
        {
            name: 'articleCreate',
            path: '/articles/create',
            component: ArticleCreate
        },
        {
            name: 'articleEdit',
            path: '/articles/edit/:id',
            component: ArticleEdit
        },
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
            name: 'invoicesList',
            path: '/invoices/list',
            component: InvoicesList
        },
        {
            name: 'invoiceCreate',
            path: '/invoices/create',
            component: InvoiceCreate
        },
        {
            name: 'invoiceEdit',
            path: '/invoices/edit/:id',
            component: InvoiceEdit
        },
        {
            name: 'purchasesList',
            path: '/purchases/list',
            component: PurchasesList
        },
        {
            name: 'purchaseCreate',
            path: '/purchases/create',
            component: PurchaseCreate
        },
        {
            name: 'purchaseEdit',
            path: '/purchases/edit/:id',
            component: PurchaseEdit
        },
        {
            name: 'billsList',
            path: '/bills/list',
            component: BillsList
        },
        {
            name: 'billCreate',
            path: '/bills/create',
            component: BillCreate
        },
        {
            name: 'billEdit',
            path: '/bills/edit/:id',
            component: BillEdit
        },
    ]
});

const app = new Vue(Vue.util.extend({router}, App)).$mount('#app');
