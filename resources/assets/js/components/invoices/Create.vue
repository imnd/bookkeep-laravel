<template>
    <div>
        <router-link to="/invoices/list" class="button primary top">Список</router-link>

        <h1>Новая фактура</h1>

        <form @submit.prevent="invoiceCreate">
            <div class="row">
                <label class="control-label">Номер</label>
                <input v-model="invoice.number">
            </div>
            <div class="row">
                <label class="control-label">Номер договора</label>
                <input v-model="invoice.contract_num">
            </div>
            <div class="row">
                <label class="control-label">Клиент</label>
                <input v-model="invoice.client_id">
            </div>
            <div class="row">
                <label class="control-label">Дата</label>
                <input v-model="invoice.date">
            </div>
            <div class="row">
                <label class="control-label">Сумма</label>
                <input v-model="invoice.sum">
            </div>
            <div class="row">
                <label class="control-label">Оплачено</label>
                <input v-model="invoice.payed">
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
                invoice: {
                    number: '',
                    contract_num: '',
                    client_id: '',
                    date: '',
                    sum: '',
                    payed: 0
                },
                invoiceRows: []
            }
        },
        methods: {
            invoiceCreate() {
                let uri = '/api/invoice/create';
                this.axios.post(uri, this.invoice).then(response => {
                    this.$router.push({name: 'invoicesList'});
                });
            }
        }
    }
</script>