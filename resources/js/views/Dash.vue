<template>
  <div>
    <div class="container">
      <v-container fluid>
        <h1>WELCOME , </h1>
        <h1>CURRENT SCHOOL IS {{ schoolname }}</h1>
        <h1>CHOOSE A SCHOOL FROM THE NAV BAR</h1>
        <h1
        @click="randomAvatar"
        >OR CHOOSE A DASHBOARD VIEW FROM THE SIDE BAR</h1>
                <v-avatar
            size="64"
          >
            <v-img
              :src="randomAvatar()"
              alt="Pupil"
            >
            </v-img>
          </v-avatar>

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
        'images/avatars/bee-icon.png',
        'images/avatars/bird-icon.png',
        'images/avatars/bulldog-icon.png',
        'images/avatars/cat-icon.png',
        'images/avatars/cow-icon.png',
        'images/avatars/elephant-icon.png',
        'images/avatars/fish-icon.png',
        'images/avatars/monkey-icon.png',
        'images/avatars/penguin-icon.png',
      ],
    }
  },
  computed: {
    schoolname () {
      return this.$store.getters.getschoolname;
    },
    whodisname () {
      return this.$store.getters.getschoolname;
    },
  },
  watch: {
    schoolname: function() {
      console.log('STORE SCHOOL NAME CHANGED');
    }
  },
  mounted() {
    if (
      this.$store.getters.getschoolname == null
    ) {
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
        randomItem (items) {
      return items[Math.floor(Math.random()*items.length)];
    },
    randomAvatar() {
      console.log("AVATAR = " + '"' + this.randomItem(this.avatars) + '"');
      return this.randomItem(this.avatars);
  },
  },
};

</script>
