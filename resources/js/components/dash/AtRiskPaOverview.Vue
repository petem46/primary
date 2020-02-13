<template>
    <div class="row mx-0">
        <v-col cols="12" lg="4">
            <v-card v-if="! loaded" class="pa-2" outlined raised tile>
                <v-card-title>
                    % At Risk of Persistent Absence
                </v-card-title>
                <v-skeleton-loader
                    type="list-item-avatar, list-item-three-line, card-heading, actions"
                ></v-skeleton-loader>
                <v-divider></v-divider>
                <v-card-actions>
                    <v-btn text small disabled>Loading ...</v-btn>
                </v-card-actions>
            </v-card>
        </v-col>
        <v-col cols="12" lg="8">
            <v-card v-if="! loaded" class="pa-2" outlined raised tile>
                <v-card-title>
                    % At Risk of Persistent Absence
                </v-card-title>
                <v-skeleton-loader
                    type="list-item-avatar, list-item-three-line, card-heading, actions"
                ></v-skeleton-loader>
                <v-divider></v-divider>
                <v-card-actions>
                    <v-btn text small disabled>Loading ...</v-btn>
                </v-card-actions>
            </v-card>
        </v-col>
        <v-col v-if="! showPupils" cols="12" lg="4">
            <v-card v-if="loaded" class="pa-2" outlined raised tile>
                <v-card-title>
                    % At Risk of Persistent Absence
                </v-card-title>
                <v-simple-table class="td--less-padding" fixed-header height="345px">
                    <template v-slot:default>
                    <thead class>
                        <tr>
                        <th class="grey darken-3 white--text">Group</th>
                        <th class="grey darken-3 white--text">Count</th>
                        <th class="grey darken-3 white--text">%</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="group in groups" :key="group.sortorder">
                        <td>{{ group.cohort }}</td>
                        <td>{{ group.PA_Count }}</td>
                        <td>{{ roundOff(group.pAt_Risk, 1) }}</td>
                        </tr>
                    </tbody>
                    </template>
                </v-simple-table>
                <v-divider></v-divider>
                <v-card-actions>
                    <v-btn text small>Full Report</v-btn>
                    <v-btn @click="showPupils = true" text small>Show Pupils</v-btn>
                </v-card-actions>
            </v-card>
        </v-col>
        <v-col v-if="showPupils" cols="12" lg="4">
            <v-card v-if="loaded" class="pa-2" outlined raised tile>
                <v-card-title>
                    % At Risk of Persistent Absence
                </v-card-title>
                <v-simple-table class="td--less-padding" fixed-header height="345px">
                    <template v-slot:default>
                    <thead class>
                        <tr>
                        <th class="grey darken-3 white--text">Pupil</th>
                        <th class="grey darken-3 white--text">Year</th>
                        <th class="grey darken-3 white--text">Reg</th>
                        <th class="grey darken-3 white--text">%</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="pupil in pupils" :key="pupil.upn">
                        <td>{{ pupil.forename }} {{ pupil.surname }}</td>
                        <td>{{ pupil.year }}</td>
                        <td>{{ pupil.reg }}</td>
                        <td>{{ roundOff(pupil.percentage, 1) }}</td>
                        </tr>
                    </tbody>
                    </template>
                </v-simple-table>
                <v-divider></v-divider>
                <v-card-actions>
                    <v-btn text small>Full Report</v-btn>
                    <v-btn @click="showPupils = false" text small>Show Groups</v-btn>
                </v-card-actions>
            </v-card>
        </v-col>
        <v-col cols="12" lg="8">
            <v-card v-if="loaded" class="pa-2" outlined raised tile>
                <v-card-title>
                    % At Risk of Persistent Absence
                </v-card-title>
                <pa-at-risk-chart v-if="loaded" :chartdata="chartdata" :options="options" :styles="myStyles" />
                <v-divider></v-divider>
                <v-card-actions>
                    <v-btn text small>Full Report</v-btn>
                </v-card-actions>
            </v-card>
        </v-col>
        <v-col v-if="showPupils" cols="12">
            <v-card v-if="loaded" class="pa-2" outlined raised tile>
                <v-card-title>
                    % At Risk of Persistent Absence
                <v-spacer></v-spacer>
                <v-text-field
                    v-model="search"
                    append-icon="mdi-search"
                    label="Search"
                    single-line
                    hide-details
                ></v-text-field>
                </v-card-title>
                <v-data-table
                    :headers="headers"
                    :items="pupils"
                    :items-per-page="6"
                    :search="search"
                    fixed-header
                    class="elevation-1"
                    height="345px"
                >
                <template v-slot:top>
                    <v-row class="px-1">
                        <v-col cols="2">
                        <v-select v-model="gender" :items="genders" label="Gender Filter"></v-select>
                        </v-col>
                        <v-col cols="2">
                        <v-select v-model="pp" :items="pps" label="PP Filter"></v-select>
                        </v-col>
                        <v-col cols="2">
                            <v-text-field v-model="attendance" type="number" min="1" max="100" label="% attendance less than"></v-text-field>
                        </v-col>
                    </v-row>
                </template>
                </v-data-table>
                <v-divider></v-divider>
                <v-card-actions>
                    <v-btn text small>Full Report</v-btn>
                    <v-btn @click="showPupils = false" text small>Show Groups</v-btn>
                </v-card-actions>
            </v-card>
        </v-col>

    </div>
