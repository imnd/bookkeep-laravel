<template>
    <div>
        <router-link to="/bills/list" class="button primary top">Список</router-link>

        <h1>Редактирование платежа</h1>

        <form @submit.prevent="update">
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
        data() {
            return {
                bill: {},
                clients: [],
            }
        },
        created() {
            this.axios.get(`/api/bills/edit/${this.$route.params.id}`).then(response => {
                this.bill = response.data;
            });
            this.axios.get(`/api/clients/list`).then(response => {
                this.clients = response.data.data;
            });
        },
        methods: {
            update() {
                let uri = `/api/bills/update/${this.$route.params.id}`;
                this.axios.post(uri, this.bill).then(response => {
                    this.$router.push({name: 'billsList'});
                });
            }
        }
    }
</script>