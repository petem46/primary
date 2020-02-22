<template>
  <v-col cols="6" md="3">
    <v-card class="pa-2" outlined raised tile>
      <v-row>
        <v-col cols="4" class="py-0">
          <v-icon size="50" color="red darken-2 red--text text--darken-2">mdi-flag-variant</v-icon>
        </v-col>
        <v-col cols="8" class="text-right py-0">
          <div class="overline">% pupils</div>
          <v-progress-circular v-if="! loaded" indeterminate color="red"></v-progress-circular>
          <h3 v-if="loaded" class="pa-0 text-right display-1">{{ roundOff(this.pAtRisk,1) }}</h3>
        </v-col>
        <v-col cols="12" class="py-0">
          <v-divider></v-divider>
          <div class="text-right red--text text--darken-2">
            <small>At risk of Persistent Absence</small>
          </div>
        </v-col>
      </v-row>
    </v-card>
  </v-col>
</template>
<script>
import axios from "axios";
export default {
  props: ["schoolname", "enddate"],
  watch: {
    schoolname: function() {
      this.endpoint = "api/dev/pakpi/" + this.schoolname + "/" + this.enddate;
      console.log(this.endpoint);
      this.refresh();
    },
    startdate: function() {
      this.endpoint = "api/dev/pakpi/" + this.schoolname + "/" + this.enddate;
      console.log(this.endpoint);
      this.refresh();
    },
    enddate: function() {
      this.endpoint = "api/dev/pakpi/" + this.schoolname + "/" + this.enddate;
      console.log(this.endpoint);
      this.refresh();
    },
  },
  data() {
    return {
      message: null,
      loaded: false,
      endpoint: "api/dev/pakpi/" + this.schoolname + "/" + this.enddate
      // pAtRisk: null,
    };
  },
  created() {
    this.fetch();
  },
  mounted() {
    console.log("PA KPI Mounted.");
  },
  methods: {
    fetch() {
      axios.get(this.endpoint).then(({ data }) => {
        this.pAtRisk = data.data[0].pAt_Risk;
        this.loaded = true;
      });
    },
    roundOff(value, decimals) {
      return Number(Math.round(value + "e" + decimals) + "e-" + decimals);
    },
    refresh() {
      this.loaded = false;
      this.fetch();
    }
  }
};
</script>
