<template>
    <Datepicker
        class="form-control"
        :name="name"
        v-model="date"
        @update:modelValue="update"
        :format="format"
    />
</template>

<script lang="ts">
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
    setup(props: any) {
        const format = (date: Date | null): string => {
            if (date === null) {
                return "";
            }

            const day: string = date.getDate().toString().padStart(2, "0");
            const month: string = (date.getMonth() + 1).toString().padStart(2, "0");
            const year: number = date.getFullYear();

            return `${day}.${month}.${year}`;
        }

        let date = ref("")
        watch(() => props.modelValue, (first, second) => {
            date.value = first
        });

        const update = (date: Date): void => {
            const emit = defineEmits(["update:modelValue"])
            emit("update:modelValue",  date.toISOString().slice(0, 10))
        }

        return {
            format, date, update
        };
    }
}
</script>

