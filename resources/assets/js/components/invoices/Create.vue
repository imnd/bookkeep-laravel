<template>
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="form-title">Новая фактура</h4>
            <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                    <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                            <router-link to="/invoices/list" class="nav-link">
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
                    number: '',
                    contract_num: '',
                    client_id: '',
                    date: '',
                    sum: '',
                    payed: 0
                },
            }
        },
        methods: {
            create() {
                this.axios
                    .post('/api/invoices', this.invoice)
                    .then(response => {
                        this.$router.push({name: 'invoicesList'});
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                    });
            }
        },
        components: { FormBody },
    }
</script>
