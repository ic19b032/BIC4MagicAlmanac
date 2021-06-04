<template>
    <div class="table-container no-margin">
        <table class="table">
            <thead>
            <tr class="title is-7">
                <th class="header-warp-override">Name</th>
                <th class="header-warp-override">Description</th>
                <th class="header-warp-override">Created</th>
                <th class="header-warp-override">Modified</th>
                <th class="header-warp-override">Modify</th>
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
                <td>{{ kind.description }}</td>
                <td>{{ kind.created_at | moment('DD.MM.YYYY') }}</td>
                <td>{{ kind.updated_at | moment('DD.MM.YYYY') }}</td>
                <td>
                    <p class="field is-grouped" id="modify-column-element"> <!-- id="modify-column-element" notwendig, damit "bearbeiten" und "löschen" symbol schön nebeneinander -->
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
                    content: 'Do you really want to delete this kind?',
                    url: '/kind/' + kind.slug
                });
        }
    }
}
</script>

