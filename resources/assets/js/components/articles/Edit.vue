<template>
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="form-title">Редактирование товара</h4>
            <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                    <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                            <router-link class="nav-link" to="/articles/list">
                                <i class="material-icons">view_list</i> Список
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" to="#" v-on:click="articleDelete()">
                                <i class="material-icons">delete</i> Удалить
                            </router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form @submit.prevent="update">
                <form-body :model="model" :errors="errors" />
            </form>
        </div>
    </div>
</template>

<script>
    import FormBody from './Form.vue';
    export default {
        data() {
            return {
                model: {},
            }
        },
        created() {
            this.axios.get(`/api/article/${this.$route.params.id}`).then(response => {
                this.model = response.data;
            });
        },
        methods: {
            update() {
                let uri = `/api/article/${this.$route.params.id}`;
                this.axios.post(uri, this.article).then(response => {
                    this.$router.push({name: 'articlesList'});
                });
            }
        },
        components: { FormBody },
    }
</script>
