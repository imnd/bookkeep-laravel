<template>
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="form-title">Редактирование фактуры</h4>
            <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                    <ul class="nav nav-tabs" data-tabs="tabs">
                        <delete-link :entity="entity" @delete="deleteModel($route.params.id)" />
                        <list-link :entity="entity" />
                        <li class="nav-item">
                            <router-link class="nav-link" :to="{
                                name: 'invoicesPrintoutBill',
                                params: { id: this.$route.params.id }
                            }">
                                <i class="material-icons">print</i> Печать фактуры
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" :to="{
                                name: 'invoicesPrintoutInvoice',
                                params: { id: this.$route.params.id }
                            }">
                                <i class="material-icons">print</i> Печать накладной
                            </router-link>
                        </li>
                    </ul>
                </div>
            </div>
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
import ListLink from "../../ui/navigation/ListLink.vue";
import DeleteLink from "../../ui/navigation/DeleteLink.vue";
import { mapActions, mapGetters } from "vuex";

const { entity } = mapGetters({
    entity:  "CRUD/entity",
})
const { setEntity, fetchModel, updateModel, deleteModel, fetchRows } = mapActions({
    setEntity:   "CRUD/setEntity",
    fetchModel:  "CRUD/fetchModel",
    updateModel: "CRUD/updateModel",
    deleteModel: "CRUD/deleteModel",
    fetchRows:   "CRUD/fetchRows",
})

setEntity("invoices")

import { useRoute } from 'vue-router'
const route = useRoute()
fetchModel(route.params.id)
fetchRows(route.params.id)

</script>
