<template>
    <grid
        heading="Закупки"
        entity="purchases"
        pageSize=20
    >
        <!-- форма поиска -->
        <template v-slot:search-form>
            <div class="row">
                <datepicker-control css-class="control" label="дата с" name="dateFrom" />
                <datepicker-control css-class="control" label="дата по" name="dateTo" />
                <input-control
                    css-class="control"
                    label="Номер"
                    name="number"
                />
            </div>
        </template>
        <!-- шапка таблицы -->
        <template v-slot:head>
            <th><a href="#" data-sort="number">номер</a></th>
            <th><a href="#" data-sort="date">дата</a></th>
            <th><a href="#" data-sort="sum">сумма</a></th>
        </template>
        <!-- строки таблицы -->
        <template v-slot:table-row="{ item, index }">
            <td>{{ item.number }}</td>
            <td>{{ item.date }}</td>
            <td>{{ item.sum }}</td>
            <td><a href="#"><i :data-item-id="item.id" :data-item-index="index" class="material-icons">delete</i></a></td>
            <td><router-link :to="{
                name: 'purchaseEdit',
                params: { id: item.id }}"
            >
                <i class="material-icons">edit</i>
            </router-link></td>
            <td><router-link :to="{
                name: 'purchasePrintout',
                params: { id: item.id }
            }" class="button-printout">
                <i class="material-icons">print</i>
            </router-link></td>
        </template>
    </grid>
</template>

<script>
import Datepicker from "@vuepic/vue-datepicker";
import '@vuepic/vue-datepicker/dist/main.css'

import { mapActions, mapGetters, mapMutations } from "vuex";

export default {
    components: { Datepicker },
    created() {
        this.fetchClients();
    },
    computed: {
        ...mapGetters({
            clients:  "clients/list",
        }),
    },
    methods: {
        ...mapMutations({
            updateModelValue: "CRUD/updateModelValue",
        }),
        ...mapActions({
            fetchClients: "clients/fetchAll",
        }),
    },
}
</script>