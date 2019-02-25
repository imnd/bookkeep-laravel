<template>
    <div>
        <router-link to="/purchases/list" class="button primary top">Список</router-link>

        <h1>Новая закупка</h1>

        <form @submit.prevent="create">
            <div class="row">
                <label class="control-label">номер:</label>
                <input v-model="purchase.number">
            </div>
            <div class="row">
                <label class="control-label">дата:</label>
                <input v-model="purchase.date">
            </div>
            <div class="row">
                <label class="control-label">сумма:</label>
                <input v-model="purchase.sum">
            </div>

            <div class="row">
                <button class="button success">Сохранить</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                purchase: {
                    name: '',
                    unit: '',
                    price: '',
                    active: '',
                },
                subcats: []
            }
        },
        created() {
            this.axios.get(`/api/subcats/list`).then(response => {
                this.subcats = response.data.data;
            });
        },
        methods: {
            create() {
                let uri = '/api/purchase/create';
                this.axios.post(uri, this.purchase).then(response => {
                    this.$router.push({name: 'purchasesList'});
                });
            }
        }
    }
</script>