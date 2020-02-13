<template>
  <v-col cols="12" lg="4">
    <v-card v-if="! loaded" class="pa-2" outlined raised tile>
      <v-progress-linear indeterminate color="teal"></v-progress-linear>
      <v-card-title class="py-2">Starters & Leavers 19/20</v-card-title>
      <v-skeleton-loader type="list-item-avatar, list-item-three-line, card-heading, actions"></v-skeleton-loader>
      <v-divider></v-divider>
      <v-card-actions>
        <v-btn text small disabled>Loading ...</v-btn>
      </v-card-actions>
    </v-card>
    <v-card v-if="loaded" class="pa-2" outlined raised tile>
      <v-card-title class="py-2">Starters & Leavers 19/20</v-card-title>
      <v-simple-table class="td--less-padding" fixed-header height="345px">
        <template v-slot:default>
          <thead class>
            <tr>
              <th class="grey darken-3 white--text">Year</th>
              <th class="grey darken-3 white--text">Adminssions</th>
              <th class="grey darken-3 white--text">Leavers</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="group in years" :key="group.sortorder">
              <td>{{ group.year }}</td>
              <td>{{ group.starters }}</td>
              <td>{{ group.leavers }}</td>
            </tr>
          </tbody>
        </template>
      </v-simple-table>
      <v-divider></v-divider>
      <v-card-actions>
        <v-btn text small color="teal darken-1">Action</v-btn>
        <v-btn text small color="teal darken-1">Action</v-btn>
      </v-card-actions>
    </v-card>
  </v-col>
</template>
<script>
import axios from "axios";
export default {
  props: ["schoolname", "enddate"],
  watch: {
    enddate: function() {
      this.endpoint =
        "api/dev/startersleaverssummary/" +
        this.schoolname +
        "/" +
        this.enddate;
      console.log(this.endpoint);
      this.callMe();
    }
  },
  data() {
    return {
      message: null,
      loaded: false,
      endpoint:
        "api/dev/startersleaverssummary/" +
        this.schoolname +
        "/" +
        this.enddate,
      years: []
    };
  },
  created() {
    this.fetch();
  },
  mounted() {
    console.log("Starters & Leavers 19/20 Mounted.");
  },
  methods: {
    fetch() {
      axios.get(this.endpoint).then(({ data }) => {
        this.years = data.data;
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
    }
  }
};
</script>

