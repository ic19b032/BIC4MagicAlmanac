<template>
    <div class="table-container">
        <table class="table">
            <thead>
            <tr class="title is-7">
                <th>Name</th>
                <th>Kind</th>
                <th>Quote</th>
                <th>Created</th>
                <th>Modified</th>
                <th>Modify</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="kind in kinds" :key="kind.id">
                <td>
                    <a :href="'/kind/' + kind.slug"
                       :title="kind.name">
                        <i class="fa fa-comment"></i>&nbsp;{{ kind.name }}
                    </a>
                </td>
                <td>{{ kind.name }}</td>
                <td>{{ kind.description }}</td>
                <td>{{ kind.created_at | moment('DD.MM.YYYY') }}</td>
                <td>{{ kind.updated_at | moment('DD.MM.YYYY') }}</td>
                <td>
                    <p class="field is-grouped">
                        <a :href="'/kind/' + kind.slug + '/edit'" class="button is-info is-outlined is-small">
                            <span class="icon">
                                <font-awesome-icon icon="wrench"/>
                            </span>
                        </a>
                        <button @click="openDeleteModal(kind)"
                                class="button is-danger is-outlined is-small">
                            <span class="icon">
                                <font-awesome-icon icon="trash"/>
                            </span>
                        </button>
                    </p>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: "KindListComponent",
    props: {
        kinds: {
            required: true
        }
    },
    methods: {
        openDeleteModal(kind) {
            this.$emit('open-modal',
                {
                    id: kind.id,
                    title: kind.name,
                    content: 'Do you really want to delete this spell?',
                    url: '/kind/' + kind.slug
                });
        }
    }
}
</script>

<style scoped>

</style>
