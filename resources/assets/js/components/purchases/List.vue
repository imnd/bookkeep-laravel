<template>
    <div>
        <router-link to="/purchases/create" class="button primary top">Создать</router-link>

        <h1>Закупки</h1>

        <table>
            <thead>
                <tr>
                    <th>номер</th>
                    <th>дата</th>
                    <th>сумма</th>
                    <th colspan=2>операции</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item, index in paginatedData">
                    <td>{{ item.number }}</td>
                    <td>{{ item.date }}</td>
                    <td>{{ item.sum }}</td>
                    <td><router-link :to="{name: 'purchaseEdit', params: { id: item.id }}" class="update">&nbsp;</router-link></td>
                    <td><a href="#" class="delete" @click.prevent="deleteItem(item.id, index)">&nbsp;</a></td>
                </tr>
            </tbody>
        </table>
        <!--<pagination v-bind:data="purchases"></pagination>-->
        <div>
            <button class="button nav" @click="prevPage"><</button>
            <button class="button nav" @click="nextPage">></button>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                listData: [],
                pageNumber: 0,
                pageSize: 50,
            }
        },
        created() {
            this.axios.get('/api/purchases/list').then(response => {
                this.listData = response.data.data;
            });
        },
        computed: {
            pageCount() {
                return Math.ceil(this.listData.length / this.pageSize);
            },
            paginatedData() {
                const start = this.pageNumber * this.pageSize,
                      end = start + this.pageSize;

                return this.listData.slice(start, end);
            }
        },
        methods: {
            deleteItem(id, index) {
                this.axios.delete(`/api/purchases/delete/${id}`).then(response => {
                    this.listData.splice(index, 1);
                });
            },
            nextPage() {
                this.pageNumber++;
            },
            prevPage() {
                this.pageNumber--;
            }
        }
    }
</script>