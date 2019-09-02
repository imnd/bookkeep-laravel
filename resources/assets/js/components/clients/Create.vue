<template>
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Новый клиент</h4>
            <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                    <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                            <router-link class="nav-link" to="/clients/list">
                                <i class="material-icons">view_list</i> Список
                            </router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form @submit.prevent="create">
                <form-body :model="model"></form-body>
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
        methods: {
            create() {
                this.axios.post('/api/client', this.model).then(response => {
                    this.$router.push({name: 'clientsList'});
                });
            }
        },
        components: { FormBody },
    }
</script>
