import { defineEmits } from 'vue';

export default {
    updateModelValue: ($event) => {
        const emit = defineEmits(["update:modelValue"])
        emit('update:modelValue', $event.target.value)
    }
}

