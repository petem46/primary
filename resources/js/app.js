
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

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);

Vue.component('app', require('./views/App.vue').default);
Vue.component('number-on-roll-kpi-card', require('./components/KpiCards/NorKpiCard').default);
Vue.component('percent-pp-kpi-card', require('./components/KpiCards/PpKpiCard').default);
Vue.component('attendance-kpi-card', require('./components/KpiCards/AttendanceKpiCard').default);
Vue.component('percent-pa-kpi-card', require('./components/KpiCards/PaKpiCard').default);

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
