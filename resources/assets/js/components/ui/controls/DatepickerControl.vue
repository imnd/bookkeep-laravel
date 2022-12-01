<template>
    <control :label="label" :value="inputVal" :css-class="cssClass">
        <datepicker-input
            class="form-control"
            :class="required ? 'required' : ''"
            v-model="inputVal"
            :name="name"
            @change="updateValue($event)"
        />
    </control>
</template>

<script>
import Control from "./Control";
import DatepickerInput from "./DatepickerInput";
import controls from "./controls-mixin";

export default {
    name: 'datepicker-control',
    components: { Control, DatepickerInput },
    mixins: [ controls ],
    props: {
        cssClass: {
            type: String,
            required: false,
            default: 'col-md-4',
        },
        label: {
            type: String,
            required: false,
        },
        name: {
            type: String,
            required: false,
        },
        value: {
            required: false,
        },
        required: {
            type: Boolean,
            required: false,
        },
    },
}
</script>

