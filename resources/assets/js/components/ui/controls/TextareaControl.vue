<template>
    <control :label="label" :name="name" :css-class="cssClass">
        <textarea
            :name="name"
            :value="modelValue"
            @input="emit('update:modelValue', $event.target.value)"
            class="form-control"
            :class="required ? 'required' : ''"
            type="text"
            :cols="cols"
            :rows="rows"
        />
    </control>
</template>

<script setup>
    import Control from "./Control";

    const props = defineProps({
        name: {
            type: String,
            required: false,
        },
        modelValue: {
            type: [String, Number],
            required: true,
        },
        label: {
            type: String,
            required: false,
        },
        required: {
            type: Boolean,
            required: false,
        },
        cols: {
            type: Number,
            required: false,
            default: 30,
        },
        rows: {
            type: Number,
            required: false,
            default: 10,
        },
        cssClass: {
            type: String,
            required: false,
            default: 'control',
        },
    });
    const emit = defineEmits(["update:modelValue"])
</script>

<script>
    export default {
        name: 'textarea-control',
    }
</script>

