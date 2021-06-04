<template>
    <div class="columns is-multiline">
        <div class="column is-half is-offset-one-quarter">
            <article class="panel">
                <div class="panel-heading">
                    <div class="level">
                        <div class="level-left">
                            <p class="level-item has-text-centered" v-text="this.spell.name"/>
                        </div>
                        <div class="level-right">
                            <p class="level-item has-text-centered">
                                <small>
                                    created on&nbsp;{{this.spell.created_at | moment('DD.MM.YYYY') }}
                                </small>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="panel-block markdown-body">
                    <div class="level">
                        <div class="level-left">
                            <p class="level-item has-text-centered">
                                Quote:
                            </p>
                        </div>
                        <div class="level-right">
                            <p class="level-item has-text-centered" v-text="this.spell.quote"/>
                        </div>
                    </div>

                    <div class="level">
                        <div class="level-left">
                            <p class="level-item has-text-centered">
                                Description:
                            </p>
                        </div>
                        <div class="level-right">
                            <p class="level-item has-text-centered" v-text="this.spell.description"/>
                        </div>
                    </div>
                </div>
                <div class="panel-button-push-inwards">
                    <a :href="'/spell/' + this.spell.slug + '/edit'">
                        <button type="submit" class="button is-large is-fullwidth is-primary is-outlined push-button-down">
                            Edit
                        </button>
                    </a>
                </div>
            </article>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SpellComponent",
        props: {
            currentSpell: {
                required: false,
                type: Object
            }
        },
        created() {
            this.spell = this.currentSpell;
        },
    }
</script>
