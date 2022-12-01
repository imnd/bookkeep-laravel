<template>
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Редактирование клиента</h4>
            <navigation :entity="entity" :links="['list', 'delete']" @delete="deleteModel($route.params.id)" />

        </div>
        <div class="card-body">
            <form @submit.prevent="updateModel()">
                <form-body />
            </form>
        </div>
    </div>
</template>

<script>
import FormBody from "./Form.vue";
import { mapGetters } from "vuex";

export default {
    components: { FormBody },
    created() {
        this.setEntity("clients")
        this.fetchModel(this.$route.params.id)
    },
    computed: {
        ...mapGetters({
            entity: "CRUD/entity",
        }),
    },
    methods: {
        ...mapActions({
            setEntity:   "CRUD/setEntity",
            fetchModel:  "CRUD/fetchModel",
            updateModel: "CRUD/updateModel",
            deleteModel: "CRUD/deleteModel",
        }),
    },
}
</script>
