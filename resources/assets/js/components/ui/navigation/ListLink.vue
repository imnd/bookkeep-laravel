<template>
    <li class="nav-item">
        <router-link :to="`/${entity}/list`" class="nav-link">
            <i class="material-icons">view_list</i> Список
        </router-link>
    </li>
</template>

<script>
export default {
    name: 'list-link',
    props: {
        entity: {
            type: String,
            required: true,
        },
    },
}
</script>

