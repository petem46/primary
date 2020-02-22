
require('./bootstrap');
require('./plugins/swal');

import Vue from 'vue'
import Vuex from 'vuex'
import VueRouter from 'vue-router'

Vue.use(Vuex)
Vue.use(VueRouter)

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

import App from './views/App'
import Dash from './components/Dash'
import Assessment from './components/Assessment'
import Attendance from './components/Attendance'

const store = new Vuex.Store({

    state: {
        schoolname: 'Aspire',
        startdate: '2019-08-26',
        enddate: '2020-02-20',
    },
    mutations: {
        updateCore(state, sn, sd, ed) {
            state.schoolname = sn;
            state.startdate = sd;
            state.enddate = ed;
        },
        updateSchoolName(state, sn) {
            state.schoolname = sn;
        },
        updateStartDate(state, sd) {
            state.startdate = sd;
        },
        updateEndDate(state, ed) {
            state.enddate = ed;
        },
    },
    actions: {

    },
    getters: {
        getschoolname(state) {
            return state.schoolname;
        },
        getstartdate(state) {
            return state.startdate;
        },
        getenddate(state) {
            return state.enddate;
        },
    },
});

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/dev',
            name: 'dash',
            component: Dash,
        },
        {
            path: '/summary',
            name: 'Summary',
            component: Dash,
        },
        {
            path: '/assessment',
            name: 'Assessment',
            component: Assessment,
        },
        {
            path: '/attendance',
            name: 'Attendance',
            component: Attendance,
        },
    ],
});

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    components: {
        App,
        Dash,
        Assessment,
        Attendance,
    },
    router,
    store,
});
