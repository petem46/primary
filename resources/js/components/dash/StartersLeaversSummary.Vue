<template>
  <v-col
    cols="12"
    lg="4"
  >
    <v-card
      v-if="! loaded"
      class="pa-2"
      outlined
      raised
      tile
    >
      <v-progress-linear
        indeterminate
        color="teal"
      ></v-progress-linear>
      <v-card-title class="py-2">Starters & Leavers 19/20</v-card-title>
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
    <v-card
      v-if="loaded"
      class="pa-2"
      outlined
      raised
      tile
    >
      <v-card-title class="py-2">Starters & Leavers 19/20</v-card-title>
      <v-simple-table
        v-bind:class="{ 'td--less-padding' : lessPadding }"
        fixed-header
        height="345px"
      >
        <template v-slot:default>
          <thead class>
            <tr>
              <th class="grey darken-3 white--text">Year</th>
              <th class="grey darken-3 white--text">Adminssions</th>
              <th class="grey darken-3 white--text">Leavers</th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="group in years"
              :key="group.sortorder"
            >
              <td>{{ group.year }}</td>
              <td>{{ group.starters }}</td>
              <td>{{ group.leavers }}</td>
            </tr>
          </tbody>
        </template>
      </v-simple-table>
      <v-divider></v-divider>
      <v-card-actions>
        <v-spacer />
        <v-btn
          disabled
          text
          color="teal darken-1"
        >Action</v-btn>
      </v-card-actions>
    </v-card>
  </v-col>
</template>
<script>
import axios from "axios";
export default {
  props: ["schoolname", "enddate"],
  watch: {
    schoolname: function() {
      this.endpoint =
        "api/dev/startersleaverssummary/" +
        this.schoolname +
        "/" +
        this.enddate;
      this.refresh();
    },
    enddate: function() {
      this.endpoint =
        "api/dev/startersleaverssummary/" +
        this.schoolname +
        "/" +
        this.enddate;
      this.refresh();
    }
  },
  data() {
    return {
      message: null,
      loaded: false,
      endpoint: null,
      years: []
    };
  },
  mounted() {
    this.endpoint =
      "api/dev/startersleaverssummary/" + this.schoolname + "/" + this.enddate;
    this.fetch();
  },
  methods: {
    fetch() {
      (this.endpoint =
        "api/dev/startersleaverssummary/" +
        this.schoolname +
        "/" +
        this.enddate),
        axios.get(this.endpoint).then(({ data }) => {
          this.years = data.data;
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
  },
  computed: {
    lessPadding: function() {
      if (this.years.length > 6) return true;
    }
  }
};
</script>

