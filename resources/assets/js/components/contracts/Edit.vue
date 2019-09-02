<template>
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="form-title">Редактирование контракта</h4>
            <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                    <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                            <router-link class="nav-link" to="#" v-on:click="contractDelete()">
                                <i class="material-icons">delete</i> Удалить
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/contracts/list" class="nav-link">
                                <i class="material-icons">view_list</i> Список
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" v-bind:to="{name: 'contractsPrintout', params: { id: this.$route.params.id }}">
                                <i class="material-icons">print</i> Распечатать
                            </router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form @submit.prevent="update">
                <form-body :model="model" :rows="rows"></form-body>
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
            this.axios.get(`/api/contracts/${this.$route.params.id}`).then(response => {
                this.model = response.data.item;
                this.rows = response.data.rows;
            });
        },
        methods: {
            update() {
                this.axios.post(`/api/contracts/${this.$route.params.id}`, {
                    'model': this.model,
                    'rows': this.rows,
                }).then(response => {
                    this.$router.push({name: 'contractsList'});
                });
            }
        },
        components: { FormBody },
    }
</script>
