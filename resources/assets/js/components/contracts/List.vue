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
        template: `<div>
            <div class="row">
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
            </div>
            <div class="row">
                <div class="control">
                    <label>клиент:</label>
                    <select name="client_id">
                        <option v-for="client in clients" v-bind:value="client.id">{{ client.name }}</option>
                    </select>
                </div>
            </div>
        </div>`
    });
    // шапка таблицы
    Vue.component('grid-head-contracts', {
        template: `<tr>
            <th><a href="#" data-sort="contract_num">номер</a></th>
            <th><a href="#" data-sort="client_id">клиент</a></th>
            <th><a href="#" data-sort="date">дата</a></th>
            <th><a href="#" data-sort="term_start">срок поставки от</a></th>
            <th><a href="#" data-sort="term_end">срок поставки до</a></th>
            <th><a href="#" data-sort="sum">сумма</a></th>
            <th><a href="#" data-sort="payed">оплачено</a></th>
            <th>осталось оплатить</th>
            <th><a href="#" data-sort="executed">выбрано</a></th>
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
            <td><router-link :to="{name: 'contractsEdit', params: { id: item.id }}"><i class="material-icons">edit</i></router-link></td>
            <td><a href="#"><i :data-item-id="item.id" :data-item-index="index" class="material-icons">delete</i></a></td>
        </tr>
        </tbody>`
    });
</script>
