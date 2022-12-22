<template>
    <div class="row col-md-4">
        <button type="submit" class="btn btn-primary btn-round">Сохранить</button>
    </div>
    <div class="green font-weight-bold pt-3">
        {{ message }}
    </div>
</template>

<script lang="ts">
import { mapGetters } from "vuex";

export default {
    name: 'form-footer',
    computed: {
        ...mapGetters({
            message: "CRUD/message",
        }),
    },
};
</script>
