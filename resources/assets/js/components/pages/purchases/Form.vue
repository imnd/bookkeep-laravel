<template>
    <div>
        <div class="row">
            <input-control
                label="номер"
                name="number"
                v-model="model.number"
                :required="true"
            />
            <datepicker-control label="Дата" name="date" v-model="model.date" />
            <input-control
                label="сумма"
                name="sum"
                v-model="model.sum"
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
                        <select class="col-md-12" name="article_subcategory_id[]" v-model="row.article_subcategory_id">
                            <option v-for="subcat in articleSubcats" v-bindv-model="subcat.id">{{ subcat.name }}</option>
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

        <div class="row col-md-4">
            <button class="btn btn-primary btn-round">Сохранить</button>
        </div>
        <div class="green font-weight-bold pt-3">
            {{ message }}
        </div>
    </div>
</template>
<script>
import { mapActions, mapGetters, mapMutations } from "vuex";

export default {
    computed: {
        ...mapGetters({
            model:          "CRUD/model",
            message:        "CRUD/message",
            total:          "CRUD/total",
            rows:           "CRUD/rows",
            articleSubcats: "articles/subcats",
        }),
    },
    methods: {
        ...mapActions({
            fetchSubcats: "articles/fetchSubcats",
        }),
        ...mapMutations({
            rowDelete: "CRUD/rowDelete",
            rowAdd:    "CRUD/rowAdd",
        }),
    },
}
</script>