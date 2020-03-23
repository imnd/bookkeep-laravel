<template>
    <div>
        <div class="col-md-4">
            <label>Название:</label>
            <input class="form-control" v-model="model.name">
        </div>
        <div class="col-md-4">
            <label>Адрес:</label>
            <input class="form-control" v-model="model.address">
        </div>
        <div class="col-md-4">
            <label>Район:</label>
            <select v-model="model.region_id">
                <option v-for="region in regions" v-bind:value="region.id">{{ region.name }}</option>
            </select>
        </div>
        <div class="col-md-4">
            <label>Телефон:</label>
            <input class="form-control" v-model="model.telephone">
        </div>
        <div class="col-md-4">
            <label>Факс:</label>
            <input class="form-control" v-model="model.fax">
        </div>
        <div class="col-md-4">
            <label>контакт. лицо:</label>
            <input class="form-control" v-model="model.contact_fio">
        </div>
        <div class="col-md-4">
            <label>должность конт. лица:</label>
            <input class="form-control" v-model="model.contact_post">
        </div>
        <div class="col-md-4">
            <label>расчетный счет:</label>
            <input class="form-control" v-model="model.account">
        </div>
        <div class="col-md-4">
            <label>В банке:</label>
            <input class="form-control" v-model="model.bank">
        </div>
        <div class="col-md-4">
            <label>ИНН:</label>
            <input class="form-control" v-model="model.INN">
        </div>
        <div class="col-md-4">
            <label>КПП:</label>
            <input class="form-control" v-model="model.KPP">
        </div>
        <div class="col-md-4">
            <label>БИК:</label>
            <input class="form-control" v-model="model.BIK">
        </div>
        <div class="col-md-4">
            <label>порядок сортировки:</label>
            <input class="form-control" v-model="model.sort">
        </div>
        <br />
        <div class="col-md-4">
            <button class="btn btn-primary btn-round">Сохранить</button>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                regions: []
            }
        },
        props: {
            model: {
                type: Object,
                required: true,
            },
            errors: {
                type: Object,
                required: true,
            },
        },
        beforeCreate() {
            this.axios.get(`/api/regions`).then(response => {
                this.regions = response.data.data;
            });
        },
        methods: {
            rowDelete(index) {
                this.rows.splice(index, 1);
            },
            rowAdd() {
                this.rows.push(Vue.util.extend({}, this.row))
            },
            getError(key) {
                if (this.errors[key]!==undefined) {
                    return this.errors[key][0];
                }
            },
        },
    }
</script>

<style scoped>
    .error {
        color: red;
        clear: both;
    }
</style>