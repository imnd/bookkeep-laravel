<template>
    <control :label="label" :name="name" :css-class="cssClass">
        <input
            :value="modelValue"
            @input="updateValue"
            class="form-control"
            :class="required ? 'required' : ''"
            type="text"
        />
    </control>
</template>

<script>
import Control from "./Control";
import controls from "./controls-mixin";

export default {
    name: 'input-control',
    components: { Control },
    mixins: [ controls ],
    props: {
        modelValue: {
            type: [String, Number],
            required: true,
        },
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
            default: 'col-md-4',
        },
    },
}
</script>

