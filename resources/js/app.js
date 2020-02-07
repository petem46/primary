
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

// var Chart = require('chart.js');
// import Chart from 'chart.js'
// Vue.use(Chart)

// import VueGoogleCharts from 'vue-google-charts'
// Vue.use(VueGoogleCharts)

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
Vue.component('number-on-roll-kpi-card', require('./components/dash/kpiCards/NorKpiCard').default);
Vue.component('percent-pp-kpi-card', require('./components/dash/kpiCards/PpKpiCard').default);
Vue.component('attendance-kpi-card', require('./components/dash/kpiCards/AttendanceKpiCard').default);
Vue.component('percent-pa-kpi-card', require('./components/dash/kpiCards/PaKpiCard').default);
Vue.component('cohort-summary', require('./components/dash/CohortSummary').default);
Vue.component('year-group-summary', require('./components/dash/YearGroupSummary').default);
Vue.component('starters-leavers-summary', require('./components/dash/StartersLeaversSummary').default);
Vue.component('attendance-overview', require('./components/dash/AttendanceOverview').default);
Vue.component('attendance-pie', require('./components/dash/AttendancePie').default);
Vue.component('at-risk-pa-overview', require('./components/dash/AtRiskPaOverview').default);

import App from './views/App'
import Dash from './components/Dash'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/dev',
            name: 'dash',
            component: Dash,
            props: (route) => ({ schoolname: route.query.school, start: route.query.start, end: route.query.end }),
        },
    ],
});

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    components: { App },
    router,
});
