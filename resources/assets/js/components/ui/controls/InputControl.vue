<template>
    <control :label="label" :name="name" :css-class="cssClass">
        <input
            :value="modelValue"
            @input="updateModelValue"
            class="form-control"
            :class="required ? 'required' : ''"
            type="text"
        />
    </control>
</template>

<script lang="ts">
import Control from "./Control.vue";
import updateModelValue from "./events";

export default {
    name: "input-control",
    components: { Control },
    props: {
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
    },
    setup(props: any) {
        return { updateModelValue };
    }
}
</script>
