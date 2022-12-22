<template>
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="form-title">Новый платеж</h4>
            <navigation :entity="entity" :links="['list']" />
        </div>
        <div class="card-body">
            <form @submit.prevent="createModel()">
                <form-body />
            </form>
        </div>
    </div>
</template>

<script setup lang="ts">
import FormBody from "./Form.vue";
import Navigation from "../../ui/navigation/Navigation.vue";
import { mapActions, mapGetters } from "vuex";

const { entity } = mapGetters({
    entity:  "CRUD/entity",
})
const { setEntity, createModel } = mapActions({
    setEntity:   "CRUD/setEntity",
    createModel: "CRUD/createModel",
})

setEntity("bills")

</script>
