import axios from "axios"

const prefix = "/api";

export default {
    namespaced: true,
    state: {
        list:    [],
        subcats: [],
    },
    getters: {
        list:    state => state.list,
        subcats: state => state.subcats,
        units:   state => { return {"кг": "кг", "шт": "шт"} },
    },
    mutations: {
        setList(state, data) {
            state.list = data;
        },
        setSubcats(state, data) {
            state.subcats = data;
        },
    },
    actions: {
        async fetchAll({ commit }) {
            axios.get(`${prefix}/articles`).then(response => {
                commit("setList", response.data.data);
            });
        },
        async fetchSubcats({ commit }) {
            axios.get(`${prefix}/article-subcats`).then(response => {
                commit("setSubcats", response.data.data);
            });
        },
    },
};
