<template>
    <div>
        <input-control
            label="Номер договора"
            name="contract_num"
            :value="model.contract_num"
            :required="true"
        />
        <select-control
            css-class="row col-md-4"
            label="Клиент"
            name="client_id"
            :value="model.client_id"
            :options="clients"
        />
        <input-control
            label="Сумма"
            name="sum"
            :value="model.sum"
            :required="true"
        />
        <input-control
            label="Остаток"
            name="remainder"
            :value="model.remainder"
            :required="true"
        />
        <datepicker-control
            label="Дата"
            name="date"
            :value="model.date"
        />
        <textarea-control
            label="Содержание"
            name="contents"
            :required="true"
            :value="model.contents"
        />

        <div class="col-md-4">
            <button class="btn btn-primary btn-round">Сохранить</button>
        </div>
    </div>
</template>
<script>
import { mapGetters } from "vuex";
import rows from "../../mixins/rows";

export default {
    mixins: [ rows ],
    computed: {
        ...mapGetters({
            model: "CRUD/model",
            errors: "CRUD/errors",
            message: "CRUD/message"
        }),
    },
}
</script>