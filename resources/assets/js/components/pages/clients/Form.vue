<template>
    <div>
        <input-control
            label="Название"
            name="name"
            :value="model.name"
            :required="true"
        />
        <input-control
            label="Адрес"
            name="address"
            :value="model.address"
            :required="true"
        />
        <select-control
            label="Район"
            :value="model.region_id"
            name="region_id"
            :options="regions"
        />
        <input-control
            label="Телефон"
            name="telephone"
            :value="model.telephone"
            :required="true"
        />
        <input-control
            label="Факс"
            name="fax"
            :value="model.fax"
        />
        <input-control
            label="Контакт. лицо"
            name="contact_fio"
            :value="model.contact_fio"
            :required="true"
        />
        <input-control
            label="Должность конт. лица"
            name="contact_post"
            :value="model.contact_post"
        />
        <input-control
            label="Расчетный счет"
            name="account"
            :value="model.account"
            :required="true"
        />
        <input-control
            label="В банке"
            name="bank"
            :value="model.bank"
            :required="true"
        />
        <input-control
            label="ИНН"
            name="INN"
            :value="model.INN"
            :required="true"
        />
        <input-control
            label="КПП"
            name="KPP"
            :value="model.KPP"
            :required="true"
        />
        <input-control
            label="БИК"
            name="BIK"
            :value="model.BIK"
            :required="true"
        />
        <input-control
            label="порядок сортировки"
            name="sort"
            :value="model.sort"
        />
        <br />
        <div class="col-md-4">
            <button class="btn btn-primary btn-round">Сохранить</button>
        </div>
    </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";

export default {
    created() {
        this.fetchRegions()
    },
    computed: {
        ...mapGetters({
            regions: "clients/regions",
            model:   "CRUD/model",
            errors:  "CRUD/errors",
            message: "CRUD/message",
        }),
    },
    methods: {
        ...mapActions({
            fetchRegions: "clients/fetchRegions",
        }),
    },
}
</script>
