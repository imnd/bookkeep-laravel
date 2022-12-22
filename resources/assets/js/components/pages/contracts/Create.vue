<template>
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="form-title">Новый контракт</h4>
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
import { mapActions, mapGetters, mapMutations } from "vuex";
import FormBody from "./Form.vue";
import Navigation from "../../ui/navigation/Navigation.vue";

const { entity } = mapGetters({
    entity:  "CRUD/entity",
})
const { setEntity, createModel, newRow } = mapActions({
    setEntity:   "CRUD/setEntity",
    createModel: "CRUD/createModel",
    newRow:      "CRUD/newRow",
})
const { setModel } = mapMutations({
    setModel: "CRUD/setModel"
})

newRow({
    'article_id' : '',
    'quantity' : '',
    'price' : '',
});
setModel({
    client_id: '',
    contract_num: '',
    sum: '',
    remainder: '',
    date: '',
    contents: '',
});
setEntity("contracts")
</script>
