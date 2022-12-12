import { defineEmits } from 'vue';

export default {
    updateValue: ($event) => {
        const emit = defineEmits(["update:modelValue"])
        emit('update:modelValue', $event.target.value)
    },
};
