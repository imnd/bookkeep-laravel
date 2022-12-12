<template>
    <control :label="label" :name="name" :css-class="cssClass">
        <input
            :value="modelValue"
            @input="emit('update:modelValue', $event.target.value)"
            class="form-control"
            :class="required ? 'required' : ''"
            type="text"
        />
    </control>
</template>

<script setup>
import Control from "./Control";

const props = defineProps({
    modelValue: [String, Number],
    name: {
        type: String,
        required: false,
    },
    label: {
        type: String,
        required: false,
    },
    required: {
        type: Boolean,
        required: false,
        default: false,
    },
    cssClass: {
        type: String,
        required: false,
        default: "col-md-4",
    },
})
const emit = defineEmits(["update:modelValue"])
</script>

<script>
export default {
    name: "input-control",
}
</script>
