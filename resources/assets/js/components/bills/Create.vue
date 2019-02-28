<template>
    <div>
        <router-link to="/bills/list" class="button primary top">Список</router-link>

        <h1>Новый платеж</h1>

        <form @submit.prevent="create">
            <div class="row">
                <label>номер договора:</label>
                <input v-model="bill.contract_num">
            </div>
            <div class="row">
                <label>номер договора:</label>
                <select v-model="bill.client_id">
                    <option v-for="client in clients" v-bind:value="client.id">{{ client.name }}</option>
                </select>
            </div>
            <div class="row">
                <label>сумма:</label>
                <input v-model="bill.sum">
            </div>
            <div class="row">
                <label class="control-label">остаток:</label>
                <input v-model="bill.remainder">
            </div>
            <div class="row">
                <label class="control-label">дата:</label>
                <input v-model="bill.date">
            </div>
            <div class="row">
                <label class="control-label">содержание:</label>
                <textarea v-model="bill.contents" cols="30" rows="10"></textarea>
            </div>

            <div class="row">
                <button class="button success">Сохранить</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                bill: {
                    client_id: '',
                    contract_num: '',
                    sum: '',
                    remainder: '',
                    date: '',
                    contents: '',
                },
                clients: []
            }
        },
        created() {
            this.axios.get(`/api/clients/list`).then(response => {
                this.clients = response.data.data;
            });
        },
        methods: {
            create() {
                this.axios.post('/api/bill/create', this.bill).then(response => {
                    this.$router.push({name: 'billsList'});
                });
            }
        }
    }
</script>