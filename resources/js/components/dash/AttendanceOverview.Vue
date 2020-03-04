<template>
  <v-col
    cols="12"
    lg="7"
    xl="8"
  >
    <v-card
      v-if="loaded"
      class="pa-2"
      outlined
      raised
      tile
    >
      <v-card-title>Attendance Overview</v-card-title>
      <v-card-text>
        <v-icon>mdi-calendar-multiselect</v-icon>
        &nbsp;&nbsp; Week
        {{ week }} - Attendance: {{ weekatt }} % Running Attendance:
        {{ runningatt }} %
      </v-card-text>
      <v-divider></v-divider>
      <attendance-weekly-chart
        v-if="loaded"
        :chartdata="chartdata"
        :options="options"
        :styles="myStyles"
      />
      <v-divider></v-divider>
      <v-card-actions>
        <v-spacer />
        <v-btn
          dark
          color="teal darken-1"
          :href="'http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Data+SSRS%2fAttendanceWeekly19&school='+schoolname+'&rs:Command=Render&rc:LinkTarget=main&rs:Format=HTML4.0'"
          onclick="return !window.open(this.href, 'Weekly Attendance', 'width=1024,height=768')"
        >
          <v-icon left>mdi-file-download-outline</v-icon>
          <span>Groups Weekly Report</span>
        </v-btn>
        <v-btn
          dark
          color="teal darken-1"
          :href="'http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Data+SSRS%2fAttendanceStudentWeekly19&school='+schoolname+'&rs:Command=Render&rc:LinkTarget=main&rs:Format=HTML4.0'"
          onclick="return !window.open(this.href, 'Student Weekly Attendance by Class', 'width=1024,height=768')"
        >
          <v-icon left>mdi-file-download-outline</v-icon>
          <span>
            Student Weekly Report</span>
        </v-btn>
      </v-card-actions>
    </v-card>
    <v-card
      v-if="!loaded"
      class="pa-2"
      outlined
      raised
      tile
    >
      <v-progress-linear
        indeterminate
        color="teal"
      ></v-progress-linear>
      <v-card-title>Attendance Overview</v-card-title>
      <v-divider></v-divider>
      <v-skeleton-loader type="list-item-avatar, list-item-three-line, card-heading, actions"></v-skeleton-loader>
      <v-divider></v-divider>
      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn
          text
          disabled
        >Loading...</v-btn>
      </v-card-actions>
    </v-card>
  </v-col>
</template>

<script>
import axios from "axios";
import AttendanceWeeklyChart from "./AttendanceWeeklyChart.js";
export default {
  components: {
    AttendanceWeeklyChart
  },
  props: ["schoolname", "enddate", "attendanceweek"],
  watch: {
    schoolname: function() {
      this.endpoint =
        "api/dev/attendanceweekly/" + this.schoolname + "/" + this.enddate;
      this.refresh();
    },
    startdate: function() {
      this.endpoint =
        "api/dev/attendanceweekly/" + this.schoolname + "/" + this.enddate;
      this.refresh();
    },
    enddate: function() {
      this.endpoint =
        "api/dev/attendanceweekly/" + this.schoolname + "/" + this.enddate;
      this.refresh();
    },
    attendanceweek: function() {
      this.endpoint =
        "api/dev/attendanceweekly/" + this.schoolname + "/" + this.enddate;
      this.refresh();
    }
  },
  data() {
    return {
      message: null,
      loaded: false,
      chartdata: null,
      runningatt: null,
      week: null,
      weekatt: null,
      finalweeknumber: null,
      finalweekattendance: null,
      options: {
        plugins: {
          datalabels: {
            display: false
          }
        },
        tooltips: {
          enabled: false
        },
        hover: {
          //   mode: "nearest",
          //   intersect: false,
          onHover: (e, element) => {
            if (element && element.length > 0) {
              const runningatt = this.chartdata.datasets[1].data[
                element[0]._index
              ];
              const weekatt = this.chartdata.datasets[0].data[
                element[0]._index
              ];
              const week = this.chartdata.labels[element[0]._index];
              this.runningatt = runningatt;
              this.weekatt = weekatt;
              this.week = week;
            }
          }
        },
        onClick: (e, element) => {
          if (element && element.length > 0) {
            const week = this.chartdata.labels[element[0]._index];
            const weekatt = this.chartdata.datasets[0].data[element[0]._index];
            //   console.log('load drill down chart for week ' + week);
            this.week = week;
            this.weekatt = weekatt;
            this.updateWeek();
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
          ],
          xAxes: [
            {
              scaleLabel: {
                display: true,
                labelString: "Week Number"
              }
            }
          ]
        },
        annotation: {
          annotations: [
            {
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
                enabled: false
              }
            }
          ]
        }
      },
      endpoint:
        "api/dev/attendanceweekly/" + this.schoolname + "/" + this.enddate
    };
  },
  created() {
    this.fetch();
  },
  mounted() {
    console.log("Attendance Ovreview Mounted.");
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
          this.weeks = data.data.map(weeks => weeks.wk); // show week number as x-axis label
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
            (this.loaded = true);
          this.finalweeknumber = this.getfinalweeknumber();
          this.finalweekattendance = this.getfinalweekattendance();
          this.sendFinalWeek();
        });
    },
    roundOff(value, decimals) {
      return Number(Math.round(value + "e" + decimals) + "e-" + decimals);
    },
    refresh() {
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
    },
    getfinalweeknumber() {
      var finalweek;
      for (let i = 0; i < this.weeks.length; i++) {
        finalweek = this.weeks[i];
      }
      //   console.log('Last Week Number = ' + finalweek);
      return finalweek;
    },
    getfinalweekattendance() {
      var finalweekattendance;
      for (let i = 0; i < this.weekly.length; i++) {
        finalweekattendance = this.weekly[i];
      }
      //   console.log('Last Week Attendance = ' + finalweekattendance);
      return finalweekattendance;
    },
    sendFinalWeek() {
      this.$emit("updateWeek", this.finalweeknumber, this.finalweekattendance);
    },
    updateWeek() {
      this.$emit("updateWeek", this.week, this.weekatt);
    }
  },
  computed: {
    myStyles() {
      return {
        height: "300px",
        position: "relative"
      };
    }
  }
};
</script>
