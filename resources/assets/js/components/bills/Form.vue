<template>
    <div>
        <div class="col-md-4">
            <label>номер договора:</label>
            <input class="form-control" v-model="model.contract_num">
        </div>
        <div class="col-md-4">
            <label>номер договора:</label>
            <select v-model="model.client_id">
                <option v-for="client in clients" v-bind:value="client.id">{{ client.name }}</option>
            </select>
        </div>
        <div class="col-md-4">
            <label>сумма:</label>
            <input class="form-control" v-model="model.sum">
        </div>
        <div class="col-md-4">
            <label>остаток:</label>
            <input class="form-control" v-model="model.remainder">
        </div>
        <div class="col-md-4">
            <label>дата:</label>
            <input class="form-control" v-model="model.date">
        </div>
        <div class="col-md-4">
            <label>содержание:</label>
            <textarea v-model="model.contents" cols="30" rows="10"></textarea>
        </div>

        <div class="col-md-4">
            <button class="btn btn-primary btn-round">Сохранить</button>
        </div>
    </div>
</template>
<script>
    export default {
        data: function () {
            return {
                clients: [],
            }
        },
        props: {
            model: {
                type: Object,
                required: true,
            },
            errors: {
                type: Object,
                required: true,
            },
        },
        beforeCreate() {
            this.axios.get(`/api/clients`).then(response => {
                this.clients = response.data.data;
            });
        },
        methods: {
            rowDelete(index) {
                this.rows.splice(index, 1);
            },
            rowAdd() {
                this.rows.push(Vue.util.extend({}, this.row))
            },
            getError(key) {
                if (this.errors[key]!==undefined) {
                    return this.errors[key][0];
                }
            },
        },
    }
</script>

<style scoped>
    .error {
        color: red;
        clear: both;
    }
</style>