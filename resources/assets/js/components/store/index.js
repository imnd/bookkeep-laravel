import { createStore } from "vuex";

import CRUD      from "./CRUD";
import enums      from "./enums";
import articles  from "./articles";
import bills     from "./bills";
import clients   from "./clients";
import contracts from "./contracts";
import invoices  from "./invoices";
import purchases from "./purchases";

export default createStore({
    modules: { CRUD, enums, articles, bills, clients, contracts, invoices, purchases },
    state: {
        breadcrumbs: [
            {
                title: "",
                link: "/",
            },
        ],
        menuItems: [
            {
                name: "home",
                path: "/",
                component: () => import("../Home.vue"),
                meta: {
                    title: "Главная"
                }
            },
            {
                name: "articlesList",
                path: "/articles/list",
                component: () => import("../pages/articles/List.vue"),
                meta: {
                    title: "Список товаров"
                }
            },
            {
                name: "articlesCreate",
                path: "/articles/create",
                component: () => import("../pages/articles/Create.vue"),
                meta: {
                    title: "Новый товар"
                }
            },
            {
                name: "articlesEdit",
                path: "/articles/edit/:id",
                component: () => import("../pages/articles/Edit.vue"),
                meta: {
                    title: "Редактирование товара"
                }
            },
            {
                name: "billsList",
                path: "/bills/list",
                component: () => import("../pages/bills/List.vue"),
                meta: {
                    title: "Список платежей"
                }
            },
            {
                name: "billsCreate",
                path: "/bills/create",
                component: () => import("../pages/bills/Create.vue"),
                meta: {
                    title: "Новый платеж"
                }
            },
            {
                name: "billsEdit",
                path: "/bills/edit/:id",
                component: () => import("../pages/bills/Edit.vue"),
                meta: {
                    title: "Редактирование платежа"
                }
            },
            {
                name: "clientsCreate",
                path: "/clients/create",
                component: () => import("../pages/clients/Create.vue"),
                meta: {
                    title: "Новый клиент"
                }
            },
            {
                name: "clientsList",
                path: "/clients/list",
                component: () => import("../pages/clients/List.vue"),
                meta: {
                    title: "Список клиентов"
                }
            },
            {
                name: "clientEdit",
                path: "/clients/edit/:id",
                component: () => import("../pages/clients/Edit.vue"),
                meta: {
                    title: "Редактирование клиента"
                }
            },
            {
                name: "contractsList",
                path: "/contracts/list",
                component: () => import("../pages/contracts/List.vue"),
                meta: {
                    title: "Список контрактов"
                }
            },
            {
                name: "contractsCreate",
                path: "/contracts/create",
                component: () => import("../pages/contracts/Create.vue"),
                meta: {
                    title: "Новый контракт"
                }
            },
            {
                name: "contractsEdit",
                path: "/contracts/edit/:id",
                component: () => import("../pages/contracts/Edit.vue"),
                meta: {
                    title: "Редактирование контракта"
                }
            },
            {
                name: "contractsPrintout",
                path: "/contracts/printout/:id",
                component: () => import("../pages/contracts/Printout.vue"),
                meta: {
                    title: "Печать контракта"
                }
            },
            {
                name: "invoicesList",
                path: "/invoices/list",
                component: () => import("../pages/invoices/List.vue"),
                meta: {
                    title: "Список фактур"
                }
            },
            {
                name: "invoicesCreate",
                path: "/invoices/create",
                component: () => import("../pages/invoices/Create.vue"),
                meta: {
                    title: "Новая фактура"
                }
            },
            {
                name: "invoicesEdit",
                path: "/invoices/edit/:id",
                component: () => import("../pages/invoices/Edit.vue"),
                meta: {
                    title: "Редактирование фактуры"
                }
            },
            {
                name: "invoicesPrintoutBill",
                path: "/invoices/printout/bill/:id",
                component: () => import("../pages/invoices/PrintoutBill.vue"),
                meta: {
                    title: "Печать счета"
                }
            },
            {
                name: "invoicesPrintoutInvoice",
                path: "/invoices/printout/invoice/:id",
                component: () => import("../pages/invoices/PrintoutInvoice.vue"),
                meta: {
                    title: "Печать фактуры"
                }
            },
            {
                name: "purchasesList",
                path: "/purchases/list",
                component: () => import("../pages/purchases/List.vue"),
                meta: {
                    title: "Список закупок"
                }
            },
            {
                name: "purchasesCreate",
                path: "/purchases/create",
                component: () => import("../pages/purchases/Create.vue"),
                meta: {
                    title: "Новая закупка"
                }
            },
            {
                name: "purchaseEdit",
                path: "/purchases/edit/:id",
                component: () => import("../pages/purchases/Edit.vue"),
                meta: {
                    title: "Редактирование закупки"
                }
            },
            {
                name: "purchasePrintout",
                path: "/purchases/printout/:id",
                component: () => import("../pages/purchases/Printout.vue"),
                meta: {
                    title: "Печать закупки"
                }
            },
        ],
    },
});
