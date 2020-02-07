<template>
  <v-col cols="12" lg="7" xl="8">
    <v-card v-if="! loaded" class="pa-2" outlined raised tile>
      <v-progress-linear indeterminate color="teal"></v-progress-linear>
      <v-card-title>Attendance Overview</v-card-title>
      <v-divider></v-divider>
      <v-skeleton-loader type="list-item-avatar, list-item-three-line, card-heading, actions"></v-skeleton-loader>
      <v-divider></v-divider>
      <v-card-actions>
        <v-btn text disabled>Loading...</v-btn>
      </v-card-actions>
    </v-card>
    <v-card v-if="loaded" class="pa-2" outlined raised tile>
      <v-card-title>Attendance Overview</v-card-title>
      <v-divider></v-divider>
      <attendance-weekly-chart v-if="loaded" :chartdata="chartdata" :options="options" />
      <v-divider></v-divider>
      <v-card-actions>
        <v-btn text small>Full Report</v-btn>
      </v-card-actions>
    </v-card>
  </v-col>
</template>
<script>
import axios from "axios";
import AttendanceWeeklyChart from "./AttendanceWeeklyChart.js";

export default {
  components: { AttendanceWeeklyChart },
  props: ["schoolname", "enddate"],
  watch: {
    enddate: function() {
      this.endpoint =
        "api/dev/attendanceweekly/" + this.schoolname + "/" + this.enddate;
      console.log(this.endpoint);
      this.callMe();
    }
  },
  data() {
    return {
      message: null,
      loaded: false,
      chartdata: null,
      options: {
        plugins: {
          datalabels: {
            display: false
          }
        },
        maintainAspectRatio: false,
        responsive: true,
        responsiveAnimationDuration: 1000,
        scales: {
          yAxes: [
            {
              ticks: {
                // beginAtZero: true,
                suggestedMin: 80,
                suggestedMax: 100
              }
            }
          ]
        }
        //     annotation: {
        //       annotations: [
        //         {
        //           drawTime: "afterDatasetsDraw",
        //           // id: "hline",
        //           type: "line",
        //           mode: "horizontal",
        //           scaleID: "y-axis-0",
        //           value: 95,
        //           borderColor: "red",
        //           borderWidth: 2,
        //           borderDash: [10, 10],
        //           label: {
        //             backgroundColor: "white",
        //             content: "Nat",
        //             enabled: false
        //           }
        //         }
        //       ]
        //     }
      },
      endpoint:
        "api/dev/attendanceweekly/" + this.schoolname + "/" + this.enddate
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
      axios
        .get(this.endpoint)
        .then(({ data }) => {
          this.weekly = data.data.map(weekly =>
            this.roundOff(weekly.pattendance, 1)
          );
          this.running = data.data.map(running =>
            this.roundOff(running.RunningPercent, 1)
          );
          this.weeks = data.data.map(weeks => "Wk " + weeks.wk); // show week number as x-axis label
          //   this.weeks = data.data.map(weeks => weeks.wkdate); // show week start date as x-axis label
        })
        .then(() => {
          this.barcolors = this.setbarcolors();
        })
        .then(() => {
          (this.chartdata = {
            labels: this.weeks,
            datasets: [
              {
                label: "Weekly Attendance",
                backgroundColor: this.barcolors,
                data: this.weekly
              },
              {
                label: "Overall Attendance",
                type: "line",
                fill: false,
                borderColor: "teal",
                lineTension: 0.1,
                data: this.running
              }
            ]
          }),
          this.loaded = true;
        });
    },
    roundOff(value, decimals) {
      return Number(Math.round(value + "e" + decimals) + "e-" + decimals);
    },
    callMe() {
      this.loaded = false;
      this.fetch();
    },
    setbarcolors() {
      var colors = [];
      for (let i = 0; i < this.weekly.length; i++) {
        if (this.weekly[i] < 90) {
          colors.push("rgba(220, 20, 60, 0.8)"); //red
        } else if (this.weekly[i] < 93) {
          colors.push("rgba(255, 140, 0, 0.8)"); //orange
        } else if (this.weekly[i] < 95) {
          colors.push("rgba(56,193,114,0.8)"); // light green
        } else {
          colors.push("rgba(72,193,56,0.8)"); // green
        }
      }
      // console.log(colors);
      return colors;
    }
  }
};
</script>
