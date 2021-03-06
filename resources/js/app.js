import Vue from 'vue'
import Vuex from 'vuex'
import VueRouter from 'vue-router'
import Vuetify from 'vuetify'
import VueFilterDateFormat from 'vue-filter-date-format'

Vue.use(Vuex)
Vue.use(VueRouter)
Vue.use(Vuetify)
Vue.use(VueFilterDateFormat)

require('./bootstrap');
require('./plugins/swal');

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
import Dash from './views/Dash'
import Summary from './views/Summary'
import Assessment from './views/Assessment'
import DCReports from './views/DCReports'
import Attendance from './views/Attendance'
import FCAT from './views/Dash'
import StudentList from './views/StudentList'
import Student from './views/Student'
import Behaviour from './views/Behaviour'
import Exclusions from './views/Exclusions'

const store = new Vuex.Store({

    state: {
        schoolname: null,
        startdate: '2019-08-26',
        enddate: null,
        studentid: null,
        whodis: [],
        whodisschool: null,
        whodisname: null,
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
        updateStudentid(state, id) {
            state.studentid = id;
        },
        setUser(state, user) {
          state.whodis = user;
        },
        setWhoDisSchool(state, school) {
          state.whodisschool = school;
        },
        setWhoDisName(state, name) {
          state.whodisname = name;
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
        getstudentid(state) {
            return state.studentid;
        },
        getwhodis(state) {
          return state.whodis;
        },
        getwhodisschool(state) {
          return state.whodisschool;
        },
        getwhodisname(state) {
          return state.whodisname;
        },
    },
});

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'dash',
            component: Summary,
        },
        {
            path: '/summary',
            name: 'Summary',
            component: Summary,
        },
        {
            path: '/assessment',
            name: 'Assessment',
            component: Assessment,
        },
        {
            path: '/dc-reports',
            name: 'DC_Reports',
            component: DCReports,
        },
        {
            path: '/attendance',
            name: 'Attendance',
            component: Attendance,
        },
        {
            path: '/students',
            name: 'Students',
            component: StudentList,
        },
        {
            path: '/student',
            name: 'Student',
            component: Student,
        },
        {
            path: '/behaviour',
            name: 'Behaviour',
            component: Behaviour,
        },
        {
            path: '/exclusions',
            name: 'Exclusions',
            component: Exclusions,
        },
        {
            path: '/summary',
            name: 'FCAT',
            component: FCAT,
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
