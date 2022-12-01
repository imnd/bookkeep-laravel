<template>
    <div class="pagination">
        <button class="btn" @click="$emit('prevPage')">&lt;</button>&nbsp;
        <button class="btn" @click="$emit('nextPage')">&gt;</button>
        <span> страница {{ pageNumber + 1 }}. всего: {{ pageCount }} страниц</span>
    </div>
</template>

<script>
    export default {
        props: {
            pageNumber: {
                type: Number,
                required: true,
            },
            pageCount: {
                type: Number,
                required: true,
            },
        },
    }
</script>

<style scoped>
    .pagination {
        clear: both
    }
</style>
