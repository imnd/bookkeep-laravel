import { createStore } from "vuex";

export default createStore({
    state: {
        jsonld: {
            "@context": "https://schema.org",
            "@type": "PaymentService",
        },
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
                component: () => import("../articles/List.vue"),
                meta: {
                    title: "Список товаров"
                }
            },
            {
                name: "articlesCreate",
                path: "/articles/create",
                component: () => import("../articles/Create.vue"),
                meta: {
                    title: "Новый товар"
                }
            },
            {
                name: "articlesEdit",
                path: "/articles/edit/:id",
                component: () => import("../articles/Edit.vue"),
                meta: {
                    title: "Редактирование товара"
                }
            },
            {
                name: "billsList",
                path: "/bills/list",
                component: () => import("../bills/List.vue"),
                meta: {
                    title: "Список платежей"
                }
            },
            {
                name: "billsCreate",
                path: "/bills/create",
                component: () => import("../bills/Create.vue"),
                meta: {
                    title: "Новый платеж"
                }
            },
            {
                name: "billsEdit",
                path: "/bills/edit/:id",
                component: () => import("../bills/Edit.vue"),
                meta: {
                    title: "Редактирование платежа"
                }
            },
            {
                name: "clientsCreate",
                path: "/clients/create",
                component: () => import("../clients/Create.vue"),
                meta: {
                    title: "Новый клиент"
                }
            },
            {
                name: "clientsList",
                path: "/clients/list",
                component: () => import("../clients/List.vue"),
                meta: {
                    title: "Список клиентов"
                }
            },
            {
                name: "clientEdit",
                path: "/clients/edit/:id",
                component: () => import("../clients/Edit.vue"),
                meta: {
                    title: "Редактирование клиента"
                }
            },
            {
                name: "contractsList",
                path: "/contracts/list",
                component: () => import("../contracts/List.vue"),
                meta: {
                    title: "Список контрактов"
                }
            },
            {
                name: "contractsCreate",
                path: "/contracts/create",
                component: () => import("../contracts/Create.vue"),
                meta: {
                    title: "Новый контракт"
                }
            },
            {
                name: "contractsEdit",
                path: "/contracts/edit/:id",
                component: () => import("../contracts/Edit.vue"),
                meta: {
                    title: "Редактирование контракта"
                }
            },
            {
                name: "contractsPrintout",
                path: "/contracts/printout/:id",
                component: () => import("../contracts/Printout.vue"),
                meta: {
                    title: "Печать контракта"
                }
            },
            {
                name: "invoicesList",
                path: "/invoices/list",
                component: () => import("../invoices/List.vue"),
                meta: {
                    title: "Список фактур"
                }
            },
            {
                name: "invoicesCreate",
                path: "/invoices/create",
                component: () => import("../invoices/Create.vue"),
                meta: {
                    title: "Новая фактура"
                }
            },
            {
                name: "invoicesEdit",
                path: "/invoices/edit/:id",
                component: () => import("../invoices/Edit.vue"),
                meta: {
                    title: "Редактирование фактуры"
                }
            },
            {
                name: "invoicesPrintoutBill",
                path: "/invoices/printout/bill/:id",
                component: () => import("../invoices/PrintoutBill.vue"),
                meta: {
                    title: "Печать счета"
                }
            },
            {
                name: "invoicesPrintoutInvoice",
                path: "/invoices/printout/invoice/:id",
                component: () => import("../invoices/PrintoutInvoice.vue"),
                meta: {
                    title: "Печать фактуры"
                }
            },
            {
                name: "purchasesList",
                path: "/purchases/list",
                component: () => import("../purchases/List.vue"),
                meta: {
                    title: "Список закупок"
                }
            },
            {
                name: "purchasesCreate",
                path: "/purchases/create",
                component: () => import("../purchases/Create.vue"),
                meta: {
                    title: "Новая закупка"
                }
            },
            {
                name: "purchaseEdit",
                path: "/purchases/edit/:id",
                component: () => import("../purchases/Edit.vue"),
                meta: {
                    title: "Редактирование закупки"
                }
            },
            {
                name: "purchasePrintout",
                path: "/purchases/printout/:id",
                component: () => import("../purchases/Printout.vue"),
                meta: {
                    title: "Печать закупки"
                }
            },
        ],
    },
});
