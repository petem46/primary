<template>
  <v-col cols="6" md="3">
    <v-card class="pa-2" outlined raised tile>
      <v-row>
        <v-col cols="4" class="py-0">
          <v-icon size="50" color="teal lighten-2">fa-users</v-icon>
        </v-col>
        <v-col cols="8" class="text-right py-0">
          <div class="overline">pupils</div>
          <v-progress-circular v-if="! loaded" indeterminate color="teal"></v-progress-circular>
          <h3 v-if="loaded" class="pa-0 text-right display-1">{{ norcount }}</h3>
        </v-col>
        <v-col cols="12" class="py-0">
          <v-divider></v-divider>
          <div class="text-right teal--text text--lighten-2">
            <small>{{ schoolname }} number on roll</small>
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
      this.loaded = false;
      this.endpoint = "api/dev/norkpi/" + this.schoolname;
      this.refresh();
    }
  },
  data: function() {
    return {
      message: null,
      loaded: false,
      endpoint: null,
    };
  },
  created() {
  },
  mounted() {
    setTimeout(() => this.endpoint = "api/dev/norkpi/" + this.schoolname, this.randBetween(500,1000));
    setTimeout(() => this.fetch(), this.randBetween(500,1000));
  },
  methods: {
    fetch() {
      axios.get(this.endpoint).then(({ data }) => {
        this.norcount = data.data[0].Count;
        this.loaded = true;
      });
    },
    refresh() {
      this.loaded = false;
      this.fetch();
    },
    randBetween(min,max) {
      // setTimeout(() => this.loaded = true, Math.floor(Math.random() * 1500) + 750);
      Math.floor(Math.random() * max) + min;
    },
  }
};
</script>
