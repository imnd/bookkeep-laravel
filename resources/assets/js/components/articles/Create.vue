<div class="form-group">
    <router-link to="/" class="btn btn-default">Back</router-link>
</div>

<div class="panel panel-default">
    <div class="panel-heading">Create new article</div>
    <div class="panel-body">
        <form v-on:submit="saveForm()">
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label class="control-label">Article name</label>
                    <input type="text" v-model="article.name" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label class="control-label">Article unit</label>
                    <input type="text" v-model="article.unit" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label class="control-label">Article price</label>
                    <input type="text" v-model="article.price" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label class="control-label">Article active</label>
                    <input type="text" v-model="article.active" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <button class="btn btn-success">Create</button>
                </div>
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
                }
            }
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