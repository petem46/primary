<template>
  <div>
    <div v-if="! loaded">
      <i class="fas fa-spinner fa-spin fa-3x"></i>&nbsp;&nbsp; Loading...
    </div>
    <div v-if="loaded">
      <div class>
        <v-container text-center fluid>
            <v-col>
              <h1 class="display-3 mx-auto my-2">{{schoolname}} Reporting</h1>
            </v-col>
            <v-col>
              <v-btn
                :href="'http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Data+SSRS%2fCoreSubjectSummaryByYear&school='+schoolname+'&rs:Command=Render&rc:LinkTarget=main&rs:Format=HTML4.0'"
                onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')"
                color="orange darken-1"
                class="white--text"
              >Core Subject Summary by Year</v-btn>
            </v-col>
              <v-col>
                <v-btn
                  :href="'http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Data+SSRS%2fCoreSubjectSummaryByYear&school='+schoolname+'&rs:Command=Render'"
                  onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')"
                  color="orange darken-1"
                  class="white--text"
                >
                  Core Subject Summary by Year
                </v-btn>
              </v-col>
              <v-col>
                <v-btn
                  :href="'http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Data+SSRS%2fSubjectSummaryByYear&school='+schoolname+'&rs:Command=Render'"
                  onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')"
                  color="orange darken-1"
                  class="white--text"
                >
                  Subject Summary by Year
                </v-btn>
              </v-col>
              <v-divider></v-divider>
              <v-col>
                <v-btn
                  :href="'http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Data+SSRS%2fSubjectSummaryBySchool&school='+schoolname+'&rs:Command=Render'"
                  onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')"
                  color="teal darken-1"
                  class="white--text"
                >
                  Whole School Overview
                </v-btn>
              </v-col>
              <v-col>
                <v-btn
                  :href="'http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Data+SSRS%2fSchoolSubjectSummaryGender&school='+schoolname+'&rs:Command=Render'"
                  onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')"
                  color="blue darken-1"
                  class="white--text"
                >
                  Whole School Overview (Girl/Boy)
                </v-btn>
              </v-col>
              <v-col>
                <v-btn
                  :href="'http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Data+SSRS%2fSchoolSubjectSummaryPP&school='+schoolname+'&rs:Command=Render'"
                  onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')"
                  color="green darken-1"
                  class="white--text"
                >
                  Whole School Overview (PP)
                </v-btn>
              </v-col>
              <v-col>
                <v-btn
                  :href="'http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Data+SSRS%2fSchoolSubjectSummarySEND&school='+schoolname+'&rs:Command=Render'"
                  onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')"
                  color="purple lighten-1"
                  class="white--text"
                >
                  Whole School Overview (SEND)
                </v-btn>
              </v-col>
              <v-col>
                <v-btn
                  :href="'http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Data+SSRS%2fSchoolSubjectSummaryEAL&school='+schoolname+'&rs:Command=Render'"
                  onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')"
                  color="grey darken-1"
                  class="white--text"
                >
                  Whole School Overview (EAL)
                </v-btn>
              </v-col>
              <v-divider></v-divider>
              <v-col>
                <v-btn
                  :href="'http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Data+SSRS%2fYearSubjectSummary&school='+schoolname+'&rs:Command=Render'"
                  onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')"
                  color="teal darken-1"
                  class="white--text"
                >
                  Subject Overview by Year
                </v-btn>
              </v-col>
              <v-col>
                <v-btn
                  :href="'http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Data+SSRS%2fYearSubjectSummaryGender&school='+schoolname+'&rs:Command=Render'"
                  onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')"
                  color="blue darken-1"
                  class="white--text"
                >
                  Subject Overview by Year (Girl/Boy)
                </v-btn>
              </v-col>
              <v-col>
                <v-btn
                  :href="'http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Data+SSRS%2fYearSubjectSummaryPP&school='+schoolname+'&rs:Command=Render'"
                  onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')"
                  color="green darken-1"
                  class="white--text"
                >
                  Subject Overview by Year (PP)
                </v-btn>
              </v-col>
              <v-col>
                <v-btn
                  :href="'http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Data+SSRS%2fYearSubjectSummarySEND&school='+schoolname+'&rs:Command=Render'"
                  onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')"
                  color="purple lighten-1"
                  class="white--text"
                >
                  Subject Overview by Year (SEND)
                </v-btn>
              </v-col>
              <v-col>
                <v-btn
                  :href="'http://fcatdata/rs/Pages/ReportViewer.aspx?%2fFCAT+Data+SSRS%2fYearSubjectSummaryEAL&school='+schoolname+'&rs:Command=Render'"
                  onclick="return !window.open(this.href, 'Subject Summary Grid', 'width=1024,height=768')"
                  color="grey darken-1"
                  class="white--text"
                >
                  Subject Overview by Year (EAL)
                </v-btn>
              </v-col>
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
      loaded: true
    };
  },
  created() {},
  mounted() {
  },
  methods: {},
  computed: {
    schoolname() {
      return this.$store.getters.getschoolname;
    }
  }
};
</script>
