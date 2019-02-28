<template>
    <div>
        <router-link to="#" v-on:click="invoiceDelete()" class="button danger top">Удалить</router-link>
        <router-link to="/invoices/list" class="button primary top">Список</router-link>
        <router-link v-bind:to="{name: 'invoicesPrintoutBill', params: { id: this.$route.params.id }}" class="button primary top left printout">Распечатать фактуру</router-link>
        <router-link v-bind:to="{name: 'invoicesPrintoutInvoice', params: { id: this.$route.params.id }}" class="button primary top left printout">Распечатать накладную</router-link>

        <h1>Редактирование фактуры</h1>

        <form @submit.prevent="invoiceUpdate">
            <div class="row">
                <label class="control-label">Номер</label>
                <input v-model="invoice.number">
            </div>
            <div class="row">
                <label class="control-label">Номер договора</label>
                <input v-model="invoice.contract_num">
            </div>
            <div class="row">
                <label class="control-label">Клиент</label>
                <select v-model="invoice.client_id">
                    <option v-for="client in clients" v-bind:value="client.id">{{ client.name }}</option>
                </select>
            </div>
            <div class="row">
                <label class="control-label">Дата</label>
                <input v-model="invoice.date" />
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
    export default {
        data() {
            return {
                invoice: {},
                invoiceRow: {
                    'article_id' : '',
                    'quantity' : '',
                    'price' : '',
                },
                invoiceRows: [],
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
            this.axios.get(`/api/invoicesRows/list/${this.$route.params.id}`).then(response => {
                this.invoiceRows = response.data.data;
            });
            this.axios.get('/api/articles/list').then(response => {
                this.articles = response.data.data;
            });
            this.axios.get(`/api/clients/list`).then(response => {
                this.clients = response.data.data;
            });
            this.axios.get(`/api/invoices/edit/${this.$route.params.id}`).then(response => {
                this.invoice = response.data;
            });
        },
        methods: {
            rowDelete(index) {
                this.invoiceRows.splice(index, 1);
            },
            rowAdd() {
                this.invoiceRows.push(Vue.util.extend({}, this.invoiceRow))
            },
            invoiceUpdate() {
                this.axios.post(`/api/invoices/update/${this.$route.params.id}`, {
                    'invoice': this.invoice,
                    'rows': this.invoiceRows,
                }).then(response => {
                    this.$router.push({name: 'invoicesList'});
                });
            },
            invoiceDelete() {
                this.axios.delete(`/api/invoices/delete/` + this.invoice.id).then(response => {
                    this.$router.push({name: 'invoicesList'});
                });
            },
        }
    }
</script>