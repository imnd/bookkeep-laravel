<template>
    <control :label="label" :value="inputVal" :css-class="cssClass">
        <textarea
            :name="name"
            v-model="inputVal"
            class="form-control"
            :class="required ? 'required' : ''"
            type="text"
            :cols="cols" :rows="rows"
        />
    </control>
</template>

<script>
    import Control from "./Control";
    import controls from "./controls-mixin";

    export default {
        name: 'textarea-control',
        components: { Control },
        mixins: [ controls ],
        props: {
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
            label: {
                type: String,
                required: false,
            },
            name: {
                type: String,
                required: true,
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

