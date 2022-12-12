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
import { mapActions, mapGetters } from "vuex";

export default {
    components: { FormBody, Navigation },
    created() {
        this.setEntity("invoices")
        this.newRow({
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
    computed: {
        ...mapGetters({
            entity:  "CRUD/entity",
            row:  "CRUD/row",
        }),
    },
    methods: {
        ...mapActions({
            setEntity:   "CRUD/setEntity",
            createModel: "CRUD/createModel",
            newRow: "CRUD/newRow",
            /*setModel: "CRUD/setModel"*/
        }),
    },
}
</script>
