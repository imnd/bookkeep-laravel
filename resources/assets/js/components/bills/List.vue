<template>
    <grid heading="Платежи" entity="bills" pageSize=100></grid>
</template>

<script>
    window.Vue = require('vue');

    // форма поиска
    Vue.component('search-form-bills', {
        template: `<div class="row">
            <div class="control">
                <label>дата с:</label>
                <input name="dateFrom" />
            </div>
            <div class="control">
                <label>дата по:</label>
                <input name="dateTo" />
            </div>
            <div class="control">
                <label>номер договора:</label>
                <input name="contract_num" class="required" />
            </div>
            <div class="control">
                <label>клиент:</label>
                <select name="client_id">
                    <option v-for="client in clients" v-bind:value="client.id">{{ client.name }}</option>
                </select>
            </div>
        </div>`,
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
    });
    // шапка таблицы
    Vue.component('grid-head-bills', {
        template: `<tr>
            <th><a href="#" data-sort="contract_num">номер договора</a></th>
            <th><a href="#" data-sort="client_id">клиент</a></th>
            <th><a href="#" data-sort="sum">сумма</a></th>
            <th><a href="#" data-sort="remainder">остаток</a></th>
            <th><a href="#" data-sort="date">дата</a></th>
        </tr>`
    });
    // строки таблицы
    Vue.component('grid-body-bills', {
        props: {
            listData: Array,
        },
        template: `<tbody>
        <tr v-for="item, index in listData">
            <td>{{ item.contract_num }}</td>
            <td>{{ item.client ? item.client.name : '' }}</td>
            <td>{{ item.sum }}</td>
            <td>{{ item.remainder }}</td>
            <td>{{ item.date }}</td>
            <td><router-link :to="{name: 'billsEdit', params: { id: item.id }}" >&nbsp;</router-link></td>
            <td><a href="#"><i :data-item-id="item.id" :data-item-index="index" class="material-icons">delete</i></a></td>
        </tr>
        </tbody>`
    });
</script>
