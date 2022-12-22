import axios from "axios"
import { ActionContext } from "vuex";
import { IdNames } from './types';

const prefix = "/api";

type State = {
    subcats: IdNames,
    list:    IdNames,
};

export default {
    namespaced: true,
    state: {
        subcats: [],
        list:    [],
    },
    getters: {
        list:    (state: State) => state.list,
        subcats: (state: State) => state.subcats,
        units:   (state: State) => { return {"кг": "кг", "шт": "шт"} },
    },
    mutations: {
        setList(state: State, data: IdNames) {
            state.list = data;
        },
        setSubcats(state: State, data: IdNames) {
            state.subcats = data;
        },
    },
    actions: {
        async fetchAll(context: ActionContext<any, any>) {
            axios.get(`${prefix}/articles`).then(response => {
                context.commit("setList", response.data.data);
            });
        },
        async fetchSubcats(context: ActionContext<any, any>) {
            axios.get(`${prefix}/article-subcats`).then(response => {
                context.commit("setSubcats", response.data.data);
            });
        },
    },
};
