<template>
    <Datepicker
        class="form-control"
        :name="name"
        v-model="date"
        @update:modelValue="update"
        :format="format"
    />
</template>

<script>
import Datepicker from "@vuepic/vue-datepicker";
import "@vuepic/vue-datepicker/dist/main.css"
import { ref, watch } from "vue"

export default {
    name: "datepicker-input",
    components: { Datepicker },
    props: {
        name: {
            type: String,
            required: false,
        },
        modelValue: {
            type: [ String, Number ],
            required: true,
        },
    },
    setup(props) {
        const format = (date) => {
            if (date === null) {
                return "";
            }

            const day = date.getDate().toString().padStart(2, 0);
            const month = (date.getMonth() + 1).toString().padStart(2, 0);
            const year = date.getFullYear();

            return `${day}.${month}.${year}`;
        }

        let date = ref("")
        watch(() => props.modelValue, (first, second) => {
            date.value = first
        });

        const update = (date) => {
            const emit = defineEmits(["update:modelValue"])
            emit("update:modelValue",  date.toISOString().slice(0, 10))
        }

        return {
            format, date, update
        };
    }
}
</script>

