<template>
  <div class="row mx-0">
    <v-col
      v-if="!loaded"
      cols="12"
      lg="6"
    >
      <v-card
        class="pa-2"
        outlined
        raised
        tile
      >
        <v-card-title>% At Risk of Persistent Absence</v-card-title>
        <v-skeleton-loader type="list-item-avatar, list-item-three-line, card-heading, actions"></v-skeleton-loader>
        <v-divider></v-divider>
        <v-card-actions>
          <v-btn
            text
            small
            disabled
          >Loading ...</v-btn>
        </v-card-actions>
      </v-card>
    </v-col>
    <v-col
      v-if="!loaded"
      cols="12"
      lg="6"
    >
      <v-card
        class="pa-2"
        outlined
        raised
        tile
      >
        <v-card-title>% At Risk of Persistent Absence</v-card-title>
        <v-skeleton-loader type="list-item-avatar, list-item-three-line, card-heading, actions"></v-skeleton-loader>
        <v-divider></v-divider>
        <v-card-actions>
          <v-btn
            text
            small
            disabled
          >Loading ...</v-btn>
        </v-card-actions>
      </v-card>
    </v-col>
    <v-col
      v-if="showPupils"
      cols="12"
      lg="6"
    >
      <v-card
        v-if="loaded"
        class="pa-2"
        outlined
        raised
        tile
      >
        <v-card-title>Pupils At Risk of Persistent Absence</v-card-title>
        <v-data-table
          :headers="studentsheaders"
          :items="pupils"
          :search="search"
          :items-per-page="-1"
          fixed-header
          :hide-default-footer="true"
          dense
          multi-sort
          class="elevation-3"
          height="345px"
        >
          <template v-slot:top>
            <v-row class="px-3">
              <v-col cols="4">
                <v-text-field
                  v-model="search"
                  append-icon="mdi-account-search"
                  label="Search"
                  single-line
                  hide-details
                  v-bind="{ 'disabled' : !showPupils }"
                ></v-text-field>
              </v-col>
              <v-col cols="2">
                <v-select
                  v-model="gender"
                  :items="genders"
                  label="Gender Filter"
                  v-bind="{ 'disabled' : !showPupils }"
                ></v-select>
              </v-col>
              <v-col cols="2">
                <v-select
                  v-model="pp"
                  :items="pps"
                  label="PP Filter"
                  v-bind="{ 'disabled' : !showPupils }"
                ></v-select>
              </v-col>
              <v-col cols="2">
                <v-select
                  v-model="send"
                  :items="sends"
                  label="SEND Filter"
                  v-bind="{ 'disabled' : !showPupils }"
                ></v-select>
              </v-col>
              <v-col cols="2">
                <v-text-field
                  v-model="attendance"
                  type="number"
                  min="1"
                  max="100"
                  label="% less than"
                  v-bind="{ 'disabled' : !showPupils }"
                ></v-text-field>
              </v-col>
            </v-row>
          </template>
        </v-data-table>
        <v-divider></v-divider>
        <v-card-actions>
        <v-spacer />
          <v-btn
            disabled
            dark
            color="teal darken-1"
            :href="'http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Data+SSRS%2fAttendanceStudentWeekly19&school='+schoolname+'&rs:Command=Render&rc:LinkTarget=main&rs:Format=HTML4.0'"
            onclick="return !window.open(this.href, 'Student Weekly Attendance by Class', 'width=1024,height=768')"
          >
            <v-icon left>mdi-file-download-outline</v-icon>
            <span>
              Student PA Report</span>
          </v-btn>
          <v-btn
            @click="showPupils = false"
            dark
            color="teal darken-1"
          >            
          <v-icon left>mdi-account-group</v-icon>
            <span>
              Show Groups</span>
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-col>
    <v-col
      v-if="!showPupils"
      cols="12"
      lg="6"
    >
      <v-card
        v-if="loaded"
        class="pa-2"
        outlined
        raised
        tile
      >
        <v-card-title>Groups At Risk of Persistent Absence</v-card-title>
        <v-data-table
          :headers="groupsheaders"
          :items="groups"
          :items-per-page="-1"
          fixed-header
          :hide-default-footer="true"
          dense
          multi-sort
          class="elevation-3"
          height="345px"
        ></v-data-table>
        <v-divider></v-divider>
        <v-card-actions>
        <v-spacer />
          <v-btn
          disabled
            dark
            color="teal darken-1"
            :href="'http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Data+SSRS%2fAttendanceStudentWeekly19&school='+schoolname+'&rs:Command=Render&rc:LinkTarget=main&rs:Format=HTML4.0'"
            onclick="return !window.open(this.href, 'Student Weekly Attendance by Class', 'width=1024,height=768')"
          >
            <v-icon left>mdi-file-download-outline</v-icon>
            <span>
              Group PA Report</span>
          </v-btn>
          <v-btn
            @click="showPupils = true"
            dark
            color="teal darken-1"
          >            
          <v-icon left>mdi-account</v-icon>
            <span>
              Show Pupils</span>
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-col>

    <v-col
      cols="12"
      lg="6"
    >
      <v-card
        v-if="loaded"
        class="pa-2"
        outlined
        raised
        tile
      >
        <v-card-title>% At Risk of Persistent Absence</v-card-title>
        <pa-at-risk-chart
          v-if="loaded"
          :chartdata="chartdata"
          :options="options"
          :styles="myStyles"
          class="elevation-3"
        />
        <v-divider></v-divider>
        <v-card-actions>
        <v-spacer />
          <v-btn
          disabled
            dark
            color="teal darken-1"
            :href="'http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Data+SSRS%2fAttendanceStudentWeekly19&school='+schoolname+'&rs:Command=Render&rc:LinkTarget=main&rs:Format=HTML4.0'"
            onclick="return !window.open(this.href, 'Student Weekly Attendance by Class', 'width=1024,height=768')"
          >
            <v-icon left>mdi-file-download-outline</v-icon>
            <span>
              Group PA Report</span>
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-col>
  </div>
