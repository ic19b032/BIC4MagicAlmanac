/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

import vue from 'vue';

/** Funny way to import icon components */
import {library} from '@fortawesome/fontawesome-svg-core';
import {faWrench, faTrash} from '@fortawesome/free-solid-svg-icons';
import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome';

library.add(faWrench, faTrash);

import {toast, setDefaults} from 'bulma-toast'

window.Vue = vue;

setDefaults({position: 'top-center', animate: {in: 'fadeIn', out: 'fadeOut'}});

window.toast = toast;

Vue.use(require('vue-moment'));

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
Vue.component('font-awesome-icon', FontAwesomeIcon);

Vue.component('dashboard', require('./components/DashboardComponent.vue').default);

Vue.component('spell', require('./components/SpellComponent.vue').default);
Vue.component('spells', require('./components/SpellsComponent.vue').default);
Vue.component('spell-form', require('./components/SpellFormComponent.vue').default);
Vue.component('spell-list', require('./components/SpellListComponent.vue').default);

Vue.component('kind', require('./components/KindComponent.vue').default);
Vue.component('kinds', require('./components/KindsComponent.vue').default);
Vue.component('kind-form', require('./components/KindFormComponent.vue').default);
Vue.component('kind-list', require('./components/KindListComponent.vue').default);

Vue.component('query-message', require('./components/base/QueryMessageComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
