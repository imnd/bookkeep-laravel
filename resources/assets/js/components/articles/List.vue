<template>
    <grid heading="Товары" entity="articles" pageSize=50></grid>
</template>

<script>
    window.Vue = require('vue');

    // форма поиска
    Vue.component('search-form-articles', {
        template: `<div>
            <div class="row">
                <div class="control">
                    <label>цена от:</label>
                    <input class="form-control" name="priceFrom" type="text">
                </div>
                <div class="control">
                    <label>цена до:</label>
                    <input class="form-control" name="priceTo" type="text">
                </div>
                <div class="control">
                    <label>название:</label>
                    <input class="form-control" name="name" />
                </div>
                <div class="control">
                    <label>ед.изм.:</label>
                    <select class="form-control" name="unit">
                        <option v-for="unit in ['кг', 'шт']" v-bind:value="unit">{{ unit }}</option>
                    </select>
                </div>
                <div class="control">
                    <label>активный:</label>
                    <select class="form-control" name="active">
                        <option v-for="active, key in ['нет', 'да']" v-bind:value="key">{{ active }}</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="control">
                    <label>подкатегория:</label>
                    <select class="form-control" name="subcat_id">
                        <option v-for="subcat in subcats" v-bind:value="subcat.id">{{ subcat.name }}</option>
                    </select>
                </div>
            </div>
        </div>`,
        data() {
            return {
                subcats: []
            }
        },
        beforeCreate() {
            this.axios.get(`/api/article-subcats`).then(response => {
                this.subcats = response.data.data;
            });
        },
    });
    // шапка таблицы
    Vue.component('grid-head-articles', {
        template: `<tr>
            <th><a href="#" data-sort="name">название</a></th>
            <th><a href="#" data-sort="unit">ед.изм.</a></th>
            <th><a href="#" data-sort="price">цена</a></th>
            <th><a href="#" data-sort="active">активный</a></th>
        </tr>`
    });
    // строки таблицы
    Vue.component('grid-body-articles', {
        template: `<tbody>
            <tr v-for="item, index in listData">
                <td>{{ item.name }}</td>
                <td>{{ item.unit }}</td>
                <td>{{ item.price }}</td>
                <td>{{ ['нет', 'да'][item.active] }}</td>
                <td>
                    <router-link :to="{name: 'articlesEdit', params: { id: item.id }}">
                        <i class="material-icons">edit</i>
                    </router-link>
                </td>
                <td>
                    <a href="#">
                        <i
                            :data-item-id="item.id"
                            :data-item-index="index"
                            class="material-icons"
                        >delete</i>
                    </a>
                </td>
            </tr>
        </tbody>`,
        props: {
            listData: Array,
        },
    });
    export default {}
</script>
