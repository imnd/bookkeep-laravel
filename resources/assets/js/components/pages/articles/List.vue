<template>
    <grid heading="Товары" entity="articles" pageSize=50>
        <!-- форма поиска -->
        <template v-slot:search-form>
            <div class="row">
                <input-control css-class="control" label="цена от" name="priceFrom" />
                <input-control css-class="control" label="цена до" name="priceTo" />
                <input-control css-class="control" label="название" name="name" />
                <select-control css-class="control" label="ед.изм." name="unit" :options="units" />
                <select-control css-class="control" label="активный" name="active" :options="noYes" />
            </div>
            <div class="row">
                <select-control
                    css-class="control"
                    label="подкатегория"
                    name="subcat_id"
                    :options="subcats"
                />
            </div>
        </template>
        <!-- шапка таблицы -->
        <template v-slot:head>
            <th><a href="#" data-sort="name">название</a></th>
            <th><a href="#" data-sort="unit">ед.изм.</a></th>
            <th><a href="#" data-sort="price">цена</a></th>
            <th><a href="#" data-sort="active">активный</a></th>
        </template>
        <!-- строки таблицы -->
        <template v-slot:table-row="{ item, index }">
            <td>{{ item.name }}</td>
            <td>{{ item.unit }}</td>
            <td>{{ item.price }}</td>
            <td>{{ noYes[item.active] }}</td>
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
        </template>
    </grid>
</template>

<script setup>
import { mapActions, mapGetters } from "vuex";

const { subcats, units, noYes } = mapGetters({
    subcats: "articles/subcats",
    units:   "articles/units",
    noYes:   "enums/noYes",
})
const { fetchSubcats } = mapActions({
    fetchSubcats: "articles/fetchSubcats",
})

fetchSubcats()
</script>
