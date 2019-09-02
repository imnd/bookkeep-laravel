<template>
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="form-title">Новый контракт</h4>
            <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                    <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                            <router-link class="nav-link" to="/contracts/list">
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
                this.axios.post(`/api/contracts`, {
                    'model': this.contract,
                    'rows': this.rows,
                }).then(response => {
                    this.$router.push({name: 'contractsList'});
                });
            }
        },
        components: { FormBody },
    }
</script>
