<template>
    <div>
        <router-link to="/purchases/list" class="button primary top">Список</router-link>

        <h1>Редактирование закупки</h1>

        <form @submit.prevent="update">
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
        data() {
            return {
                purchase: {},
                subcats: []
            }
        },
        created() {
            let uri = `/api/purchases/edit/${this.$route.params.id}`;
            this.axios.get(uri).then(response => {
                this.purchase = response.data;
            });
            this.axios.get(`/api/subcats/list`).then(response => {
                this.subcats = response.data.data;
            });
        },
        methods: {
            update() {
                let uri = `/api/purchases/update/${this.$route.params.id}`;
                this.axios.post(uri, this.purchase).then(response => {
                    this.$router.push({name: 'purchasesList'});
                });
            }
        }
    }
</script>