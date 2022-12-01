<template>
    <grid heading="Контракты" entity="contracts" :listData="paginatedData" pageSize=50 >
        <!-- форма поиска -->
        <template v-slot:search-form>
            <div class="row">
                <datepicker-control css-class="control" label="дата с" name="dateFrom" />
                <datepicker-control css-class="control" label="дата по" name="dateTo" />
                <input-control
                    css-class="control"
                    label="название"
                    name="name"
                />
            </div>
            <div class="row">
                <select-control css-class="control" label="клиент" name="client_id" :options="clients" />
            </div>
        </template>
        <!-- шапка таблицы -->
        <template v-slot:head>
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
        </template>
        <!-- строки таблицы -->
        <template v-slot:table-row="{ item, index }">
            <td>{{ item.contract_num }}</td>
            <td>{{ item.client.name }}</td>
            <td>{{ item.date }}</td>
            <td>{{ item.term_start }}</td>
            <td>{{ item.term_end }}</td>
            <td>{{ item.sum }}</td>
            <td>{{ item.payed }}</td>
            <td>{{ item.payedRemind }}</td>
            <td>{{ item.executed }}</td>
            <td>{{ item.execRemind }}</td>
            <td><router-link :to="{name: 'contractsEdit', params: { id: item.id }}">
                <i class="material-icons">edit</i>
            </router-link></td>
            <td><a href="#"><i :data-item-id="item.id" :data-item-index="index" class="material-icons">delete</i></a></td>
        </template>
    </grid>
</template>

<script>
import { mapActions, mapGetters } from "vuex";

export default {
    created() {
        this.fetchClients();
    },
    computed: {
        ...mapGetters({
            clients:  "clients/list",
        }),
    },
    methods: {
        ...mapActions({
            fetchClients: "clients/fetchAll",
        }),
    },
}
</script>