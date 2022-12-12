<template>
    <Datepicker
        class="form-control"
        :name="name"
        v-model="date"
        @update:modelValue="update"
        :format="format"
    />
</template>

<script setup>
    import Datepicker from "@vuepic/vue-datepicker";
    import "@vuepic/vue-datepicker/dist/main.css"

    const props = defineProps({
        modelValue: String,
        name:       String,
    })

    const format = (date) => {
        if (date === null) {
            return "";
        }

        const day = date.getDate().toString().padStart(2, 0);
        let month = (date.getMonth() + 1).toString().padStart(2, 0);
        const year = date.getFullYear();

        return `${day}.${month}.${year}`;
    }

    import { ref, watch } from "vue"
    let date = ref("")
    watch(() => props.modelValue, (first, second) => {
        date.value = first
    });

    const emit = defineEmits(["update:modelValue"])
    const update = (date) => {
        emit("update:modelValue",  date.toISOString().slice(0, 10))
    }
</script>

<script>
export default {
    name: "datepicker-input",
}
</script>

