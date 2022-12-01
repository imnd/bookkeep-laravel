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

<script>
import { mapActions, mapGetters, mapMutations } from "vuex";
import FormBody from "./Form.vue";
import Navigation from "../../ui/navigation/Navigation";

export default {
    components: { FormBody, Navigation },
    beforeCreate() {
        this.setModel({
            client_id: '',
            contract_num: '',
            sum: '',
            remainder: '',
            date: '',
            contents: '',
        });
    },
    created() {
        this.setEntity("contracts")
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
        ...mapMutations({
            setModel: "CRUD/setModel"
        })
    },
}
</script>
