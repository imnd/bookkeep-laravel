<template>
    <div class="nav-tabs-navigation">
        <div class="nav-tabs-wrapper">
            <ul class="nav nav-tabs" data-tabs="tabs">
                <list-link v-if="is('list')" :entity="entity" />
                <delete-link v-if="is('delete')" :entity="entity" @delete="$emit('delete')" />
            </ul>
        </div>
    </div>
</template>

<script>
import { mapActions } from "vuex";
import ListLink from "./ListLink";
import DeleteLink from "./DeleteLink";

export default {
    components: { ListLink, DeleteLink },
    name: 'navigation',
    props: {
        links: {
            type: Array,
            required: true,
            default: [],
        },
        entity: {
            type: String,
            required: true,
        },
    },
    methods: {
        is: function (key) {
            return this.links.includes(key)
        },
        ...mapActions({
            deleteModel: "CRUD/deleteModel",
        }),
    }
}
</script>

