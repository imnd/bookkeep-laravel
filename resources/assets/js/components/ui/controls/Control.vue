<template>
    <div :class="cssClass">
        <label>{{ label }}:</label>
        <slot></slot>
        <div v-if="name" class="error">{{ getError(name) }}</div>
    </div>
</template>

<script setup>
const props = defineProps({
    cssClass: {
        type: String,
        required: false,
        default: "col-md-8",
    },
    label: {
        type: String,
        required: false,
    },
    name: {
        type: String,
        required: false,
    },
});

import { useStore } from "vuex"
import { computed } from "vue"
const getError = (key) => {
    const store = useStore("CRUD")
    const errors = computed(() => store.getters.errors)
    if (errors[key] !== undefined) {
        return errors[key][0];
    }
};
</script>

<script>
export default {
    name: "control",
}
</script>
