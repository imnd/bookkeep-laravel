<template>
    <grid heading="Товары" entity="articles" pageSize=50></grid>
</template>

<script>
    window.Vue = require('vue');

    // форма поиска
    Vue.component('search-form-articles', {
        data() {
            return {
                subcats: []
            }
        },
        beforeCreate() {
            this.axios.get(`/api/subcats/list`).then(response => {
                this.subcats = response.data.data;
            });
        },
        template: `<div class="clear">
            <div class="control">
                <label>цена от:</label>
                <input name="priceFrom" type="text">
            </div>
            <div class="control">
                <label>цена до:</label>
                <input name="priceTo" type="text">
            </div>
            <div class="control">
                <label>название:</label>
                <input name="name" />
            </div>
            <div class="control">
                <label>подкатегория:</label>
                <select name="subcat_id">
                    <option v-for="subcat in subcats" v-bind:value="subcat.id">{{ subcat.name }}</option>
                </select>
            </div>
            <div class="control">
                <label>ед.изм.:</label>
                <select name="unit">
                    <option v-for="unit in ['кг', 'шт']" v-bind:value="unit">{{ unit }}</option>
                </select>
            </div>
            <div class="control">
                <label>активный:</label>
                <select name="active">
                    <option v-for="active, key in ['нет', 'да']" v-bind:value="key">{{ active }}</option>
                </select>
            </div>
        </div>`
    });
    // шапка таблицы
    Vue.component('grid-head-articles', {
        template: `<tr>
            <th>название</th>
            <th>ед.изм.</th>
            <th>цена</th>
            <th>активный</th>
        </tr>`
    });
    // строки таблицы
    Vue.component('grid-body-articles', {
        props: {
            listData: Array,
        },
        template: `<tbody>
            <tr v-for="item, index in listData">
                <td>{{ item.name }}</td>
                <td>{{ item.unit }}</td>
                <td>{{ item.price }}</td>
                <td>{{ ['нет', 'да'][item.active] }}</td>
                <td><router-link :to="{name: 'articleEdit', params: { id: item.id }}" class="update">&nbsp;</router-link></td>
                <td><a href="#" class="delete" @click.prevent="deleteItem(item.id, index)">&nbsp;</a></td>
            </tr>
        </tbody>`
    });
</script>