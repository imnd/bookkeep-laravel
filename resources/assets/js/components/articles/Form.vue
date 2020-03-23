<template>
    <div>
        <div class="row">
            <div class="col-md-8">
                <label>Подкатегория:</label>
                <select class="form-control col-md-10" v-model="article.subcat_id">
                    <option v-for="subcat in subcats" v-bind:value="subcat.id">{{ subcat.name }}</option>
                </select>
                <div class="error">{{ getError('subcat_id') }}</div>
            </div>
            <div class="col-md-4">
                <label>Название:</label>
                <input class="form-control" v-model="article.name">
                <div class="error">{{ getError('name') }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label>Ед. изм.:</label>
                <input class="form-control" v-model="article.unit">
                <div class="error">{{ getError('unit') }}</div>
            </div>
            <div class="col-md-4">
                <label>Цена:</label>
                <input class="form-control" v-model="article.price">
                <div class="error">{{ getError('price') }}</div>
            </div>
            <div class="col-md-4">
                <label>Активный:</label>
                <input class="form-control" v-model="article.active">
                <div class="error">{{ getError('active') }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <button class="btn btn-primary btn-round">Сохранить</button>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: {
            model: {
                type: Object,
                required: true,
            },
            errors: {
                type: Object,
                required: true,
            },
        },
        data() {
            return {
                subcats: []
            }
        },
        created() {
            this.axios.get(`/api/article-subcats`).then(response => {
                this.subcats = response.data.data;
            });
        },
        methods: {
            getError(key) {
                if (this.errors[key]!==undefined) {
                    return this.errors[key][0];
                }
            }
        },
    }
</script>

<style scoped>
    .error {
        color: red;
        clear: both;
    }
</style>