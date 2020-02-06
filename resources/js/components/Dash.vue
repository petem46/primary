<template>
  <div>
    <div v-if="! loaded"><i class="fas fa-spinner fa-spin fa-3x"></i>&nbsp;&nbsp; Loading...</div>
    <div v-if="loaded">
        <div class="">
            <v-container fluid>
                <v-row>
                    <div class="col-12">
                        <h1 class="display-3 mx-auto my-2">{{ schoolname }} Data Dashboard {{ formattedDate }} </h1>
                    </div>
                    <div class="col-3">
      <v-menu
        v-model="enddatemenu"
        :close-on-content-click="false"
        :nudge-right="40"
        transition="scale-transition"
        offset-y
        min-width="290px"
      >
                    <template v-slot:activator="{ on }">
                        <v-text-field readonly :value="formattedDate" label="End Date" prepend-icon="mdi-calendar-multiselect" v-on="on"></v-text-field>
                    </template>
                        <v-date-picker scrollable show-current v-model="enddate" @input="enddatemenu = false">>
                        </v-date-picker>
      </v-menu>
                    </div>
                </v-row>
                <v-row>
                    <number-on-roll-kpi-card :schoolname="this.schoolname" :enddate="this.enddate"></number-on-roll-kpi-card>
                    <percent-pp-kpi-card :schoolname="this.schoolname" :enddate="this.enddate"></percent-pp-kpi-card>
                    <attendance-kpi-card :schoolname="this.schoolname" :enddate="this.enddate"></attendance-kpi-card>
                    <percent-pa-kpi-card :schoolname="this.schoolname" :enddate="this.enddate"></percent-pa-kpi-card>
                </v-row>
                <v-row>
                    <cohort-summary :schoolname="this.schoolname" :enddate="this.enddate"></cohort-summary>
                    <year-group-summary :schoolname="this.schoolname" :enddate="this.enddate"></year-group-summary>
                    <starters-leavers-summary :schoolname="this.schoolname" :enddate="this.enddate"></starters-leavers-summary>
                </v-row>
                <v-row>
                    <attendance-overview :schoolname="this.schoolname" :enddate="this.enddate"></attendance-overview>
                    <attendance-pie :schoolname="this.schoolname" :enddate="this.enddate"></attendance-pie>
                </v-row>
                <v-row>
                    <at-risk-pa-overview :schoolname="this.schoolname" :enddate="this.enddate"></at-risk-pa-overview>
                </v-row>
            </v-container>

        </div>
    </div>
    </div>
</template>
<script>
    import axios from 'axios';
    import format from 'date-fns/format'
    // import subDays from 'date-fns/sub_days'
    import parseISO from 'date-fns/parseISO'
    export default {
        props: ['schoolname', 'end'],
        data() {
            return {
                message: null,
                enddatemenu: false,
                loaded: true,
                endpoint: 'api/dev',
                enddate: this.end,
            };
        },
        created() {
            // this.fetch();
        },
        mounted() {
            console.log('Dashboard Mounted.')
            console.log(this.schoolname)
            console.log(this.enddate)
            },
        methods: {
            fetch() {
                axios.get(this.endpoint)
                .then(({data}) => {
                    this.loaded = true;
                });
            },
            newDate() {
                console.log('New End Date has been set');
                this.loaded = false;
                this.fetch();
            }
        },
        computed: {
            formattedDate() {
                return this.enddate ? format(parseISO(this.enddate), 'iiii, do MMM yyyy') : ''
            }
        },
    }
</script>
