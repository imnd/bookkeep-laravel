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

import Grid from './components/Grid.vue';
Vue.component('grid', Grid);

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
            component: ArticlesList,
            meta: {
                title: 'Список товаров'
            }
        },
        {
            name: 'articlesCreate',
            path: '/articles/create',
            component: ArticleCreate,
            meta: {
                title: 'Новый товар'
            }
        },
        {
            name: 'articlesEdit',
            path: '/articles/edit/:id',
            component: ArticleEdit,
            meta: {
                title: 'Редактирование товара'
            }
        },
        {
            name: 'billsList',
            path: '/bills/list',
            component: BillsList,
            meta: {
                title: 'Список платежей'
            }
        },
        {
            name: 'billsCreate',
            path: '/bills/create',
            component: BillCreate,
            meta: {
                title: 'Новый платеж'
            }
        },
        {
            name: 'billsEdit',
            path: '/bills/edit/:id',
            component: BillEdit,
            meta: {
                title: 'Редактирование платежа'
            }
        },
        {
            name: 'clientsCreate',
            path: '/clients/create',
            component: ClientCreate,
            meta: {
                title: 'Новый клиент'
            }
        },
        {
            name: 'clientsList',
            path: '/clients/list',
            component: ClientsList,
            meta: {
                title: 'Список клиентов'
            }
        },
        {
            name: 'clientEdit',
            path: '/clients/edit/:id',
            component: ClientEdit,
            meta: {
                title: 'Редактирование клиента'
            }
        },
        {
            name: 'contractsList',
            path: '/contracts/list',
            component: ContractsList,
            meta: {
                title: 'Список контрактов'
            }
        },
        {
            name: 'contractsCreate',
            path: '/contracts/create',
            component: ContractCreate,
            meta: {
                title: 'Новый контракт'
            }
        },
        {
            name: 'contractsEdit',
            path: '/contracts/edit/:id',
            component: ContractEdit,
            meta: {
                title: 'Редактирование контракта'
            }
        },
        {
            name: 'contractsPrintout',
            path: '/contracts/printout/:id',
            component: ContractPrintout,
            meta: {
                title: 'Печать контракта'
            }
        },
        {
            name: 'invoicesList',
            path: '/invoices/list',
            component: InvoicesList,
            meta: {
                title: 'Список фактур'
            }
        },
        {
            name: 'invoicesCreate',
            path: '/invoices/create',
            component: InvoiceCreate,
            meta: {
                title: 'Новая фактура'
            }
        },
        {
            name: 'invoicesEdit',
            path: '/invoices/edit/:id',
            component: InvoiceEdit,
            meta: {
                title: 'Редактирование фактуры'
            }
        },
        {
            name: 'invoicesPrintoutBill',
            path: '/invoices/printout/bill/:id',
            component: InvoicePrintoutBill,
            meta: {
                title: 'Печать счета'
            }
        },
        {
            name: 'invoicesPrintoutInvoice',
            path: '/invoices/printout/invoice/:id',
            component: InvoicePrintoutInvoice,
            meta: {
                title: 'Печать фактуры'
            }
        },
        {
            name: 'purchasesList',
            path: '/purchases/list',
            component: PurchasesList,
            meta: {
                title: 'Список закупок'
            }
        },
        {
            name: 'purchasesCreate',
            path: '/purchases/create',
            component: PurchaseCreate,
            meta: {
                title: 'Новая закупка'
            }
        },
        {
            name: 'purchasesEdit',
            path: '/purchases/edit/:id',
            component: PurchaseEdit,
            meta: {
                title: 'Редактирование закупки'
            }
        },
        {
            name: 'purchasesPrintout',
            path: '/purchases/printout/:id',
            component: PurchasePrintout,
            meta: {
                title: 'Печать закупки'
            }
        },
    ]
});
router.beforeEach((to, from, next) => {
    if (to.meta.title!==undefined) {
        document.title = to.meta.title;
    }
    next()
});

import App from './components/App.vue';
const app = new Vue(Vue.util.extend({router}, App)).$mount('#app');
