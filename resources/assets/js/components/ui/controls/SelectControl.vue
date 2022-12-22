<template>
    <control :label="label" :name="name" :css-class="cssClass">
        <select
            class="form-control"
            :class="required ? 'required' : ''"
            :value="modelValue"
            @input="updateModelValue"
        >
            <option v-for="(option, key) in options" :value="option.id ?? key">
                {{ option.name ?? option }}
            </option>
        </select>
    </control>
</template>

<script lang="ts">
import Control from "./Control.vue";
import updateModelValue from "./events";

export default {
    name: "select-control",
    components: { Control },
    props: {
        name: {
            type: String,
            required: false,
        },
        modelValue: {
            type: [String, Number],
            required: true,
        },
        cssClass: {
            type: String,
            required: false,
            default: 'col-md-4',
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
        options: {
            type: Array,
            required: true,
        },
    },
    setup(props: any) {
        return { updateModelValue };
    }
}
</script>
