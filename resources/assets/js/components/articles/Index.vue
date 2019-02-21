<div>
    <div class="form-group">
        <router-link :to="{name: 'createArticle'}" class="btn btn-success">Create new article</router-link>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Articles list</div>
        <div class="panel-body">
            <table class="table table-bordered table-striped">
            <thead>
                <tr>
                  <th>название</th>
                  <th>ед.изм.</th>
                  <th>цена</th>
                  <th>активный</th>
                  <th width="100"> </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="article, index in articles">
                    <td>{{ article.name }}</td>
                    <td>{{ article.unit }}</td>
                    <td>{{ article.price }}</td>
                    <td>{{ article.active }}</td>
                    <td>
                        <router-link :to="{name: 'editArticle', params: {id: article.id}}" class="btn btn-xs btn-default">
                            Edit
                        </router-link>
                        <a href="#" class="btn btn-xs btn-danger" v-on:click="deleteEntry(article.id, index)">
                            Delete
                        </a>
                    </td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    export default {
        data: function () {
            return {
                articles: []
            }
        },
        mounted() {
            var app = this;
            axios.get('/api/v1/articles')
                .then(function (resp) {
                    app.articles = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load articles");
                });
        },
        methods: {
            deleteEntry(id, index) {
                if (confirm("Do you really want to delete it?")) {
                    var app = this;
                    axios.delete('/api/v1/articles/' + id)
                        .then(function (resp) {
                            app.articles.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("Could not delete article");
                        });
                }
            }
        }
    }
</script>