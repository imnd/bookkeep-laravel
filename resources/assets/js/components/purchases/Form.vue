<template>
    <div>
        <div class="row">
            <div class="col-md-4">
                <label>номер:</label>
                <input class="form-control" v-model="model.number">
            </div>
            <div class="col-md-4">
                <label>дата:</label>
                <input class="form-control" v-model="model.date">
            </div>
            <div class="col-md-4">
                <label>сумма:</label>
                <input class="form-control" v-model="model.sum">
            </div>
        </div>

        <div class="row">
            <button class="btn btn-primary btn-round">Сохранить</button>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                subcats: []
            }
        },
        props: {
            model: {
                type: Object,
                required: true,
            },
        },
        created() {
            this.axios.get(`/api/subcats/list`).then(response => {
                this.subcats = response.data.data;
            });
        },
    }
</script>
