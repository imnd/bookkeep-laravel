<template>
    <div class="row">
        <input-control
            label="Номер договора"
            name="contract_num"
            v-model="model.contract_num"
            :required="true"
        />
        <select-control
            css-class="row col-md-4"
            label="Клиент"
            name="client_id"
            v-model="model.client_id"
            :options="clients"
        />
        <input-control
            label="Сумма"
            name="sum"
            v-model="model.sum"
            :required="true"
        />
        <input-control
            label="Остаток"
            name="remainder"
            v-model="model.remainder"
            :required="true"
        />
        <datepicker-control
            label="Дата"
            name="date"
            v-model="model.date"
        />
        <textarea-control
            label="Содержание"
            name="contents"
            v-model="model.contents"
            :required="true"
        />
    </div>
    <form-footer />
</template>
<script>
import { mapGetters } from "vuex";

export default {
    computed: {
        ...mapGetters({
            model: "CRUD/model",
        }),
    },
};
</script>