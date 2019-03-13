require('./bootstrap');

window.Vue = require('vue');

import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);
axios.defaults.headers.common = {
    'X-CSRF-TOKEN': Laravel.csrfToken,
    'X-Requested-With': 'XMLHttpRequest',
    'Authorization': 'Bearer ' + Laravel.apiToken,
};

import Datepicker from 'vuejs-datepicker';
Vue.component('date-picker', Datepicker);

Vue.component('grid', {
    template: `<div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">{{ this.heading }}</h4>
                    <router-link data-color="azure" :to="'/' + entity + '/create'" class="btn btn-primary btn-round pull-right">Создать</router-link>
                    <div class="clearfix"></div>
                    <p v-if="this.subheading" class="card-category">{{ this.subheading }}</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <!--форма поиска-->
                        <form @submit.prevent="listUpdate" class="search-form">
                            <component :is="'search-form-' + entity"></component>
                            <div class="pagination">
                                <span> страница {{ pageNumber + 1 }}. всего: {{ pageCount }} страниц</span>
                            </div>
                            <input type="submit" class="btn btn-primary pull-right" value="Поиск">
                        </form>
                        <!--список-->
                        <table @click.prevent="deleteItem" class="table">
                            <thead @click.prevent="listSort" class="text-primary">
                                <component :is="'grid-head-' + entity"></component>
                            </thead>
                            <component :is="'grid-body-' + entity" :listData="paginatedData"></component>
                        </table>
                        <div class="pagination">
                            <button class="btn" @click="prevPage"><</button>&nbsp;
                            <button class="btn" @click="nextPage">></button>
                            <span> страница {{ pageNumber + 1 }}. всего: {{ pageCount }} страниц</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>`,
    props: {
        heading: {
            type: String,
            required: true,
        },
        subheading: {
            type: String,
            required: false,
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
    data: function () {
        return {
            listData: [],
            paginatedData: [],
            pageNumber: 0,
            orders: {},
            listUrl: {},
        }
    },
    created() {
        this.listUrl = `/api/${this.entity}/list`;
        this.axios.get(this.listUrl).then(response => {
            this.listData = response.data.data;
            this.setPaginatedData();
        });
    },
    computed: {
        pageCount() {
            return Math.ceil(this.listData.length / this.pageSize);
        },
    },
    methods: {
        listUpdate(event) {
            let params = {};
            let formData = new FormData(event.target);
            formData.forEach(function (value, key) {
                if (value!=='' && value!==undefined) {
                    params[key] = value;
                }
            });
            this.axios.get(this.listUrl, {
                params: params
            }).then(response => {
                this.listData = response.data.data;
                this.setPaginatedData();
            });
        },
        listSort(event) {
            let field = event.target.getAttribute('data-sort');
            if (this.orders[field]===undefined || this.orders[field]==='desc') {
                this.orders[field] = 'asc';
            } else {
                this.orders[field] = 'desc';
            }
            this.axios.get(this.listUrl, {
                params: {
                    order: this.orders[field],
                    field: field
                }
            }).then(response => {
                this.listData = response.data.data;
                this.setPaginatedData();
            });
        },
        deleteItem(event) {
            let id = event.target.getAttribute('data-item-id');
            if (isNaN(parseFloat(id)) || !isFinite(id)) {
                return;
            }
            let index = event.target.getAttribute('data-item-index');
            this.axios.delete(`/api/${this.entity}/delete/${id}`).then(response => {
                this.paginatedData.splice(index, 1);
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

import VueRouter from 'vue-router';
Vue.use(VueRouter);

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
