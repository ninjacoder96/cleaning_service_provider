/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Swal from 'sweetalert2'
import VueMoment from 'vue-moment';
Vue.use(VueMoment);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


const toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: true,
    timer: 3000
  });
window.toast = toast;

Vue.component('messages-page', require('./pages/messages.vue').default);
Vue.component('notifications-page', require('./pages/notifications.vue').default);
Vue.component('cleaners-page', require('./pages/cleaners.vue').default);
Vue.component('service_providers-page', require('./pages/service_providers.vue').default);
Vue.component('cleaners-page', require('./pages/cleaners.vue').default);
Vue.component('schedules-page', require('./pages/schedules.vue').default);
Vue.component('services-page', require('./pages/services.vue').default);
Vue.component('service-page', require('./pages/service.vue').default);
Vue.component('pending_requests-page', require('./pages/pending_requests.vue').default);
Vue.component('service_provider_services-page', require('./pages/service_provider_services.vue').default);

Vue.component('client_service_provider-page', require('./pages/client_service_provider.vue').default);
Vue.component('client_booking-page', require('./pages/client_booking.vue').default);
Vue.component('cleaner_booking-page', require('./pages/cleaner_booking.vue').default);
Vue.component('profile-page', require('./pages/profile.vue').default);
Vue.component('manage_accounts-page', require('./pages/manage_accounts.vue').default);
Vue.component('change_password-page', require('./pages/change_password.vue').default);
Vue.component('notification-component', require('./pages/notification.vue').default);
Vue.component('notifications-page', require('./pages/notifications.vue').default);
Vue.component('message-component', require('./pages/message.vue').default);
Vue.component('service_provider_booking-page', require('./pages/service_provider_booking.vue').default);
Vue.component('clients-page', require('./pages/clients.vue').default);

Vue.component('admin_report-page', require('./pages/admin_report.vue').default);
Vue.component('service_provider_report-page', require('./pages/service_provider_report.vue').default);
Vue.component('cleaner_report-page', require('./pages/cleaner_report.vue').default);
Vue.component('client_report-page', require('./pages/client_report.vue').default);


Vue.component('admin-dashboard-page',require('./pages/admin_dashboard.vue').default);
Vue.component('service-provider-profile',require('./pages/service_provider_profile.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
