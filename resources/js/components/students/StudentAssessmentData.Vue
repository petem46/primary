<template>
  <div class="container">
    <p class="display-1 font-weight-light teal--text text--darken-2">Assessment</p>
    <p class="title font-weight-light teal--text text--darken-2">Prior Attainment</p>
    <v-row class="mx-0">
    </v-row>
    <p class="title font-weight-light teal--text text--darken-2">Tracking Data</p>
    <v-row class="mx-0">
    </v-row>
    <v-divider class="my-3"></v-divider>
  </div>
</template>
<script>
import axios from "axios";
import format from "date-fns/format";
// import subDays from 'date-fns/sub_days'
import parseISO from "date-fns/parseISO";

export default {
  data() {
    return {
      message: null,
      loaded: false,
      assessmentdata: [],
      endpoint: null,
    };
  },
  created() {
    this.fetch();
  },
  mounted() {},
  methods: {
    fetch() {
      this.endpoint =
        "api/dev/student/assessmentdata/" +
        this.schoolname +
        "/" +
        this.studentid;
      axios.get(this.endpoint).then(({ data }) => {
        this.student = data.data.student;
        this.ppa = data.data.ppa;
        this.primarydcdata = data.data.primarydcdata;
        this.secondarydcdata = data.data.secondarydcdata;

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
    schoolname() {
      return this.$store.getters.getschoolname;
    },
    startdate: {
      get: function() {
        return this.$store.getters.getstartdate;
      },
      set: function(newDate) {
        this.$store.commit("updateStartDate", newDate);
      }
    },
    enddate: {
      get: function() {
        return this.$store.getters.getenddate;
      },
      set: function(newDate) {
        this.$store.commit("updateEndDate", newDate);
      }
    },
    studentid() {
      return this.$store.getters.getstudentid;
    }
  }
};
</script>
