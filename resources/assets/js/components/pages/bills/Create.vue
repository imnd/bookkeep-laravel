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

<script>
import FormBody from './Form.vue';
import Navigation from "../../ui/navigation/Navigation";
import { mapActions, mapGetters } from "vuex";

export default {
    components: { FormBody, Navigation },
    created() {
        this.setEntity("bills")
    },
    computed: {
        ...mapGetters({
            entity:  "CRUD/entity",
        }),
    },
    methods: {
        ...mapActions({
            setEntity:   "CRUD/setEntity",
            createModel: "CRUD/createModel",
        }),
    },
}
</script>
