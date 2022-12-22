<template>
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="form-title">Редактирование товара</h4>
            <navigation :entity="entity" :links="['list', 'delete']" @delete="deleteModel($route.params.id)" />
        </div>
        <div class="card-body">
            <form @submit.prevent="updateModel($route.params.id)">
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
const { setEntity, fetchModel, updateModel, deleteModel } = mapActions({
    setEntity:   "CRUD/setEntity",
    fetchModel:  "CRUD/fetchModel",
    updateModel: "CRUD/updateModel",
    deleteModel: "CRUD/deleteModel",
})

setEntity("articles")

import { useRoute } from 'vue-router'
const route = useRoute()
fetchModel(route.params.id)

</script>
