<template>
    <div class="row">
        <select-control
            label="Подкатегория"
            name="subcat_id"
            v-model="model.subcat_id"
            :options="subcats"
            css-class="col-md-8"
        />
        <input-control
            label="Название"
            name="name"
            :required="true"
            v-model="model.name"
        />
    </div>
    <div class="row">
        <select-control
            label="Ед. изм."
            name="unit"
            v-model="model.unit"
            :required="true"
            :options="units"
        />
        <input-control
            label="Цена"
            name="price"
            v-model="model.price"
            :required="true"
        />
        <select-control
            label="Активный"
            name="active"
            v-model="model.active"
            :options="noYes"
        />
    </div>
    <form-footer />
</template>

<script setup lang="ts">
import { mapActions, mapGetters } from "vuex";

type Article = {
    active: boolean,
    name:   string,
    price:  number,
    subcat_id:  number,
    unit:   string,
}
const { model: Article, subcats, units, noYes } = mapGetters({
    model:   "CRUD/model",
    subcats: "articles/subcats",
    units:   "articles/units",
    noYes:   "enums/noYes",
})

const { fetchSubcats, setModel } = mapActions({
    fetchSubcats:   "articles/fetchSubcats",
    setModel:     "articles/setModel",
})

fetchSubcats()
</script>