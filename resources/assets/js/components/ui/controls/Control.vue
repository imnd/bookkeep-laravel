<template>
    <div :class="cssClass">
        <label>{{ label }}:</label>
        <slot></slot>
        <div v-if="value" class="error">{{ getError(value) }}</div>
    </div>
</template>

<script>
import { mapGetters } from "vuex";
import controls from "./controls-mixin";

export default {
    name: 'control',
    mixins: [ controls ],
    props: {
        cssClass: {
            type: String,
            required: false,
            default: 'col-md-8',
        },
        label: {
            type: String,
            required: false,
        },
        value: {
            required: false,
        },
        required: {
            type: Boolean,
            required: false,
        },
    },
    computed: {
        ...mapGetters({
            errors: "CRUD/errors",
        }),
    },
}
</script>

