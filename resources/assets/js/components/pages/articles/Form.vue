<template>
    <div class="row">
        <select-control
            label="Подкатегория"
            name="subcat_id"
            v-model="model.subcat_id"
            :options="subcats"
            css-class="col-md-8"
        />
        <input-control
            label="Название"
            name="name"
            :required="true"
            v-model="model.name"
        />
    </div>
    <div class="row">
        <select-control
            label="Ед. изм."
            name="unit"
            v-model="model.unit"
            :required="true"
            :options="units"
        />
        <input-control
            label="Цена"
            name="price"
            v-model="model.price"
            :required="true"
        />
        <select-control
            label="Активный"
            name="active"
            v-model="model.active"
            :options="noYes"
        />
    </div>
    <form-footer />
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
            subcats: "articles/subcats",
            units:   "articles/units",
            noYes:   "enums/noYes",
        }),
    },
    methods: {
        ...mapActions({
            fetchSubcats: "articles/fetchSubcats",
            setModel:     "articles/setModel",
        }),
    },
};
</script>