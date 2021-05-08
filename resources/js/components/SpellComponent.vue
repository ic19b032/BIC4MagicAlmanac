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
                <div class="panel-block markdown-body" v-text="this.spell.description"/>
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

<style scoped>
    .panel-block {
        display: block;
        background-color: #fff;
        padding: 16px;
    }
</style>
