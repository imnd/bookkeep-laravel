<template>
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Редактирование клиента</h4>
            <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                    <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                            <router-link class="nav-link" to="#" v-on:click="clientDelete()">
                                <i class="material-icons">delete</i> Удалить
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/clients/list" class="nav-link">
                                <i class="material-icons">view_list</i> Список
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
            let uri = `/api/clients/${this.$route.params.id}`;
            this.axios.get(uri).then(response => {
                this.model = response.data;
            });
        },
        methods: {
            update() {
                let uri = `/api/clients/${this.$route.params.id}`;
                this.axios.post(uri, this.model)
                    .then(response => {
                        this.$router.push({name: 'clientsList'});
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                    });
            }
        },
        components: { FormBody },
    }
</script>
