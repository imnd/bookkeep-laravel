<template>
    <div>
        <div class="row">
            <select-control
                css-class="col-md-8"
                label="Клиент"
                name="client_id"
                :value="model.client_id"
                :options="clients"
            />
            <datepicker-control label="Дата" name="date" :value="model.date" />
        </div>
        <div class="row">
            <input-control
                label="Номер"
                name="contract_num"
                :value="model.contract_num"
                :required="true"
            />
            <datepicker-control
                label="Срок поставки от"
                name="term_start"
                :value="model.term_start"
            />
            <datepicker-control
                label="Срок поставки до"
                name="term_end"
                :value="model.term_end"
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
                    <select class="col-md-12" name="article_id[]" :value="row.article_id">
                        <option v-for="article in articles" v-bind:value="article.id">{{ article.name }}</option>
                    </select>
                </td>
                <td><input name="quantity[]" :value="row.quantity" /></td>
                <td><input name="price[]" :value="row.price" /></td>
                <td>{{ row.price * row.quantity }}</td>
                <td>
                    <i v-on:click="rowDelete(index)" class="material-icons red">cancel</i>
                </td>
            </tr>
            <tr class="total text-primary">
                <td colspan="4"><b>Итого:</b></td>
                <td>{{ total }}</td>
            </tr>
            <tr>
                <td colspan="5"></td>
                <td>
                    <i v-on:click="rowAdd()" class="material-icons green">add_circle</i>
                </td>
            </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-4">
                <button class="btn btn-primary btn-round">Сохранить</button>
            </div>
        </div>
    </div>
</template>
<script>
import { mapActions, mapGetters } from "vuex";
import rows from "../../mixins/rows";

export default {
    mixins: [ rows ],
    beforeCreate() {
        this.setRow({
            'article_id' : '',
            'quantity' : '',
            'price' : '',
        });
    },
    created() {
        this.fetchArticles();
        this.fetchClients();
    },
    computed: {
        ...mapGetters({
            model:    "CRUD/model",
            errors:   "CRUD/errors",
            message:  "CRUD/message",
            rows:     "CRUD/rows",
            total:    "CRUD/total",
            articles: "articles/list",
            clients:  "clients/list",
        }),
    },
    methods: {
        ...mapActions({
            fetchClients:  "clients/fetchList",
            fetchArticles: "articles/fetchList",
        }),
    },
}
</script>
