<template>
    <control :label="label" :value="inputVal" :css-class="cssClass">
        <input
            :name="name"
            v-model="inputVal"
            class="form-control"
            :class="required ? 'required' : ''"
            type="text"
            @change="updateValue($event)"
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
        name: {
            type: String,
            required: true,
        },
        value: {
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

