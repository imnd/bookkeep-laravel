require('./bootstrap');

window.Vue = require('vue');

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
        
        <!--форма поиска-->
        <form @submit.prevent="listUpdate" class="search-form" method="GET">
            <component :is="'search-form-' + entity"></component>
            <input type="submit" class="button" value="поиск">
            <div class="clear"></div>
        </form>

        <!--список-->
        <table>
            <thead>
                <component :is="'grid-head-' + entity"></component>
            </thead>
            <component :is="'grid-body-' + entity" :listData="paginatedData"></component>
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
        this.axios.get(`/api/${this.entity}/list`).then(response => {
            this.listData = response.data.data;
            this.setPaginatedData();
        });
    },
    /*computed: {
        pageCount() {
            return Math.ceil(this.listData.length / this.pageSize);
        },
    },*/
    methods: {
        listUpdate(event) {
            let params = {};
            let formData = new FormData(event.target);
            formData.forEach(function (value, key) {
                if (value!=='' && value!==undefined) {
                    params[key] = value;
                }
            });
            this.axios.get(`/api/${this.entity}/list`, {
                params: params
            }).then(response => {
                this.listData = response.data.data;
                this.setPaginatedData();
            });
        },
        deleteItem(id, index) {
            this.axios.delete(`/api/${this.entity}/delete/${id}`).then(response => {
                this.listData.splice(index, 1);
            });
        },
        setPaginatedData() {
            const start = this.pageNumber * this.pageSize,
                  end = start + parseInt(this.pageSize);

            this.paginatedData = this.listData.slice(start, end);
        },
        nextPage() {
            this.pageNumber++;
            this.setPaginatedData();
        },
        prevPage() {
            this.pageNumber--;
            this.setPaginatedData();
        },
    }
});

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);

import App from './components/App.vue';

import Home from './components/Home.vue';

import ArticlesList from './components/articles/List.vue';
import ArticleCreate from './components/articles/Create.vue';
import ArticleEdit from './components/articles/Edit.vue';

import ClientsList  from './components/clients/List.vue';
import ClientCreate from './components/clients/Create.vue';
import ClientEdit  from './components/clients/Edit.vue';

import InvoicesList from './components/invoices/List.vue';
import InvoiceCreate from './components/invoices/Create.vue';
import InvoiceEdit from './components/invoices/Edit.vue';
import InvoicePrintoutBill from './components/invoices/PrintoutBill.vue';
import InvoicePrintoutInvoice from './components/invoices/PrintoutInvoice.vue';

import PurchasesList from './components/purchases/List.vue';
import PurchaseCreate from './components/purchases/Create.vue';
import PurchaseEdit from './components/purchases/Edit.vue';
import PurchasePrintout from './components/purchases/Printout.vue';

import BillsList from './components/bills/List.vue';
import BillCreate from './components/bills/Create.vue';
import BillEdit from './components/bills/Edit.vue';

import ContractsList from './components/contracts/List.vue';
import ContractCreate from './components/contracts/Create.vue';
import ContractEdit from './components/contracts/Edit.vue';
import ContractPrintout from './components/contracts/Printout.vue';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            name: 'home',
            path: '/',
            component: Home
        },
        {
            name: 'articlesList',
            path: '/articles/list',
            component: ArticlesList
        },
        {
            name: 'articlesCreate',
            path: '/articles/create',
            component: ArticleCreate
        },
        {
            name: 'articlesEdit',
            path: '/articles/edit/:id',
            component: ArticleEdit
        },
        {
            name: 'clientsCreate',
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
            name: 'invoicesCreate',
            path: '/invoices/create',
            component: InvoiceCreate
        },
        {
            name: 'invoicesEdit',
            path: '/invoices/edit/:id',
            component: InvoiceEdit
        },
        {
            name: 'invoicesPrintoutBill',
            path: '/invoices/printout/bill/:id',
            component: InvoicePrintoutBill
        },
        {
            name: 'invoicesPrintoutInvoice',
            path: '/invoices/printout/invoice/:id',
            component: InvoicePrintoutInvoice
        },
        {
            name: 'purchasesList',
            path: '/purchases/list',
            component: PurchasesList
        },
        {
            name: 'purchasesCreate',
            path: '/purchases/create',
            component: PurchaseCreate
        },
        {
            name: 'purchasesEdit',
            path: '/purchases/edit/:id',
            component: PurchaseEdit
        },
        {
            name: 'purchasesPrintout',
            path: '/purchases/printout/:id',
            component: PurchasePrintout
        },
        {
            name: 'billsList',
            path: '/bills/list',
            component: BillsList
        },
        {
            name: 'billsCreate',
            path: '/bills/create',
            component: BillCreate
        },
        {
            name: 'billsEdit',
            path: '/bills/edit/:id',
            component: BillEdit
        },
        {
            name: 'contractsList',
            path: '/contracts/list',
            component: ContractsList
        },
        {
            name: 'contractsCreate',
            path: '/contracts/create',
            component: ContractCreate
        },
        {
            name: 'contractsEdit',
            path: '/contracts/edit/:id',
            component: ContractEdit
        },
        {
            name: 'contractsPrintout',
            path: '/contracts/printout/:id',
            component: ContractPrintout
        },
    ]
});

const app = new Vue(Vue.util.extend({router}, App)).$mount('#app');
