<template>
  <div>
    <div class="container">
      <v-container fluid>
        <h1>WELCOME , </h1>
        <h1>CURRENT SCHOOL IS {{ schoolname }}</h1>
        <h1>CHOOSE A SCHOOL FROM THE NAV BAR</h1>
        <h1>OR CHOOSE A DASHBOARD VIEW FROM THE SIDE BAR</h1>
      </v-container>
    </div>
  </div>
</template>
<script>
import format from "date-fns/format";
export default {
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
};

</script>
