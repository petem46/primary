<template>
  <div class="container">
    <p class="display-1 font-weight-light teal--text text--darken-2">Attendance</p>
    <p class="headline font-weight-light teal--text text--darken-2"><v-icon color="teal darken-2">far fa-calendar-alt fa-fw</v-icon> Attendance Overview</p>
    <v-row class="mx-0">
      <v-col
        cols="6"
        class="pa-0"
      >
        <v-simple-table
          fixed-header
        >
          <thead class="th--dark th--text-center th--less-padding">
            <tr>
              <th>Category</th>
              <th>Sessions</th>
              <th>Present</th>
            </tr>
          </thead>
          <tbody class="td--text-center td--less-padding font-weight-light">
            <tr class="pa-3">
              <td class="green darken-1 white--text">Present + AEA</td>
              <td>{{ presentsessions }} </td>
              <td>{{ attendance.percentage }} </td>
            </tr>
            <tr>
              <td class="amber darken-1 white--text">Absence</td>
              <td>{{ attendance.abs }} </td>
              <td>{{ percentageabs }} </td>
            </tr>
            <tr>
              <td class="red darken-1 white--text">Unauthorised</td>
              <td>{{ attendance.uabs }}</td>
              <td>{{ percentageuabs }}</td>
            </tr>
          </tbody>
        </v-simple-table>
      </v-col>
    </v-row>
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
      // schoolname: null,
      message: null,
      loaded: false,
      attendance: [],
      endpoint: "api/dev/student/attendance/"
    };
  },
  created() {
    this.fetch();
  },
  mounted() {},
  methods: {
    fetch() {
      this.endpoint =
        "api/dev/student/attendance/" + this.schoolname + "/" + this.studentid;
      axios.get(this.endpoint).then(({ data }) => {
        this.attendance = data.data.attendance[0];
        console.log(this.attendance);
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
    },
    presentsessions() {
      return parseInt(this.attendance.possible) + parseInt(this.attendance.aea);
    },
    percentageabs() {
      return this.roundOff(
        (parseInt(this.attendance.abs) / parseInt(this.attendance.possible)) *
          100,
        2
      );
    },
    percentageuabs() {
      return this.roundOff(
        (parseInt(this.attendance.uabs) / parseInt(this.attendance.possible)) *
          100,
        2
      );
    }
  }
};
</script>
