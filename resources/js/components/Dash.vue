<template>
  <div>
    <div v-if="! loaded"><i class="fas fa-spinner fa-spin fa-3x"></i>&nbsp;&nbsp; Loading...</div>
    <div v-if="loaded">
        <div class="">
            <v-container fluid>
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
    export default {
        data() {
            return {
                message: null,
                loaded: true,
                endpoint: 'api/dev',
                schoolname: 'Westcliff',
            };
        },
        created() {
            // this.fetch();
        },
        mounted() {
            console.log('Dashboard Mounted.')
            },
        methods: {
            fetch() {
                axios.get(this.endpoint)
                .then(({data}) => {
                    this.loaded = true;
                });
            }
        }
    }
</script>
