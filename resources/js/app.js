require('./bootstrap');
window.Vue = require('vue');
import router from './router';
import store from './store';

import Vuetify from 'vuetify';
Vue.use(Vuetify);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('main-app', require('./components/MainApp.vue').default);


const app = new Vue({
    el: '#app',
    //routes from vue-router
    router,
    store,
    vuetify: new Vuetify(),
});
