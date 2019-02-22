<template>
    <div>
        <h1>Новый клиент</h1>
        <router-link to="/clients/list" class="button primary">Список</router-link>

        <form @submit.prevent="clientCreate">
            <div class="row">
                <label>Название:</label>
                <input type="text" class="form-control" v-model="client.name">
            </div>
            <div class="row">
                <label>Адрес:</label>
                <input type="text" class="form-control" v-model="client.address">
            </div>
            <div class="row">
                <label>Район:</label>
                <select v-model="client.region_id">
                    <option v-for="region in regions.data" v-bind:value="region.id">{{ region.name }}</option>
                </select>
            </div>
            <div class="row">
                <label>Телефон:</label>
                <input type="text" class="form-control" v-model="client.telephone">
            </div>
            <div class="row">
                <label>Факс:</label>
                <input type="text" class="form-control" v-model="client.fax">
            </div>
            <div class="row">
                <label>контакт. лицо:</label>
                <input type="text" class="form-control" v-model="client.contact_fio">
            </div>
            <div class="row">
                <label>должность конт. лица:</label>
                <input type="text" class="form-control" v-model="client.contact_post">
            </div>
            <div class="row">
                <label>расчетный счет:</label>
                <input type="text" class="form-control" v-model="client.account">
            </div>
            <div class="row">
                <label>В банке:</label>
                <input type="text" class="form-control" v-model="client.bank">
            </div>
            <div class="row">
                <label>ИНН:</label>
                <input type="text" class="form-control" v-model="client.INN">
            </div>
            <div class="row">
                <label>КПП:</label>
                <input type="text" class="form-control" v-model="client.KPP">
            </div>
            <div class="row">
                <label>БИК:</label>
                <input type="text" class="form-control" v-model="client.BIK">
            </div>
            <div class="row">
                <label>порядок сортировки:</label>
                <input type="text" class="form-control" v-model="client.sort">
            </div>
            <br />
            <div class="form-group">
                <button class="button primary">Сохранить</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                client: {},
                regions: []
            }
        },
        created() {
            this.axios.get(`/api/regions/list`).then(response => {
                this.regions = response.data;
            });
        },
        methods: {
            addClient() {
                let uri = '/api/client/create';
                this.axios.post(uri, this.client).then((response) => {
                    this.$router.push({name: 'clients'});
                });
            }
        }
    }
</script>