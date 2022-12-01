export default {
    methods: {
        rowDelete(index) {
            this.rows.splice(index, 1);
        },
        rowAdd() {
            this.rows.push(app.util.extend({}, this.row));
        },
    },
    /*computed: {
        total() {
            return this.rows.reduce(function (sum, item) {
                return sum + item.price * item.quantity;
            }, 0)
        }
    },*/
};
