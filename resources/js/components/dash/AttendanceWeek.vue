<template>
  <v-col cols="12" lg="5" xl="4">
    <v-card v-if="loaded" class="pa-2" outlined raised tile>
      <v-card-title>Attendance Week Detail</v-card-title>
      <v-card-text>
        <v-icon>mdi-calendar-multiselect</v-icon>&nbsp;&nbsp;
        Week {{ attendanceweek }} - Attendance: {{ attendanceforweek }} %
      </v-card-text>
      <v-divider></v-divider>
      <attendance-drill-down-chart v-if="loaded" :chartdata="chartdata" :options="options" :styles="myStyles" />
      <v-divider></v-divider>
      <v-card-actions>
        <v-btn text small>Full Report</v-btn>
      </v-card-actions>
    </v-card>
    <v-card v-if="! loaded" class="pa-2" outlined raised tile>
      <v-progress-linear indeterminate color="teal"></v-progress-linear>
      <v-card-title>Attendance Week Detail</v-card-title>
      <v-divider></v-divider>
      <v-skeleton-loader type="list-item-avatar, list-item-three-line, card-heading, actions"></v-skeleton-loader>
      <v-divider></v-divider>
      <v-card-actions>
        <v-btn text disabled>Loading...</v-btn>
      </v-card-actions>
    </v-card>
  </v-col>
</template>
<script>
import axios from "axios";
import AttendanceDrillDownChart from "./AttendanceDrillDownChart.js";
export default {
  components: { AttendanceDrillDownChart },
  props: ["schoolname", "enddate", "attendanceweek", "attendanceforweek"],
  watch: {
    attendanceweek: function() {
      this.loaded = false;
      this.endpoint =
        "api/dev/attendanceweek/" +
        this.schoolname +
        "/" +
        this.enddate +
        "/" +
        this.attendanceweek;
      this.fetch();
    }
  },
  data() {
    return {
      message: null,
      loaded: false,
      chartdata: null,
      endpoint:
        "api/dev/attendanceweek/" +
        this.schoolname +
        "/" +
        this.enddate +
        "/" +
        this.attendanceweek,
      options: {
        plugins: {
          datalabels: {
            // display: false
          }
        },
        tooltips: {
            // enabled: false
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
          ],
          xAxes: [{
            scaleLabel: {
                display: true,
                labelString: 'Year Group',
            }
          }]
        },
        annotation: {
            annotations: [{
            drawTime: "afterDatasetsDraw",
            // id: "hline",
            type: "line",
            mode: "horizontal",
            scaleID: "y-axis-0",
            value: 95,
            borderColor: "red",
            borderWidth: 2,
            borderDash: [10, 10],
            label: {
                backgroundColor: "white",
                content: "Nat",
                enabled: false,
            },
            }],
        },
      },
    };
  },
  created() {
    // this.fetch();
  },
  mounted() {
    console.log("Attendance Week Mounted.");
  },
  methods: {
    fetch() {
      axios
        .get(this.endpoint)
        .then(({ data }) => {
            // console.log(data.data);
          this.weekly = data.data.map(weekly =>
            this.roundOff(weekly.pattendance, 1)
          );
        //   this.running = data.data.map(running =>
        //     this.roundOff(running.RunningPercent, 1)
        //   );
          this.years = data.data.map(years => 'Y' + years.year); // show year group as x-axis label
        })
        .then(() => {
          this.barcolors = this.setbarcolors();
        })
        .then(() => {
          (this.chartdata = {
            labels: this.years,
            datasets: [
              {
                label: "Weekly Attendance",
                backgroundColor: this.barcolors,
                data: this.weekly
              },
            //   {
            //     label: "Overall Attendance",
            //     type: "line",
            //     fill: false,
            //     borderColor: "teal",
            //     lineTension: 0.1,
            //     data: this.running
            //   }
            ]
          }),
            (this.loaded = true);
        });
    },
    roundOff(value, decimals) {
      return Number(Math.round(value + "e" + decimals) + "e-" + decimals);
    },
    callMe() {
    //   this.loaded = false;
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
    },
  },
    computed: {
        myStyles () {
            return {
                height: '300px',
                position: 'relative'
            }
        }
    }
};
</script>
