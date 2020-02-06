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
                    <v-menu>
                    <template v-slot:activator="{ on }">
                        <v-text-field :value="formattedDate" label="End Date" prepend-icon="mdi-calendar-multiselect" v-on="on"></v-text-field>
                    </template>
                        <v-date-picker v-model="enddate"></v-date-picker>
                    </v-menu>
                    </div>


                </v-row>
                <v-row>
                    <number-on-roll-kpi-card :schoolname="this.schoolname"></number-on-roll-kpi-card>
                    <percent-pp-kpi-card :schoolname="this.schoolname"></percent-pp-kpi-card>
                    <attendance-kpi-card :schoolname="this.schoolname"></attendance-kpi-card>
                    <percent-pa-kpi-card :schoolname="this.schoolname"></percent-pa-kpi-card>
                </v-row>
                <v-row>
                    <cohort-summary :schoolname="this.schoolname"></cohort-summary>
                    <year-group-summary :schoolname="this.schoolname"></year-group-summary>
                    <starters-leavers-summary :schoolname="this.schoolname"></starters-leavers-summary>
                </v-row>
                <v-row>
                    <attendance-overview :schoolname="this.schoolname"></attendance-overview>
                    <attendance-pie :schoolname="this.schoolname"></attendance-pie>
                </v-row>
                <v-row>
                    <at-risk-pa-overview :schoolname="this.schoolname"></at-risk-pa-overview>
                </v-row>
            </v-container>

        </div>
    </div>
    </div>
</template>
<script>
    import axios from 'axios';
    import format from 'date-fns/format'
    import parseISO from 'date-fns/parseISO'
    export default {
        props: ['schoolname', 'enddate1'],
        data() {
            return {
                message: null,
                loaded: true,
                endpoint: 'api/dev',
                // schoolname: this.schoolname,
                enddate: null,
            };
        },
        created() {
            // this.fetch();
        },
        mounted() {
            console.log('Dashboard Mounted.')
            console.log(this.schoolname)
            },
        methods: {
            fetch(schoolname) {
                axios.get(this.endpoint)
                .then(({data}) => {
                    this.loaded = true;
                });
            }
        },
        computed: {
            formattedDate() {
                return this.enddate ? format(parseISO(this.enddate), 'do MMM yyyy') : ''
            }
        },
    }
</script>
