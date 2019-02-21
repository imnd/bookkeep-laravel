<script>
    export default {
        mounted() {
            let app = this;
            let id = app.$route.params.id;
            app.articleId = id;
            axios.get('/api/v1/articles/' + id)
                .then(function (resp) {
                    app.article = resp.data;
                })
                .catch(function () {
                    alert("Could not load your article")
                });
        },
        data: function () {
            return {
                articleId: null,
                article: {
                    name: '',
                    address: '',
                    website: '',
                    email: '',
                }
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newArticle = app.article;
                axios.patch('/api/v1/articles/' + app.articleId, newArticle)
                    .then(function (resp) {
                        app.$router.replace('/');
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your article");
                    });
            }
        }
    }
</script>