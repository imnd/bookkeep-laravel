import axios from 'axios'

const prefix = '/api';

export default {
    namespaced: true,
    state: {
        regions: [],
        list: [],
    },
    getters: {
        regions: state => state.regions,
        list:    state => state.list,
    },
    mutations: {
        setRegions(state, data) {
            state.regions = data;
        },
        setList(state, data) {
            state.list = data;
        },
    },
    actions: {
        async fetchRegions({ commit }) {
            axios.get(`${prefix}/regions`).then(response => {
                commit('setRegions', response.data.data);
            });
        },
        async fetchAll({ commit }) {
            axios.get(`${prefix}/clients`).then(response => {
                commit('setList', response.data.data);
            });
        },
    },
};
