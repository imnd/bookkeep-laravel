<template>
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Новая закупка</h4>
            <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                    <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                            <router-link to="/purchases/list" class="nav-link">
                                <i class="material-icons">view_list</i> Список
                            </router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form @submit.prevent="create">
                <form-body :model="model" :errors="errors" />
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
                    name: '',
                    unit: '',
                    price: '',
                    active: '',
                },
            }
        },
        methods: {
            create() {
                this.axios
                    .post('/api/purchases', this.model)
                    .then(response => {
                        this.$router.push({name: 'purchasesList'});
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                    });
            }
        },
        components: { FormBody },
    }
</script>
