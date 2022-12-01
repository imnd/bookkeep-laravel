<template>
    <datepicker
        class="form-control"
        v-model="inputVal"
        :name="name"
        :format="format"
    />
</template>

<script>
import Datepicker from "@vuepic/vue-datepicker";
import controls from "./controls-mixin";

export default {
    name: 'datepicker-input',
    components: { Datepicker },
    mixins: [ controls ],
    props: {
        name: {
            type: String,
            required: true,
        },
        value: {
            type: String,
            required: false,
        },
    },
    setup() {
        const format = (date) => {
            const day = date.getDate();
            let month = (date.getMonth() + 1).toString().padStart(2, 0);
            const year = date.getFullYear();

            return `${day}.${month}.${year}`;
        }

        return {
            format,
        }
    },
}
</script>

