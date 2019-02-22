<template>
    <div>
        <h1>Редактирование товара</h1>

        <router-link to="/articles/list" class="button primary">Список</router-link>

        <form @submit.prevent="updateArticle">
            <div class="row">
                <label>Подкатегория:</label>
                <select v-model="client.subcat_id">
                    <option v-for="subcat in subcats.data" v-bind:value="subcat.id">{{ subcat.name }}</option>
                </select>
            </div>
            <div class="row">
                <label class="control-label">название</label>
                <input type="text" class="form-control" v-model="article.name">
            </div>
            <div class="row">
                <label class="control-label">ед.изм.</label>
                <input type="text" class="form-control" v-model="article.unit">
            </div>
            <div class="row">
                <label class="control-label">цена</label>
                <input type="text" class="form-control" v-model="article.price">
            </div>
            <div class="row">
                <label class="control-label">активный</label>
                <input type="text" class="form-control" v-model="article.active">
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
                article: {},
                subcats: []
            }
        },
        created() {
            let uri = `/api/articles/edit/${this.$route.params.id}`;
            this.axios.get(uri).then(response => {
                this.article = response.data;
            });
            this.axios.get(`/api/subcats/list`).then(response => {
                this.subcats = response.data;
            });
        },
        methods: {
            updateArticle() {
                let uri = `/api/articles/update/${this.$route.params.id}`;
                this.axios.post(uri, this.article).then(response => {
                    this.$router.push({name: 'articlesList'});
                });
            }
        }
    }
</script>