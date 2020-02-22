<template>
  <v-col cols="6" md="3">
    <v-card class="pa-2" outlined raised tile>
      <v-row>
        <v-col cols="4" class="py-0">
          <v-icon size="50" color="blue">mdi-account-plus</v-icon>
        </v-col>
        <v-col cols="8" class="text-right py-0">
          <div class="overline">% pupils</div>
          <v-progress-circular v-if="! loaded" indeterminate color="bllue"></v-progress-circular>
          <h3 v-if="loaded" class="pa-0 text-right display-1">{{ roundOff(ppcount,1) }}</h3>
        </v-col>
        <v-col cols="12" class="py-0">
          <v-divider></v-divider>
          <div class="text-right blue--text text--lighten-2">
            <small>Pupil Premium Status</small>
          </div>
        </v-col>
      </v-row>
    </v-card>
  </v-col>
</template>
<script>
import axios from "axios";
export default {
  props: ["schoolname"],
  watch: {
    schoolname: function() {
      this.endpoint = "api/dev/ppkpi/" + this.schoolname;
      console.log(this.endpoint);
      this.refresh();
    },
    startdate: function() {
      this.endpoint = "api/dev/ppkpi/" + this.schoolname;
      console.log(this.endpoint);
      this.refresh();
    },
    enddate: function() {
      this.endpoint = "api/dev/ppkpi/" + this.schoolname;
      console.log(this.endpoint);
      this.refresh();
    }
  },
  data() {
    return {
      message: null,
      loaded: false,
      school: null,
      endpoint: "api/dev/ppkpi/" + this.schoolname,
      school: this.schoolname
    };
  },
  created() {
    this.fetch();
  },
  mounted() {
    console.log("PP KPI Mounted.");
  },
  methods: {
    fetch() {
      axios.get(this.endpoint).then(({ data }) => {
        this.ppcount = data.data[1].percent;
        // setTimeout(() => this.loaded = true, Math.floor(Math.random() * 1500) + 750);
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
