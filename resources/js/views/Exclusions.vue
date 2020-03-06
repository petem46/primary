<template>
  <div>
    <div v-if="! loaded">
      <i class="fas fa-spinner fa-spin fa-3x"></i>&nbsp;&nbsp; Loading...
    </div>
    <div v-if="loaded">
      <div class>
        <v-container text-center fluid>
          <h1 class="display-3 mx-auto my-2">{{ schoolname }} Exclusions Page</h1>
        </v-container>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  components: {},
  data() {
    return {
      loaded: false,
    };
  },
  created() {},
  mounted() {
    setTimeout(() => this.loaded = true, 1500);
  },
  methods: {
    fetch() {
    },
  },
  computed: {
    schoolname() {
      return this.$store.getters.getschoolname;
    }
  }
};
</script>
