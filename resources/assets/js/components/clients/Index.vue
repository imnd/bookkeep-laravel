<template>
    <div>
      <h1>Клиенты</h1>
        <br />
        <table class="table table-hover">
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
                    <td><router-link :to="{name: 'edit', params: { id: client.id }}" class="btn btn-primary">Редактировать</router-link></td>
                    <td><button class="btn btn-danger">Удалить</button></td>
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
            let uri = '/api/clients/list';
            this.axios.get(uri).then(response => {
                this.clients = response.data.data;
            });
        },
        deletePost(id)
        {
            let uri = `http://vuelaravelcrud.test/api/сlient/delete/${id}`;
            this.axios.delete(uri).then(response => {
                this.сlients.splice(this.сlients.indexOf(id), 1);
            });
        }
    }
</script>