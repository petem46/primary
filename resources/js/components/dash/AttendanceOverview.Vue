<template>
  <v-col cols="12" lg="7" xl="8">
    <v-card v-if="! loaded" class="pa-2" outlined raised tile>
      <v-progress-linear indeterminate color="teal"></v-progress-linear>
      <v-card-title>Attendance Overview</v-card-title>
      <v-skeleton-loader type="list-item-avatar, list-item-three-line, card-heading, actions"></v-skeleton-loader>
      <v-divider></v-divider>
      <v-card-actions>
        <v-btn text disabled>Loading...</v-btn>
      </v-card-actions>
    </v-card>
    <v-card v-if="loaded" class="pa-2" outlined raised tile>
      <v-card-title>Attendance Overview</v-card-title>
      <line-chart v-if="loaded" :chartdata="chartdata" :options="options" />
      <v-divider></v-divider>
      <v-card-actions>
        <v-btn text>Full Report</v-btn>
      </v-card-actions>
    </v-card>
  </v-col>
</template>
<script>
import axios from "axios";
import LineChart from "./LineChart.js";

export default {
  components: { LineChart },
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
            display:false
          },
        },
        maintainAspectRatio: false,
        responsive: true,
        responsiveAnimationDuration: 1000,
        scales: {
          yAxes: [{
            ticks: {
              // beginAtZero: true,
              suggestedMin: 80,
              suggestedMax: 100,
            },
          }],
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
            borderDash: [10,10],
            label: {
              backgroundColor: "white",
              content: "Nat",
              enabled: false,
            },
          }],
        },
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
          this.weekly = data.data.map(weekly => weekly.pattendance);
          this.weeks = data.data.map(weeks => weeks.wk);
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
              }
            ]
          }),
            setTimeout(
              () => (this.loaded = true),
              Math.floor(Math.random() * 1500) + 750
            );
          // this.loaded = true;
        });
    },
    roundOff(value, decimals) {
      return Number(Math.round(value + "e" + decimals) + "e-" + decimals);
    },
    callMe() {
        // alert('A NEW END DATE HAS BEEN SET.  YOU SHOULD FETCH NEW DATA');
        this.loaded = false;
        this.fetch();
    },
    setbarcolors() {
      var colors = [];
      for (let i = 0; i < this.weekly.length; i++) {
        if (this.weekly[i] < 90) {
          colors.push('rgba(220, 20, 60, 0.8)');
        } else if (this.weekly[i] < 93) {
          colors.push('rgba(255, 140, 0, 0.8)');
        } else if (this.weekly[i] < 95) {
          colors.push('rgba(56,193,114,0.8)');
        } else {
          colors.push('rgba(72,193,56,0.8)');
        }
      }
    // console.log(colors);
    return colors;
    },
  }
};
</script>
