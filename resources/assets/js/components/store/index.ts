import { createStore } from "vuex";

import CRUD      from "./CRUD";
import enums     from "./enums";
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
    },
});
