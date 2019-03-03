<template>
    <grid heading="Фактуры" entity="invoices" pageSize=50></grid>
</template>

<script>
    window.Vue = require('vue');

    // форма поиска
    Vue.component('search-form-invoices', {
        data() {
            return {
                clients: [],
            }
        },
        beforeCreate() {
            this.axios.get(`/api/clients/list`).then(response => {
                this.clients = response.data.data;
            });
        },
        template: `<div class="clear">
            <div class="control">
                <label>дата с:</label>
                <date-picker name="dateFrom"></date-picker>
            </div>
            <div class="control">
                <label>дата по:</label>
                <date-picker name="dateTo"></date-picker>
            </div>
            <div class="control">
                <label>номер:</label>
                <input name="number" class="required" type="text">
            </div>
            <div class="control">
                <label>номер договора:</label>
                <input name="contract_num" class="required" type="text">
            </div>
            <div class="control">
                <label>клиент:</label>
                <select name="client_id">
                    <option v-for="client in clients" v-bind:value="client.id">{{ client.name }}</option>
                </select>
            </div>
        </div>`
    });
    // шапка таблицы
    Vue.component('grid-head-invoices', {
        template: `<tr>
            <th>номер</th>
            <th>номер договора</th>
            <th>клиент</th>
            <th>дата</th>
            <th>сумма</th>
            <th>оплачено</th>
        </tr>`
    });
    // строки таблицы
    Vue.component('grid-body-invoices', {
        props: {
            listData: Array,
        },
        template: `<tbody>
            <tr v-for="item, index in listData">
                <td>{{ item.number }}</td>
                <td>{{ item.contract_num }}</td>
                <td>{{ item.client ? item.client.name : '' }}</td>
                <td>{{ item.date }}</td>
                <td>{{ item.sum }}</td>
                <td>{{ item.payed }}</td>
                <td><router-link :to="{name: 'invoicesEdit', params: { id: item.id }}" class="update">&nbsp;</router-link></td>
                <td><a href="#" class="delete" @click.prevent="deleteItem(item.id, index)">&nbsp;</a></td>
                <td><router-link :to="{name: 'invoicesPrintoutBill', params: { id: item.id }}" class="button-printout">&nbsp;</router-link></td>
                <td><router-link :to="{name: 'invoicesPrintoutInvoice', params: { id: item.id }}" class="button-printout">&nbsp;</router-link></td>
            </tr>
        </tbody>`
    });
</script>