</template>
<script>
import axios from "axios";
import PaAtRiskChart from "./PaAtRiskChart.js";

export default {
  components: { PaAtRiskChart },
  props: ['schoolname', 'enddate'],
  watch: {
      'enddate': function () {
          this.endpoint = 'api/dev/paatrisk/' + this.schoolname + '/' + this.enddate
          console.log(this.endpoint)
          this.callMe();
      },
  },
    data() {
        return {
            message: null,
            loaded: false,
            showPupils: false,
            groups: [],
            chartdata: [],
            endpoint: 'api/dev/paatrisk/' + this.schoolname + '/' + this.enddate,
            search: '',
            gender: 'All',
            genders: [ 'All', 'Boys', 'Girls' ],
            pp: 'All',
            pps: [ 'All', 'PP', 'nPP' ],
            attendance: 90,
            headers: [
                {
                    text: 'Surname',
                    align: 'left',
                    sortable: true,
                    value: 'surname',
                },
                {
                    text: 'Forename',
                    align: 'left',
                    sortable: true,
                    value: 'forename',
                },
                {
                    text: 'Year',
                    align: 'left',
                    sortable: true,
                    value: 'year',
                },
                {
                    text: 'Reg',
                    align: 'left',
                    sortable: true,
                    value: 'reg',
                },
                {
                    text: 'Gender',
                    align: 'left',
                    sortable: true,
                    value: 'genderlabel',
                    filter: value => {
                        if (this.gender === 'All') return true
                        if (!this.gender) return true
                        return value === this.gender
                    },
                },
                {
                    text: 'PP',
                    align: 'left',
                    sortable: true,
                    value: 'pplabel',
                    filter: value => {
                        if (this.pp === 'All') return true
                        if (!this.pp) return true
                        return value === this.pp
                    },
                },
                {
                    text: 'SEND',
                    align: 'left',
                    sortable: true,
                    value: 'sendlabel',
                },
                {
                    text: '% Att',
                    align: 'left',
                    sortable: true,
                    value: 'percentage',
                    filter: value => {
                        if (!this.attendance) return true
                        return value <= parseInt(this.attendance)
                    },
                },
            ],
            options: {
                plugins: {
                    datalabels: {
                        color: 'white',
                        anchor: 'start',
                    },
                },
                maintainAspectRatio: false,
                responsive: true,
                responsiveAnimationDuration: 500,
                scales: {
                    xAxes: [{
                        ticks: {
                            beginAtZero: true,
                            // suggestedMax: 50,
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                        },
                        // display: false,
                    }],
                },
                title: {
                    display: false,
                    text: '% Pupils At Risk of PA by Group'
                },
                tooltips: {
                    enabled: false,
                },
                annotation: {
                    annotations: [{
                        drawTime: "afterDatasetsDraw",
                        // id: "hline",
                        type: "line",
                        mode: "vertical",
                        scaleID: "x-axis-0",
                        value: 15,
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
                console.log(data.data);
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
              },
            ]
          }),
            (this.loaded = true);
        });
        },
        roundOff(value, decimals) {
            return Number(Math.round(value + "e" + decimals) + "e-" + decimals);
        },
        callMe() {
        this.loaded = false;
        this.fetch();
        },
    },
    computed: {
        myStyles () {
            return {
                height: '345px',
                position: 'relative'
            }
        }
    }
};
</script>
