<template>
    <div>
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
                            <component :is="`search-form-${entity}`" />
                            <div class="pagination">
                                <span> страница {{ pageNumber + 1 }}. всего: {{ pageCount }} страниц</span>
                            </div>
                            <input type="submit" class="btn btn-primary pull-right" value="Поиск">
                        </form>
                        <!-- список -->
                        <table @click.prevent="deleteItem" class="table">
                            <thead @click.prevent="listSort" class="text-primary">
                                <component :is="'grid-head-' + entity"/>
                            </thead>
                            <component :is="'grid-body-' + entity" :listData="paginatedData"/>
                        </table>
                        <div class="pagination">
                            <button class="btn" @click="prevPage"><</button>&nbsp;
                            <button class="btn" @click="nextPage">></button>
                            <span> страница {{ pageNumber + 1 }}. всего: {{ pageCount }} страниц</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
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
                paginatedData: [],
                pageNumber: 0,
                orders: {},
                listUrl: '',
            }
        },
        created() {
            this.listUrl = `/api/${this.entity}`;
            this.axios.get(this.listUrl).then(response => {
                this.listData = response.data.data;
                this.setPaginatedData();
            });
        },
        computed: {
            pageCount() {
                return Math.ceil(this.listData.length / this.pageSize);
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
                    this.setPaginatedData();
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
                    this.setPaginatedData();
                });
            },
            deleteItem(event) {
                let id = event.target.getAttribute('data-item-id');
                if (isNaN(parseFloat(id)) || !isFinite(id)) {
                    return;
                }
                let index = event.target.getAttribute('data-item-index');
                this.axios.delete(`/api/${this.entity}/${id}`).then(response => {
                    this.paginatedData.splice(index, 1);
                });
            },
            setPaginatedData() {
                const start = this.pageNumber * this.pageSize,
                    end = start + parseInt(this.pageSize);

                this.paginatedData = this.listData.slice(start, end);
            },
            nextPage() {
                this.pageNumber++;
                this.setPaginatedData();
            },
            prevPage() {
                this.pageNumber--;
                this.setPaginatedData();
            },
        }
    }
</script>
