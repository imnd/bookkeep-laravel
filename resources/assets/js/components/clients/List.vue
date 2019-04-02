<template>
    <grid heading="Клиенты" entity="clients" pageSize=50></grid>
</template>

<script>
    window.Vue = require('vue');

    // форма поиска
    Vue.component('search-form-clients', {
        template: `<div class="row col-md-8">
            <div class="control">
                <label>название:</label>
                <input class="form-control" name="name" />
            </div>
            <div class="control">
                <label>адрес:</label>
                <input class="form-control" name="address" />
            </div>
        </div>`
    });
    // шапка таблицы
    Vue.component('grid-head-clients', {
        template: `<tr>
            <th><a href="#" data-sort="name">название</a></th>
            <th><a href="#" data-sort="address">адрес</a></th>
            <th><a href="#" data-sort="region_id">район</a></th>
            <th><a href="#" data-sort="telephone">телефон</a></th>
            <th><a href="#" data-sort="fax">факс</a></th>
            <th><a href="#" data-sort="contact_fio">контакт. лицо</a></th>
            <th><a href="#" data-sort="contact_post">должность конт. лица</a></th>
            <th><a href="#" data-sort="account">расчетный счет</a></th>
            <th><a href="#" data-sort="bank">в банке</a></th>
            <th><a href="#" data-sort="INN">ИНН</a></th>
            <th><a href="#" data-sort="KPP">КПП</a></th>
            <th><a href="#" data-sort="BIK">БИК</a></th>
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
                <td>{{ item.region.name }}</td>
                <td>{{ item.telephone }}</td>
                <td>{{ item.fax }}</td>
                <td>{{ item.contact_fio }}</td>
                <td>{{ item.contact_post }}</td>
                <td>{{ item.account }}</td>
                <td>{{ item.bank }}</td>
                <td>{{ item.INN }}</td>
                <td>{{ item.KPP }}</td>
                <td>{{ item.BIK }}</td>
                <td><router-link :to="{name: 'clientsEdit', params: { id: item.id }}"><i class="material-icons">edit</i></router-link></td>
                <td><a href="#"><i :data-item-id="item.id" :data-item-index="index" class="material-icons">delete</i></a></td>
            </tr>
        </tbody>`
    });
</script>
