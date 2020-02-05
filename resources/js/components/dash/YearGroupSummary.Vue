<template>
  <v-col cols="12" lg="4">
    <v-card class="pa-2" outlined raised tile>
      <v-progress-linear v-if="! loaded" indeterminate color="teal"></v-progress-linear>
      <v-card-title class="py-2">Year Group Summary</v-card-title>
      <v-skeleton-loader
        v-if="! loaded"
        type="list-item-avatar, list-item-three-line, card-heading, actions"
       >
    </v-skeleton-loader>
    <v-simple-table v-if="loaded" fixed-header height="345px">
        <template v-slot:default>
        <thead class="">
            <tr>
            <th class="grey darken-3 white--text">Year</th>
            <th class="grey darken-3 white--text">Count</th>
            <th class="grey darken-3 white--text">% Girls</th>
            <th class="grey darken-3 white--text">% PP</th>
            <th class="grey darken-3 white--text">% SEND</th>
            <th class="grey darken-3 white--text">% EAL</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="group in groups" :key="group.sortorder"  v-if="group.group != 'School'">
            <td>{{ group.group }}</td>
            <td>{{ group.count }}</td>
            <td>{{ roundOff(group.girlpercent*100, 1) }}</td>
            <td>{{ roundOff(group.pppercent*100, 1) }}</td>
            <td>{{ roundOff(group.sendpercent*100, 1) }}</td>
            <td>{{ roundOff(group.ealpercent*100, 1) }}</td>
            </tr>
        </tbody>
        </template>
    </v-simple-table>

    </v-card>
  </v-col>
</template>
<script>
    import axios from "axios";
export default {
  props: ['schoolname', "percentpresent"],
  data() {
    return {
      message: null,
      loaded: false,
      school: null,
      endpoint: 'api/dev/yeargroupsummary/' + this.schoolname,
      school: this.schoolname,
      groups: [],
    };
  },
  created() {
    this.fetch();
  },
  mounted() {
    console.log("Year Group Summary Mounted.");
  },
  methods: {
    fetch() {
      axios.get(this.endpoint).then(({ data }) => {
        this.groups = data.data;
        setTimeout(() => this.loaded = true, Math.floor(Math.random() * 1500) + 750);
        // this.loaded = true;
      });
    },
    roundOff(value, decimals) {
      return Number(Math.round(value + "e" + decimals) + "e-" + decimals);
    }
  }
};
</script>

