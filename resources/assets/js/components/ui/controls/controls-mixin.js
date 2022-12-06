import { mapGetters } from "vuex";

export default {
    methods: {
        updateValue($event) {
            this.$emit('update:modelValue', $event.target.value)
        },
        getError: function (key) {
            if (this.errors[key] !== undefined) {
                return this.errors[key][0];
            }
        },
    },
    computed: {
        ...mapGetters({
            errors:  "CRUD/errors",
        }),
    },
};
