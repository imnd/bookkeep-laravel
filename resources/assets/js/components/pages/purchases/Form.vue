<template>
    <div>
        <div class="row">
            <input-control
                label="номер"
                name="number"
                :value="model.number"
                :required="true"
            />
            <datepicker-control label="Дата" name="date" :value="model.date" />
            <input-control
                label="сумма"
                name="sum"
                :value="model.sum"
                :required="true"
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
                        <select class="col-md-12" name="article_subcategory_id[]" :value="row.article_subcategory_id">
                            <option v-for="subcat in articleSubcats" v-bind:value="subcat.id">{{ subcat.name }}</option>
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

        <div class="row col-md-4">
            <button class="btn btn-primary btn-round">Сохранить</button>
        </div>
    </div>
</template>
<script>
import { mapActions, mapGetters } from "vuex";

export default {
    computed: {
        ...mapGetters({
            model:   "CRUD/model",
            errors:  "CRUD/errors",
            message: "CRUD/message",
            articleSubcats: "articles/subcats",
        }),
    },
    methods: {
        ...mapActions({
            fetchSubcats: "articles/fetchSubcats",
        }),
    },
}
</script>