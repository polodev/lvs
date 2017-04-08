
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
 import {store} from './store.js'

Vue.component('example', require('./components/Example.vue'));
Vue.component('profile', require('./components/profiles/Profiles.vue'));
Vue.component('notification', require('./components/notifications/notification.vue'));
Vue.component('unread-notification', require('./components/notifications/unreadNotification.vue'));
Vue.component('post', require('./components/post/post.vue'));
Vue.component('feed', require('./components/post/feed.vue'));

const app = new Vue({
    el: '#app',
    store
});
