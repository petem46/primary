<template>
  <v-col cols="12" lg="4">
    <v-card v-if="! loaded" class="pa-2" outlined raised tile>
      <v-progress-linear indeterminate color="teal"></v-progress-linear>
      <v-card-title class="py-2">Year Group Summary</v-card-title>
      <v-skeleton-loader
        type="list-item-avatar, list-item-three-line, card-heading, actions"
      ></v-skeleton-loader>
      <v-divider></v-divider>
      <v-card-actions>
        <v-btn small text disabled>Loading ...</v-btn>
      </v-card-actions>
    </v-card>
    <v-card v-if="loaded" class="pa-2" outlined raised tile>
      <v-card-title class="py-2">Year Group Summary</v-card-title>
      <v-simple-table v-bind:class="{ 'td--less-padding' : lessPadding }" fixed-header height="345px">
        <template v-slot:default>
          <thead class>
            <tr>
              <th class="grey darken-3 white--text">Year</th>
              <th class="grey darken-3 white--text">Count</th>
              <th v-if="! showcount" class="grey darken-3 white--text">% Girls</th>
              <th v-if="! showcount" class="grey darken-3 white--text">% PP</th>
              <th v-if="! showcount" class="grey darken-3 white--text">% SEND</th>
              <th v-if="! showcount" class="grey darken-3 white--text">% EAL</th>
              <th v-if="showcount" class="grey darken-3 white--text">Girls</th>
              <th v-if="showcount" class="grey darken-3 white--text">PP</th>
              <th v-if="showcount" class="grey darken-3 white--text">SEND</th>
              <th v-if="showcount" class="grey darken-3 white--text">EAL</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="group in groups" :key="group.sortorder" v-if="group.group != 'School'">
              <td>{{ group.group }}</td>
              <td>{{ group.count }}</td>
              <td v-if="! showcount">{{ roundOff(group.girlpercent*100, 1) }}</td>
              <td v-if="! showcount">{{ roundOff(group.pppercent*100, 1) }}</td>
              <td v-if="! showcount">{{ roundOff(group.sendpercent*100, 1) }}</td>
              <td v-if="! showcount">{{ roundOff(group.ealpercent*100, 1) }}</td>
              <td v-if="showcount">{{ group.girlcounter }}</td>
              <td v-if="showcount">{{ group.ppcounter }}</td>
              <td v-if="showcount">{{ group.sendcounter }}</td>
              <td v-if="showcount">{{ group.ealcounter }}</td>
            </tr>
          </tbody>
        </template>
      </v-simple-table>
      <v-divider></v-divider>
      <v-card-actions>
        <v-spacer />
        <v-btn v-if="! showcount" @click="showcount = true" text color="teal darken-1">Show Count</v-btn>
        <v-btn v-if="showcount" @click="showcount = false" text color="teal darken-1">Show Percent</v-btn>
      </v-card-actions>
    </v-card>
  </v-col>
</template>
<script>
import axios from "axios";
export default {
  props: ["schoolname"],
	watch: {
		schoolname: function() {
			this.loaded = false;
			this.endpoint = "api/dev/yeargroupsummary/" + this.schoolname;
			this.refresh();
		}
	},
	data() {
    return {
      message: null,
      loaded: false,
      showcount: false,
      endpoint: "api/dev/yeargroupsummary/" + this.schoolname,
      groups: []
    };
  },
  created() {
    },
  mounted() {
    setTimeout(() => this.endpoint = "api/dev/yeargroupsummary/" + this.schoolname, 1000);
    setTimeout(() => this.fetch(), 1000);
  },
  methods: {
    fetch() {
      axios.get(this.endpoint).then(({ data }) => {
        this.groups = data.data;
        this.loaded = true;
      });
    },
    roundOff(value, decimals) {
      return Number(Math.round(value + "e" + decimals) + "e-" + decimals);
		},
		refresh() {
			this.loaded = false;
			this.fetch();
		},
  },
  computed: {
      lessPadding: function() {
         if(this.groups.length > 7) return true;
      }
  }
};
</script>

