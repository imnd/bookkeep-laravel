<template>
    <div>
        <router-link to="/clients/create" class="button primary top">Создать</router-link>

        <h1>Клиенты</h1>

        <table>
            <thead>
                <tr>
                    <th>название</th>
                    <th>адрес</th>
                    <th>район</th>
                    <th>телефон</th>
                    <th>факс</th>
                    <th>контакт. лицо</th>
                    <th>должность конт. лица</th>
                    <th>расчетный счет</th>
                    <th>в банке</th>
                    <th>ИНН</th>
                    <th>КПП</th>
                    <th>БИК</th>
                    <th colspan=2>операции</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item, index in paginatedData">
                    <td>{{ item.name }}</td>
                    <td>{{ item.address }}</td>
                    <td>{{ item.region ? item.region.name : '' }}</td>
                    <td>{{ item.telephone }}</td>
                    <td>{{ item.fax }}</td>
                    <td>{{ item.contact_fio }}</td>
                    <td>{{ item.contact_post }}</td>
                    <td>{{ item.bank }}</td>
                    <td>{{ item.account }}</td>
                    <td>{{ item.INN }}</td>
                    <td>{{ item.KPP }}</td>
                    <td>{{ item.BIK }}</td>
                    <td><router-link :to="{name: 'clientEdit', params: { id: item.id }}" class="update">&nbsp;</router-link></td>
                    <td><a href="#" class="delete" @click.prevent="deleteItem(item.id, index)">&nbsp;</a></td>
                </tr>
            </tbody>
        </table>
        <!--<pagination v-bind:data="listData"></pagination>-->
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
            this.axios.get('/api/clients/list').then(response => {
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
                this.axios.delete(`/api/clients/delete/${id}`).then(response => {
                    this.listData.splice(index, 1);
                });
            },
            nextPage() {
                this.pageNumber++;
            },
            prevPage() {
                this.pageNumber--;
            },
        }
    }
</script>