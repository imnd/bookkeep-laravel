<template>
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="form-title">Новый платеж</h4>
            <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                    <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                            <router-link class="nav-link" to="/bills/list">
                                <i class="material-icons">view_list</i> Список
                            </router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form @submit.prevent="create">
                <form-body :model="model" :rows="rows"></form-body>
            </form>
        </div>
    </div>
</template>

<script>
    import FormBody from './Form.vue';
    export default {
        data: function () {
            return {
                model: {
                    client_id: '',
                    contract_num: '',
                    sum: '',
                    remainder: '',
                    date: '',
                    contents: '',
                },
            }
        },
        methods: {
            create() {
                this.axios.post('/api/model', this.model).then(response => {
                    this.$router.push({name: 'billsList'});
                });
            }
        },
        components: { FormBody },
    }
</script>
