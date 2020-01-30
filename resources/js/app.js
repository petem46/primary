
require('./bootstrap');
require('./plugins/swal');
// require('./plugins/resume.min');
// require('jquery-easing')

// window.Vue = require('vue');

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)
// Vue.component('paginate', require('vuejs-paginate'));

import Vuetify from 'vuetify'
Vue.use(Vuetify)

Vue.component('app', require('./views/App.vue').default);

import App from './views/App'
import Home from './components/Home'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/dev',
            name: 'home',
            component: Home
        },
    ],
});


const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    components: { App },
    router,
});
