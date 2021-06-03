<template>
    <div class="table-container">
        <table class="table">
            <thead>
            <tr class="title is-7">
                <th class="header-warp-override">Name</th>
                <th class="header-warp-override">Kind</th>
                <th class="header-warp-override">Quote</th>
                <th class="header-warp-override">Created</th>
                <th class="header-warp-override">Modified</th>
                <th class="header-warp-override">Modify</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="spell in spells" :key="spell.id">
                <td>
                    <a :href="'/spell/' + spell.slug"
                       :title="spell.name">
                        <i class="fa fa-comment"></i>&nbsp;{{ spell.name }}
                    </a>
                </td>
                <td>{{ spell.kind.name }}</td>
                <td>{{ spell.quote }}</td>
                <td>{{ spell.created_at | moment('DD.MM.YYYY') }}</td>
                <td>{{ spell.updated_at | moment('DD.MM.YYYY') }}</td>
                <td>
                    <p class="field is-grouped" id="modify-column-element">
                        <a :href="'/spell/' + spell.slug + '/edit'" class="button is-info is-outlined is-small">
                            <span class="icon">
                                <font-awesome-icon icon="wrench"/>
                            </span>
                        </a>
                        <button @click="openDeleteModal(spell)"
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
        name: "SpellListComponent",
        props: {
            spells: {
                required: true
            }
        },
        methods: {
            openDeleteModal(spell) {
                this.$emit('open-modal',
                    {
                        id: spell.id,
                        title: spell.name,
                        content: 'Do you really want to delete this spell?',
                        url: '/spell/' + spell.slug
                    });
            }
        }
    }
</script>