</template>

<script>
import axios from "axios";
import PaAtRiskChart from "./PaAtRiskChart.js";
export default {
  components: {
    PaAtRiskChart
  },
  props: ["schoolname", "enddate"],
  watch: {
    schoolname: function() {
      this.endpoint =
        "api/dev/paatrisk/" + this.schoolname + "/" + this.enddate;
      this.refresh();
    },
    startdate: function() {
      this.endpoint =
        "api/dev/paatrisk/" + this.schoolname + "/" + this.enddate;
      this.refresh();
    },
    enddate: function() {
      this.endpoint =
        "api/dev/paatrisk/" + this.schoolname + "/" + this.enddate;
      this.refresh();
    }
  },
  data() {
    return {
      message: null,
      loaded: false,
      showPupils: true,
      groups: [],
      chartdata: [],
      endpoint: "api/dev/paatrisk/" + this.schoolname + "/" + this.enddate,
      search: "",
      gender: "All",
      genders: ["All", "Boys", "Girls"],
      pp: "All",
      pps: ["All", "PP", "nPP"],
      attendance: 90,
      send: "All",
      sends: ["All", "SEND", "NOT SEND"],
      studentsheaders: [
        {
          text: "Surname",
          align: "left",
          sortable: true,
          value: "surname"
        },
        {
          text: "Forename",
          align: "left",
          sortable: true,
          value: "forename"
        },
        {
          text: "Year",
          align: "left",
          sortable: true,
          value: "year"
        },
        {
          text: "Reg",
          align: "left",
          sortable: true,
          value: "reg"
        },
        {
          text: "Gender",
          align: "left",
          sortable: true,
          value: "genderlabel",
          filter: value => {
            if (this.gender === "All") return true;
            if (!this.gender) return true;
            return value === this.gender;
          }
        },
        {
          text: "PP",
          align: "left",
          sortable: true,
          value: "pplabel",
          filter: value => {
            if (this.pp === "All") return true;
            if (!this.pp) return true;
            return value === this.pp;
          }
        },
        {
          text: "SEND",
          align: "left",
          sortable: true,
          value: "sendlabel",
          filter: value => {
            if (this.send === "All") return true;
            if (!this.send) return true;
            if (this.send === "SEND") return value != this.send + " N";
            if (this.send === "NOT SEND") return value === "SEND N";
          }
        },
        {
          text: "% Att",
          align: "left",
          sortable: true,
          value: "percentage",
          filter: value => {
            if (!this.attendance) return true;
            return value <= parseInt(this.attendance);
          }
        }
      ],
      groupsheaders: [
        {
          text: "Group",
          align: "left",
          sortable: true,
          value: "cohort"
        },
        {
          text: "Size",
          align: "left",
          sortable: true,
          value: "Size"
        },
        {
          text: "Count",
          align: "left",
          sortable: true,
          value: "PA_Count"
        },
        {
          text: "% At Risk",
          align: "left",
          sortable: true,
          value: "pAt_Risk"
        }
      ],
      options: {
        plugins: {
          datalabels: {
            color: "white",
            anchor: "center"
          }
        },
        onClick: (e, element) => {
          if (element && element.length > 0) {
            const cohort = this.chartdata.labels[element[0]._index];
            if (cohort === "All") {
              this.showPupils = true;
              this.pp = "All";
              this.gender = "All";
              this.send = "All";
            }
            if (cohort === "Boys" || cohort === "Girls") {
              this.showPupils = true;
              this.gender = cohort;
              this.pp = "All";
              this.send = "All";
            }
            if (cohort === "PP" || cohort === "nPP") {
              this.showPupils = true;
              this.pp = cohort;
              this.gender = "All";
              this.send = "All";
            }
            if (cohort === "SEND" || cohort === "NOT SEND") {
              this.showPupils = true;
              this.send = cohort;
              this.gender = "All";
              this.pp = "All";
            }
          }
        },
        maintainAspectRatio: false,
        responsive: true,
        responsiveAnimationDuration: 500,
        scales: {
          xAxes: [
            {
              ticks: {
                beginAtZero: true
              }
            }
          ],
          yAxes: [
            {
              ticks: {
                beginAtZero: true
              }
            }
          ]
        },
        title: {
          display: false,
          text: "% Pupils At Risk of PA by Group"
        },
        tooltips: {
          enabled: false
        },
        annotation: {
          annotations: [
            {
              drawTime: "afterDatasetsDraw",
              // id: "hline",
              type: "line",
              mode: "vertical",
              scaleID: "x-axis-0",
              value: 15,
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
      }
    };
  },
  created() {
    this.fetch();
  },
  mounted() {
    console.log("PA At Risk Overview Mounted.");
  },
  methods: {
    fetch() {
      axios
        .get(this.endpoint)
        .then(({ data }) => {
          this.groups = data.data.paatrisk;
          this.pupils = data.data.pastudents;
          this.patrisk = data.data.paatrisk.map(patrisk =>
            this.roundOff(patrisk.pAt_Risk, 1)
          );
          this.cohorts = data.data.paatrisk.map(cohorts => cohorts.cohort);
          // this.loaded = true;
        })
        .then(() => {
          (this.chartdata = {
            labels: this.cohorts,
            datasets: [
              {
                // type: 'horizontalBar',
                label: "At Risk of PA",
                backgroundColor: "rgba(255, 140, 0, 0.8)",
                data: this.patrisk
              }
            ]
          }),
            (this.loaded = true);
        });
    },
    roundOff(value, decimals) {
      return Number(Math.round(value + "e" + decimals) + "e-" + decimals);
    },
    refresh() {
      this.loaded = false;
      this.fetch();
    }
  },
  computed: {
    myStyles() {
      return {
        height: "440px",
        position: "relative"
      };
    }
  }
};
</script>
