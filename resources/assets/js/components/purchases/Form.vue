<template>
    <div>
        <div class="row">
            <div class="col-md-4">
                <label>номер:</label>
                <input class="form-control" v-model="model.number" />
            </div>
            <div class="col-md-4">
                <label>дата:</label>
                <input class="form-control" v-model="model.date" />
            </div>
            <div class="col-md-4">
                <label>сумма:</label>
                <input class="form-control" v-model="model.sum" />
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
                        <select class="col-md-12" name="article_subcategory_id[]" v-model="row.article_subcategory_id">
                            <option v-for="subcat in articleSubcats" v-bind:value="subcat.id">{{ subcat.name }}</option>
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

        <div class="row col-md-4">
            <button class="btn btn-primary btn-round">Сохранить</button>
        </div>
    </div>
</template>
<script>
    let row = {
        'number' : '',
        'date' : '',
        'sum' : '',
    };
    export default {
        data() {
            return {
                articleSubcats: [],
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
            this.axios.get(`/api/article-subcats`).then(response => {
                this.articleSubcats = response.data.data;
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
