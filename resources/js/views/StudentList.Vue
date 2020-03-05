<template>
  <div class="row mx-0">
    <v-col
      cols="12"
      lg="12"
    >
      <v-card
        class="pa-2"
        flat
      >
        <v-card-title><h1 class="display-3">Pupils At {{ schoolname }}</h1></v-card-title>
        <v-data-table
          :headers="studentsheaders"
          :items="pupils"
          :search="search"
          :items-per-page="15"
          fixed-header
          multi-sort
          class="elevation-3"
          @click:row="viewStudent"
          :loading="! loaded"
          loading-text="Loading... Please wait">
        >
          <template v-slot:top>
            <v-row class="px-3">
              <v-col cols="4">
                <v-text-field
                  v-model="search"
                  append-icon="mdi-account-search"
                  label="Search"
                  single-line
                  hide-details
                ></v-text-field>
              </v-col>
              <v-col cols="2">
                <v-select
                  v-model="year"
                  :items="years"
                  label="Year Filter"
                ></v-select>
              </v-col>
              <v-col cols="2">
                <v-select
                  v-model="gender"
                  :items="genders"
                  label="Gender Filter"
                ></v-select>
              </v-col>
              <v-col cols="2">
                <v-select
                  v-model="pp"
                  :items="pps"
                  label="PP Filter"
                ></v-select>
              </v-col>
              <v-col cols="2">
                <v-select
                  v-model="send"
                  :items="sends"
                  label="SEND Filter"
                ></v-select>
              </v-col>
            </v-row>
          </template>
          <template v-slot:item.upn="{ item }">
          <v-avatar
            size="64"
          >
            <v-img
              :src="setPhotoPath(item.upn)"
              alt="Pupil"
            aspect-ratio="1.3"
            >
            </v-img>
          </v-avatar>
          </template>

        </v-data-table>
        <v-divider></v-divider>
      </v-card>
    </v-col>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      message: null,
      loaded: false,
      endpoint: "api/dev/students/",
      search: "",
      avatars: [
        '../images/avatars/bee-icon.png',
        '../images/avatars/bird-icon.png',
        '../images/avatars/bulldog-icon.png',
        '../images/avatars/cat-icon.png',
        '../images/avatars/cow-icon.png',
        '../images/avatars/elephant-icon.png',
        '../images/avatars/fish-icon.png',
        '../images/avatars/monkey-icon.png',
        '../images/avatars/penguin-icon.png',
      ],
      gender: "All",
      genders: ["All", "Boys", "Girls"],
      pp: "All",
      pps: ["All", "PP", "nPP"],
      attendance: 90,
      send: "All",
      sends: ["All", "SEND", "NOT SEND"],
      year: "All",
      years: ["All","11","10","9","8","7","6","5","4","3","2","1","0"],
      studentsheaders: [
        {
          text: "",
          // align: "right",
          sortable: false,
          value: "upn",
        },
        {
          text: "Surname",
          align: "left",
          sortable: true,
          value: "psurname"
        },
        {
          text: "Forename",
          align: "left",
          sortable: true,
          value: "pforename"
        },
        {
          text: "Year",
          align: "left",
          sortable: true,
          value: "year",
          filter: value => {
            if (this.year === "All") return true;
            if (!this.year) return true;
            return value === this.year;
          }
        },
        {
          text: "Reg",
          align: "left",
          sortable: true,
          value: "reg"
        },
        {
          text: "Gender",
          align: "left",
          sortable: true,
          value: "genderlabel",
          filter: value => {
            if (this.gender === "All") return true;
            if (!this.gender) return true;
            return value === this.gender;
          }
        },
        {
          text: "PP",
          align: "left",
          sortable: true,
          value: "pplabel",
          filter: value => {
            if (this.pp === "All") return true;
            if (!this.pp) return true;
            return value === this.pp;
          }
        },
        {
          text: "SEND",
          align: "left",
          sortable: true,
          value: "sendlabel",
          filter: value => {
            if (this.send === "All") return true;
            if (!this.send) return true;
            if (this.send === "SEND") return value != this.send + " N";
            if (this.send === "NOT SEND") return value === "SEND N";
          }
        },
      ],
    };
  },
  created() {
    this.fetch();
    this.randomAvatar();
  },
  mounted() {
  },
  methods: {
    fetch() {
      this.endpoint = "api/dev/students/" + this.schoolname;
      axios.get(this.endpoint).then(({ data }) => {
        this.pupils = data.data.students;
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
    setStudentid(id) {
      this.$store.commit("updateStudentid", id);
    },
    viewStudent(value) {
      this.setStudentid(value.id);
      this.$router.push({ name: 'Student', params: { schoolname: this.schoolname, id: value.id } });
    },
    randomItem(items) {
      return items[Math.floor(Math.random() * items.length)];
    },
    randomAvatar() {
      return this.randomItem(this.avatars);
    },
    setPhotoPath(upn) {
      let avatar = this.randomItem(this.avatars);
      let photo = "/images/gateway/" + upn + ".jpg";
      var request;
      request = new XMLHttpRequest();
      request.open("GET", photo, false);
      request.send();
      console.log(request.getResponseHeader("Last-Modified"));
      if (request.getResponseHeader("Last-Modified") === null) {
        console.log('SHOW ME AN AVATAR');
        return avatar;
      }
      return photo;
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
  },
  watch: {
    schoolname: function() {
      this.endpoint = "api/dev/students/" + this.schoolname;
      this.refresh();
    },
    startdate: function() {
      this.endpoint = "api/dev/students/" + this.schoolname;
      this.refresh();
    },
    enddate: function() {
      this.endpoint = "api/dev/students/" + this.schoolname;
      this.refresh();
    }
  },
};
</script>
