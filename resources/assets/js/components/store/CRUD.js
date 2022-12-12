import axios from "axios"

const prefix = "/api";

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
        entity:  state => state.entity,
        path:    state => `${prefix}/${state.entity}`,
        model:   state => state.model,
        models:  state => state.models,
        loading: state => state.loading,
        rows:    state => state.rows,
        total:   state => state.total,
        errors:  state => state.errors,
        message: state => state.message,
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
        setRow(state, data) {
            state.row = data;
        },
        rowDelete(state, index) {
            state.rows.splice(index, 1);
        },
        rowAdd(state) {
            state.rows.push(app.util.extend({}, state.row));
        },
        setRows(state, data) {
            state.rows = data;
        },
        setTotal(state, data) {
            state.total = 0
            data.forEach((item) => {
                state.total += item.price * item.quantity
            });
        },
        setMessage(state, data) {
            state.message = data;
        },
        setErrors(state, data) {
            state.errors = data;
        },
    },
    actions: {
        newRow({ commit }, data) {
            commit("setRow", data);
            commit("setRows", [data]);
            commit("setTotal", [data]);
        },
        setEntity({ commit }, entity) {
            commit("setEntity", entity);
        },
        setModel({ commit }, model) {
            commit("setModel", model);
        },
        async fetchModels({ commit, getters }) {
            this.loading = true
            axios.get(getters.path).then(response => {
                commit("setModels", response.data.data);
                this.loading = false
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
                commit("setRows", response.data.data);
                commit("setTotal", response.data.data);
            });
        },
    },
};
