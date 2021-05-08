<template>
    <div class="container">
        <div class="columns is-multiline">
            <div class="column is-four-fifths is-offset-1">
                <success-box :message="successMessage" v-if="showSuccessMessage"></success-box>
                <div class="box custom-box" v-if="spells.length">
                    <spell-list :spells="spells" v-on:open-modal="setModal"></spell-list>
                </div>
                <error-box message="No spells found" v-if="!spells.length"></error-box>
            </div>
        </div>
        <delete-modal :title="modalTitle" :delete-url="modalUrl" :active="modalActive" :content="modalContent"
                      :entry-id="modalId" v-on:close-modal="toggleModal"></delete-modal>
    </div>
</template>

<script>
    export default {
        components: {
            ErrorBox,
            SuccessBox,
            DeleteModal
        },
        data() {
            return {
                spells: [],
                modalActive: false,
                modalTitle: '',
                modalContent: '',
                modalUrl: '',
                modalId: 0,
                successMessage: ''
            }
        },
        methods: {
            toggleModal(info) {
                this.modalActive = !this.modalActive;
                //#tricky
                if (info.id !== 0) {
                    this.spells = _.remove(this.spells, blg => blg.id !== info.id);
                    this.successMessage = info.message;
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
            showSuccessMessage() {
                return this.successMessage !== '';
            }
        }
    }
</script>
