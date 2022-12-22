import axios from "axios"

import { ActionContext } from "vuex";
import { IdNames }       from "./types";

const prefix = "/api";

type Models = object[];
type Rows = object[];
type HasPriceAndQuantity = {
    price:    number,
    quantity: number
};
type State = {
    entity: string,
    model: object,
    models: Models,
    loading: boolean,
    row: object,
    rows: Rows,
    errors: object,
    message: string,
    total: number,
};

export default {
    namespaced: true,
    state: {
        entity: "",
        model: {},
        models: [],
        loading: false,
        row: {},
        rows: [],
        errors: {},
        message: "",
    },
    getters: {
        entity:  (state: State) => state.entity,
        path:    (state: State) => `${prefix}/${state.entity}`,
        model:   (state: State) => state.model,
        models:  (state: State) => state.models,
        loading: (state: State) => state.loading,
        rows:    (state: State) => state.rows,
        total:   (state: State) => state.total,
        errors:  (state: State) => state.errors,
        message: (state: State) => state.message,
    },
    mutations: {
        setEntity(state: State, data: string) {
            state.entity = data;
        },
        setModels(state: State, data: IdNames) {
            state.models = data;
        },
        setModel(state: State, data: object) {
            state.model = data;
        },
        addModel(state: State, data: object) {
            state.models.push(data);
        },
        deleteModel(state: State, data: any) {
            state.models.splice(state.models.indexOf(data), 1);
        },
        setRow(state: State, data: object) {
            state.row = data;
        },
        rowDelete(state: State, index: number) {
            state.rows.splice(index, 1);
        },
        rowAdd(state: State) {
            state.rows.push(state.row);
        },
        setRows(state: State, data: Rows) {
            state.rows = data;
        },
        setTotal(state: State, data: HasPriceAndQuantity[]) {
            state.total = 0
            data.forEach((row) => {
                state.total += row.price * row.quantity
            });
        },
        setMessage(state: State, data: string) {
            state.message = data;
        },
        setErrors(state: State, data: string[]) {
            state.errors = data;
        },
        setLoading(state: State, data: boolean) {
            state.loading = data;
        },
    },
    actions: {
        newRow(context: ActionContext<any, any>, data: object): void {
            context.commit("setRow", data);
            context.commit("setRows", [data]);
            context.commit("setTotal", [data]);
        },
        setEntity(context: ActionContext<any, any>, entity: string): void {
            context.commit("setEntity", entity);
        },
        setModel(context: ActionContext<any, any>, model: object): void {
            context.commit("setModel", model);
        },
        async fetchModels(context: ActionContext<any, any>): Promise<void> {
            context.commit("setLoading", true);
            axios.get(context.getters.path).then(response => {
                context.commit("setModels", response.data.data);
                context.commit("setLoading", false);
            });
        },
        async fetchModel(context: ActionContext<any, any>, id: number): Promise<void> {
            axios.get(`${context.getters.path}/${id}`).then(response => {
                context.commit("setModel", response.data.data);
            });
        },
        async createModel(context: ActionContext<any, any>): Promise<void> {
            axios.post(context.getters.path, context.state.model).then(response => {
                context.commit("addModel", response.data.data);
                context.commit("setMessage", "Saved successfully");
            });
        },
        async deleteModel(context: ActionContext<any, any>, id: number): Promise<void> {
            axios.delete(`${context.getters.path}/${id}`, context.state.model).then(response => {
                if (response.data.success) {
                    context.commit("deleteModel", context.state.model);
                }
            });
        },
        async updateModel(context: ActionContext<any, any>, id: number): Promise<void> {
            axios
                .put(`${context.getters.path}/${id}`, context.state.model)
                .then(response => {
                    if (response.data.success) {
                        context.commit("setMessage", "Saved successfully");
                    }
                })
                .catch((err) => {
                    context.commit("setErrors", err.response.data.errors);
                })
        },
        async fetchRows(context: ActionContext<any, any>, id: number): Promise<void> {
            axios.get(`${context.getters.path}/rows/${id}`).then(response => {
                context.commit("setRows", response.data.data);
                context.commit("setTotal", response.data.data);
            });
        },
    },
};
