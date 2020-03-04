<template>
  <div>
  <div v-if="! loaded" class="container">
    <v-progress-linear
      indeterminate
      color="teal"
    ></v-progress-linear>
  </div>
  <div v-if="loaded" class="container">
    <p class="headline font-weight-light teal--text text--darken-2"><v-icon color="teal darken-2">far fa-list-alt fa-fw</v-icon>  Daily Breakdown</p>
    <v-row class="mx-0">
      <v-col
        cols="12"
        lg="8"
        class="pa-0"
      >
        <v-simple-table
          fixed-header
        >
          <thead class="th--dark th--text-center th--less-padding">
            <tr>
              <th v-for="day in weekdayattendance" :key="day.weekday" class="grey darken-3 white--text text-center font-weight-light">{{ day.weekday }}</th>
            </tr>
          </thead>
          <tbody class="td--text-center td--less-padding">
            <tr>
              <td v-for="day in weekdayattendance" :key="day.weekday" :class='setWeekdayColor(day.pattendance)'>{{ roundOff(day.pattendance,1) }}%</td>
            </tr>
          </tbody>
        </v-simple-table>
      </v-col>
    </v-row>
  </div>
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
      weekdayattendance: [],
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
        "api/dev/student/weekdayattendance/" +
        this.schoolname +
        "/" +
        this.studentid;
      axios.get(this.endpoint).then(({ data }) => {
        this.weekdayattendance = data.data.weekdayattendance;
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
    setWeekdayColor(val) {
      if (val <= 90) {
        return 'red darken-1 white--text';
      } else if (val <= 95) {
        return 'amber darken-1 white--text';
      } else if (val > 95) {
        return 'green darken-1 white--text'
      } else {
        return 'grey'
      }
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
    },
  }
};
</script>
