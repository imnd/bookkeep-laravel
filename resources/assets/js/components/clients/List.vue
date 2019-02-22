<template>
    <div>
        <h1>Клиенты</h1>
        <router-link to="/clients/create" class="button primary">Создать</router-link>
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
                <tr v-for="client in clients" :key="client.id">
                    <td>{{ client.name }}</td>
                    <td>{{ client.address }}</td>
                    <td>{{ client.region_id }}</td>
                    <td>{{ client.telephone }}</td>
                    <td>{{ client.fax }}</td>
                    <td>{{ client.contact_fio }}</td>
                    <td>{{ client.contact_post }}</td>
                    <td>{{ client.bank }}</td>
                    <td>{{ client.account }}</td>
                    <td>{{ client.INN }}</td>
                    <td>{{ client.KPP }}</td>
                    <td>{{ client.BIK }}</td>
                    <td><router-link :to="{name: 'clientEdit', params: { id: client.id }}" class="update">&nbsp;</router-link></td>
                    <td><a class="delete" @click.prevent="deleteClient(client.id)">&nbsp;</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                clients: []
            }
        },
        created() {
            this.axios.get('/api/clients/list').then(response => {
                this.clients = response.data.data;
            });
        },
        methods: {
            deleteClient(id) {
                let uri = `/api/clients/delete/${id}`;
                this.axios.delete(uri).then(response => {
                    this.clients.splice(this.clients.indexOf(id), 1);
                });
            }
        }
    }
</script>