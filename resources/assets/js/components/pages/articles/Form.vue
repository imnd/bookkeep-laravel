<template>
    <div>
        <div class="row">
            <select-control
                label="Подкатегория"
                name="subcat_id"
                :value="model.subcat_id"
                :options="subcats"
                css-class="col-md-8"
            />
            <input-control
                label="Название"
                name="name"
                :required="true"
                :value="model.name"
            />
        </div>
        <div class="row">
            <select-control
                label="Ед. изм."
                name="unit"
                :value="model.unit"
                :required="true"
                :options="units"
            />
            <input-control
                label="Цена"
                name="price"
                :value="model.price"
                :required="true"
            />
            <select-control
                label="Активный"
                name="active"
                :value="model.active"
                :options="noYes"
            />
        </div>
        <div class="row">
            <div class="col-md-2">
                <button class="btn btn-primary btn-round">Сохранить</button>
            </div>
            <div class="green font-weight-bold pt-3">
                {{ message }}
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";

export default {
    created() {
        this.fetchSubcats();
    },
    computed: {
        ...mapGetters({
            model:   "CRUD/model",
            errors:  "CRUD/errors",
            message: "CRUD/message",
            subcats: "articles/subcats",
            units:   "articles/units",
            noYes:   "enums/noYes",
        }),
    },
    methods: {
        ...mapActions({
            fetchSubcats: "articles/fetchSubcats",
            setModel: "articles/setModel",
        }),
    },
};
</script>