<template>
    <div>
        <div class="row">
            <div class="col-md-8">
                <label>Клиент</label>
                <select class="form-control" v-model="model.client_id">
                    <option v-for="client in clients" v-bind:value="client.id">{{ client.name }}</option>
                </select>
            </div>
            <div class="col-md-4">
                <label>дата:</label>
                <input class="form-control" v-model="model.date">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label>Номер:</label>
                <input class="form-control" v-model="model.contract_num">
            </div>
            <div class="col-md-4">
                <label>Срок поставки от:</label>
                <input class="form-control" v-model="model.term_start">
            </div>
            <div class="col-md-4">
                <label>Срок поставки до:</label>
                <input class="form-control" v-model="model.term_end">
            </div>
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
            <tr v-for="row, index in rows">
                <td>{{ index + 1 }}</td>
                <td>
                    <select class="col-md-12" name="article_id[]" v-model="row.article_id">
                        <option v-for="article in articles" v-bind:value="article.id">{{ article.name }}</option>
                    </select>
                </td>
                <td><input name="quantity[]" v-model="row.quantity" /></td>
                <td><input name="price[]" v-model="row.price" /></td>
                <td>{{ row.price * row.quantity }}</td>
                <td>
                    <i v-on:click="rowDelete(index)" class="material-icons red">cancel</i>
                </td>
            </tr>
            <tr class="total text-primary">
                <td colspan="4"><b>Итого:</b></td>
                <td v-model="total">{{ total }}</td>
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
    let row = {
        'article_id' : '',
        'quantity' : '',
        'price' : '',
    };
    export default {
        data: function () {
            return {
                clients: [],
                articles: [],
            }
        },
        props: {
            model: {
                type: Object,
                required: true,
            },
            rows: {
                type: Array,
                default: () => [row]
            },
        },
        beforeCreate() {
            this.axios.get(`/api/clients`).then(response => {
                this.clients = response.data.data;
            });
            this.axios.get('/api/articles').then(response => {
                this.articles = response.data.data;
            });
        },
        computed: {
            total() {
                return this.rows.reduce(function (sum, item) {
                    return sum + item.price * item.quantity;
                }, 0)
            }
        },
        methods: {
            rowDelete(index) {
                this.rows.splice(index, 1);
            },
            rowAdd() {
                this.rows.push(Vue.util.extend({}, this.row))
            },
        },
    }
</script>
