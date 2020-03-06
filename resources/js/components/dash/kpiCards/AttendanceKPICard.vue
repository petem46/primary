<template>
  <v-col
    cols="6"
    md="3"
  >
    <v-card
      class="pa-2"
      outlined
      raised
      tile
    >
      <v-row>
        <v-col
          cols="4"
          class="py-0"
        >
          <v-icon
            size="50"
            color="orange"
          >mdi-calendar-multiselect</v-icon>
        </v-col>
        <v-col
          cols="8"
          class="text-right py-0"
        >
          <div class="overline">% present</div>
          <v-progress-circular
            v-if="! loaded"
            indeterminate
            color="orange"
          ></v-progress-circular>
          <h3
            v-if="loaded"
            class="pa-0 text-right display-1"
          >{{ roundOff(ppresent,2) }}</h3>
        </v-col>
        <v-col
          cols="12"
          class="py-0"
        >
          <v-divider></v-divider>
          <div class="text-right orange--text">
            <small>Whole School Attendance</small>
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
      this.loaded = false;
      "api/dev/attendancekpi/" + this.schoolname + "/" + this.startdate;
      this.refresh();
    },
    startdate: function() {
      this.endpoint = "api/dev/attendancekpi/" + this.schoolname + "/" + this.startdate;
      this.refresh();
    },
    enddate: function() {
      this.endpoint = "api/dev/attendancekpi/" + this.schoolname + "/" + this.enddate;
      this.refresh();
    }
  },
  data() {
    return {
      message: null,
      loaded: false,
      endpoint: null,
    };
  },
  created() {
  },
  mounted() {
    setTimeout(() => this.endpoint = "api/dev/attendancekpi/" + this.schoolname + "/" + this.enddate, this.randBetween(500,1000));
    setTimeout(() => this.fetch(), this.randBetween(500,1000));
  },
  methods: {
    fetch() {
      axios.get(this.endpoint).then(({ data }) => {
        this.ppresent = data.data[0].ppresent;
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
    randBetween(min,max) {
      // setTimeout(() => this.loaded = true, Math.floor(Math.random() * 1500) + 750);
      Math.floor(Math.random() * max) + min;
    },
  },
  computed: {
    formattedStartDate() {
      return this.startdate
        ? format(parseISO(this.startdate), "iiii, do MMM yyyy")
        : "";
    },
    formattedEndDate() {
      return this.enddate
        ? format(parseISO(this.enddate), "iiii, do MMM yyyy")
        : "";
    },
    getschoolname() {
      return this.$store.getters.getschoolname;
    },
    getstartdate: {
      get: function() {
        return this.$store.getters.getstartdate;
      },
      set: function(newDate) {
        this.$store.commit("updateStartDate", newDate);
      }
    },
    getenddate: {
      get: function() {
        return this.$store.getters.getenddate;
      },
      set: function(newDate) {
        this.$store.commit("updateEndDate", newDate);
      }
    },
    getstudentid() {
      return this.$store.getters.getstudentid;
    }
  }
};
</script>
