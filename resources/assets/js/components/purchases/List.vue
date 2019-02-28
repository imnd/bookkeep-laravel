<template>
    <grid heading="Закупки" entity="purchases" pageSize=20></grid>
</template>

<script>
    window.Vue = require('vue');

    // форма поиска
    Vue.component('search-form-purchases', {
        template: `<div class="clear">
            <div class="control">
                <label>дата с:</label>
                <input name="dateFrom" />
            </div>
            <div class="control">
                <label>дата по:</label>
                <input name="dateTo" />
            </div>
            <div class="control">
                <label>номер:</label>
                <input name="number" class="required" />
            </div>
        </div>`
    });
    // шапка таблицы
    Vue.component('grid-head-purchases', {
        template: `<tr>
            <th>номер</th>
            <th>дата</th>
            <th>сумма</th>
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
                <td><a href="#" class="delete" @click.prevent="deleteItem(item.id, index)">&nbsp;</a></td>
                <td><router-link :to="{name: 'purchasesEdit', params: { id: item.id }}" class="update">&nbsp;</router-link></td>
                <td><router-link :to="{name: 'purchasesPrintout', params: { id: item.id }}" class="button-printout">&nbsp;</router-link></td>
            </tr>
        </tbody>`
    });
</script>