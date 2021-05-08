<template>
    <div class="container">
        <div class="columns is-multiline">
            <div class="column is-four-fifths is-offset-1">
                <div class="box" v-if="!spells.length">
                    <query-message :fail="true" :success="false" :message="'No spells found'"
                                   v-if="!spells.length"></query-message>
                </div>
                <div class="box custom-box" v-if="spells.length">
                    <input class="input is-primary" type="text" placeholder="Search spell..." id="filter"
                           v-model="search">
                    <spell-list :spells="search.length > 0 ? filteredSpells : spells"
                                v-on:open-modal="setModal"></spell-list>
                </div>
            </div>
        </div>
        <delete-modal :title="modalTitle" :delete-url="modalUrl" :active="modalActive" :content="modalContent"
                      :entry-id="modalId" v-on:close-modal="toggleModal"></delete-modal>
    </div>
</template>

<script>
    export default {
        components: {
            QueryMessage,
            DeleteModal
        },
        data() {
            return {
                fields: ['name', 'quote', 'description', 'created_at', 'updated_at'],
                search: '',
                spells: [],
                modalActive: false,
                modalTitle: '',
                modalContent: '',
                modalUrl: '',
                modalId: 0,
            }
        },
        methods: {
            toggleModal(info) {
                this.modalActive = !this.modalActive;
                //#tricky
                if (info.id !== 0) {
                    this.spells = _.remove(this.spells, blg => blg.id !== info.id);
                    toast({
                        message: info.message,
                        type: 'is-danger',
                    })
                }
            },
            setModal(data) {
                this.modalId = data.id;
                this.modalTitle = data.title;
                this.modalContent = data.content;
                this.modalUrl = data.url;
                this.toggleModal({id: 0});
            }
        },
        props: {
            allSpells: {
                type: Array,
                required: true
            }
        },
        created() {
            this.spells = this.allSpells;
        },
        computed: {
            filteredSpells() {
                const search = this.search.toLowerCase();
                return this.spells.filter((spells) => {
                    let filter = false;
                    this.fields.forEach(function (entry) {
                        if (spells[entry].toLowerCase().match(search)
                            || spells.kind.name.toLowerCase().match(search)
                            || spells.kind.description.toLowerCase().match(search)) {
                            filter = true;
                        }
                    });
                    return filter ? spells : false;
                });
            }
        }
    }
</script>
