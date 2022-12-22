<template>
    <grid heading="Платежи" entity="bills" pageSize=100>
        <!-- форма поиска -->
        <template v-slot:search-form>
            <div class="row">
                <datepicker-control css-class="control" label="дата с" name="dateFrom" />
                <datepicker-control css-class="control" label="дата по" name="dateTo" />
                <input-control css-class="control" label="номер" name="number" />
                <input-control css-class="control" label="номер договора" name="contract_num" />
            </div>
            <div class="row">
                <select-control
                    css-class="control"
                    label="клиент"
                    name="client_id"
                    :options="clients"
                />
            </div>
        </template>
        <!-- шапка таблицы -->
        <template v-slot:head>
            <th><a href="#" data-sort="contract_num">номер договора</a></th>
            <th><a href="#" data-sort="client_id">клиент</a></th>
            <th><a href="#" data-sort="sum">сумма</a></th>
            <th><a href="#" data-sort="remainder">остаток</a></th>
            <th><a href="#" data-sort="date">дата</a></th>
        </template>
        <!-- строки таблицы -->
        <template v-slot:table-row="{ item, index }">
            <td>{{ item.contract_num }}</td>
            <td>{{ item.client.name }}</td>
            <td>{{ item.sum }}</td>
            <td>{{ item.remainder }}</td>
            <td>{{ item.date }}</td>
            <td><router-link :to="{name: 'billsEdit', params: { id: item.id }}" >
                <i class="material-icons">edit</i>
            </router-link></td>
            <td><a href="#"><i :data-item-id="item.id" :data-item-index="index" class="material-icons">delete</i></a></td>
        </template>
    </grid>
</template>

<script setup lang="ts">
import { mapActions, mapGetters } from "vuex";

const { clients } = mapGetters({
    clients: "clients/list",
})
const { fetchClients } = mapActions({
    fetchClients: "clients/fetchAll",
})

fetchClients()
</script>