<template>
    <div>
        <router-link to="/invoices/list" class="button primary top">Список</router-link>

        <h1>Новая фактура</h1>

        <form @submit.prevent="createItem">
            <div class="row">
                <label class="control-label">Номер</label>
                <input v-model="invoice.number" />
            </div>
            <div class="row">
                <label class="control-label">Номер договора</label>
                <input v-model="invoice.contract_num" />
            </div>
            <div class="row">
                <label class="control-label">Клиент</label>
                <select v-model="invoice.client_id">
                    <option v-for="client in clients" v-bind:value="client.id">{{ client.name }}</option>
                </select>
            </div>
            <div class="row">
                <label class="control-label">Дата</label>
                <date-picker :value="invoice.date" v-model="invoice.date"></date-picker>
            </div>
            <table class="invoice">
                <thead>
                    <tr>
                        <th>Позиция</th>
                        <th>Наименование товара</th>
                        <th>Кол-во</th>
                        <th>Цена</th>
                        <th>Сумма</th>
                    </tr>
                </thead>
                <tbody>
                <tr v-for="row, index in invoiceRows">
                    <td>{{ index + 1 }}</td>
                    <td class="article">
                        <select v-model="row.article_id">
                            <option v-for="article in articles" v-bind:value="article.id">{{ article.name }}</option>
                        </select>
                    </td>
                    <td class="quantity">
                        <input v-model="row.quantity" />
                    </td>
                    <td class="price">
                        <input v-model="row.price" />
                    </td>
                    <td class="sum">
                        {{ row.price * row.quantity }}
                    </td>
                    <td>
                        <a class="remove" v-on:click="rowDelete(index)">&nbsp;</a>
                    </td>
                </tr>
                <tr class="total">
                    <td colspan="4"><b>Итого:</b></td>
                    <td v-model="total">{{ total }}</td>
                </tr>
                <tr>
                    <td colspan="5"></td>
                    <td><a class="add" v-on:click="rowAdd()">&nbsp;</a></td>
                </tr>
                </tbody>
            </table>

            <div class="row">
                <button class="button success">Сохранить</button>
            </div>
        </form>
    </div>
</template>

<script>
    let invoiceRow = {
        'article_id' : '',
        'quantity' : '',
        'price' : '',
    };
    export default {
        data: function () {
            return {
                invoice: {
                    number: '',
                    contract_num: '',
                    client_id: '',
                    date: '',
                    sum: '',
                    payed: 0
                },
                invoiceRow: invoiceRow,
                invoiceRows: [invoiceRow],
                clients: [],
                articles: [],
            }
        },
        computed: {
            total() {
                return this.invoiceRows.reduce(function (sum, item) {
                    return sum + item.price * item.quantity;
                }, 0)
            }
        },
        beforeCreate() {
            this.axios.get('/api/articles/list').then(response => {
                this.articles = response.data.data;
            });
            this.axios.get(`/api/clients/list`).then(response => {
                this.clients = response.data.data;
            });
        },
        methods: {
            rowDelete(index) {
                this.invoiceRows.splice(index, 1);
            },
            rowAdd() {
                this.invoiceRows.push(Vue.util.extend({}, this.invoiceRow))
            },
            createItem() {
                let uri = '/api/invoice/create';
                this.axios.post(uri, this.invoice).then(response => {
                    this.$router.push({name: 'invoicesList'});
                });
            }
        }
    }
</script>