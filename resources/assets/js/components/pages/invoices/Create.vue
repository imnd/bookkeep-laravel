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

<script>
import FormBody from "./Form";
import Navigation from "../../ui/navigation/Navigation";
import { mapActions, mapGetters, mapMutations } from "vuex";

export default {
    components: { FormBody, Navigation },
    beforeCreate() {
        this.setRow({
            article_id : '',
            quantity : '',
            price : '',
        });
        /*this.setModel({
            number: '',
            contract_num: '',
            client_id: '',
            date: '',
            sum: '',
            payed: 0
        });*/
    },
    created() {
        this.setEntity("invoices")
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
            setRow: "CRUD/setRow",
            /*setModel: "CRUD/setModel"*/
        })
    },
}
</script>
