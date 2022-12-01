<template>
    <li class="nav-item">
        <router-link class="nav-link" to="#" v-on:click="$emit('delete')">
            <i class="material-icons">delete</i> Удалить
        </router-link>
    </li>
</template>

<script>
export default {
    name: 'delete-link',
}
</script>

