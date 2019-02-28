<template>
    <grid heading="Контракты" entity="contracts" pageSize=50></grid>
</template>

<script>
    window.Vue = require('vue');

    // форма поиска
    Vue.component('search-form-contracts', {
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
                <input name="dateFrom" type="text">
            </div>
            <div class="control">
                <label>дата по:</label>
                <input name="dateTo" />
            </div>
            <div class="control">
                <label>номер:</label>
                <input name="number" class="required" />
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
    Vue.component('grid-head-contracts', {
        template: `<tr>
            <th>номер</th>
            <th>клиент</th>
            <th>дата</th>
            <th>срок поставки от</th>
            <th>срок поставки до</th>
            <th>сумма</th>
            <th>оплачено</th>
            <th>осталось оплатить</th>
            <th>выбрано</th>
            <th>осталось выбрать</th>
        </tr>`
    });
    // строки таблицы
    Vue.component('grid-body-contracts', {
        props: {
            listData: Array,
        },
        template: `<tbody>
        <tr v-for="item, index in listData">
            <td>{{ item.contract_num }}</td>
            <td>{{ item.client ? item.client.name : '' }}</td>
            <td>{{ item.date }}</td>
            <td>{{ item.term_start }}</td>
            <td>{{ item.term_end }}</td>
            <td>{{ item.sum }}</td>
            <td>{{ item.payed }}</td>
            <td>{{ item.payedRemind }}</td>
            <td>{{ item.executed }}</td>
            <td>{{ item.execRemind }}</td>
            <!--<td>{{ item.type }}</td>-->
            <td><router-link :to="{name: 'contractsEdit', params: { id: item.id }}" class="update">&nbsp;</router-link></td>
            <td><a href="#" class="delete" @click.prevent="deleteItem(item.id, index)">&nbsp;</a></td>
        </tr>
        </tbody>`
    });
</script>