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
        <v-col cols="12" lg="4">
            <v-card v-if="loaded" class="pa-2" outlined raised tile>
                <v-card-title>
                    % At Risk of Persistent Absence
                </v-card-title>
                <v-simple-table class="less-padding" fixed-header height="345px">
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
            groups: [],
            chartdata: [],
            endpoint: 'api/dev/paatrisk/' + this.schoolname + '/' + this.enddate,
            options: {
                plugins: {
                    datalabels: {
                        color: 'white',
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
                        display: false,
                        gridLines: {
                            display: false
                        },
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
                this.groups = data.data;
                this.patrisk = data.data.map(patrisk =>
                    this.roundOff(patrisk.pAt_Risk, 1)
                );
                this.cohorts = data.data.map(cohorts => cohorts.cohort);
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
