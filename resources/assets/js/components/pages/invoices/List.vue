<template>
    <div class="control">
        <grid
            heading="Фактуры"
            subheading="Список с возможностью фильтрации и сортировки"
            entity="invoices"
            pageSize=50
        >
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
                <th><a href="#" data-sort="number">номер</a></th>
                <th><a href="#" data-sort="contract_num">номер договора</a></th>
                <th><a href="#" data-sort="client_id">клиент</a></th>
                <th><a href="#" data-sort="date">дата</a></th>
                <th><a href="#" data-sort="sum">сумма</a></th>
                <th><a href="#" data-sort="payed">оплачено</a></th>
            </template>
            <!-- строки таблицы -->
            <template v-slot:table-row="{ item, index }">
                <td class="text-primary">{{ item.number }}</td>
                <td>{{ item.contract_num }}</td>
                <td>{{ item.client.name }}</td>
                <td>{{ item.date }}</td>
                <td>{{ item.sum }}</td>
                <td>{{ item.payed }}</td>
                <td>
                    <router-link :to="{name: 'invoicesEdit', params: { id: item.id }}" >
                        <i class="material-icons">edit</i>
                    </router-link>
                </td>
                <td>
                    <a href="#">
                        <i
                            :data-item-id="item.id"
                            :data-item-index="index"
                            class="material-icons"
                        >delete</i>
                    </a>
                </td>
                <td>
                    <router-link :to="{
                        name: 'invoicesPrintoutBill',
                        params: { id: item.id }
                    }" class="button-printout">&nbsp;</router-link>
                </td>
                <td>
                    <router-link :to="{
                        name: 'invoicesPrintoutInvoice',
                        params: { id: item.id }
                    }" class="button-printout">&nbsp;</router-link>
                </td>
            </template>
        </grid>
    </div>
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
