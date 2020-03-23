<template>
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="form-title">Редактирование фактуры</h4>
            <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                    <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                            <router-link class="nav-link" to="#" v-on:click="invoiceDelete()">
                                <i class="material-icons">delete</i> Удалить
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/invoices/list" class="nav-link">
                                <i class="material-icons">view_list</i> Список
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" v-bind:to="{name: 'modelsPrintoutBill', params: { id: this.$route.params.id }}">
                                <i class="material-icons">print</i> Печать фактуры
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" v-bind:to="{name: 'modelsPrintoutInvoice', params: { id: this.$route.params.id }}">
                                <i class="material-icons">print</i> Печать накладной
                            </router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form @submit.prevent="update">
                <form-body :model="model" :rows="rows" :errors="errors" />
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
                rows: [],
            }
        },
        created() {
            this.axios.get(`/api/invoices/${this.$route.params.id}`).then(response => {
                this.model = response.data.item;
                this.rows = response.data.rows;
            });
        },
        methods: {
            update() {
                this.axios.post(`/api/invoices/${this.$route.params.id}`, {
                    model: this.model,
                    rows: this.rows,
                }).then(response => {
                    this.$router.push({name: 'invoicesList'});
                });
            }
        },
        components: { FormBody },
    }
</script>
