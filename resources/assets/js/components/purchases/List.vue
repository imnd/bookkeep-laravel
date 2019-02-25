<template>
    <grid heading="Закупки" entity="purchases" pageSize=20></grid>
</template>

<script>
    window.Vue = require('vue');

    Vue.component('grid-head', {
        template: `<thead>
        <tr>
            <th>номер</th>
            <th>дата</th>
            <th>сумма</th>
            <th colspan=2>операции</th>
        </tr>
    </thead>`
    });
    Vue.component('grid-body', {
        props: {
            listData: Array,
            editUrl: String,
        },
        template: `<tbody>
        <tr v-for="item, index in listData">
            <td>{{ item.number }}</td>
            <td>{{ item.date }}</td>
            <td>{{ item.sum }}</td>
            <td><router-link :to="{name: this.editUrl, params: { id: item.id }}" class="update">&nbsp;</router-link></td>
            <td><a href="#" class="delete" @click.prevent="deleteItem(item.id, index)">&nbsp;</a></td>
        </tr>
    </tbody>`
    });
</script>