import { defineEmits } from 'vue';

export default {
    updateModelValue: ($event: Event) => {
        const emit = defineEmits(["update:modelValue"])
        emit('update:modelValue', ($event.target as HTMLInputElement).value)
    }
}

