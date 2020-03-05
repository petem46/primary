<template>

</template>

<script>
import format from "date-fns/format";
// import subDays from 'date-fns/sub_days'
import parseISO from "date-fns/parseISO";
export default {
  props: [
    "whodis",
    "whodisavatar",
    "whodisemail",
    "whodisid",
    "whodisname",
    "whodisschool",
    "whodisusergroup_id"
  ],
  data: () => ({
    who: [],
  }),
  mounted() {

    /** SET USER */
    if (this.$store.getters.getwhodisname === null) {
      this.$store.commit("updateEndDate", format(new Date(), "yyyy-MM-dd"));
    }    this.$store.commit("setUser", this.whodis);

    /** SET SCHOOL NAME FROM USER EMAIL */
    if (
      this.$store.getters.getschoolname === null ||
      this.$store.getters.getschoolname === undefined
    ) {
      this.$store.commit("updateSchoolName", this.whodisschool);
      this.$store.commit("setWhoDisSchool", this.whodisschool);
      this.loaded = true;
    }


/** SET END DATE TO TODAY */
    if (this.$store.getters.getenddate === null) {
      this.$store.commit("updateEndDate", format(new Date(), "yyyy-MM-dd"));
    }
  },
  methods: {
    storeUser(user) {
      this.$store.commit("setUser", user);
    },
    updateSchoolName(sn) {
      this.$store.commit("updateSchoolName", sn);
    },
    updateStartDate(sd) {
      this.$store.commit("updateStartDate", sd);
    },
    updateEndDate(ed) {
      this.$store.commit("updateEndDate", ed);
    },
  },
  computed: {
  }
};
</script>
