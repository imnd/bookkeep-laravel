<template>
    <div>
        <h1>Товары</h1>
        <router-link to="/articles/create" class="button primary">Создать</router-link>
        <table>
            <thead>
                <tr>
                    <th>название</th>
                    <th>ед.изм.</th>
                    <th>цена</th>
                    <th>активный</th>
                    <th colspan=2>операции</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="article, index in articles">
                    <td>{{ article.name }}</td>
                    <td>{{ article.unit }}</td>
                    <td>{{ article.price }}</td>
                    <td>{{ article.active }}</td>
                    <td><router-link :to="{name: 'articleEdit', params: { id: article.id }}" class="update">&nbsp;</router-link></td>
                    <td><a class="delete" @click.prevent="deleteArticle(article.id)">&nbsp;</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                articles: []
            }
        },
        created() {
            let uri = '/api/articles/list';
            this.axios.get(uri).then(response => {
                this.articles = response.data.data;
            });
        },
        methods: {
            deleteArticle(id) {
                let uri = `/api/articles/delete/${id}`;
                this.axios.delete(uri).then(response => {
                    this.articles.splice(this.articles.indexOf(id), 1);
                });
            }
        }
    }
</script>