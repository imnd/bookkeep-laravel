<template>
    <div :class="cssClass">
        <label>{{ label }}:</label>
        <slot></slot>
        <div v-if="name" class="error">{{ getError(name) }}</div>
    </div>
</template>

<script>
import { useStore } from "vuex"
import { computed } from "vue"

export default {
    name: "control",
    props: {
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
    },
    setup(props) {
        return {
            getError: (key) => {
                const store = useStore("CRUD")
                const errors = computed(() => store.getters.errors)
                if (errors[key] !== undefined) {
                    return errors[key][0];
                }
            }
        };
    }
};
</script>
