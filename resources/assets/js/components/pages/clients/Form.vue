<template>
    <div class="row">
        <input-control
            label="Название"
            name="name"
            v-model="model.name"
            :required="true"
        />
        <input-control
            label="Адрес"
            name="address"
            v-model="model.address"
            :required="true"
        />
        <select-control
            label="Район"
            v-model="model.region_id"
            name="region_id"
            :options="regions"
        />
        <input-control
            label="Телефон"
            name="telephone"
            v-model="model.telephone"
            :required="true"
        />
        <input-control
            label="Факс"
            name="fax"
            v-model="model.fax"
        />
        <input-control
            label="Контакт. лицо"
            name="contact_fio"
            v-model="model.contact_fio"
            :required="true"
        />
        <input-control
            label="Должность конт. лица"
            name="contact_post"
            v-model="model.contact_post"
        />
        <input-control
            label="Расчетный счет"
            name="account"
            v-model="model.account"
            :required="true"
        />
        <input-control
            label="В банке"
            name="bank"
            v-model="model.bank"
            :required="true"
        />
        <input-control
            label="ИНН"
            name="INN"
            v-model="model.INN"
            :required="true"
        />
        <input-control
            label="КПП"
            name="KPP"
            v-model="model.KPP"
            :required="true"
        />
        <input-control
            label="БИК"
            name="BIK"
            v-model="model.BIK"
            :required="true"
        />
        <input-control
            label="порядок сортировки"
            name="sort"
            v-model="model.sort"
        />
    </div>
    <form-footer />
</template>

<script setup lang="ts">
import { mapActions, mapGetters } from "vuex";

const { model, regions } = mapGetters({
    model: "CRUD/model",
    regions: "clients/regions",
})
const { fetchRegions } = mapActions({
    fetchRegions: "clients/fetchRegions",
})

fetchRegions()
</script>
