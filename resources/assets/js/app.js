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

/*Vue.component('pagination', {
    data: function() {
        return {
            pageNumber: 0
        }
    },
    props: {
        size: {
            type: Number,
            required: false,
            default: 50
        },
        data: {
            type: Array,
            required: true,
        },
    },
    methods: {
        nextPage() {
            this.pageNumber++;
        },
        prevPage() {
            this.pageNumber--;
        },
        pageCount() {
            let l = this.data.length,
                s = this.size;

            return Math.ceil(l/s);
        },
        paginatedData() {
            const start = this.pageNumber * this.size,
                end = start + this.size;

            return this.data.slice(start, end);
        }
    },
    template: '<div>\n' +
        '<button class="button success" @click="prevPage"><</button>\n' +
        '<button class="button success" @click="nextPage">></button>\n' +
    '</div>'
});*/

/*Vue.component('grid', {
    template: '#grid-template',
    props: {
        heroes: Array,
        columns: Array,
        filterKey: String
    },
    data: function () {
        let sortOrders = {};
        this.columns.forEach(function (key) {
            sortOrders[key] = 1
        });
        return {
            sortKey: '',
            sortOrders: sortOrders
        }
    },
    computed: {
        filteredHeroes: function () {
            let sortKey = this.sortKey;
            let filterKey = this.filterKey && this.filterKey.toLowerCase();
            let order = this.sortOrders[sortKey] || 1;
            let heroes = this.heroes;
            if (filterKey) {
                heroes = heroes.filter(function (row) {
                    return Object.keys(row).some(function (key) {
                        return String(row[key]).toLowerCase().indexOf(filterKey) > -1
                    })
                })
            }
            if (sortKey) {
                heroes = heroes.slice().sort(function (a, b) {
                    a = a[sortKey];
                    b = b[sortKey];
                    return (a === b ? 0 : a > b ? 1 : -1) * order
                })
            }
            return heroes
        }
    },
    filters: {
        capitalize: function (str) {
            return str.charAt(0).toUpperCase() + str.slice(1)
        }
    },
    methods: {
        sortBy: function (key) {
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1;
        }
    }
});*/

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
