<template>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">{{ this.heading }}</h4>
                <router-link data-color="azure" :to="`/${entity}/create`" class="btn btn-primary btn-round pull-right">Создать</router-link>
                <div class="clearfix"></div>
                <p v-if="this.subheading" class="card-category">{{ this.subheading }}</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <!-- форма поиска -->
                    <form @submit.prevent="listUpdate" class="search-form">
                        <slot name="search-form" />
                        <input type="submit" class="btn btn-primary pull-right" value="Поиск">
                    </form>
                    <pagination
                        :pageNumber="pageNumber"
                        :pageCount="pageCount"
                        @prevPage="prevPage"
                        @nextPage="nextPage"
                    />
                    <!-- список -->
                    <table @click.prevent="deleteItem" class="table">
                        <thead @click.prevent="listSort" class="text-primary">
                            <tr>
                                <slot name="head" />
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in paginatedData">
                                <slot name="table-row" :item="item" :index="index" />
                            </tr>
                        </tbody>
                    </table>
                    <pagination
                        :pageNumber="pageNumber"
                        :pageCount="pageCount"
                        @prevPage="prevPage"
                        @nextPage="nextPage"
                    />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Pagination from './Pagination.vue'

    export default {
        components: { Pagination },
        name: 'grid',
        props: {
            heading: {
                type: String,
                required: true,
            },
            subheading: {
                type: String,
                required: false,
            },
            entity: {
                type: String,
                required: true,
            },
            pageSize: {
                type: String,
                required: false,
                default: 50,
                validator: function(value){
                    return value >= 0;
                }
            },
        },
        data: function () {
            return {
                listData: [],
                pageNumber: 0,
                orders: {},
                listUrl: '',
            }
        },
        created() {
            this.listUrl = `/api/${this.entity}`;
            this.axios.get(this.listUrl).then(response => {
                this.listData = response.data.data;
            });
        },
        computed: {
            pageCount() {
                return Math.ceil(this.listData.length / this.pageSize);
            },
            paginatedData() {
                return this.listData.slice(this.start, this.start + parseInt(this.pageSize));
            },
            start() {
                return this.pageNumber * this.pageSize;
            },
        },
        methods: {
            listUpdate(event) {
                let params = {};
                let formData = new FormData(event.target);
                formData.forEach(function (value, key) {
                    if (value!=='' && value!==undefined) {
                        params[key] = value;
                    }
                });
                this.axios.get(this.listUrl, {
                    params: params
                }).then(response => {
                    this.listData = response.data.data;
                });
            },
            listSort(event) {
                let field = event.target.getAttribute('data-sort');
                if (this.orders[field]===undefined || this.orders[field]==='desc') {
                    this.orders[field] = 'asc';
                } else {
                    this.orders[field] = 'desc';
                }
                this.axios.get(this.listUrl, {
                    params: {
                        order: this.orders[field],
                        field: field
                    }
                }).then(response => {
                    this.listData = response.data.data;
                });
            },
            deleteItem(event) {
                let id = event.target.getAttribute('data-item-id');
                if (isNaN(parseFloat(id)) || !isFinite(id)) {
                    return;
                }
                let index = event.target.getAttribute('data-item-index');
                this.axios.delete(`/api/${this.entity}/${id}`).then(response => {
                    this.listData.splice(this.start + parseInt(index), 1);
                });
            },
            nextPage() {
                if (this.pageNumber < this.pageCount) {
                    this.pageNumber++;
                }
            },
            prevPage() {
                if (this.pageNumber > 1) {
                    this.pageNumber--;
                }
            },
        },
    }
</script>
