<template>
  <div>
    <div v-if="! loaded">
      <i class="fas fa-spinner fa-spin fa-3x"></i>&nbsp;&nbsp; Loading...
    </div>
    <div v-if="loaded">
      <div class>
        <v-container text-center fluid>
					<v-row>
          <h1 class="display-3 mx-auto my-2">Published Performance Data (DfE) {{ schoolname }} 2019</h1>
					</v-row>
          <v-row>
            <v-col
              cols="6"
            >

            </v-col>
          </v-row>
          <v-row></v-row>
          <v-row></v-row>
          <v-row></v-row>
        </v-container>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  components: {},
  watch: {
    schoolname: function() {
      this.loaded = false;
      setTimeout(() => this.endpoint = "api/dev/dfe_compare/" + this.$store.getters.getschoolname, 1000);
      setTimeout(() => this.fetch(), 1000);
    }
  },
  data() {
    return {
      loaded: false,
      abs_18: null,
      census_19: [],
      ks4_19: [],
      ks4_pup_dest: [],
      ofsted: [],
    };
  },
  created() {},
  mounted() {
    setTimeout(() => this.endpoint = "api/dev/dfe_compare/" + this.$store.getters.getschoolname, 1000);
    setTimeout(() => this.fetch(), 1000);
  },
  methods: {
    fetch() {
      axios.get(this.endpoint).then(({ data }) => {
        console.log(data.data);
        this.abs_18 = data.data.abs_18;
        this.census_19 = data.data.census_19;
        this.ks4_19 = data.data.ks4_19;
        this.ks4_pup_dest = data.data.ks4_pup_dest;
        this.ofsted = data.data.ofsted;
        this.loaded = true;
      });
    },
  },
  computed: {
    schoolname() {
      return this.$store.getters.getschoolname;
    }
  }
};
</script>
