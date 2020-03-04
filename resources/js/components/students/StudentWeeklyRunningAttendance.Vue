<template>
  <div>
  <div v-if="! loaded" class="container">
    <v-progress-linear
      indeterminate
      color="teal"
    ></v-progress-linear>
  </div>
  <div v-if="loaded" class="container">
    <v-card>
    <p class="headline font-weight-light teal--text text--darken-2">
      <v-icon color="teal darken-2">far fa-chart-bar fa-fw</v-icon> Attendance Running Weekly
    </p>
    <v-row class="mx-0">
      <v-col
        cols="12"
        md="8"
        class="pa-0"
      >
        <v-simple-table fixed-header>
          <thead class="th--dark th--text-center">
            <tr>
              <th>Week</th>
              <th>Sessions<br>Present</th>
              <th>Sessions<br>Possible</th>
              <th>% Attendance</th>
              <th>Running<br>Present</th>
              <th>Running<br>Possible</th>
              <th>Running<br>% Attendance</th>
            </tr>
          </thead>
          <tbody class="td--text-center table-striped td--less-padding">
            <tr
              v-for="week in weeklyrunningattendance"
              :key="week.wk"
            >
              <td>{{ week.wk }}</td>
              <td>{{ week.present }}</td>
              <td>{{ week.possible }}</td>
              <td>{{ roundOff(week.pattendance,1) }}%</td>
              <td>{{ week.RunningPresent }}</td>
              <td>{{ week.RunningPossible }}</td>
              <td>{{ roundOff(week.RunningPercent,1) }}%</td>
            </tr>
          </tbody>
        </v-simple-table>
      </v-col>
    </v-row>

    <v-divider class="my-3"></v-divider>
  </v-card>
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
      weeklyrunningattendance: [],
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
        "api/dev/student/weeklyrunningattendance/" +
        this.schoolname +
        "/" +
        this.studentid;
      axios.get(this.endpoint).then(({ data }) => {
        this.weeklyrunningattendance = data.data.weeklyrunningattendance;
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
