<template>
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="form-title">Новая фактура</h4>
            <navigation :entity="entity" :links="['list']" />
        </div>
        <div class="card-body">
            <form @submit.prevent="createModel">
                <form-body />
            </form>
        </div>
    </div>
</template>

<script setup lang="ts">
import FormBody from "./Form.vue";
import Navigation from "../../ui/navigation/Navigation.vue";

import { mapActions, mapGetters } from "vuex";
const { entity, row } = mapGetters({
    entity:  "CRUD/entity",
    row:  "CRUD/row",
})
const { setEntity, createModel, newRow } = mapActions({
    setEntity:   "CRUD/setEntity",
    createModel: "CRUD/createModel",
    newRow: "CRUD/newRow",
})

setEntity("invoices")
newRow({
    article_id : "",
    quantity : "",
    price : "",
})

</script>
