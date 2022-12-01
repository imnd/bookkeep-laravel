import { mapMutations } from "vuex";

export default {
    methods: {
        updateValue($event) {
            let data = {};
            data[this.name] = $event.target.value
            this.updateModelValue(data)
        },
        getError: function (key) {
            if (this.errors[key] !== undefined) {
                return this.errors[key][0];
            }
        },
        ...mapMutations({
            updateModelValue: "CRUD/updateModelValue",
        }),
    },
    computed: {
        inputVal: {
            get() {
                return this.value;
            },
            set(val) {
                this.$emit('input', val);
            }
        },
    }
};
