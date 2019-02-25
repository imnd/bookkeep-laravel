<template>
    <div>
        <router-link to="/clients/list" class="button primary top">Список</router-link>

        <h1>Редактирование клиента</h1>

        <form @submit.prevent="updateClient">
            <div class="row">
                <label>Название:</label>
                <input v-model="client.name">
            </div>
            <div class="row">
                <label>Адрес:</label>
                <input v-model="client.address">
            </div>
            <div class="row">
                <label>Район:</label>
                <select v-model="client.region_id">
                    <option v-for="region in regions" v-bind:value="region.id">{{ region.name }}</option>
                </select>
            </div>
            <div class="row">
                <label>Телефон:</label>
                <input v-model="client.telephone">
            </div>
            <div class="row">
                <label>Факс:</label>
                <input v-model="client.fax">
            </div>
            <div class="row">
                <label>контакт. лицо:</label>
                <input v-model="client.contact_fio">
            </div>
            <div class="row">
                <label>должность конт. лица:</label>
                <input v-model="client.contact_post">
            </div>
            <div class="row">
                <label>расчетный счет:</label>
                <input v-model="client.account">
            </div>
            <div class="row">
                <label>В банке:</label>
                <input v-model="client.bank">
            </div>
            <div class="row">
                <label>ИНН:</label>
                <input v-model="client.INN">
            </div>
            <div class="row">
                <label>КПП:</label>
                <input v-model="client.KPP">
            </div>
            <div class="row">
                <label>БИК:</label>
                <input v-model="client.BIK">
            </div>
            <div class="row">
                <label>порядок сортировки:</label>
                <input v-model="client.sort">
            </div>
            <br />
            <div class="form-group">
                <button class="button success">Сохранить</button>
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
            let uri = `/api/clients/edit/${this.$route.params.id}`;
            this.axios.get(uri).then(response => {
                this.client = response.data;
            });
            this.axios.get(`/api/regions/list`).then(response => {
                this.regions = response.data.data;
            });
        },
        methods: {
            updateClient() {
                let uri = `/api/clients/update/${this.$route.params.id}`;
                this.axios.post(uri, this.client).then(response => {
                    this.$router.push({name: 'clientsList'});
                });
            }
        }
    }
</script>