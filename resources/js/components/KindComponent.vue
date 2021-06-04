<template>
    <div class="columns is-multiline">
        <div class="column is-half is-offset-one-quarter">
            <article class="panel">
                <div class="panel-heading">
                    <div class="level">
                        <div class="level-left">
                            <p class="level-item has-text-centered" v-text="this.kind.name"/>
                        </div>
                        <div class="level-right">
                            <p class="level-item has-text-centered">
                                <small>
                                    created on&nbsp;{{this.kind.created_at | moment('DD.MM.YYYY') }}
                                </small>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="panel-block markdown-body">
                    <div class="level">
                        <div class="level-left">
                            <p class="level-item has-text-centered">
                                Description:
                            </p>
                        </div>
                        <div class="level-right">
                            <p class="level-item has-text-centered" v-text="this.kind.description"/>
                        </div>
                    </div>
                </div>
                <div class="panel-button-push-inwards">
                    <a :href="'/kind/' + this.kind.slug + '/edit'">
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
    name: "KindComponent",
    props: {
        currentKind: {
            required: false,
            type: Object
        }
    },
    created() {
        this.kind = this.currentKind;
    },
}
</script>
