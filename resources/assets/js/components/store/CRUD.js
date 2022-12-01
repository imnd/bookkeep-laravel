import axios from "axios"

const prefix = "/api";

export default {
    namespaced: true,
    state: {
        entity: "",
        model: {},
        models: [],
        row: {},
        rows: [],
        errors: {},
        message: "",
    },
    getters: {
        entity:  state => state.entity,
        path:    state => `${prefix}/${state.entity}`,
        model:   state => state.model,
        models:  state => state.models,
        rows:    state => state.rows,
        errors:  state => state.errors,
        message: state => state.message,
        total:   state => state.total,
    },
    mutations: {
        setEntity(state, data) {
            state.entity = data;
        },
        setModels(state, data) {
            state.models = data;
        },
        setModel(state, data) {
            state.model = data;
        },
        addModel(state, data) {
            state.models.push(data);
        },
        deleteModel(state, data) {
            state.models.splice(state.models.indexOf(data), 1);
        },
        updateModelValue(state, data) {
            for (let key in data) {
                state.model[key] = data[key]
            }
        },
        setRow(state, data) {
            state.row = data;
        },
        setRows(state, data) {
            state.rows = data;
        },
        setTotal(state, data) {
            state.total = data.reduce(function (sum, item) {
                return sum + item.price * item.quantity;
            }, 0);
        },
        setMessage(state, data) {
            state.message = data;
        },
        setErrors(state, data) {
            state.errors = data;
        },
    },
    actions: {
        setEntity({ commit }, entity) {
            commit("setEntity", entity);
        },
        setModel({ commit }, model) {
            commit("setModel", model);
        },
        async fetchModels({ commit, getters }) {
            axios.get(getters.path).then(response => {
                commit("setModels", response.data.data);
            });
        },
        async fetchModel({ commit, getters }, id) {
            axios.get(`${getters.path}/${id}`).then(response => {
                commit("setModel", response.data.data);
            });
        },
        async createModel({ commit, state, getters }) {
            axios.post(getters.path, state.model).then(response => {
                commit("addModel", response.data.data);
                commit("setMessage", "Saved successfully");
            });
        },
        async deleteModel({ commit, state, getters }, id) {
            axios.delete(`${getters.path}/${id}`, state.model).then(response => {
                if (response.data.success) {
                    commit("deleteModel", state.model);
                }
            });
        },
        async updateModel({ commit, state, getters }, id) {
            axios
                .put(`${getters.path}/${id}`, state.model)
                .then(response => {
                    if (response.data.success) {
                        commit("setMessage", "Saved successfully");
                    }
                })
                .catch((err) => {
                    commit("setErrors", err.response.data.errors);
                })
        },
        async fetchRows({ commit, getters }, id) {
            axios.get(`${getters.path}/rows/${id}`).then(response => {
                commit('setRows', response.data.data);
                commit('setTotal', response.data.data);
            });
        },
    },
};
