<template>
  <div class="row mx-0">
    <v-col
      cols="12"
      lg="12"
    >
    <h1>HELLO STUDENT</h1>
    </v-col>
  </div>

</template>
<script>
import axios from "axios";
export default {
  watch: {
    schoolname: function() {
      this.endpoint = "api/dev/student/" + schoolname;
      this.refresh();
    },
    startdate: function() {
      this.endpoint = "api/dev/student/" + schoolname;
      this.refresh();
    },
    enddate: function() {
      this.endpoint = "api/dev/student/" + schoolname + "/" + this.studentid;
      this.refresh();
    }
  },
  data() {
    return {
      // schoolname: null,
      message: null,
      loaded: false,
      endpoint: "api/dev/student/",
  };
  },
  created() {
    this.fetch();
  },
  mounted() {},
  methods: {
    fetch() {
      this.endpoint = "api/dev/student/" + schoolname + studentid;
      axios.get(this.endpoint).then(({ data }) => {
        this.student = data.data.student;
        this.attendance = data.data.attendance;
        this.weekdayattendance = data.data.weekdayattendance;
        this.weeklyrunningattendance = data.data.weeklyrunningattendance;
        this.ppa = data.data.ppa;
        this.primarydcdata = data.data.primarydcdata;
        this.loaded = true;
      });
    },
    roundOff(value, decimals) {
      return Number(Math.round(value + "e" + decimals) + "e-" + decimals);
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
