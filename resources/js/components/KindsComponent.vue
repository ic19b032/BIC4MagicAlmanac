<template>
    <div class="container">
        <div class="columns is-multiline">
            <div class="column is-four-fifths is-offset-1">
                <div class="box" v-if="!kinds.length">
                    <query-message :fail="true" :success="false" :message="'No kinds found'"
                                   v-if="!kinds.length"></query-message>
                </div>
                <div class="box custom-box" v-if="kinds.length"> <!-- BRAUCHT MAN für kinds.list, also die Liste!!  -->
                    <kind-list :kinds="search.length > 0 ? filteredKinds : kinds"
                                v-on:open-modal="setModal"></kind-list>
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

    data(){
        return{
            // 'quote' raus (da kinds Tabelle kein 'quote' hat); RS Fehler bei 'created_ar'
            fields: ['name', 'description', 'created_at', 'updated_at'],
            search: '',
            kinds: [],
            modalActive: false,
            modalTitle: '',
            modalContent: '',
            modalUrl: '',
            modalId: 0,
        }
    },

    methods:{
        toggleModal(info){
            this.modalActive = !this.modalActive;
            if(info.id !== 0){
                this.kinds = _.remove(this.kinds, blg => blg.id !== info.id);
                toast({
                    message: info.message,
                    type: 'is-warning',
                })
            }
        },

        setModal(data){
            this.modalId = data.id;
            this.modalTitle = data.title;
            this.modalContent = data.content;
            this.modalUrl = data.url;
            this.toggleModal({id: 0});
        }
    },

    props: {
        allKinds: {
            type: Array,
            required: true
        }
    },
    created() {
        this.kinds = this.allKinds;
    },
    computed: {
    }
}
</script>


