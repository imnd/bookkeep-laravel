<template>
    <div>
        <router-link to="/articles/list" class="button primary top">Список</router-link>

        <h1>Новый товар</h1>

        <form @submit.prevent="create">
            <div class="row">
                <label>Подкатегория:</label>
                <select v-model="article.subcat_id">
                    <option v-for="subcat in subcats" v-bind:value="subcat.id">{{ subcat.name }}</option>
                </select>
            </div>
            <div class="row">
                <label class="control-label">Название:</label>
                <input v-model="article.name">
            </div>
            <div class="row">
                <label class="control-label">Ед. изм.:</label>
                <input v-model="article.unit">
            </div>
            <div class="row">
                <label class="control-label">Цена:</label>
                <input v-model="article.price">
            </div>
            <div class="row">
                <label class="control-label">Активный:</label>
                <input v-model="article.active">
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
                article: {
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
                this.axios.post('/api/article/create', this.article).then(response => {
                    this.$router.push({name: 'articlesList'});
                });
            }
        }
    }
</script>