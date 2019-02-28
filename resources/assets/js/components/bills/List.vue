<template>
    <grid heading="Платежи" entity="bills" pageSize=100></grid>
</template>

<script>
    window.Vue = require('vue');

    // форма поиска
    Vue.component('search-form-bills', {
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
        </div>`
    });
    // шапка таблицы
    Vue.component('grid-head-bills', {
        template: `<tr>
            <th>номер договора</th>
            <th>клиент</th>
            <th>сумма</th>
            <th>остаток</th>
            <th>дата</th>
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
            <td><router-link :to="{name: 'billsEdit', params: { id: item.id }}" class="update">&nbsp;</router-link></td>
            <td><a href="#" class="delete" @click.prevent="deleteItem(item.id, index)">&nbsp;</a></td>
        </tr>
        </tbody>`
    });
</script>