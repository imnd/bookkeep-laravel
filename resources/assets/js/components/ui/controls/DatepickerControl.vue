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

<script lang="ts">
import Control from "./Control.vue";
import DatepickerInput from "./DatepickerInput.vue";
import { ref, watch, defineEmits } from "vue";

export default {
    name: "datepicker-control",
    components: { Control, DatepickerInput },
    props: {
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
    },
    setup(props: any) {
        let date = ref("")
        watch(() => props.modelValue, (first, second) => {
            date.value = first
        });

        return {
            date,
            emit: defineEmits(["update:modelValue"])
        };
    }
}
</script>