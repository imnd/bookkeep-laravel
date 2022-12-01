<template>
    <control :label="label" :value="inputVal" :css-class="cssClass">
        <select
            class="form-control"
            :class="required ? 'required' : ''"
            v-model="inputVal"
            @change="updateValue($event)"
        >
            <option v-for="(option, key) in options" :value="option.id ?? key">
                {{ option.name ?? option }}
            </option>
        </select>
    </control>
</template>

<script>
import Control from "./Control";
import controls from "./controls-mixin";

export default {
    name: 'select-control',
    components: { Control },
    mixins: [ controls ],
    props: {
        name: {
            type: String,
            required: true,
        },
        value: {
            required: false,
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
}
</script>

