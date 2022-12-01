<template>
    <grid heading="Клиенты" entity="clients" pageSize=50>
        <!-- форма поиска -->
        <template v-slot:search-form>
            <div class="row col-md-8">
                <input-control
                    css-class="control"
                    label="название"
                    name="name"
                />
                <input-control
                    css-class="control"
                    label="адрес"
                    name="address"
                />
            </div>
        </template>
        <!-- шапка таблицы -->
        <template v-slot:head>
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
        </template>
        <!-- строки таблицы -->
        <template v-slot:table-row="{ item, index }">
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
        </template>
    </grid>
</template>
