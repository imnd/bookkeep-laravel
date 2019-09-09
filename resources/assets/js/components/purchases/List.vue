<template>
    <grid
        heading="Закупки"
        entity="purchases"
        pageSize=20
    />
</template>

<script>
    window.Vue = require('vue');

    // форма поиска
    Vue.component('search-form-purchases', {
        template: `<div class="row">
            <div class="control">
                <label>дата с:</label>
                <input class="form-control" name="dateFrom" />
            </div>
            <div class="control">
                <label>дата по:</label>
                <input class="form-control" name="dateTo" />
            </div>
            <div class="control">
                <label>номер:</label>
                <input name="number" class="form-control required" />
            </div>
        </div>`
    });
    // шапка таблицы
    Vue.component('grid-head-purchases', {
        template: `<tr>
            <th><a href="#" data-sort="number">номер</a></th>
            <th><a href="#" data-sort="date">дата</a></th>
            <th><a href="#" data-sort="sum">сумма</a></th>
        </tr>`
    });
    // строки таблицы
    Vue.component('grid-body-purchases', {
        props: {
            listData: Array,
        },
        template: `<tbody>
            <tr v-for="item, index in listData">
                <td>{{ item.number }}</td>
                <td>{{ item.date }}</td>
                <td>{{ item.sum }}</td>
                <td><a href="#"><i :data-item-id="item.id" :data-item-index="index" class="material-icons">delete</i></a></td>
                <td><router-link :to="{name: 'purchaseEdit', params: { id: item.id }}" ><i class="material-icons">edit</i></router-link></td>
                <td><router-link :to="{name: 'purchasePrintout', params: { id: item.id }}" class="button-printout"><i class="material-icons">print</i></router-link></td>
            </tr>
        </tbody>`
    });
    export default {}
</script>
