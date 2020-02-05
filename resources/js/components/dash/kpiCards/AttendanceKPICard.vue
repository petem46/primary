<template>
    <v-col cols="6" md="3">
        <v-card class="pa-2" outlined raised tile>
            <v-row>
                <v-col cols="4" class="py-0">
                <v-icon size="50" color="orange">mdi-calendar-multiselect</v-icon>
                </v-col>
            <v-col cols="8" class="text-right py-0">
                <div class="overline">% present</div>
                <v-progress-circular v-if="! loaded" indeterminate color="orange"></v-progress-circular>
                <h3 v-if="loaded" class="pa-0 text-right display-1">
                    {{ roundOff(ppresent,2) }}
                </h3>
            </v-col>
            <v-col cols="12" class="py-0">
                <v-divider></v-divider>
                <div class="text-right orange--text"><small>Whole School Attendance</small></div>
            </v-col>
            </v-row>
        </v-card>
    </v-col>
</template>
<script>
    import axios from 'axios';
    export default {
        props: ['schoolname', 'percentpresent'],
        data() {
            return {
                message: null,
                loaded: false,
                school: null,
                endpoint: 'api/dev/attendancekpi/' + this.schoolname,
                school: this.schoolname,
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
                    setTimeout(() => this.loaded = true, Math.floor(Math.random() * 1500) + 750);
                    // this.loaded = true;
                });
            },
            roundOff(value, decimals) {
                return Number(Math.round(value+'e'+decimals)+'e-'+decimals);
            },
        },
    }

</script>
