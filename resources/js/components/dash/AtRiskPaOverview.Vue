<template>
    <div class="row mx-0">
        <v-col cols="12" lg="6">
            <v-card class="pa-2" outlined raised tile>
                <v-card-title>
                    % At Risk of Persistent Absence
                </v-card-title>
                <v-skeleton-loader
                    type="list-item-avatar, list-item-three-line, card-heading, actions"
                ></v-skeleton-loader>
            </v-card>
        </v-col>
        <v-col cols="12" lg="6">
            <v-card class="pa-2" outlined raised tile>
                <v-card-title>
                    % At Risk of Persistent Absence
                </v-card-title>
                <v-skeleton-loader
                    type="list-item-avatar, list-item-three-line, card-heading, actions"
                ></v-skeleton-loader>
            </v-card>
        </v-col>
    </div>
</template>
<script>
import axios from "axios";
export default {
  props: ['schoolname', 'enddate'],
  watch: {
      'enddate': function () {
          this.endpoint = 'api/dev/attendanceweekly/' + this.schoolname + '/' + this.enddate
          console.log(this.endpoint)
          this.callMe();
      },
  },
    data() {
        return {
            message: null,
            loaded: false,
            endpoint: 'api/dev/attendanceweekly/' + this.schoolname + '/' + this.enddate,
        };
    },
    created() {
        this.fetch();
    },
    mounted() {
        console.log("Attendance KPI Mounted.");
    },
    methods: {
        fetch() {
            axios.get(this.endpoint).then(({ data }) => {
                setTimeout(() => this.loaded = true, Math.floor(Math.random() * 1500) + 750);
                // this.loaded = true;
                console.log(data.data);
            });
        },
        roundOff(value, decimals) {
            return Number(Math.round(value + "e" + decimals) + "e-" + decimals);
        }
    }
};
</script>
