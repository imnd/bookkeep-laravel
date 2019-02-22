<template>
    <div>
        <h1>Новый товар</h1>

        <router-link to="/articles/list" class="button primary">Список</router-link>

        <form @submit.prevent="articleCreate">
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
</div>
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
                this.subcats = response.data;
            });
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newArticle = app.article;
                axios.post('/api/v1/articles', newArticle)
                    .then(function (resp) {
                        app.$router.push({path: '/'});
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your article");
                    });
            }
        }
    }
</script>