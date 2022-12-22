import axios from 'axios'
import { ActionContext } from 'vuex';
import { IdNames } from './types';

const prefix = '/api';

type State = {
    regions: IdNames,
    list:    IdNames,
};

export default {
    namespaced: true,
    state: {
        regions: [],
        list:    [],
    },
    getters: {
        regions: (state: State) => state.regions,
        list:    (state: State) => state.list,
    },
    mutations: {
        setRegions(state: State, data: IdNames) {
            state.regions = data;
        },
        setList(state: State, data: IdNames) {
            state.list = data;
        },
    },
    actions: {
        async fetchRegions(context: ActionContext<any, any>) {
            axios.get(`${prefix}/regions`).then(response => {
                context.commit('setRegions', response.data.data);
            });
        },
        async fetchAll(context: ActionContext<any, any>) {
            axios.get(`${prefix}/clients`).then(response => {
                context.commit('setList', response.data.data);
            });
        },
    },
};
