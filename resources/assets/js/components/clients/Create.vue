<template>
    <div>
        <h1>Новый клиент</h1>
        <form @submit.prevent="addClient">
            <div class="row">
                <label>Название:</label>
                <input type="text" class="form-control" v-model="сlient.name">
            </div>
            <div class="row">
                <label>Адрес:</label>
                <input type="text" class="form-control" v-model="сlient.address">
            </div>
            <div class="row">
                <label>Район:</label>
                <select name="region_id" v-for="region in regions" :key="region.id">
                    <option value="region.id">region.name</option>
                </select>
            </div>
            <div class="row">
                <label>Телефон:</label>
                <input type="text" class="form-control" v-model="сlient.telephone">
            </div>
            <div class="row">
                <label>Факс:</label>
                <input type="text" class="form-control" v-model="сlient.fax">
            </div>
            <div class="row">
                <label>контакт. лицо:</label>
                <input type="text" class="form-control" v-model="сlient.contact_fio">
            </div>
            <div class="row">
                <label>должность конт. лица:</label>
                <input type="text" class="form-control" v-model="сlient.contact_post">
            </div>
            <div class="row">
                <label>расчетный счет:</label>
                <input type="text" class="form-control" v-model="сlient.account">
            </div>
            <div class="row">
                <label>В банке:</label>
                <input type="text" class="form-control" v-model="сlient.bank">
            </div>
            <div class="row">
                <label>ИНН:</label>
                <input type="text" class="form-control" v-model="сlient.INN">
            </div>
            <div class="row">
                <label>КПП:</label>
                <input type="text" class="form-control" v-model="сlient.KPP">
            </div>
            <div class="row">
                <label>БИК:</label>
                <input type="text" class="form-control" v-model="сlient.BIK">
            </div>
            <div class="row">
                <label>порядок сортировки:</label>
                <input type="text" class="form-control" v-model="сlient.sort">
            </div>
            <br />
            <div class="form-group">
                <button class="btn btn-primary">Сохранить</button>
            </div>
        </form>
  </div>
</template>

<script>
    export default {
        data() {
            return {
                сlient: {}
            }
        },
        methods: {
            addClient() {
                let uri = '/api/client/create';
                this.axios.post(uri, this.сlient).then((response) => {
                    this.$router.push({name: 'clients'});
                });
            }
        }
    }
</script>