<template>
    <div class="control">
        <grid
            heading="Фактуры"
            subheading="Список с возможностью фильтрации и сортировки"
            entity="invoices"
            pageSize=50
        />
    </div>

</template>

<script>
    window.Vue = require('vue');

    // форма поиска
    import Datepicker from 'vuejs-datepicker';
    Vue.component('search-form-invoices', {
        template: `<div>
            <div class="row">
                <div class="control">
                    <label>дата с:</label>
                    <!--<date-picker class="form-control" name="dateFrom"></date-picker>-->
                </div>
                <div class="control">
                    <label>дата по:</label>
                    <!--<date-picker class="form-control" name="dateTo"></date-picker>-->
                </div>
                <div class="control">
                    <label>номер:</label>
                    <input name="number" class="form-control required" type="text">
                </div>
                <div class="control">
                    <label>номер договора:</label>
                    <input name="contract_num" class="form-control required" type="text">
                </div>
            </div>
            <div class="row">
                <div class="control">
                    <label>клиент:</label>
                    <select class="form-control" name="client_id">
                        <option v-for="client in clients" v-bind:value="client.id">{{ client.name }}</option>
                    </select>
                </div>
            </div>
        </div>`,
        // components: {'date-picker': Datepicker},
        data() {
            return {
                clients: [],
            }
        },
        beforeCreate() {
            this.axios.get(`/api/clients`).then(response => {
                this.clients = response.data.data;
            });
        },
    });
    // шапка таблицы
    Vue.component('grid-head-invoices', {
        template: `<tr>
            <th><a href="#" data-sort="number">номер</a></th>
            <th><a href="#" data-sort="contract_num">номер договора</a></th>
            <th><a href="#" data-sort="client_id">клиент</a></th>
            <th><a href="#" data-sort="date">дата</a></th>
            <th><a href="#" data-sort="sum">сумма</a></th>
            <th><a href="#" data-sort="payed">оплачено</a></th>
        </tr>`
    });
    // строки таблицы
    Vue.component('grid-body-invoices', {
        props: {
            listData: Array,
        },
        template: `<tbody>
            <tr v-for="item, index in listData">
                <td class="text-primary">{{ item.number }}</td>
                <td>{{ item.contract_num }}</td>
                <td>{{ item.client.name }}</td>
                <td>{{ item.date }}</td>
                <td>{{ item.sum }}</td>
                <td>{{ item.payed }}</td>
                <td><router-link :to="{name: 'invoicesEdit', params: { id: item.id }}" >
                    <i class="material-icons">edit</i>
                </router-link></td>
                <td>
                    <a href="#">
                        <i :data-item-id="item.id" :data-item-index="index" class="material-icons">delete</i>
                    </a>
                </td>
                <td><router-link :to="{name: 'invoicesPrintoutBill', params: { id: item.id }}" class="button-printout">&nbsp;</router-link></td>
                <td><router-link :to="{name: 'invoicesPrintoutInvoice', params: { id: item.id }}" class="button-printout">&nbsp;</router-link></td>
            </tr>
        </tbody>`
    });
</script>
