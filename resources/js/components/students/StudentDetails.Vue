<template>
  <div class="container">
    <v-row class="mx-0">
      <div class="photo">

      </div>
      <div class="name">
        <h4 class="headline font-weight-light">{{ student.school }}&nbsp;&nbsp;&nbsp;&nbsp;<small>Year {{ student.year}} </small> </h4>
        <h1 class="font-weight-thin display-4 my-3">
          {{ student.pforename}} {{ student.psurname}}
          <v-avatar
            v-if="student.upn"
            size="128"
          >
            <v-img
              :src="'https://donkey.mydatadash.co.uk/images/gateway/' + student.upn + '.jpg'"
              alt="Pupil"
            aspect-ratio="1.3"
            >
            </v-img>
          </v-avatar>
        </h1>
        <p>{{ student.upn}} </p>
      </div>
    </v-row>
    <v-divider class="my-3"></v-divider>
    <v-row class="mx-0">
      <v-col
        cols="2"
        class="text-center pl-0"
      >
        <v-chip
          label
          :color='setGenderColour(student.genderlabel)'
          text-color="white"
          class="d-block"
        >
          <v-icon>{{ setGenderIcon(student.genderlabel) }}</v-icon>&nbsp;&nbsp;{{ student.genderlabel }}
        </v-chip>
      </v-col>
      <v-col
        cols="2"
        class="text-center pl-0"
        v-if='student.pplabel === "PP"'
      >
        <v-chip
          label
          color="purple"
          text-color="white"
          class="d-block"
        >
          <v-icon>mdi-account-plus</v-icon>&nbsp;&nbsp;{{ student.pplabel }}
        </v-chip>
      </v-col>
      <v-col
        cols="2"
        class="text-center pl-0"
        v-if='student.sendlabel != "SEND N"'
      >
        <v-chip
          label
          color="indigo"
          text-color="white"
          class="d-block"
        >
          <v-icon>mdi-address-card</v-icon>&nbsp;&nbsp;{{ student.sendlabel }}
        </v-chip>
      </v-col>
      <v-col
        cols="2"
        class="text-center pl-0"
      >
        <v-chip
          label
          color="green"
          text-color="white"
          class="d-block"
        >
          <v-icon>mdi-check-box-outline</v-icon>&nbsp;&nbsp;Stable
        </v-chip>
      </v-col>
    </v-row>
    <v-divider class="my-3"></v-divider>
    <v-row>
      <v-col
        cols="12"
        lg="3"
      >
        Start Date: <strong>{{ student.startdate }}</strong>
      </v-col>
      <v-col
        cols="12"
        lg="3"
      >
        Time on roll: <strong>X year Y months</strong>
      </v-col>
      <v-col
        cols="12"
        lg="4"
      >
        Status: <strong>{{student.status}}</strong>
      </v-col>
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
      student: [],
      endpoint: "api/dev/student/details/"
    };
  },
  created() {
    this.fetch();
  },
  mounted() {},
  methods: {
    fetch() {
      this.endpoint =
        "api/dev/student/details/" + this.schoolname + "/" + this.studentid;
      console.log(this.endpoint);
      console.log("details");
      axios.get(this.endpoint).then(({ data }) => {
        this.student = data.data.student;
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
    setGenderColour(gender) {
      if (gender === "Girls") {
        return "pink lighten-2";
      } else return "blue";
    },
    setGenderIcon(gender) {
      if (gender === "Girls") {
        return "mdi-human-female";
      } else return "mdi-human-male";
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
