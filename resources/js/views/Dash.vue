<template>
  <div>
    <div class="container">
      <v-container fluid>
        <h1>WELCOME , </h1>
        <h1>CURRENT SCHOOL IS <span class="display-2 teal--text">{{ schoolname }}</span></h1>
        <h1>CHOOSE A SCHOOL FROM THE <span class="display-2 red--text">NAV BAR</span> above</h1>
        <h1 @click="setPhotoPath">OR CHOOSE A DASHBOARD VIEW FROM THE <span class="display-2 green--text">SIDE BAR</span> on the left</h1>
        <div class="my-5">
        <v-avatar tile size="64" class="mr-5">
          <v-img
            :src="randomAvatar()"
            alt="Pupil"
          >
          </v-img>
        </v-avatar>
        <v-avatar tile size="64" class="mr-5">
          <v-img
            :src="randomAvatar()"
            alt="Pupil"
          >
          </v-img>
        </v-avatar>
        <v-avatar tile size="64" class="mr-5">
          <v-img
            :src="randomAvatar()"
            alt="Pupil"
          >
          </v-img>
        </v-avatar>
        <v-avatar tile size="64" class="mr-5">
          <v-img
            :src="randomAvatar()"
            alt="Pupil"
          >
          </v-img>
        </v-avatar>
        <v-avatar tile size="64" class="mr-5">
          <v-img
            :src="randomAvatar()"
            alt="Pupil"
          >
          </v-img>
        </v-avatar>
        </div>
      </v-container>
    </div>
  </div>
</template>
<script>
import format from "date-fns/format";
export default {
  data() {
    return {
      avatars: [
        "images/avatars/bee-icon.png",
        "images/avatars/bird-icon.png",
        "images/avatars/bulldog-icon.png",
        "images/avatars/cat-icon.png",
        "images/avatars/cow-icon.png",
        "images/avatars/elephant-icon.png",
        "images/avatars/fish-icon.png",
        "images/avatars/monkey-icon.png",
        "images/avatars/penguin-icon.png"
      ]
    };
  },
  computed: {
    schoolname() {
      return this.$store.getters.getschoolname;
    },
    whodisname() {
      return this.$store.getters.getschoolname;
    }
  },
  watch: {
    schoolname: function() {
      console.log("STORE SCHOOL NAME CHANGED");
    }
  },
  mounted() {
    if (this.$store.getters.getschoolname == null) {
      this.$store.commit("updateSchoolName", this.whodisschool);
      this.$store.commit("setWhoDisSchool", this.whodisschool);
      this.loaded = true;
    }

    /** SET END DATE TO TODAY */
    if (this.$store.getters.getenddate == null) {
      this.$store.commit("updateEndDate", format(new Date(), "yyyy-MM-dd"));
    }
  },
  methods: {
    randomItem(items) {
      return items[Math.floor(Math.random() * items.length)];
    },
    randomAvatar() {
      console.log("AVATAR = " + '"' + this.randomItem(this.avatars) + '"');
      return this.randomItem(this.avatars);
    },
    randomAvatare(e) {
      console.log("AVATAR = " + '"' + this.randomItem(this.avatars) + '"');
      console.log(e);
      e = this.randomItem(this.avatars);
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
  }
};
</script>
