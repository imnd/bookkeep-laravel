<template>
    <div :class="cssClass">
        <label>{{ label }}:</label>
        <slot />
        <div v-if="name" class="error">{{ getError(name) }}</div>
    </div>
</template>

<script lang="ts">
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
    setup(props: any) {
        return {
            getError: (key: string) => {
                const store = useStore("CRUD")
                const errors: any = computed(() => store.getters.errors)
                if (errors[key] !== undefined) {
                    return errors[key][0];
                }
            }
        };
    }
};
</script>
