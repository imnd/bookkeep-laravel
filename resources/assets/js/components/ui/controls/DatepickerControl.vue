<template>
    <control :label="label" :name="name" :css-class="cssClass">
        <datepicker-input
            :name="name"
            v-model="date"
            @update:modelValue="emit('update:modelValue', $event)"
            class="form-control"
            :class="required ? 'required' : ''"
        />
    </control>
</template>

<script setup>
import Control from "./Control";
import DatepickerInput from "./DatepickerInput";

const props = defineProps({
    cssClass: {
        type: String,
        required: false,
        default: "col-md-4",
    },
    label: {
        type: String,
        required: false,
    },
    name: {
        type: String,
        required: false,
    },
    modelValue: {
        type: [String, Number],
        required: true,
    },
    required: {
        type: Boolean,
        required: false,
    },
})

import { ref, watch } from "vue"
let date = ref("")
watch(() => props.modelValue, (first, second) => {
    date.value = first
});

const emit = defineEmits(["update:modelValue"])
</script>

<script>
export default {
    name: "datepicker-control",
}
</script>