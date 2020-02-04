<template>
    <v-col cols="6" md="3">
        <v-card class="pa-2" outlined raised tile>
            <v-row>
                <v-col cols="4" class="py-0">
                <v-icon size="50" color="orange">mdi-calendar-multiselect</v-icon>
                </v-col>
            <v-col cols="8" class="text-right py-0">
                <div class="overline">% present</div>
                <h3 v-if="! loaded" class="pa-0 text-right display-1"><i class="fas fa-spinner fa-spin"></i></h3>
                <h3 v-if="loaded" class="pa-0 text-right display-1">
                    {{ roundOff(ppresent,2) }}
                </h3>
            </v-col>
            <v-col cols="12" class="py-0">
                <hr class="ma-1 grey--text text--lighten-4">
                <div class="text-right orange--text"><small>Whole School Attendance</small></div>
            </v-col>
            </v-row>
        </v-card>
    </v-col>
</template>
<script>
    import axios from 'axios';
    export default {
        props: ['percentpresent'],
        data() {
            return {
                message: null,
                loaded: false,
                school: null,
                endpoint: 'api/dev/attendancekpi',
                ppresent: this.percentpresent,
            };
        },
        created() {
            this.fetch();
        },
        mounted() {
            console.log('Attendance KPI Mounted.')
        },
        methods: {
            fetch() {
                axios.get(this.endpoint)
                .then(({data}) => {
                    this.ppresent = data.data[0].ppresent;
                    // setTimeout(() => this.loaded = true, 1500);
                    this.loaded = true;
                });
            },
            roundOff(value, decimals) {
                return Number(Math.round(value+'e'+decimals)+'e-'+decimals);
            },
        },
    }

</script>
