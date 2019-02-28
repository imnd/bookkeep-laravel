<template>
    <grid heading="Клиенты" entity="clients" pageSize=50></grid>
</template>

<script>
    window.Vue = require('vue');

    // форма поиска
    Vue.component('search-form-clients', {
        template: `<div class="clear">
            <div class="control">
                <label>название:</label>
                <input name="name" />
            </div>
            <div class="control">
                <label>адрес:</label>
                <input name="address" />
            </div>
        </div>`
    });
    // шапка таблицы
    Vue.component('grid-head-clients', {
        template: `<tr>
            <th>название</th>
            <th>адрес</th>
            <th>район</th>
            <th>телефон</th>
            <th>факс</th>
            <th>контакт. лицо</th>
            <th>должность конт. лица</th>
            <th>расчетный счет</th>
            <th>в банке</th>
            <th>ИНН</th>
            <th>КПП</th>
            <th>БИК</th>
        </tr>`
    });
    // строки таблицы
    Vue.component('grid-body-clients', {
        props: {
            listData: Array,
        },
        template: `<tbody>
            <tr v-for="item, index in listData">
            <td>{{ item.name }}</td>
            <td>{{ item.address }}</td>
            <td>{{ item.region ? item.region.name : '' }}</td>
            <td>{{ item.telephone }}</td>
            <td>{{ item.fax }}</td>
            <td>{{ item.contact_fio }}</td>
            <td>{{ item.contact_post }}</td>
            <td>{{ item.bank }}</td>
            <td>{{ item.account }}</td>
            <td>{{ item.INN }}</td>
            <td>{{ item.KPP }}</td>
            <td>{{ item.BIK }}</td>
            <td><router-link :to="{name: 'clientEdit', params: { id: item.id }}" class="update">&nbsp;</router-link></td>
            <td><a href="#" class="delete" @click.prevent="deleteItem(item.id, index)">&nbsp;</a></td>
        </tr>
        </tbody>`
    });
</script>