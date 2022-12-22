<template>
    <div class="row">
        <select-control
            css-class="col-md-8"
            label="Клиент"
            name="client_id"
            v-model="model.client_id"
            :options="clients"
        />
        <datepicker-control label="Дата" name="date" v-model="model.date" />
    </div>
    <div class="row">
        <input-control
            label="Номер"
            name="contract_num"
            v-model="model.contract_num"
            :required="true"
        />
        <datepicker-control
            label="Срок поставки от"
            name="term_start"
            v-model="model.term_start"
        />
        <datepicker-control
            label="Срок поставки до"
            name="term_end"
            v-model="model.term_end"
            css-class="col-md-4"
        />
    </div>

    <table>
        <thead class="text-primary">
        <tr>
            <th>Позиция</th>
            <th>Наименование товара</th>
            <th>Кол-во</th>
            <th>Цена</th>
            <th>Сумма</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(row, index) in rows">
            <td>{{ index + 1 }}</td>
            <td>
                <select class="col-md-12" name="article_id[]" v-model="row.article_id">
                    <option v-for="article in articles" v-bindv-model="article.id">{{ article.name }}</option>
                </select>
            </td>
            <td><input name="quantity[]" v-model="row.quantity" /></td>
            <td><input name="price[]" v-model="row.price" /></td>
            <td>{{ row.price * row.quantity }}</td>
            <td>
                <i @click="rowDelete(index)" class="material-icons red">cancel</i>
            </td>
        </tr>
        <tr class="total text-primary">
            <td colspan="4"><b>Итого:</b></td>
            <td>{{ total }}</td>
        </tr>
        <tr>
            <td colspan="5"></td>
            <td>
                <i @click="rowAdd()" class="material-icons green">add_circle</i>
            </td>
        </tr>
        </tbody>
    </table>

    <form-footer />
</template>

<script setup lang="ts">
import { mapActions, mapGetters } from "vuex";
const { model, rows, total, articles, clients } = mapGetters({
    model: "CRUD/model",
    rows: "CRUD/rows",
    total: "CRUD/total",
    articles: "articles/list",
    clients: "clients/list",
})

const { fetchClients, fetchArticles } = mapActions({
    fetchClients: "clients/fetchAll",
    fetchArticles: "articles/fetchAll",
})

fetchArticles();
fetchClients();

</script>
