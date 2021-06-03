<template>
    <div class="container">
        <div class="columns is-multiline">
            <div class="card blog-card column is-half is-offset-one-quarter">
                <header class="card-header">
                    <h1 class="card-header-title is-centered">
                        {{edit ? form.name : 'New kind'}}
                    </h1>
                </header>
                <div class="card-content">
                    <div class="content">
                        <form @submit.prevent="submit">
                            <div class="field" v-if="!edit">
                                <label class="label" for="name">Name</label>
                                <div class="control">
                                    <input id="name"
                                           v-model="form.name"
                                           class="input"
                                           v-bind:class="{ 'is-danger': form.errors.has('name')}"
                                           type="text" autofocus>
                                </div>
                                <p class="help is-danger" v-if="form.errors.has('name')">
                                    {{form.errors.get('name')}}
                                </p>
                            </div>

<!--                            <div class="field">-->
<!--                                <label class="label" for="kind">Kind</label>-->
<!--                                <div class="control">-->
<!--                                    <div class="select is-fullwidth" :class="loading ? 'is-loading' : ''">-->
<!--                                        <select id="kind" :disabled="loading" v-model="form.kind_id">-->
<!--                                            <option v-if="loading" :value="this.form.kind_id"> Loading...</option>-->
<!--                                            <option v-for="cat in categories" v-if="!loading" :value="cat.id">-->
<!--                                                {{cat.name}}-->
<!--                                            </option>-->
<!--                                        </select>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <p class="help is-danger" v-if="form.errors.has('kind_id')">-->
<!--                                    {{form.errors.get('kind_id')}}-->
<!--                                <p v-if="noCategories" class="help is-warning">Add a kind to create spells!</p>-->
<!--                            </div>-->

<!--                            <div class="field">-->
<!--                                <label class="label" for="quote">Quote</label>-->
<!--                                <div class="control">-->
<!--                                    <input id="quote" v-model="form.quote" class="input" maxlength="120"/>-->
<!--                                </div>-->
<!--                                <p class="help is-danger" v-if="form.errors.has('quote')">-->
<!--                                    {{form.errors.get('quote')}}-->
<!--                                </p>-->
<!--                            </div>-->


                            <div class="field">
                                <label class="label" for="description">Description</label>
                                <div class="control">
                                    <textarea id="description" v-model="form.description" class="textarea"></textarea>
                                </div>
                                <p class="help is-danger" v-if="form.errors.has('description')">
                                    {{form.errors.get('description')}}
                                </p>
                            </div>

                            <button type="submit" class="button is-large is-primary is-outlined is-fullwidth"
                                    :disabled="loading">
                                {{edit ? 'Save' : 'wasd'}}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
let form = new Form({
    'id': '',
    'name': '',
    // 'quote': '',
    'description': ''
    // 'kind_id': '',
    // 'noReset': ['kind_id']
});

export default {
    name: "KindFormComponent",
    components: {
        QueryMessage
    },
    props: {
        isEditable: {
            required: false,
            type: Boolean,
            default: false
        },
        currentKind: {
            required: false,
            type: Object
        }
    },
    data() {
        return {
            edit: undefined,
            form: form,
            url: '',
            categories: [],
            noCategories: false
        }
    },
    methods: {
        submit() {
            if (this.edit)
                this.form
                    .put(this.url);
            else
                this.form
                    .post(this.url)
                    .then((response) => {
                        this.url = '/kind/' + response.slug;

                        this.form.id = response.id;
                        this.form.name = response.name;
                        // this.form.quote = response.quote;
                        this.form.description = response.description;
                        // this.form.kind_id = response.kind_id;

                        // this.form.noReset = ['id', 'name', 'quote', 'description', 'kind_id'];
                        this.form.noReset = ['id', 'name', 'description'];

                        this.edit = true;

                        window.history.pushState("", "", this.url);
                    });
        }
    },
    created() {
        axios.get('/list/spell')
            .then(response => {
                this.categories = response.data;

                if (this.loading)
                    this.noCategories = true;
            });

        this.edit = this.isEditable;

        if (this.edit) {
            this.url = '/kind/' + this.currentKind.slug;
            this.form.id = this.currentKind.id;
            this.form.name = this.currentKind.name;
            // this.form.quote = this.currentKind.quote;
            this.form.description = this.currentKind.description;
            // this.form.kind_id = this.currentKind.kind_id;

            // this.form.noReset = ['id', 'name', 'quote', 'description', 'kind_id'];
            this.form.noReset = ['id', 'name', 'description'];
        } else {
            this.url = '/kind';
        }
    },

    computed: {
        loading() {
            return !this.categories.length
        }
    },

    watch: {
        categories() {
            // if (!this.loading && this.form.kind_id === '') {
            // if (!this.loading) {
                // this.form.kind_id = _.first(this.categories).id;
            }
        }
    }


// }
</script>

<style scoped>

</style>
